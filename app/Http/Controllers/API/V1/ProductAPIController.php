<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Repositories\ProductRepository;

/**
 * @OA\Info(
 *     title="Product API",
 *     description="API documentation for products",
 *     version="1.0.0"
 * )
 *
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     required={"id", "name", "description", "price", "quantity", "created_at", "updated_at"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Product Name"),
 *     @OA\Property(property="description", type="string", example="Product description."),
 *     @OA\Property(property="price", type="number", format="float", example=19.99),
 *     @OA\Property(property="quantity", type="integer", example=100),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-12-10T02:14:56"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-12-10T02:14:56")
 * )
 *
 * @OA\Schema(
 *     schema="Pagination",
 *     type="object",
 *     @OA\Property(property="current_page", type="integer", example=1),
 *     @OA\Property(property="last_page", type="integer", example=5),
 *     @OA\Property(property="per_page", type="integer", example=10),
 *     @OA\Property(property="total", type="integer", example=50)
 * )
 */
class ProductAPIController extends Controller
{
    public function __construct(
        // Constructor Property Promotion (inject class dependencies)
        private ProductRepository $productRepositoryInstance
    ) {}



    /**
     * @OA\Get(
     *     path="/api/v1/products",
     *     summary="Get all products",
     *     description="Retrieve a list of products with pagination.",
     *     operationId="getAllProducts",
     *     tags={"Products"},
     *     @OA\Response(
     *         response=200,
     *         description="A list of products",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(ref="#/components/schemas/Product")
     *             ),
     *             @OA\Property(property="meta", ref="#/components/schemas/Pagination")
     *         )
     *     )
     * )
     */
    public function index(): ProductCollection {
        // return new ProductCollection($this->productRepositoryInstance->all()); // Without Pagination
        return new ProductCollection($this->productRepositoryInstance->allPaginated(10)); // With Pagination
    }
}
