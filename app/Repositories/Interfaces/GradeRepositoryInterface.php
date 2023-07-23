<?php

namespace App\Repositories\Interfaces;

interface GradeRepositoryInterface
{
    /**
     * Get's a grade by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get's all grades.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a grade.
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
