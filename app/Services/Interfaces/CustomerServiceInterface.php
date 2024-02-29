<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CustomerServiceInterface
{
    /**
     * @param int $count
     * @param bool $paginate
     * * @param array $relations
     * @return object
     */
    public function all();

    /**
     * @param int $model_id
     * @return object
     */
    public function find(int $model_id);

    /**
     * @param array $attributes
     * @return object
     */
    public function create(array $attributes);

    /**
     * @param Product  $model
     * @param array $attributes
     * @return object
     */
    public function update($model, array $attribute);

    /**
     * @param int $model_id
     * @return int
     */
    public function delete($mode_id);
}
