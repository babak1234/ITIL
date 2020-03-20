<?php
namespace App\Repositories;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department\Department;
use App\Base\BaseRepository;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
	protected $model;
	
	public function __construct($model=null)
    {
    	if(is_null($model)) {
			$model	= new Department();
		} else if (is_array($model)) {
			$model	= new Department($model);
		}
		$this->model = $model;
    }
	
	public function insert(array $data)
	{
		$department	= new Department($data);
		$department->parent_id	= $data['parent_id'];
		$department->save();
		return $department;
	}
	
	/**
     * Get`s all entities.
     *
     * @return mixed
     */
	public function all()
	{
		return Department::all();
	}
}