<?php

namespace Tests\Feature\Departments;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use App\Repositories\DepartmentRepository;

class DepartmentCreateTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Create root department
     *
     * @return void
     */
    public function testStoreRootDepartment()
    {
		
		$this->post(route('department.store'), [
				'name'			=> 'root',
				'description'	=> 'department description.',
				'parent_id'		=> 0
			])
			->dump()
			->assertStatus(Response::HTTP_CREATED)
			->assertJson(['data' => ['id' => 2]])
			;
    }

	/**
	 * Create sub departments
	 */
	public function testStoreSubDepartment()
    {
        factory(DepartmentRepository::class, 1)->create();
        $this->post(route('department.store'), [
        	    'name'			=> 'sub_department',
				'description'	=> 'department description.',
				'parent_id'		=> 1
			])
			->dump()
			->assertStatus(Response::HTTP_CREATED)
			->assertJson(['data' => ['id' => 3]])
			;
    }

	/**
	 * get all departments
	 */
	public function testIndexDepartments()
    {
		factory(DepartmentRepository::class, 1)->create();
		$this->get(route('department.index'))
			->assertOk()
			->assertJson(['data' => [
					['department_id' => 1],
					['department_id' => 2]
				]
			])
			;
	}

	/**
	 * get one departments
	 */
	public function testShowDepartments()
    {
		factory(DepartmentRepository::class, 1)->create();
		$this->get(route('department.show', ['departmentId'=>2]))
			->assertOk()
			->assertJson(['data' => ['department_id' => 2]])
			;
	}

	/**
	 * test update a department
	 */
	public function testUpdateDepartments()
    {
		factory(DepartmentRepository::class, 1)->create();
		$data   = [
			'departmentId'  => 2,
			'name'			=> 'updated department',
			'description'	=> 'updated department description.',
			'parent_id'		=> 10
		];
		$this->put(route('department.update', $data))
			->assertOk()
			;
	    $this->get(route('department.show', ['departmentId'=>2]))
		    ->assertOk()
		    ->assertJson(['data' => [
			    'department_id'  => 2,
			    'name'			=> 'updated department',
			    'description'	=> 'updated department description.',
		    ]])
	    ;
	}

	/**
	 * test delete a department
	 */
	public function testDeleteDepartments()
    {
		factory(DepartmentRepository::class, 1)->create();
		$this->delete(route('department.destroy', ['departmentId'  => 2]))
			->assertOk()
			;
	    $this->get(route('department.show', ['departmentId'=>2]))
		    ->assertStatus(Response::HTTP_NOT_FOUND)
	    ;
	}
}
