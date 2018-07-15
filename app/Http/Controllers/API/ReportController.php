<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function salesreport() {
        $salesreport = DB::table('booking_transaction')
            ->join('bookings','bookings.bookingTransactionId', 'booking_transaction.bookingTransactionId')
            ->join('book_products', 'bookings.bookingId', 'book_products.bookingId')
            ->join('product', 'product.productId', 'book_products.productId')
            ->join('member', 'member.memberId', 'booking_transaction.memberId')
            ->where('book_products.companyId', 1) //from auth
            ->where('booking_transaction.created_at', '>=', Carbon::now()->startOfMonth()->toDateString())
            ->where('booking_transaction.created_at', '<=', Carbon::now()->endOfMonth()->toDateString())
            ->select('booking_transaction.created_at as transactionDate',
                'bookings.bookingId as bookingID',
                'bookings.bookingTransactionId as transactionBookingID',
                'book_products.productId as productID',
                'book_products.productCode as productCode',
                'product.productCategory as productCategory',
                'product.productType as productType',
                'product.productName as productName',
                'product.startSellingDate as startCommencingDateTime',
                'product.endSellingDate as endCommencingDateTime',
                DB::raw("CONCAT('Rp. ', book_products.pricePerPerson) AS pricePerPerson"),
                'book_products.numberOfPerson as totalPerson',
                DB::raw("CONCAT('Rp. ', bookings.sellingPrice) AS sellingPrice"),
                DB::raw("CONCAT('Rp. ', bookings.commission) AS commission"),
                DB::raw("CONCAT('Rp. ', bookings.netPrice) AS netPrice"),
                'booking_transaction.picName as PIC_Name',
                'booking_transaction.picPhoneNumber as PIC_PhoneNumber',
                'booking_transaction.picEmailAddress as PIC_emailAddress',
                'member.fullName as bookedBy_name',
                'member.emailAddress as bookedBy_emailAddress',
                'booking_transaction.updated_at as updatedAt',
                'booking_transaction.bookingStatus as bookingStatus'
                )
            ->get();
        $data['data'] = $salesreport;
        return $data;
    }

    public function filtersalesreport(Request $request) {
        $datafilter = $request->all();
        $filter_type = $datafilter['filter_type'];
        $from_date = date("Y-m-d", strtotime($datafilter['from_date']));
        $until_date = date("Y-m-d", strtotime($datafilter['until_date']));
        $salesreport = DB::table('booking_transaction')
            ->join('bookings','bookings.bookingTransactionId', 'booking_transaction.bookingTransactionId')
            ->join('book_products', 'bookings.bookingId', 'book_products.bookingId')
            ->join('product', 'product.productId', 'book_products.productId')
            ->join('member', 'member.memberId', 'booking_transaction.memberId')
            ->where('book_products.companyId', 1) //from auth
            ->where('booking_transaction.created_at', '>=', $from_date)
            ->where('booking_transaction.created_at', '<=', $until_date)
            ->where('booking_transaction.bookingStatus', 'like', '%'.$filter_type.'%')
            ->select('booking_transaction.created_at as transactionDate',
                'bookings.bookingId as bookingID',
                'bookings.bookingTransactionId as transactionBookingID',
                'book_products.productId as productID',
                'book_products.productCode as productCode',
                'product.productCategory as productCategory',
                'product.productType as productType',
                'product.productName as productName',
                'product.startSellingDate as startCommencingDateTime',
                'product.endSellingDate as endCommencingDateTime',
                DB::raw("CONCAT('Rp. ', book_products.pricePerPerson) AS pricePerPerson"),
                'book_products.numberOfPerson as totalPerson',
                DB::raw("CONCAT('Rp. ', bookings.sellingPrice) AS sellingPrice"),
                DB::raw("CONCAT('Rp. ', bookings.commission) AS commission"),
                DB::raw("CONCAT('Rp. ', bookings.netPrice) AS netPrice"),
                'booking_transaction.picName as PIC_Name',
                'booking_transaction.picPhoneNumber as PIC_PhoneNumber',
                'booking_transaction.picEmailAddress as PIC_emailAddress',
                'member.fullName as bookedBy_name',
                'member.emailAddress as bookedBy_emailAddress',
                'booking_transaction.updated_at as updatedAt',
                'booking_transaction.bookingStatus as bookingStatus'
                )
            ->get();
        $data['data'] = $salesreport;
        return $data;
    }

    public function productsales() {
        $productsales = DB::table('product')
            ->join('book_products', 'book_products.productCode', 'product.productCode')
            ->join('bookings', 'bookings.bookingId', 'book_products.bookingId')
            ->join('booking_transaction','bookings.bookingTransactionId', 'booking_transaction.bookingTransactionId')
            ->select(DB::raw('count(*) as numberOfBooking, product.*'),
                    DB::raw('SUM(book_products.numberOfPerson) as totalPerson '),
                    DB::raw('SUM(bookings.sellingPrice) as totalSales'),
                    DB::raw('SUM(bookings.commission) as commission'),
                    DB::raw('SUM(bookings.netPrice) as netSales'))
            ->groupBy('book_products.productCode')
            ->get();
        $data['data'] = $productsales;
        return $data;
    }
    public function filterproductsales(Request $request) {
        $datafilter = $request->all();
        $filter_type = $datafilter['filter_type']; 
        $productsales = DB::table('product')
            ->join('book_products', 'book_products.productCode', 'product.productCode')
            ->join('bookings', 'bookings.bookingId', 'book_products.bookingId')
            ->join('booking_transaction','bookings.bookingTransactionId', 'booking_transaction.bookingTransactionId')
            ->select(DB::raw('count(*) as numberOfBooking, product.*'),
                    DB::raw('SUM(book_products.numberOfPerson) as totalPerson '),
                    DB::raw('SUM(bookings.sellingPrice) as totalSales'),
                    DB::raw('SUM(bookings.commission) as commission'),
                    DB::raw('SUM(bookings.netPrice) as netSales'))
            ->groupBy('book_products.productCode')
            ->where('product.status', 'like', '%'.$filter_type.'%')
            ->get();
        $data['data'] = $productsales;
        return $data;
    }

    public function upcomingschedule() {
        $upcomingschedule = DB::table('booking_transaction')
            ->join('bookings','bookings.bookingTransactionId', 'booking_transaction.bookingTransactionId')
            ->join('book_products', 'bookings.bookingId', 'book_products.bookingId')
            ->leftjoin('product', 'book_products.productCode', 'product.productCode')
            ->select('booking_transaction.bookingTransactionId as transactionBookingId',
                'product.productId', 'product.productCode', 'product.productCategory',
                'book_products.numberOfPerson as totalPerson',
                'product.productType', 'product.productName',
                'picName','picPhoneNumber', 'picEmailAddress')
            ->get();
        $data['data'] = $upcomingschedule;
        return $data;
    }

    public function filterupcomingschedule(Request $request) {
        $datafilter = $request->all();
        $from_date = date("Y-m-d", strtotime($datafilter['from_date']));
        $until_date = date("Y-m-d", strtotime($datafilter['until_date']));
        $upcomingschedule = DB::table('booking_transaction')
            ->join('bookings','bookings.bookingTransactionId', 'booking_transaction.bookingTransactionId')
            ->join('book_products', 'bookings.bookingId', 'book_products.bookingId')
            ->leftjoin('product', 'book_products.productCode', 'product.productCode')
            ->where('booking_transaction.created_at', '>=', $from_date)
            ->where('booking_transaction.created_at', '<=', $until_date)
            ->select('booking_transaction.bookingTransactionId as transactionBookingId',
                'product.productId', 'product.productCode', 'product.productCategory',
                'book_products.numberOfPerson as totalPerson',
                'product.productType', 'product.productName',
                'picName','picPhoneNumber', 'picEmailAddress')
            ->get();
        $data['data'] = $upcomingschedule;
        return $data;
    }

    public function salessettlement() {
        $companyId = 1;//from auth
        $settlement = DB::table('booking_transaction')
            ->join('bookings','bookings.bookingTransactionId', 'booking_transaction.bookingTransactionId')
            ->select(DB::raw('count(booking_transaction.bookingTransactionId) as data'), 
                DB::raw("DATE_FORMAT(booking_transaction.created_at, '%m-%Y') new_date "),  
                DB::raw("DATE_FORMAT(booking_transaction.created_at, '%M') month "),  
                DB::raw('YEAR(booking_transaction.created_at) year'),
                DB::raw('SUM(bookings.sellingPrice) as totalSales'),
                DB::raw('SUM(bookings.commission) as totalCommission'),
                DB::raw('SUM(bookings.netPrice) as totalNetSales'),
                'booking_transaction.bookingStatus as settlementStatus', 'booking_transaction.paid_at as settlementDate',
                DB::raw("DATE_FORMAT(booking_transaction.created_at, '%m-%Y') settledAt ")) 
            ->groupby('year','month')
            ->get();
        foreach($settlement as $s){
            $month = DB::table('settlement')->where('companyId', $companyId)->where('month', $s->month)->exists();
            $year = DB::table('settlement')->where('companyId', $companyId)->where('year',$s->year )->exists();
            if($month==false && $year==false){
                DB::table('settlement')->insert([
                    'year' => $s->year,
                    'month' => $s->month,
                    'companyId' => $companyId,
                    'totalSales' => $s->totalSales,
                    'totalNetSales' => $s->totalNetSales,
                    'totalCommission' => $s->totalCommission,
                    'settlementStatus' => 'unpaid',        
                    'created_at' =>  Carbon::now(),
                    'updated_at' => Carbon::now()
                ]); 
            }
            else{
                DB::table('settlement')
                    ->where('year', $s->year)
                    ->where('month',  $s->month)
                    ->where('companyId', $companyId)
                    ->update([
                        'totalSales' => $s->totalSales,
                        'totalNetSales' => $s->totalNetSales,
                        'totalCommission' => $s->totalCommission,
                        'settlementStatus' => 'unpaid',        
                        'created_at' =>  Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]) ; 

            }
        }
        // $salessettlement = DB::table('booking_transaction')
        //     ->join('bookings','bookings.bookingTransactionId', 'booking_transaction.bookingTransactionId')
        //     ->select(DB::raw('count(booking_transaction.bookingTransactionId) as data'), 
        //         DB::raw("DATE_FORMAT(booking_transaction.created_at, '%m-%Y') new_date "),  
        //         DB::raw("DATE_FORMAT(booking_transaction.created_at, '%M') month "),  
        //         DB::raw('YEAR(booking_transaction.created_at) year'),
        //         DB::raw('SUM(bookings.sellingPrice) as totalSales'),
        //         DB::raw('SUM(bookings.commission) as totalCommission'),
        //         DB::raw('SUM(booking_transaction.totalSellingPrice) as totalNetSales'),
        //         'booking_transaction.bookingStatus as settlementStatus', 'booking_transaction.paid_at as settlementDate',
        //         DB::raw("DATE_FORMAT(booking_transaction.created_at, '%m-%Y') settledAt ")) 
        //         ->groupby('year','month')
        //     ->get();
        $salessettlement = DB::table('settlement')
            ->where('companyId', $companyId)
            ->select('settlement.*',
                'created_at as settledAt'
                )
            ->get();
        $data['data'] = $salessettlement;
        return $data;
    }
}
