<?php

namespace Tests\Http\Controllers\Api;

use App\Http\Controllers\Api\ProductController;
use App\Models\User;
use App\Models\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public  $user;

    public function setUp():void
    {
        parent::setUp();

        Artisan::call('migrate:refresh');

        $this->user = User::factory()->create();

        Product::factory()->create(
            [
                "name" => 'test  handbag one',
                'description' => 'ddd',
                'hero_image'  => 'image',
                'price'   => 199.75,
                'is_live' => 1,
            ]
        );

        Product::factory()->create(
            [
                "name" => 'test  handbag two',
                'description' => 'dddd',
                'hero_image'  => 'image',
                'price'   => 299.75,
                'is_live' => 1,
            ]
        );
    }

    public function test_authenticated_user_can_view_Product_list()
    {
        $this->actingAs($this->user, 'sanctum');

        $this->json('GET', 'api/products', ['Accept' => 'application/json'])
             ->assertStatus(201)
             ->assertJson([
                "data" => [
                    [
                        "description"=>"ddd",
                        "hero_image"=> "image",
                        "id"=>1,
                        "is_live"=>1,
                        "name"=> "test  handbag one",
                        "price"=> "199.750",
                        "updated_at"=> true,
                        "created_at" => true
                    ],
                    [
                        "name" => "test  handbag two",
                        "description" => "dddd",
                        "hero_image"  => "image",
                        "id"=>2,
                        "price"   => "299.750",
                        "is_live" => 1,
                        "created_at" => true,
                        "updated_at" => true
                    ]
                ]
            ]);
    }

    public function test_product_list_returns_correct_response_structure()
    {
        $this->actingAs($this->user, 'sanctum');

        $this->json('GET', 'api/products', ['Accept' => 'application/json'])
             ->assertJsonStructure([
                'data' => [["created_at","description","hero_image","is_live","name","price","updated_at"]],
            ]);
    }

    public function test_unauthenticated_user_cannot_viewed_products_list()
    {
        $this->json('GET', 'api/products', ['Accept' => 'application/json'])
             ->assertStatus(401);
    }
}
