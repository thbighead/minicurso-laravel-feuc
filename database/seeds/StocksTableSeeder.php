<?php

use Illuminate\Database\Seeder;
use App\Stock;
use App\Product;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Stock::class, 4)->create()->each(function (Stock $stock) {
            $limit = rand(10, 20);
            for($i = 0; $i < $limit; $i++)
                $stock->products()->save(factory(Product::class)->make());
        });
    }
}
