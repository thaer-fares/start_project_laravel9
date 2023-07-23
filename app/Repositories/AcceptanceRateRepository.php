<?php


namespace App\Repositories;
use App\Models\AcceptanceRate;
use App\Repositories\Interfaces\AcceptanceRateRepositoryInterface;
use Illuminate\Support\Arr;

/**
 * Class AcceptanceRateRepository
 * @property AcceptanceRate aAcceptanc_rRate
 * @package App\Repositories
 */
class AcceptanceRateRepository implements AcceptanceRateRepositoryInterface
{
    /**
     * AcceptanceRateRepository constructor.
     */
    function __construct()
    {
        $this->acceptance_rate = new AcceptanceRate();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->acceptance_rate->find($id);
    }
    /**
     * Get's all acceptance_rates.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->acceptance_rate->all();
    }

    /**
     * Deletes a acceptance_rate.
     *
     * @param int
     * @return int
     */
    public function delete($id)
    {
        return $this->acceptance_rate->destroy($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->acceptance_rate->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->acceptance_rate->find($id)->update($data);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function allDataTable(array $data)
    {
        $query = $this->acceptance_rate;
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
        $query = $this->acceptance_rate;

        if(Arr::exists($data,"name") && !is_null($data['name']))
        {
            $query = $query->where('name', 'LIKE', '%' . $data['name']. '%');
        }
        return $query->count('id');
    }

}

