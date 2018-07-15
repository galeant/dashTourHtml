<?php

use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule')->insert([
        	[
                // 'startDate' => '2018-05-01',
                // 'endDate' => '2018-05-01',
                // 'startHours' => '09:00:00',
                // 'endHours' => '09:00:00',
                'maximumBooking' => 25,
                'maximumGroup' => 5,
                'productId' => 1
            ],
        	[
                // 'startDate' => '2018-05-01',
                // 'endDate' => '2018-05-01',
                // 'startHours' => '09:00:00',
                // 'endHours' => '09:00:00',
                'maximumBooking' => 25,
                'maximumGroup' => 5,
                'productId' => 1
            ],
        	[
                // 'startDate' => '2018-05-01',
                // 'endDate' => '2018-05-01',
                // 'startHours' => '09:00:00',
                // 'endHours' => '09:00:00',
                'maximumBooking' => 25,
                'maximumGroup' => 5,
                'productId' => 2
            ],
        	[
                // 'startDate' => '2018-05-01',
                // 'endDate' => '2018-05-01',
                // 'startHours' => '09:00:00',
                // 'endHours' => '09:00:00',
                'maximumBooking' => 25,
                'maximumGroup' => 5,
                'productId' => 2
            ]
        ]);
    }
}
