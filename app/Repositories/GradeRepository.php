<?php


namespace App\Repositories;
use App\Models\Grade;
use App\Repositories\Interfaces\GradeRepositoryInterface;
use Illuminate\Support\Arr;

/**
 * Class GradeRepository
 * @property Grade $grade
 * @package App\Repositories
 */
class GradeRepository implements GradeRepositoryInterface
{
    /**
     * GradeRepository constructor.
     */
    function __construct()
    {
        $this->grade = new Grade();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->grade->find($id);
    }
    /**
     * Get's all grades.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->grade->all();
    }

    /**
     * Deletes a grade.
     *
     * @param int
     * @return int
     */
    public function delete($id)
    {
        return $this->grade->destroy($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->grade->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->grade->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function allDataTable(array $data)
    {
        $query = $this->grade;
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
        $query = $this->grade;

        if(Arr::exists($data,"name") && !is_null($data['name']))
        {
            $query = $query->where('name', 'LIKE', '%' . $data['name']. '%');
        }
        return $query->count('id');
    }

}

