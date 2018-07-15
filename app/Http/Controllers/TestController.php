<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\Company;
use App\Schedule;
use App\Product;
use App\Price;
use App\Includes;
use App\Excludes;
use App\ImageDestination;
use App\ImageActivity;
use App\ImageAccommodation;
use App\ImageOther;
use App\Videos;
use App\ProductDestination;
use App\ProductActivity;
use App\Itinerary;
use App\Mail\WelcomeMail;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Hash;
use DB;

class TestController extends Controller
{
    public function tester(){
        $request = [
            'member' => [
                'fullName' => 'test',
                'emailAddress' => 'test',
                'phone' => 'test'
            ],
            'bookings' => [
                'TransactionNumber ' => 'test',
                'contactPersonName ' => 'test',
                'contactPersonPhone ' => 'test',
                'contactPersonEmail ' => 'test',
                // perlu untuk di kirim ke payment gateway
                'totalPrice ' => 'test',
                'totalPayment ' => 'test',
                // ini ga tau apa bisa dapet dari payment gateway, apa bisa apa engga
                'paymentUniqueCode ' => 'test',
                // ini masih kurang jelas, di depan di munculin apa engga
                'discount ' => 'test',
                'discountPercentage ' => 'test',
                // // dari payment method, kemungkinana dari sisi back
                // 'bookingStatus ' => bookingStatus,
                // ini dari depan kayanya
                'paymentMethod ' => 'test',
                // // dari back
                // 'memberId ' => memberId,
                // 'paid_at ' => paid_at,
                'products' => [
                    'tour' => array(
                        [
                            'bookingTourNumber' => 'test',
                            'productCode' => 'test',
                            // /* 
                            //     INI BISA DI ILANGIN, DENGAN QUERY ULANG
                            // */
                            // 'productName' => bookingTourNumber,
                            // 'termCondition' => bookingTourNumber,
                            // 'cancellationType' => bookingTourNumber,
                            // 'minCancellationDay ' => bookingTourNumber,
                            // 'cancellationFee' => bookingTourNumber,
                            // 'cancellationDetails' => bookingTourNumber,
                            // INI DARI B2C
                            'numberOfPerson' => 'test',
                            'pricePerPerson' => 'test',
                            'sellingPrice' => 'test',
                            // // INI HITUNGAN DI BACK END
                            // 'commission' => bookingTourNumber,
                            // 'netPrice' => bookingTourNumber,
        
                            // INI dari b2c, tapi cuma tanggal doang yang di munculinnya
                            'startDate' => 'test',
                            'endDate' => 'test',
                            'startHours' => 'test',
                            'endHours' => 'test',
                            // // INFO RELASI SCHEDULE UNTUK PENGURANGAN INVENTORI
                            // 'scheduleId' => bookingTourNumber,
                            // // INFO RELASI PRODUCT YANG DI BOOKING KE COMPANY
                            // 'companyId' => bookingTourNumber
                            // // INFO RELASI KE TRANSACTION
                            // 'transactionId' => bookingTourNumber
                        ],
                        [
                            'bookingTourNumber' => 'test',
                            'productCode' => 'test',
                            'productName' => 'test',
                            'termCondition' => 'test',
                            'cancellationType' => 'test',
                            'minCancellationDay ' => 'test',
                            'cancellationFee' => 'test',
                            'cancellationDetails' => 'test',
                            'numberOfPerson' => 'test',
                            'pricePerPerson' => 'test',
                            'sellingPrice' => 'test',
                            'commission' => 'test',
                            'netPrice' => 'test',
                            'startDate' => 'test',
                            'endDate' => 'test',
                            'startHours' => 'test',
                            'endHours' => 'test',
                            'scheduleId' => 'test',
                            'companyId' => 'test',
                        ]
                    ),
                    'hotel' => array(
                        [
                            'bookingHotelId' => 'test',
                            'bookingHotelNumber' => 'test',
                            'transactionId' => 'test'
                        ],
                        [
                            'bookingHotelId' => 'test',
                            'bookingHotelNumber' => 'test',
                            'transactionId' => 'test'
                        ]
                    ),
                    'car_rent' => array(
                        [
                            'bookingCarRentId' => 'test',
                            'bookingCarRentNumber' => 'test',
                            'transactionId' => 'test'
                        ],
                        [
                            'bookingCarRentId' => 'test',
                            'bookingCarRentNumber' => 'test',
                            'transactionId' => 'test'
                        ]
                    ),
                    'transport' => array(
                        [
                            'bookingTransportId' => 'test',
                            'bookingTransportNumber' => 'test',
                            'transactionId' => 'test'
                        ],
                        [
                            'bookingTransportId' => 'test',
                            'bookingTransportNumber' => 'test',
                            'transactionId' => 'test'
                        ],
                    ),
                    'activity' => array(
                        [
                            'bookingActivityId' => 'test',
                            'bookingActivityNumber' => 'test',
                            'activityCode' => 'test',
                            // 'activityName' => bookingTourNumber,
                            // 'termCondition' => bookingTourNumber,
                            // 'numberOfPerson' => bookingTourNumber,
                            'startDate' => 'test',
                            'endDate' => 'test',
                            'startHours' => 'test',
                            'endHours' => 'test',
                            // 'transactionId' => bookingTourNumber
                        ],
                        [
                            'bookingActivityId' => 'test',
                            'bookingActivityNumber' => 'test',
                            'activityCode' => 'test',
                            'activityName' => 'test',
                            'termCondition' => 'test',
                            'numberOfPerson' => 'test',
                            'startDate' => 'test',
                            'endDate' => 'test',
                            'startHours' => 'test',
                            'endHours' => 'test',
                            'transactionId' => 'test'
                        ]
                    )
                ]
            ]
        ];
        return response()->json($request,200);
    }
    public function draf(){

        $data = User::with([
            'company',
            'company.products',
            'company.province',
            'company.city',
            'company.products.prices',
            'company.products.image_destination',
            'company.products.image_activity',
            'company.products.image_accommodation',
            'company.products.image_other',
            'company.products.videos',
            'company.products.itineraries',
            'company.products.schedules',
            'company.products.destinations',
            'company.products.activities',
            'company.products.includes',
            'company.products.excludes'
        ])
        ->where('userId',6)
        ->first();
        // $data = User::with('company')->where('userId',session()->get('verif')->userId)->first();
        $province = DB::table('provinces')->get();
        return view('register.test1',['data'=>$data,'provinces'=> $province]);
    }
}
