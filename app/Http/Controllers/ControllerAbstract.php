<?php
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

abstract class ControllerAbstract extends Controller
{
	const EXCEPTION_MESSAGE	= 'ex-message';
	protected $model;

	/**
	 * generate response
	 *
	 * @param $content
	 * @param int $statusCode
	 * @param array $heathers
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
	 */
	protected function getResponse($content, $statusCode=Response::HTTP_OK, $heathers=[])
	{
		if(isset($content[self::EXCEPTION_MESSAGE]) && !in_array(env('APP_ENV'), ['local', 'development'])) {
			unset($content[self::EXCEPTION_MESSAGE]);
		}
		return response(['data' => $content], $statusCode, $heathers);
	}
}