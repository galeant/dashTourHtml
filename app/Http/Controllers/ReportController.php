<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ReportController extends Controller
{
    public function index(){
        $fromdate = Carbon::now()->startOfMonth()->format('d-m-Y');
        $untildate = Carbon::now()->endOfMonth()->format('d-m-Y');
		return view('page.report', [
			'fromdate' => $fromdate, 
			'untildate' => $untildate]);
    }

    public function settlement(){
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
                DB::table('settlement')->update([
                    'totalSales' => $s->totalSales,
                    'totalNetSales' => $s->totalNetSales,
                    'totalCommission' => $s->totalCommission,
                    'settlementStatus' => 'unpaid',        
                    'created_at' =>  Carbon::now(),
                    'updated_at' => Carbon::now()
                ])
                    ->where('year', $s->year)
                    ->where('month',  $s->month)
                    ->where('companyId', $companyId) ; 

            }
        }
    }
}
