<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use App\Repositories\DepartmentRepository;

class UserControllerTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testStoreUser()
    {
		$this->post(route('user.store'), [
			'first_name'			=> 'first_name',
			'last_name'				=> 'last_name',
			'user_name'				=> 'fakeusername',
			'email'					=> 'email@sdfsdfsdf.com',
			'cellphone'				=> '09192332841',
			'department_id'			=> 1,
			'birth_date'			=> time(),
			'language'				=> 'fa',
			'calendar_type'			=> 1,
			'company'				=> 'fake company name',
			'password'				=> 'testpassword',
			'password_confirmation'	=> 'testpassword',
		],
		[
			'Accept'	=> 'application/json'
		])
		->assertStatus(Response::HTTP_CREATED)
		->assertJson(['data' => ['id' => 1]])
		;
    }
	/**
	 * Create sub departments
	 */
	/*
	public function testStoreSubDepartment()
    {
        factory(DepartmentRepository::class, 1)->create();
        $this->post(route('department.store'), [
        	    'name'			=> 'sub_department',
				'description'	=> 'department description.',
				'parent_id'		=> 1
			])
			->assertStatus(Response::HTTP_CREATED)
			->assertJson(['data' => ['department_id' => 3]])
			;
    }
*/
	/**
	 * get all departments
	 */
//	public function testIndexDepartments()
//    {
//		factory(DepartmentRepository::class, 1)->create();
//		$this->get(route('department.index'))
//			->assertOk()
//			->assertJson(['data' => [
//					['department_id' => 1],
//					['department_id' => 2]
//				]
//			])
//			;
//	}

	/**
	 * get one departments
	 */
//	public function testShowDepartments()
//    {
//		factory(DepartmentRepository::class, 1)->create();
//		$this->get(route('department.show', ['departmentId'=>2]))
//			->assertOk()
//			->assertJson(['data' => ['department_id' => 2]])
//			;
//	}

	/**
	 * test update a department
	 */
//	public function testUpdateDepartments()
//    {
//		factory(DepartmentRepository::class, 1)->create();
//		$data   = [
//			'departmentId'  => 2,
//			'name'			=> 'updated department',
//			'description'	=> 'updated department description.',
//			'parent_id'		=> 10
//		];
//		$this->put(route('department.update', $data))
//			->assertOk()
//			;
//	    $this->get(route('department.show', ['departmentId'=>2]))
//		    ->assertOk()
//		    ->assertJson(['data' => [
//			    'department_id'  => 2,
//			    'name'			=> 'updated department',
//			    'description'	=> 'updated department description.',
//		    ]])
//	    ;
//	}

	/**
	 * test delete a department
	 */
//	public function testDeleteDepartments()
//    {
//		factory(DepartmentRepository::class, 1)->create();
//		$this->delete(route('department.destroy', ['departmentId'  => 2]))
//			->assertOk()
//			;
//	    $this->get(route('department.show', ['departmentId'=>2]))
//		    ->assertStatus(Response::HTTP_NOT_FOUND)
//	    ;
//	}
}
