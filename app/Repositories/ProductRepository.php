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

    public function allPaginated(int $perPage) {
        return $this->productModel->paginate($perPage);
    }

    public function getByID(int $id) {
        return $this->productModel->findOrFail($id);
    }

    public function create(array $data) {
        return $this->productModel->create($data);
    }

    public function update(int $id, array $data) {
        $item = $this->productModel->findOrFail($id);
        return $item->update($data);
    }

    public function delete(int $id) {
        $item = $this->productModel->findOrFail($id);
        return $item->delete();
    }

}
