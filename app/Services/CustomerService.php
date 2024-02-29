<?php

namespace App\Services;

use App\Services\Interfaces\CustomerServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class CustomerService implements CustomerServiceInterface
{
    /**
     *  @param int $count
     *  @param bool $paginate
     *  @param array $relations
     * @return object
     */
    public function all()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get("https://mock.apidog.com/m1/451700-0-default/customers");

        return $response->json()['data'];
    }

    /**
     * @param array $attributes
     * @return object
     */
    public function create(array $attributes)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->post("https://mock.apidog.com/m1/451700-0-default/customers" , $attributes);

        return $response->json();
    }
    /**
     * @param int $model_id
     * @return object
     */
    public function find(int $model_id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get("https://mock.apidog.com/m1/451700-0-default/customers/".$model_id);

        return $response->json()['data'];
    }

    /**
     * @param Customer  $model
     * @param array $attributes
     * @return object
     */
    public function update($model, array $attributes)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->put("https://mock.apidog.com/m1/451700-0-default/customers/".$model['id'] , $attributes);

        return $response->json();
    }

    public function delete($model_id)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->delete("https://mock.apidog.com/m1/451700-0-default/customers/".$model_id);

        return $response->json();
    }
}
