<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class ProductRepository implements ProductRepositoryInterface {
    public function __construct(
        // Constructor Property Promotion
        private Product $productModel
    ) {}



    public function all(): EloquentCollection {
        return $this->productModel->all();
    }

}
