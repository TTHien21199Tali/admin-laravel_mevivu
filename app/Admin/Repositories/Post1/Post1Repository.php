<?php

namespace App\Admin\Repositories\Post1;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Post1\Post1RepositoryInterface;
use App\Models\Post1;

class Post1Repository extends EloquentRepository implements Post1RepositoryInterface
{

    public function getModel()
    {
        return Post1::class;
    }

    public function updateMultipleBy(array $filter = [], array $data)
    {

        $this->instance = $this->model;

        $this->applyFilters($filter);

        $this->instance = $this->instance->update($data);
        return $this->instance;
    }

}
