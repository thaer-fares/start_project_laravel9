<?php


namespace App\Repositories;
use App\Models\School;
use App\Repositories\Interfaces\SchoolRepositoryInterface;
use Illuminate\Support\Arr;

/**
 * Class SchoolRepository
 * @property School $school
 * @package App\Repositories
 */
class SchoolRepository implements SchoolRepositoryInterface
{
    /**
     * SchoolRepository constructor.
     */
    function __construct()
    {
        $this->school = new School();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->school->find($id);
    }
    /**
     * Get's all schools.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->school->all();
    }

    /**
     * Deletes a school.
     *
     * @param int
     * @return int
     */
    public function delete($id)
    {
        return $this->school->destroy($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->school->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->school->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function allDataTable(array $data)
    {
        $query = $this->school;
        $skip = 0;
        $take = 25;

        if(Arr::exists($data,"name") && !is_null($data['name']))
        {
            $query = $query->where('name', 'LIKE', '%' . $data['name']. '%');
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
        $query = $this->school;

        if(Arr::exists($data,"name") && !is_null($data['name']))
        {
            $query = $query->where('name', 'LIKE', '%' . $data['name']. '%');
        }
        return $query->count('id');
    }

}

