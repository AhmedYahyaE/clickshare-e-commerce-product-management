<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Repositories\ProductRepository;


class ProductAPIController extends Controller
{
    public function __construct(
        // Constructor Property Promotion (inject class dependencies)
        private ProductRepository $productRepositoryInstance
    ) {}



    public function index() {
        return new ProductCollection($this->productRepositoryInstance->all());
    }

}
