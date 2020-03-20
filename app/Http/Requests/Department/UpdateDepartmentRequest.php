<?php
namespace App\Http\Requests\Department;

use App\Base\BaseRequest;

class UpdateDepartmentRequest extends BaseRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		// TODO : acl validattion for parent department id
		return [
			'name'  		=> 'required|max:255',
			'description'	=> 'string',
		];
	}
}
