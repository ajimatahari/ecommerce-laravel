<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $light = new Product();
        $light->name = str_random(10);
        $light->description = str_random(20);
        $light->stock = 100;
        $light->price = 75;
        $light->discounted_price = null;
        $light->save();

        $dark = new Product();
        $dark->name = str_random(10);
        $dark->description = str_random(20);
        $dark->stock = 100;
        $dark->price = 75;
        $dark->discounted_price = null;
        $dark->save();

    }
}
