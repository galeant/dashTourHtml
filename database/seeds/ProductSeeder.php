<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
        	
			[
                'productCode' => 'Pigijo-1',
                'productName' => 'Labuan Bajo 4D3N',
                'productCategory' => 'tour',
                'productType' => 'open',
                'minPerson' => 2,
                'maxPerson' => 3,

                'meetingPointAddress' => 'address',
                'meetingPointLatitude' => 'latitude',
                'meetingPointLongitude' => 'longitude',
                'meetingPointNote' => 'notes',

                'termCondition' => 'term',

                'cancellationType' => '3',
                'minCancellationDay' => '2',
                'cancellationFee' => '50',
                'status' => 'active',
                'companyId' => 2
            ],[
                'productCode' => 'Pigijo-2',
                'productName' => 'Kepulauan Seribu 2D1N',
                'productCategory' => 'tour',
                'productType' => 'open',
                'minPerson' => 2,
                'maxPerson' => 3,

                'meetingPointAddress' => 'address',
                'meetingPointLatitude' => 'latitude',
                'meetingPointLongitude' => 'longitude',
                'meetingPointNote' => 'notes',

                'termCondition' => 'term',

                'cancellationType' => '3',
                'minCancellationDay' => '2',
                'cancellationFee' => '50',
                'status' => 'active',
                'companyId' => 1
            ]
        ]);
    }
}
