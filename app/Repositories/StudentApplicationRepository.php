<?php

namespace App\Repositories;

use App\Models\RegistrationApplication;
use Illuminate\Support\Arr;
use App\Repositories\Interfaces\StudentApplicationRepositoryInterface;

/**
 * Class StudentApplicationRepository
 * @property StudentApplicationRepository $applicationRepository
 * @package App\Repositories
 */
class StudentApplicationRepository implements StudentApplicationRepositoryInterface
{
    /**
     * StudentApplicationRepository constructor.
     */
    function __construct()
    {
        $this->registration_application = new RegistrationApplication();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->registration_application->find($id);
    }
    /**
     * Get's all registration_applications.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->registration_application->all();
    }

    /**
     * Deletes a registration_application.
     *
     * @param int
     * @return int
     */
    public function delete($id)
    {
        return $this->registration_application->destroy($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->registration_application->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->registration_application->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function allDataTable(array $data)
    {
        $query = $this->registration_application;
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
        $query = $this->registration_application;
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

