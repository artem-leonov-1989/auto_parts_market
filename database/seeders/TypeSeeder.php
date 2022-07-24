<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{

    protected array $types = [
        ['Cruse', 1],
        ['Aveo' , 1],
        ['Volt', 1],
        ['X6', 2],
        ['X7', 2],
        ['XC60', 3],
        ['XC90', 3]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->types as $type)
        {
            Type::create([
                'name' => $type[0],
                'brand_id' => $type[1]
            ]);
        }
    }
}
