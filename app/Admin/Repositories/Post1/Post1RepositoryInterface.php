<?php

namespace App\Admin\Repositories\Post1;
use App\Admin\Repositories\EloquentRepositoryInterface;
use App\Models\Post1;

interface Post1RepositoryInterface extends EloquentRepositoryInterface
{
    public function updateMultipleBy(array $filter = [], array $data);
}