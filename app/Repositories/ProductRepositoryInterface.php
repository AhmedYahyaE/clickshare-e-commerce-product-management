<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

interface ProductRepositoryInterface {
    public function all(): EloquentCollection;
}
