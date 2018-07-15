<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 1,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Ani',
        //     'picPhoneNumber'  => '08111111111',
        //     'picEmailAddress' => 'ani@pigijo.com',
        //     'bookingStatus' =>'Payment Failed',
        //     'totalSellingPrice' => 1000000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-06-25 07:02:01',
        //     'updated_at' => '2018-06-25 07:02:01'
        // ]);
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 1,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Budi',
        //     'picPhoneNumber'  => '082222222222',
        //     'picEmailAddress' => 'budi@pigijo.com',
        //     'bookingStatus' =>'Awaiting Payment',
        //     'totalSellingPrice' => 4000000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-06-28 07:02:01',
        //     'updated_at' => '2018-06-28 07:02:01'
        // ]);
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 1,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Cindy',
        //     'picPhoneNumber'  => '083333333333',
        //     'picEmailAddress' => 'cindy@pigijo.com',
        //     'bookingStatus' =>'Successful',
        //     'totalSellingPrice' => 10000000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-06-25 07:02:01',
        //     'updated_at' => '2018-06-25 07:02:01'
        // ]);
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 2,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Deni',
        //     'picPhoneNumber'  => '084444444444',
        //     'picEmailAddress' => 'deni@pigijo.com',
        //     'bookingStatus' =>'Awaiting Payment',
        //     'totalSellingPrice' => 40000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-07-01 07:02:01',
        //     'updated_at' => '2018-07-01 07:02:01'
        // ]);
        
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 2,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Esti',
        //     'picPhoneNumber'  => '08555555555',
        //     'picEmailAddress' => 'esti@gmail.com',
        //     'bookingStatus' =>'Awaiting Payment',
        //     'totalSellingPrice' => 500000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-06-25 07:02:01',
        //     'updated_at' => '2018-06-25 07:02:01'
        // ]);
        
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 2,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Fandy',
        //     'picPhoneNumber'  => '0866666666',
        //     'picEmailAddress' => 'fandy@pigijo.com',
        //     'bookingStatus' =>'Cancelled',
        //     'totalSellingPrice' => 80000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-06-25 07:02:01',
        //     'updated_at' => '2018-06-25 07:02:01'
        // ]);
        
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 1,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Gigi',
        //     'picPhoneNumber'  => '08777777777',
        //     'picEmailAddress' => 'gigi@pigijo.com',
        //     'bookingStatus' =>'Awaiting Payment',
        //     'totalSellingPrice' => 100000000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-07-10 07:02:01',
        //     'updated_at' => '2018-07-10 07:02:01'
        // ]);
        
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 1,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Himm',
        //     'picPhoneNumber'  => '08888888888',
        //     'picEmailAddress' => 'himm@gmail.com',
        //     'bookingStatus' =>'Awaiting Payment',
        //     'totalSellingPrice' => 500000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-06-25 07:02:01',
        //     'updated_at' => '2018-06-25 07:02:01'
        // ]);
        
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 1,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Inez',
        //     'picPhoneNumber'  => '0899999999',
        //     'picEmailAddress' => 'inez@pigijo.com',
        //     'bookingStatus' =>'Awaiting Payment',
        //     'totalSellingPrice' => 40000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-06-25 07:02:01',
        //     'updated_at' => '2018-06-25 07:02:01'
        // ]);
        
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 2,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Jendra',
        //     'picPhoneNumber'  => '081010101010',
        //     'picEmailAddress' => 'jendra@gmail.com',
        //     'bookingStatus' =>'Payment Failed',
        //     'totalSellingPrice' => 500000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-07-25 07:02:01',
        //     'updated_at' => '2018-07-25 07:02:01'
        // ]);
        
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 2,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Kakak',
        //     'picPhoneNumber'  => '08110000000',
        //     'picEmailAddress' => 'kakak@pigijo.com',
        //     'bookingStatus' =>'Cancelled',
        //     'totalSellingPrice' => 100000000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-06-25 07:02:01',
        //     'updated_at' => '2018-06-25 07:02:01'
        // ]);
        
        // DB::table('booking_transaction')->insert([
        //     'memberId'  => 2,
        //     'itineraryId'  => 5,
        //     'picName'  => 'Lala',
        //     'picPhoneNumber'  => '08120000000',
        //     'picEmailAddress' => 'lala@pigijo.com',
        //     'bookingStatus' =>'Awaiting Payment',
        //     'totalSellingPrice' => 100000000,
        //     'paid_at'   => '2018-02-02',
        //     'created_at' => '2018-07-25 07:02:01',
        //     'updated_at' => '2018-07-25 07:02:01'
        // ]);
        
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 1,
        //     'sellingPrice'  => 1000000,
        //     'netPrice'  => 930000,
        //     'commission'  => 70000
        // ]);
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 2,
        //     'sellingPrice'  => 4000000,
        //     'netPrice'  => 3720000,
        //     'commission'  => 280000
        // ]);
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 3,
        //     'sellingPrice'  => 10000000,
        //     'netPrice'  => 9300000,
        //     'commission'  => 700000
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 4,
        //     'sellingPrice'  => 40000,
        //     'netPrice'  => 37200,
        //     'commission'  => 2800
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 5,
        //     'sellingPrice'  => 500000,
        //     'netPrice'  => 465000,
        //     'commission'  => 35000
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 6,
        //     'sellingPrice'  => 80000,
        //     'netPrice'  => 74400,
        //     'commission'  => 5600
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 7,
        //     'sellingPrice'  => 100000000,
        //     'netPrice'  => 93000000,
        //     'commission'  => 7000000
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 8,
        //     'sellingPrice'  => 500000,
        //     'netPrice'  => 465000,
        //     'commission'  => 35000
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 9,
        //     'sellingPrice'  => 40000,
        //     'netPrice'  => 37200,
        //     'commission'  => 2800
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 10,
        //     'sellingPrice'  => 500000,
        //     'netPrice'  => 465000,
        //     'commission'  => 35000
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 11,
        //     'sellingPrice'  => 100000000,
        //     'netPrice'  => 93000000,
        //     'commission'  => 7000000
        // ]);
        
        // DB::table('bookings')->insert([
        //     'bookingTransactionId'  => 12,
        //     'sellingPrice'  => 100000000,
        //     'netPrice'  => 93000000,
        //     'commission'  => 7000000
        // ]);

        
        // DB::table('book_products')->insert([
        //     'bookingId'  => 1,
        //     'bookingNumber' => '10125060001',
        //     'productId' => 1,
        //     'scheduleId' => 1,
        //     'productCode'  => 'Pigijo-1',
        //     'productName'  => 'Labuan Bajo 4D3N',
        //     'termCondition'  => 'hahahahaha',
        //     'additionalInfo' => 'Semoga Beruntung',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 30,
        //     'cancellationFee'   => 40,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 60%',
        //     'numberOfPerson'  => 5,
        //     'pricePerPerson'    => 200000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-13',
        //     'startHours' => '06:00:00',
        //     'endHours' => '22:00:00',
        //     'companyId' =>   1
        // ]);

        // DB::table('book_products')->insert([
        //     'bookingId'  => 2,
        //     'bookingNumber' => '10125060002',
        //     'productId' => 1,
        //     'scheduleId' => 1,
        //     'productCode'  => 'Pigijo-1',
        //     'productName'  => 'Labuan Bajo 4D3N',
        //     'termCondition'  => 'hahahahaha',
        //     'additionalInfo' => 'Semoga Beruntung',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 30,
        //     'cancellationFee'   => 40,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 60%',
        //     'numberOfPerson'  => 10,
        //     'pricePerPerson'    => 400000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-13',
        //     'startHours' => '06:00:00',
        //     'endHours' => '22:00:00',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 3,
        //     'bookingNumber' => '10125060003',
        //     'productId' => 1,
        //     'scheduleId' => 1,
        //     'productCode'  => 'Pigijo-1',
        //     'productName'  => 'Labuan Bajo 4D3N',
        //     'termCondition'  => 'hahahahaha',
        //     'additionalInfo' => 'Semoga Beruntung',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 30,
        //     'cancellationFee'   => 40,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 60%',
        //     'numberOfPerson'  => 8,
        //     'pricePerPerson'    => 1250000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-13',
        //     'startHours' => '06:00:00',
        //     'endHours' => '22:00:00',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 4,
        //     'bookingNumber' => '10125060004',
        //     'productId' => 1,
        //     'scheduleId' => 1,
        //     'productCode'  => 'Pigijo-1',
        //     'productName'  => 'Labuan Bajo 4D3N',
        //     'termCondition'  => 'hahahahaha',
        //     'additionalInfo' => 'Semoga Beruntung',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 30,
        //     'cancellationFee'   => 40,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 60%',
        //     'numberOfPerson'  => 2,
        //     'pricePerPerson'    => 20000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-13',
        //     'startHours' => '06:00:00',
        //     'endHours' => '22:00:00',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 5,
        //     'bookingNumber' => '10125060005',
        //     'productId' => 1,
        //     'scheduleId' => 1,
        //     'productCode'  => 'Pigijo-1',
        //     'productName'  => 'Labuan Bajo 4D3N',
        //     'termCondition'  => 'hahahahaha',
        //     'additionalInfo' => 'Semoga Beruntung',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 30,
        //     'cancellationFee'   => 40,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 60%',
        //     'numberOfPerson'  => 5,
        //     'pricePerPerson'    => 100000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-13',
        //     'startHours' => '06:00:00',
        //     'endHours' => '22:00:00',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 6,
        //     'bookingNumber' => '10125060006',
        //     'productId' => 1,
        //     'scheduleId' => 1,
        //     'productCode'  => 'Pigijo-1',
        //     'productName'  => 'Labuan Bajo 4D3N',
        //     'termCondition'  => 'hahahahaha',
        //     'additionalInfo' => 'Semoga Beruntung',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 30,
        //     'cancellationFee'   => 40,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 60%',
        //     'numberOfPerson'  => 8,
        //     'pricePerPerson'    => 10000,  
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-13',
        //     'startHours' => '06:00:00',
        //     'endHours' => '22:00:00',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 7,
        //     'bookingNumber' => '10125060007',
        //     'productId' => 2,
        //     'scheduleId' => 2,
        //     'productCode'  => 'Pigijo-2',
        //     'productName'  => 'Raja Ampat 2D1N',
        //     'termCondition'  => 'Apa aja dah',
        //     'additionalInfo' => 'Semoga dapet jodoh disana yaaa',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 100,
        //     'cancellationFee'   => 20,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 80%',
        //     'numberOfPerson'  => 40,
        //     'pricePerPerson'    => 2500000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-15',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 8,
        //     'bookingNumber' => '10125060008',
        //     'productId' => 2,
        //     'scheduleId' => 2,
        //     'productCode'  => 'Pigijo-2',
        //     'productName'  => 'Raja Ampat 2D1N',
        //     'termCondition'  => 'Apa aja dah',
        //     'additionalInfo' => 'Semoga dapet jodoh disana yaaa',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 100,
        //     'cancellationFee'   => 20,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 80%',
        //     'numberOfPerson'  => 1,
        //     'pricePerPerson'    => 500000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-15',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 9,
        //     'bookingNumber' => '10125060009',
        //     'productId' => 2,
        //     'scheduleId' => 2,
        //     'productCode'  => 'Pigijo-2',
        //     'productName'  => 'Raja Ampat 2D1N',
        //     'termCondition'  => 'Apa aja dah',
        //     'additionalInfo' => 'Semoga dapet jodoh disana yaaa',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 100,
        //     'cancellationFee'   => 20,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 80%',
        //     'numberOfPerson'  => 1,
        //     'pricePerPerson'    => 40000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-15',
        //     'companyId' =>   1
        // ]);

        // DB::table('book_products')->insert([
        //     'bookingId'  => 10,
        //     'bookingNumber' => '10125060010',
        //     'productId' => 2,
        //     'scheduleId' => 2,
        //     'productCode'  => 'Pigijo-2',
        //     'productName'  => 'Raja Ampat 2D1N',
        //     'termCondition'  => 'Apa aja dah',
        //     'additionalInfo' => 'Semoga dapet jodoh disana yaaa',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 100,
        //     'cancellationFee'   => 20,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 80%',
        //     'numberOfPerson'  => 2,
        //     'pricePerPerson'    => 250000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-15',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 11,
        //     'bookingNumber' => '10125060011',
        //     'productId' => 2,
        //     'scheduleId' => 2,
        //     'productCode'  => 'Pigijo-2',
        //     'productName'  => 'Raja Ampat 2D1N',
        //     'termCondition'  => 'Apa aja dah',
        //     'additionalInfo' => 'Semoga dapet jodoh disana yaaa',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 100,
        //     'cancellationFee'   => 20,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 80%',
        //     'numberOfPerson'  => 2,
        //     'pricePerPerson'    => 50000000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-15',
        //     'companyId' =>   1
        // ]);
        // DB::table('book_products')->insert([
        //     'bookingId'  => 12,
        //     'bookingNumber' => '10125060012',
        //     'productId' => 2,
        //     'scheduleId' => 2,
        //     'productCode'  => 'Pigijo-2',
        //     'productName'  => 'Raja Ampat 2D1N',
        //     'termCondition'  => 'Apa aja dah',
        //     'additionalInfo' => 'Semoga dapet jodoh disana yaaa',
        //     'cancellationType' =>'Awaiting Payment',
        //     'minCancellationDay' => 100,
        //     'cancellationFee'   => 20,
        //     'cancellationDetails' => 'Uang dikembalikan hanya 80%',
        //     'numberOfPerson'  => 5,
        //     'pricePerPerson'    => 20000000,
        //     'startDate' => '2018-06-13',
        //     'endDate' => '2018-06-15',
        //     'companyId' =>   1
        // ]);
    }
}
