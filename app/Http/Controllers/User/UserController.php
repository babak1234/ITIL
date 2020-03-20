<?php
namespace App\Http\Controllers\User;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\ControllerAbstract;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\Department\UpdateDepartmentRequest;



class UserController extends ControllerAbstract
{
    /**
     * UserController constructor.
     *
     * @param UserRepositoryInterface $model
     */
    public function __construct(UserRepositoryInterface $model)
    {
        $this->model = $model;
    }

    /**
     * List all departments.
     *
     * @return mixed
     */
    public function index()
    {
		return $this->getResponse($this->model->all());
    }

	/**
	 * show an department
	 * @param $departmentId
	 * @return \Illuminate\Http\Response
	 */
    public function show($departmentId)
    {
    	try {
			return $this->getResponse($this->model->findOrFail($departmentId));
	    } catch (Exception $e) {
			return $this->getResponse([
				self::EXCEPTION_MESSAGE	=> $e->getMessage()
			], Response::HTTP_NOT_FOUND);
	    }
    }

	/**
	 * Store new user
	 * @param CreateDepartmentRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateUserRequest $request)
	{
//		try {
			// @TODO CHANGE TO LOGED IN USER
			$user	= $this->model->insert($request->validated());
			return $this->getResponse([
				'id'	=> $user->id
			], Response::HTTP_CREATED);
//		} catch (Exception $ex) {
//			return $this->getResponse([
//				self::EXCEPTION_MESSAGE => $ex->getMessage()
//			], Response::HTTP_INTERNAL_SERVER_ERROR);
//		}
	}

	/**
	 * update a department
	 * @param $departmentId
	 * @param UpdateDepartmentRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function update($departmentId, UpdateDepartmentRequest $request)
	{
		try {
			$data	= $request->validated();
			// @TODO CHANGE TO LOGED IN USER
			$this->model->update($departmentId, $data);
			return $this->getResponse([], Response::HTTP_OK);
		} catch (Exception $ex) {
			return $this->getResponse([
				self::EXCEPTION_MESSAGE	=> $ex->getMessage()
			], Response::HTTP_INTERNAL_SERVER_ERROR);

		}
	}

	/**
	 * destroy an department
	 * @param $departmentId
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($departmentId)
	{
		return $this->getResponse($this->model->delete($departmentId));
	}
}