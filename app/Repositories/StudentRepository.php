<?php

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Support\Arr;
use App\Repositories\Interfaces\StudentRepositoryInterface;

/**
 * Class StudentRepository
 * @property StudentRepository $studentRepository
 * @package App\Repositories
 */
class StudentRepository implements StudentRepositoryInterface
{
    /**
     * StudentRepository constructor.
     */
    function __construct()
    {
        $this->student = new Student();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->student->find($id);
    }
    /**
     * Get's all students.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->student->all();
    }

    /**
     * Deletes a student.
     *
     * @param int
     * @return int
     */
    public function delete($id)
    {
        return $this->student->destroy($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->student->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->student->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function allDataTable(array $data)
    {
        $query = $this->student->with(['gender', 'grade', 'school', 'status']);
        $skip = 0;
        $take = 25;
/*
        if(Arr::exists($data,"name") && !is_null($data['name']))
        {
            $query = $query->where('name', 'LIKE', '%' . $data['name']. '%');
        }
*/
        if(Arr::exists($data,"identity_no") && !is_null($data['identity_no']))
        {
            $query = $query->where('identity_no', $data['identity_no']);
        }
        if(Arr::exists($data,"governorate_id") && !is_null($data['governorate_id']))
        {
            $query = $query->where('governorate_id', $data['governorate_id']);
        }
        if(Arr::exists($data,"school_id") && !is_null($data['school_id']))
        {
            $query = $query->where('school_id', $data['school_id']);
        }
        if(Arr::exists($data,"birth_date_from") && !is_null($data['birth_date_from']))
        {
            $query = $query->where('birth_date_from', '>=', $data['birth_date_from']);
        }
        if(Arr::exists($data,"birth_date_to") && !is_null($data['birth_date_to']))
        {
            $query = $query->where('birth_date_to', '<=', $data['birth_date_to']);
        }
        if(Arr::exists($data,"avg_from") && !is_null($data['avg_from']))
        {
            $query = $query->where('avg_from', '>=', $data['avg_from']);
        }
        if(Arr::exists($data,"avg_to") && !is_null($data['avg_to']))
        {
            $query = $query->where('avg_to', '<=', $data['avg_to']);
        }
        if(Arr::exists($data,"start") && !is_null($data['start']))
        {
            $skip = $data['start'];
        }
        if(Arr::exists($data,"length") && !is_null($data['length']))
        {
            $take = $data['length'];
        }
        return $query->skip($skip)->take($take);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function countDataTable(array $data)
    {
        $query = $this->student;
/*
        if(Arr::exists($data,"name") && !is_null($data['name']))
        {
            $query = $query->where('name', 'LIKE', '%' . $data['name']. '%');
        }
*/
        if(Arr::exists($data,"identity_no") && !is_null($data['identity_no']))
        {
            $query = $query->where('identity_no', $data['identity_no']);
        }
        return $query->count('id');
    }

}

