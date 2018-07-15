<?php

use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navbar')->insert([
                ['navbarId' => 1,'navbarName' => 'Overview'],
                ['navbarId' => 2,'navbarName' => 'Products'],
                ['navbarId' => 3,'navbarName' => 'Bookings'],
                ['navbarId' => 4,'navbarName' => 'Campaign'],
                ['navbarId' => 5,'navbarName' => 'Reports'],
                ['navbarId' => 6,'navbarName' => 'User']
            ]
        );
        DB::table('navbar_activity')->insert([
                ['navbarActivityId' => 1,'navbarActivityName' => 'Full Access', 'navbarId' => 1],
                ['navbarActivityId' => 2,'navbarActivityName' => 'Full Access', 'navbarId' => 2],
                ['navbarActivityId' => 3,'navbarActivityName' => 'View', 'navbarId' => 2],
                ['navbarActivityId' => 4,'navbarActivityName' => 'Update', 'navbarId' => 2],
                ['navbarActivityId' => 5,'navbarActivityName' => 'Add', 'navbarId' => 2],
                ['navbarActivityId' => 6,'navbarActivityName' => 'Full Access', 'navbarId' => 3],
                ['navbarActivityId' => 7,'navbarActivityName' => 'Full Access', 'navbarId' => 4],
                ['navbarActivityId' => 8,'navbarActivityName' => 'View', 'navbarId' => 4],
                ['navbarActivityId' => 9,'navbarActivityName' => 'Update', 'navbarId' => 4],
                ['navbarActivityId' => 10,'navbarActivityName' => 'Add' , 'navbarId' => 4],
                ['navbarActivityId' => 11,'navbarActivityName' => 'Full Access', 'navbarId' => 5],
                ['navbarActivityId' => 12,'navbarActivityName' => 'Full Access', 'navbarId' => 6],
                ['navbarActivityId' => 13,'navbarActivityName' => 'View', 'navbarId' => 6],
                ['navbarActivityId' => 14,'navbarActivityName' => 'Update', 'navbarId' => 6],
                ['navbarActivityId' => 15,'navbarActivityName' => 'Add', 'navbarId' => 6]
            ]
        );
    }
}
