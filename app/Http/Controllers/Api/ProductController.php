<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use  App\Models\Product;

class ProductController extends Controller
{
    /**
     * Products

     * The purpose of this endpoint is to get full Product list

     * If everything is okay, you'll get a 201: request was fulfilled and this resulted in a new resource being created.
     *
     * Otherwise, the request will fail with a 400 error, and a response listing the failed services.
     *
     * @response {
     *  {
     * "id": 123,
     * "name": "XX handbag",
     * "description": "",
     * "hero_image": "image",
     * "price": "199.750",
     * "is_live": 1,
     * "created_at": "2024-05-12T14:13:17.000000Z",
     * "updated_at": "2024-05-12T14:13:17.000000Z"
     * },
     * {
     * "id": 124,
     * "name": "BD handbag",
     * "description": "",
     * "hero_image": "image",
     * "price": "299.750",
     * "is_live": 1,
     * "created_at": "2024-05-12T14:13:17.000000Z",
     * "updated_at": "2024-05-12T14:13:17.000000Z"
     * }
     * }
     * @group Products
     * @authenticated
     */
    public function index()
    {
        try {

            $products = Product::all();

            return response()->json(['data' => $products], 201);

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }

    /**
     * Product

     * The purpose of this is to get a single Product
     *
     * If everything is okay, you'll get a 201: request was fulfilled and this resulted in a new resource being created.
     *
     * @response {
     * "id": 123,
     * "name": "XX handbag",
     * "description": "",
     * "hero_image": "image",
     * "price": "199.750",
     * "is_live": 1,
     * "created_at": "2024-05-12T14:13:17.000000Z",
     * "updated_at": "2024-05-12T14:13:17.000000Z"
     * }
     * @group Products
     * @authenticated
     */
    public function show(Product $product)
    {
        try {

            return response()->json(['data' => $product], 201);

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}
