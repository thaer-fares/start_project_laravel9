<?php

namespace App\Repositories\Interfaces;
/**
 * Interface StudentApplicationRepositoryInterface
 * @package App\Repositories\Interfaces
 */
interface StudentApplicationRepositoryInterface
{
    /**
     * Get's a Application by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get's all Applications.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a Application.
     *
     * @param int
     */
    public function delete($id);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);


    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    public function allDataTable(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function countDataTable(array $data);
}
