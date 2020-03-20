<?php
namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\Users\User;
use App\Base\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
	protected $model;
	
	public function __construct($model=null)
    {
    	if(is_null($model)) {
			$model	= new User();
		} else if (is_array($model)) {
			$model	= new User($model);
		}
		$this->model = $model;
    }
	
	public function insert(array $data)
	{
		$data['password']	= bcrypt($data['password']);
		$user				= new User($data);
		$user->save();
		return $user;
	}
}