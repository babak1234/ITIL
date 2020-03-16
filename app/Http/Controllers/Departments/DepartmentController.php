<?php
namespace App\Http\Controllers\Departments;

use Exception;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\ControllerAbstract;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Http\Requests\Departments\CreateDepartmentRequest;
use App\Http\Requests\Departments\UpdateDepartmentRequest;



class DepartmentController extends ControllerAbstract
{
    /**
     * DepartmentController constructor.
     *
     * @param DepartmentRepositoryInterface $model
     */
    public function __construct(DepartmentRepositoryInterface $model)
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
	 * Store new department
	 * @param CreateDepartmentRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateDepartmentRequest $request)
	{
		try {
			$data	= $request->validated();
			// @TODO CHANGE TO LOGED IN USER
			$data['user_id']	= 1;
			$department			= $this->model->insert($data);
			return $this->getResponse([
				'department_id'	=> $department->department_id
			], Response::HTTP_CREATED);
		} catch (Exception $ex) {
			return $this->getResponse([
				self::EXCEPTION_MESSAGE => $ex->getMessage()
			], Response::HTTP_INTERNAL_SERVER_ERROR);
		}
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