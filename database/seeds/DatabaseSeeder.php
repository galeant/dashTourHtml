<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // AREAL
        $this->call(Laravolt\Indonesia\Seeds\ProvincesSeeder::class);
        $this->call(Laravolt\Indonesia\Seeds\CitiesSeeder::class);
        $this->call(Laravolt\Indonesia\Seeds\DistrictsSeeder::class);
        $this->call(Laravolt\Indonesia\Seeds\VillagesSeeder::class);
        // NAVBAR
        $this->call(NavbarSeeder::class);
        //SUPER ADMIN
        $this->call(LanguageSeeder::class);  
        $this->call(PlaceTypeSeeder::class);  
        $this->call(TipsQuestionSeeder::class);  
        // ADMIN
        $this->call(AdminSeeder::class);
        // COMPANY
        $this->call(CompanySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(ItinerarySeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(ProductActivitySeeder::class);
        $this->call(ProductDestinationSeeder::class);
        $this->call(FileSeeder::class);
        // MEMBER
        $this->call(MemberSeeder::class);        
        $this->call(ReportSeeder::class);    
    }
}
