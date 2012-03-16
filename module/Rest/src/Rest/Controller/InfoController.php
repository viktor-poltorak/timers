<?php

namespace Rest\Controller;

use Zend\Mvc\Controller\RestfulController;

class InfoController extends RestfulController
{
	/**
	 * Return list of resources
	 *
	 * @return array
	 */
	public function getList()
	{
		$data = array(
			'name'    => 'FOO BAR',
			'address' => 'GLYFADA, ATHENS, GR',
			'phone'   => '+30123456789',
			'email'   => 'EMAIL@DOMAIN.COM',
		);

		return $data;
	}

	/**
	 * Return single resource
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function get($id) {
        $data = array(
            'id' => $id,
			'method'    => 'get'
		);

		return $data;
    }

	/**
	 * Create a new resource
	 *
	 * @param mixed $data
	 * @return mixed
	 */
	public function create($data) {
        $data = array(
            'params' => print_r($data, true),
			'method'    => 'Create'
		);

		return $data;
    }

	/**
	 * Update an existing resource
	 *
	 * @param mixed $id
	 * @param mixed $data
	 * @return mixed
	 */
	public function update($id, $data) {
        $data = array(
            'id' => $id,
            'params' => print_r($data, true),
			'method'    => 'update'
		);

		return $data;
    }

	/**
	 * Delete an existing resource
	 *
	 * @param  mixed $id
	 * @return mixed
	 */
	public function delete($id) {
        $data = array(
            'id' => $id,
			'method'    => 'dalete'
		);
        return $data;
    }
}
