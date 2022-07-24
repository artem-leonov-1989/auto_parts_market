<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{

    protected array $brands = [
        'Chevrolet',
        'BMW',
        'Volvo'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->brands as $brand) {
            Brand::create([
                'name' => $brand
            ]);
        }
    }
}
