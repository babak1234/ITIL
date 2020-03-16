<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Departments extends Model
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