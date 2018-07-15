<?php

use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destination')->insert([
            [
                'destination' => 'Toba Lake', 
                'city' => 1217,
                'province' => 12,
                'latitude'    => '2.6114159',
                'longitude'=> '98.555761',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>4
            ],
            [
                'destination' => 'Tanjung Kelayang Beach', 
                'city' => 1902,
                'province' => 19,
                'latitude'    => '-2.5596088',
                'longitude'=> '107.6694007',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>3
            ],
            [
                'destination' => 'Tanjung Lesung Beach', 
                'city' => 3601,
                'province' => 36,
                'latitude'    => '-6.47902',
                'longitude'=> '105.6547995',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>3
            ],
            [
                'destination' => 'Kepulauan Seribu Regency', 
                'city' => 3101,
                'province' => 31,
                'latitude'    => '-5.6106064',
                'longitude'=> '106.0564722',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>5
            ],
            [
                'destination' => 'Borobudur Temple', 
                'city' => 3308,
                'province' => 33,
                'latitude'    => '-7.6078685',
                'longitude'=> '110.2015626',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>6
            ],
            [
                'destination' => 'Bromo Tengger Semeru National Park', 
                'city' => 3507,
                'province' => 35,
                'latitude'    => '-8.0226587',
                'longitude'=> '112.9529144',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>7
            ],
            [
                'destination' => 'Mandalika', 
                'city' => 5271,
                'province' => 52,
                'latitude'    => '-8.5994942',
                'longitude'=> '116.1462452',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>3
            ],
            [
                'destination' => 'Labuan Bajo', 
                'city' => 5315,
                'province' => 53,
                'latitude'    => '-8.4511174',
                'longitude'=> '119.8306782',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>3
            ],
            [
                'destination' => 'Morotai Island Regency', 
                'city' => 8207,
                'province' => 82,
                'latitude'    => '2.3044517',
                'longitude'=> '128.1293207',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>5
            ],
            [
                'destination' => 'Wakatobi National Park', 
                'city' => 7407,
                'province' => 74,
                'latitude'    => '-5.6010386',
                'longitude'=> '123.8537357',
                'placeScheduleType' => 'yes',
                'placeTypeId'=>7
            ]
        ]);
    }
}
