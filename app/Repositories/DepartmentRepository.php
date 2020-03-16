<?php
namespace App\Repositories;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Models\Departments;
use App\Base\BaseRepository;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
	protected $model;
	
	public function __construct($model=null)
    {
    	if(is_null($model)) {
			$model	= new Departments();
		} else if (is_array($model)) {
			$model	= new Departments($model);
		}
		$this->model = $model;
    }
	
	public function insert($data)
	{
		$department	= new Departments($data);
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
		return Departments::all();
	}
}