<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsModel;

class CelularesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductsModel::create([
            'name' => 'Iphone 15 Pro',
            'price' => 4950,
            'description' => 'Celular Apple',
        ]);

        ProductsModel::create([
            'name' => 'Samsung Galaxy Note A6',
            'price' => 2600,
            'description' => 'Celular da Samsung',
        ]);

        ProductsModel::create([
            'name' => 'XAOMMI Next',
            'price' => 3299,
            'description' => 'Celular xaomi',
        ]);
    }
}
