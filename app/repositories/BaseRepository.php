<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * @var Model
     */
    protected Model $_model;

    /**
     * @param Model $model
     */
    function __construct(Model $model)
    {
        $this->_model = $model;
    }

    /**
     * @param int $id
     */
    function deleteById(int $id)
    {
        $this->_model->where('id', $id)->delete();
    }

    /**
     * @param array $data
     * @return Model
     */
    function create(array $data) : Model
    {
        return $this->_model->create($data);
    }
}