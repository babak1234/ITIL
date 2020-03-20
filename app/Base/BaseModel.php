<?php
namespace App\Base;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
	public function getDateFormat()
	{
		return 'U';
	}
}