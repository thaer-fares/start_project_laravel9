<?php


namespace App\Repositories;
use App\Models\AcademicYear;
use App\Repositories\Interfaces\AcademicYearRepositoryInterface;
use Illuminate\Support\Arr;

/**
 * Class AcademicYearRepository
 * @property AcademicYear academic_year
 * @package App\Repositories
 */
class AcademicYearRepository implements AcademicYearRepositoryInterface
{
    /**
     * AcademicYearRepository constructor.
     */
    function __construct()
    {
        $this->academic_year = new AcademicYear();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->academic_year->find($id);
    }
    /**
     * Get's all academic_years.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->academic_year->all();
    }

    /**
     * Deletes a academic_year.
     *
     * @param int
     * @return int
     */
    public function delete($id)
    {
        return $this->academic_year->destroy($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->academic_year->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->academic_year->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function allDataTable(array $data)
    {
        $query = $this->academic_year;
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
        $query = $this->academic_year;

        if(Arr::exists($data,"name") && !is_null($data['name']))
        {
            $query = $query->where('name', 'LIKE', '%' . $data['name']. '%');
        }
        return $query->count('id');
    }

}

