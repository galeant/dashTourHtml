<?php

use Illuminate\Database\Seeder;

class PlaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place_type')->insert([
                ['placeTypeNameEN' => 'Mountain','placeTypeNameID' => 'Gunung'],
                ['placeTypeNameEN' => 'Crater','placeTypeNameID' => 'Kawah'],
                ['placeTypeNameEN' => 'Beach','placeTypeNameID' => 'Pantai'],
                ['placeTypeNameEN' => 'Lake','placeTypeNameID' => 'Danau'],
                ['placeTypeNameEN' => 'Island','placeTypeNameID' => 'Pulau'],
                ['placeTypeNameEN' => 'Temple','placeTypeNameID' => 'Candi'],
                ['placeTypeNameEN' => 'Park','placeTypeNameID' => 'Taman'],
            ]
        );
    }
}
