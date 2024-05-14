<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product as Model;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = $this->getRecords();
        foreach ($rows as $data) {
            Model::updateOrCreate(
                [

                    'name' => $data['name'],
                    'description' => $data['description'],
                    'hero_image'  => $data['hero_image'],
                    'price'   => $data['price'],
                    'is_live' => $data['is_live'],
                ]
            );
        }
    }

    public function getRecords()
    {
        return [
            [
                "name" => 'Yingpei handbag',
                'description' => '',
                'hero_image'  => 'image',
                'price'   => 199.75,
                'is_live' => 1,
            ],
            [
                "name" => 'Senzee handbag',
                'description' => '',
                'hero_image'  => 'image',
                'price'   => 209.75,
                'is_live' => 1,
            ],
            [
                "name" => 'Guty handbag',
                'description' => '',
                'hero_image'  => 'image',
                'price'   => 109.75,
                'is_live' => 1,
            ],
            [
                "name" => 'Aldo handbag',
                'description' => '',
                'hero_image'  => 'image',
                'price'   => 45.75,
                'is_live' => 1,
            ],
            [
                "name" => 'Jimmy Choo handbag',
                'description' => '',
                'hero_image'  => 'image',
                'price'   => 145.75,
                'is_live' => 1,
            ],
            [
                "name" => 'Sennreve handbag',
                'description' => '',
                'hero_image'  => 'image',
                'price'   => 345.75,
                'is_live' => 1,
            ]
        ];
    }
}
