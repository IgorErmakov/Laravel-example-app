<?php
namespace App\Repositories;

use App\Models\Todo;

use Illuminate\Database\Eloquent\Collection;

class TodoRepository extends BaseRepository
{
    function __construct(Todo $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    function getLatest() : Collection
    {
        return $this->_model::class::limit(100)->latest()->get();
    }
}