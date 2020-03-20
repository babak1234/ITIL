<?php
namespace App\Models\Department;

use App\Base\BaseModel;
use Kalnoy\Nestedset\NodeTrait;

class Department extends BaseModel
{
	use NodeTrait;
	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'departments';
	
	/**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'department_id';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'name',
		'description',
		'user_id'
	];
}