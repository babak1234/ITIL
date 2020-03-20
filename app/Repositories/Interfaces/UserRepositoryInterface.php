<?php
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
	public function insert(array $data);
	/**
	 * Get`s all entities.
	 *
	 * @return mixed
	 */
	public function all();

	/**
	 * Deletes an entity.
	 *
	 * @param $id
	 * @return int|mixed
	 */
	public function delete($id);

	/**
	 * Get`s an entity by it's ID
	 * @param $id
	 * @return mixed
	 */
	public function get($id);

	/**
	 * Updates an entity.
	 *
	 * @param $id
	 * @param $data
	 * @return mixed
	 */
	public function update($id, $data);

	/**
	 * find an entity or fail.
	 *
	 * @param $id
	 * @return mixed
	 */
	public function findOrFail($id);
}