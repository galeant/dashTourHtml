<?php

use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('price')->insert([
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 1,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 2,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 3,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 4,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 5,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 6,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 7,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 8,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 9,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
        	[
                'priceType' => 'Based of Person',
                'numberOfPerson' => 10,
                'priceIDR' => 1000000,
                'priceUSD' => 100,
                'productId' => 1
            ],
            [
                'priceType' => 'Fixed',
                'numberOfPerson' => 1,
                'priceIDR' => 5000000,
                'priceUSD' => 500,
                'productId' => 2,
            ]
        ]);
    }
}
