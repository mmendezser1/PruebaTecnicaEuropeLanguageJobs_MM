<?php

namespace Database\Seeders;

use App\Models\Dog;
use Illuminate\Database\Seeder;

class DogInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id, image, name, age_months, race, size, hair_color, hair_style, created_at, updated_at
        Dog::factory()->create([
            [
                'image' => 'dog1_husky.jpg',
                'name' => 'Pepe',
                'age_months' => '36',
                'race' => 'Husky',
                'size' => 'Big',
                'hair_color' => 'White & Black',
                'hair_style' => 'Short straight',
            ],
            [
                'image' => 'dog2_golden.jpg',
                'name' => 'Manolo',
                'age_months' => '42',
                'race' => 'Golden retriever',
                'size' => 'Big',
                'hair_color' => 'Brown',
                'hair_style' => 'Long straight',
            ], [
                'image' => 'dog3_schnauzer.jpg',
                'name' => 'Juan',
                'age_months' => '12',
                'race' => 'Schnauzer',
                'size' => 'Small',
                'hair_color' => 'Black',
                'hair_style' => 'Long straight',
            ],
        ]);

    }
}
