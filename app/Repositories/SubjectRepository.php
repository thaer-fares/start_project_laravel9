<?php


namespace App\Repositories;
use App\Models\Subject;
use App\Repositories\Interfaces\SubjectRepositoryInterface;
use Illuminate\Support\Arr;

/**
 * Class SubjectRepository
 * @property Subject $subject
 * @package App\Repositories
 */
class SubjectRepository implements SubjectRepositoryInterface
{
    /**
     * SubjectRepository constructor.
     */
    function __construct()
    {
        $this->subject = new Subject();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->subject->find($id);
    }
    /**
     * Get's all subjects.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->subject->all();
    }

    /**
     * Deletes a subject.
     *
     * @param int
     * @return int
     */
    public function delete($id)
    {
        return $this->subject->destroy($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->subject->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->subject->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function allDataTable(array $data)
    {
        $query = $this->subject;
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
        $query = $this->subject;

        if(Arr::exists($data,"name") && !is_null($data['name']))
        {
            $query = $query->where('name', 'LIKE', '%' . $data['name']. '%');
        }
        return $query->count('id');
    }

}

