<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BookingController extends Controller
{
    public function bytransactiondate(){
        $booking = DB::table('book_products')
            ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
            ->join('product', 'product.productId', 'book_products.productId')
            ->join('member', 'member.memberId', 'booking_transaction.memberId')
            ->select('booking_transaction.created_at as transactionDate',
                'book_products.bookingProductId as bookingProductId',
                'book_products.bookingNumber as bookingNumber',
                'book_products.productId as productID',
                'book_products.productCode as productCode',
                'product.productCategory as productCategory',
                'product.productType as productType',
                'product.productName as productName',
                'product.startSellingDate as startCommencingDateTime',
                'product.endSellingDate as endCommencingDateTime',
                'book_products.pricePerPerson AS pricePerPerson',
                'book_products.numberOfPerson as totalPerson',
                'member.fullName as bookedBy_name',
                'member.emailAddress as bookedBy_emailAddress',
                'booking_transaction.updated_at as updatedAt',
                'booking_transaction.bookingStatus as bookingStatus'
                )
			->orderBy('booking_transaction.created_at', 'desc')
            ->get();
            // dd($booking);
	    return view('page.bookingtransactiondate', [
			'booking' => $booking]);
    }
    public function filterbytransactiondate(Request $request){
        $datasearch = $request->all();
        $from_date = date("Y-m-d", strtotime($datasearch['from_date']));
        $until_date = date("Y-m-d", strtotime($datasearch['until_date']));
        $booking_status=$datasearch["booking_status"];
        $booking_keyword=$datasearch["booking_keyword"];
        $booking_category=$datasearch["booking_category"];
        $booking = DB::table('book_products')
            ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
            ->join('product', 'product.productId', 'book_products.productId')
            ->join('member', 'member.memberId', 'booking_transaction.memberId')
            ->where('booking_transaction.bookingStatus', 'like', '%'.$datasearch["booking_status"].'%')
            ->where('booking_transaction.created_at', '>=', $from_date)
            ->where('booking_transaction.created_at', '<=', $until_date)
            ->where('product.productType', 'like', '%'.$datasearch["booking_category"].'%')
            //keyword
            ->where(function ($query) use ($booking_keyword, $from_date, $until_date, $booking_status, $booking_category){
                $query->where('book_products.bookingNumber', 'like', '%'.$booking_keyword.'%')
                    ->where('booking_transaction.bookingStatus', 'like', '%'.$booking_status.'%')
                    ->where('product.productType', 'like', '%'.$booking_category.'%')
                    ->where('booking_transaction.created_at', '>=', $from_date)
                    ->where('booking_transaction.created_at', '<=', $until_date);})
            
            ->orWhere(function ($query) use ($booking_keyword, $from_date, $until_date, $booking_status, $booking_category){
                $query->where('member.fullName', 'like', '%'.$booking_keyword.'%')
                    ->where('booking_transaction.bookingStatus', 'like', '%'.$booking_status.'%')
                    ->where('product.productType', 'like', '%'.$booking_category.'%')
                    ->where('booking_transaction.created_at', '>=', $from_date)
                    ->where('booking_transaction.created_at', '<=', $until_date);})
            ->orWhere(function ($query) use ($booking_keyword, $from_date, $until_date, $booking_status, $booking_category){
                $query->where('product.productCategory', 'like', '%'.$booking_keyword.'%')
                    ->where('booking_transaction.bookingStatus', 'like', '%'.$booking_status.'%')
                    ->where('product.productType', 'like', '%'.$booking_category.'%')
                    ->where('booking_transaction.created_at', '>=', $from_date)
                    ->where('booking_transaction.created_at', '<=', $until_date);})

            ->orWhere(function ($query) use ($booking_keyword, $from_date, $until_date, $booking_status, $booking_category){
                $query->where('product.productType', 'like', '%'.$booking_keyword.'%')
                    ->where('booking_transaction.bookingStatus', 'like', '%'.$booking_status.'%')
                    ->where('product.productType', 'like', '%'.$booking_category.'%')
                    ->where('booking_transaction.created_at', '>=', $from_date)
                    ->where('booking_transaction.created_at', '<=', $until_date);})

            ->orWhere(function ($query) use ($booking_keyword, $from_date, $until_date, $booking_status, $booking_category){
                $query->where('product.productName', 'like', '%'.$booking_keyword.'%')
                    ->where('booking_transaction.bookingStatus', 'like', '%'.$booking_status.'%')
                    ->where('product.productType', 'like', '%'.$booking_category.'%')
                    ->where('booking_transaction.created_at', '>=', $from_date)
                    ->where('booking_transaction.created_at', '<=', $until_date);})

            ->orWhere(function ($query) use ($booking_keyword, $from_date, $until_date, $booking_status, $booking_category){
                $query->where('book_products.numberOfPerson', 'like', '%'.$booking_keyword.'%')
                    ->where('booking_transaction.bookingStatus', 'like', '%'.$booking_status.'%')
                    ->where('product.productType', 'like', '%'.$booking_category.'%')
                    ->where('booking_transaction.created_at', '>=', $from_date)
                    ->where('booking_transaction.created_at', '<=', $until_date);})
            ->orWhere(function ($query) use ($booking_keyword, $from_date, $until_date, $booking_status, $booking_category){
                $query->where('book_products.pricePerPerson', 'like', '%'.$booking_keyword.'%')
                    ->where('booking_transaction.bookingStatus', 'like', '%'.$booking_status.'%')
                    ->where('product.productType', 'like', '%'.$booking_category.'%')
                    ->where('booking_transaction.created_at', '>=', $from_date)
                    ->where('booking_transaction.created_at', '<=', $until_date);})
            ->orderBy('booking_transaction.created_at', 'desc')
            ->select('booking_transaction.created_at as transactionDate',
                'book_products.bookingNumber as bookingNumber',
                'book_products.productId as productID',
                'book_products.productCode as productCode',
                'product.productCategory as productCategory',
                'product.productType as productType',
                'product.productName as productName',
                'product.startSellingDate as startCommencingDateTime',
                'product.endSellingDate as endCommencingDateTime',
                'book_products.pricePerPerson AS pricePerPerson',
                'book_products.numberOfPerson as totalPerson',
                'member.fullName as bookedBy_name',
                'member.emailAddress as bookedBy_emailAddress',
                'booking_transaction.updated_at as updatedAt',
                'booking_transaction.bookingStatus as bookingStatus'
                )
            ->get();
        
            // dd($booking);
        $html="";
        $card="";
        $status="";
        foreach($booking as $b){
            if($b->bookingStatus == "Awaiting Payment"){
                $status= '<h5 class="font-bold col-green">'.$b->bookingStatus.'</h5>';   
            }
            else if($b->bookingStatus == "Payment Failed" || $b->bookingStatus == "Cancelled"){
                $status= '<h5 class="font-bold col-red">'.$b->bookingStatus.'</h5>';
            }   
            else{
                $status= '<h5 class="font-bold col-black">'.$b->bookingStatus.'</h5>';
            }
            $card =
                '<div class="body">
                <div class="row" style="margin: 0 10px 10px 10px;background-color: white;border-radius: 10px">
                    <div class="col-md-2" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                        <h5>Transaction Date</h5>
                        <h1 style="margin-top:0px">'.date('d', strtotime($b->transactionDate)).'</h1>
                        <h4 style="margin-bottom: 0px">'.date('F', strtotime($b->transactionDate)).'</h4>
                        <small>'.date('Y', strtotime($b->transactionDate)).'</small>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <small>Booking Number :</small>
                                        <h5>'.$b->bookingNumber.'</h5>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <small>Booked By :</small>
                                        <h5>'.$b->bookedBy_name.'</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <small>Product Category :</small>
                                        <h5>'.$b->productCategory.' - '.$b->productType.'</h5>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <small>Product Item :</small>
                                        <h5>'.$b->productName.'</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <small>Total Person</small>
                                        <h5>'.$b->totalPerson.' person</h5>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <small>Total Price</small>
                                        <?php setlocale(LC_MONETARY, en_US); ?>
                                        <h5>'."Rp. " . number_format(($b->totalPerson*$b->pricePerPerson),2,',','.').'</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="padding-top:40px">
                                <div class="row">
                                    <div class="col-md-9">
                                        <small>Booking Status</small>
                                        '.$status.'
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-warning waves-effect" id="add_more_schedule">
                                            <i class="material-icons">add</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
                $html=$html.$card;
        }
		return $html;
    }

    public function byactivityschedule(){
        $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
            ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
            ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
			->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
            ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
            ->orderBy('book_products.startDate', 'desc')
            ->get();
	    return view('page.bookingactivityschedule', [
            'booking' => $booking
        ]);
    }
    public function filterbyactivityschedule(Request $request){
        $datasearch = $request->all();
        $from_date = date("Y-m-d", strtotime($datasearch['from_date']));
        $until_date = date("Y-m-d", strtotime($datasearch['until_date']));
        $category = $datasearch['booking_category'];
        $booking_status = $datasearch['booking_status'];
        $keyword= $datasearch["booking_keyword"];
        $booking = "";
        if($booking_status=="On Going"){
            if($keyword==NULL || $keyword==""){
                $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
                    ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
                    ->join('bookings','bookings.bookingId', 'book_products.bookingId')
                    ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
                    ->join('member', 'member.memberId', 'booking_transaction.memberId')
                    ->where('book_products.startDate', '>=', date('Y-m-d'))
                    ->where('book_products.endDate', '<=', date('Y-m-d'))
                    ->where('book_products.startDate', '>=', $from_date)
                    ->where('book_products.startDate', '<=', $until_date)
                    //keyword
                    ->where('product.productType', 'like', '%'.$category.'%')
                    ->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
                    ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
                    ->orderBy('book_products.startDate', 'desc')
                    ->get();
            }
            else{
                $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
                    ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
                    ->join('bookings','bookings.bookingId', 'book_products.bookingId')
                    ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
                    ->join('member', 'member.memberId', 'booking_transaction.memberId')
                    ->where('book_products.startDate', '>=', date('Y-m-d'))
                    ->where('book_products.endDate', '<=', date('Y-m-d'))
                    ->where('book_products.startDate', '>=', $from_date)
                    ->where('book_products.startDate', '<=', $until_date)
                    //keyword
                    ->where('product.productType', 'like', '%'.$category.'%')
                    ->where('product.productType', 'like', '%'.$datasearch["booking_keyword"].'%')
                    ->orWhere(function ($query) use ($keyword, $from_date, $until_date, $category){
                        $query->where('product.productType', 'like', '%'.$keyword.'%')
                            ->where('book_products.startDate', '>=', date('Y-m-d'))
                            ->where('book_products.endDate', '<=', date('Y-m-d'))
                            ->where('book_products.startDate', '>=', $from_date)
                            ->where('book_products.startDate', '<=', $until_date)
                            ->where('product.productType', 'like', '%'.$category.'%');})
                    ->orWhere(function ($query) use ($keyword, $from_date, $until_date, $category) {
                        $query->where('book_products.productName', 'like', '%'.$keyword.'%')
                            ->where('book_products.startDate', '>=', date('Y-m-d'))
                            ->where('book_products.endDate', '<=', date('Y-m-d'))
                            ->where('book_products.startDate', '>=', $from_date)
                            ->where('book_products.startDate', '<=', $until_date)
                            ->where('product.productType', 'like', '%'.$category.'%');})
                    ->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
                    ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
                    ->orderBy('book_products.startDate', 'desc')
                    ->get();
            }
        }
        else if($booking_status=="Upcoming"){
            if($keyword==NULL || $keyword==""){
                $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
                    ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
                    ->join('bookings','bookings.bookingId', 'book_products.bookingId')
                    ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
                    ->join('member', 'member.memberId', 'booking_transaction.memberId')
                    ->where('book_products.endDate', '>', date('Y-m-d'))
                    ->where('book_products.startDate', '>=', $from_date)
                    ->where('book_products.startDate', '<=', $until_date)
                    //keyword
                    ->where('product.productType', 'like', '%'.$category.'%')
                    ->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
                    ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
                    ->orderBy('book_products.startDate', 'desc')
                    ->get();
            }
            else{
                $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
                    ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
                    ->join('bookings','bookings.bookingId', 'book_products.bookingId')
                    ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
                    ->join('member', 'member.memberId', 'booking_transaction.memberId')
                    ->where('book_products.startDate', '>', date('Y-m-d'))
                    ->where('book_products.startDate', '>=', $from_date)
                    ->where('book_products.startDate', '<=', $until_date)
                    ->where('product.productType', 'like', '%'.$category.'%')
                    ->where('product.productType', 'like', '%'.$datasearch["booking_keyword"].'%')
                    ->orWhere(function ($query) use ($keyword, $from_date, $until_date, $category)  {
                        $query->where('product.productType', 'like', '%'.$keyword.'%')
                            ->where('book_products.startDate', '>', date('Y-m-d'))
                            ->where('book_products.startDate', '>=', $from_date)
                            ->where('book_products.startDate', '<=', $until_date)
                            ->where('product.productType', 'like', '%'.$category.'%');})
                    ->orWhere(function ($query) use ($keyword, $from_date, $until_date, $category)   {
                        $query->where('book_products.productName', 'like', '%'.$keyword.'%')
                            ->where('book_products.startDate', '>', date('Y-m-d'))
                            ->where('book_products.startDate', '>=', $from_date)
                            ->where('book_products.startDate', '<=', $until_date)
                            ->where('product.productType', 'like', '%'.$category.'%');})
                    ->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
                    ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
                    ->orderBy('book_products.startDate', 'desc')
                    ->get();
            }
        }
        else if ($booking_status=="Completed"){
            if($keyword==NULL || $keyword==""){
                $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
                    ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
                    ->join('bookings','bookings.bookingId', 'book_products.bookingId')
                    ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
                    ->join('member', 'member.memberId', 'booking_transaction.memberId')
                    ->where('book_products.startDate', '<', date('Y-m-d'))
                    ->where('book_products.startDate', '>=', $from_date)
                    ->where('book_products.startDate', '<=', $until_date)
                    //keyword
                    ->where('product.productType', 'like', '%'.$category.'%')
                    ->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
                    ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
                    ->orderBy('book_products.startDate', 'desc')
                    ->get();
            }
            else{
                $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
                    ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
                    ->join('bookings','bookings.bookingId', 'book_products.bookingId')
                    ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
                    ->join('member', 'member.memberId', 'booking_transaction.memberId')
                    ->where('book_products.startDate', '<', date('Y-m-d'))
                    ->where('book_products.startDate', '>=', $from_date)
                    ->where('book_products.startDate', '<=', $until_date)
                    ->where('product.productType', 'like', '%'.$category.'%')
                    ->where('product.productType', 'like', '%'.$datasearch["booking_keyword"].'%')
                    ->orWhere(function ($query) use ($keyword, $from_date, $until_date, $category) {
                        $query->where('product.productType', 'like', '%'.$keyword.'%')
                            ->where('book_products.startDate', '<', date('Y-m-d'))
                            ->where('book_products.startDate', '>=', $from_date)
                            ->where('book_products.startDate', '<=', $until_date)
                            ->where('product.productType', 'like', '%'.$category.'%');})
                    ->orWhere(function ($query) use ($keyword, $from_date, $until_date, $category) {
                        $query->where('book_products.productName', 'like', '%'.$keyword.'%')
                            ->where('book_products.startDate', '<', date('Y-m-d'))
                            ->where('book_products.startDate', '>=', $from_date)
                            ->where('book_products.startDate', '<=', $until_date)
                            ->where('product.productType', 'like', '%'.$category.'%');})
                    ->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
                    ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
                    ->orderBy('book_products.startDate', 'desc')
                    ->get();
            }
        }
        else if($booking_status==""){
            if($keyword==NULL || $keyword==""){
                $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
                    ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
                    ->join('bookings','bookings.bookingId', 'book_products.bookingId')
                    ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
                    ->join('member', 'member.memberId', 'booking_transaction.memberId')
                    ->where('book_products.startDate', '>=', $from_date)
                    ->where('book_products.startDate', '<=', $until_date)
                    //keyword
                    ->where('product.productType', 'like', '%'.$category.'%')
                    ->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
                    ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
                    ->orderBy('book_products.startDate', 'desc')
                    ->get();
            }
            else{
                $booking = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
                    ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
                    ->join('bookings','bookings.bookingId', 'book_products.bookingId')
                    ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
                    ->join('member', 'member.memberId', 'booking_transaction.memberId')
                    ->where('book_products.startDate', '>=', $from_date)
                    ->where('book_products.startDate', '<=', $until_date)
                    //keyword
                    ->where('product.productType', 'like', '%'.$category.'%')
                    ->where('product.productType', 'like', '%'.$keyword.'%')
                    ->orWhere('book_products.productName', 'like', '%'.$keyword.'%')
                    ->selectRaw('book_products.*, product.productCategory, product.productType, count(book_products.bookingId) as bookingCount')
                    ->groupBy('book_products.startDate', 'book_products.endDate', 'book_products.startHours', 'book_products.endHours')
                    ->orderBy('book_products.startDate', 'desc')
                    ->get();
            }
        }
            // dd($booking);
        $html="";
        $card="";
        $status="";
        $divdate="";
        $status="";
        foreach($booking as $b){
            if($b->startDate != $b->endDate){
                $divdate = 
                    '<div class="col-md-5" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                        <h6>Activity Start Date</h6>
                        <h1 style="margin-top:0px">'.date('d', strtotime($b->startDate)).'</h1>
                        <h4 style="margin-bottom: 0px">'.date('F', strtotime($b->startDate)).'</h4>
                        <small>'.date('Y', strtotime($b->startDate)).'</small>
                    </div>
                    <div class="col-md-2" style="margin-top:20%; margin-left: -5%">
                        <hr width="500%" style="margin-left: -200%">        
                    </div>
                    <div class="col-md-5" style="text-align: center;border-radius: 0 10px 10px 0; margin-left: -5%">
                        <h6>Activity End Date</h6>
                        <h1 style="margin-top:0px">'.date('d', strtotime($b->endDate)).'</h1>
                        <h4 style="margin-bottom: 0px">'.date('F', strtotime($b->endDate)).'</h4>
                        <small>'.date('Y', strtotime($b->endDate)).'</small>
                    </div>';
            }
            else if($b->startHours == '00:00:00' && $b->endHours == '23:59:59'){
                $divdate = 
                    '<div class="col-md-5" style="text-align: center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                        <h6>Activity Date</h6>
                        <h1 style="margin-top:0px">'.date('d', strtotime($b->startDate)).'</h1>
                        <h4 style="margin-bottom: 0px">'.date('F', strtotime($b->startDate)).'</h4>
                        <small>'.date('Y', strtotime($b->startDate)).'</small>
                    </div>
                    <div class="col-md-6" style="text-align: center;background-color: #E3DED1;">
                        <h6 class="col-black">Time</h6>
                        <br>
                        <br>
                        <h4 class="col-black" style="margin-bottom: 0px">FULL DAY</h4>
                        <br>
                        <br>
                    </div>';
            }
            else{
                $divdate=
                    '<div class="col-md-6" style="text-align: center;background-color: #676C56; color: #F6F6F4;border-radius: 10px 0 0 10px ">
                        <h6>Activity Date</h6>
                        <h1 style="margin-top:0px">'.date('d', strtotime($b->startDate)).'</h1>
                        <h4 style="margin-bottom: 0px">'.date('F', strtotime($b->startDate)).'</h4>
                        <small>'.date('Y', strtotime($b->startDate)).'</small>
                    </div>
                    <div class="col-md-6" style="text-align: center;background-color: #E3DED1;">
                        <h6 class="col-black">Time</h6>
                        <h4 class="col-black" style="margin-top:0px">'.date('h:i', strtotime($b->startHours)).'</h4>
                        <h4 class="col-black"> - </h4>
                        <h4 class="col-black" style="margin-bottom: 0px">'.date('h:i', strtotime($b->endHours)).'</h4>
                        <br>
                    </div>';
            }

            if(date("Y-m-d")>= $b->startDate && date("Y-m-d")<= $b->endDate){
                $status = '<h5 class="col-orange">On Going</h5>';
            }
            else if(date("Y-m-d")>=$b->endDate){
                $status = '<h5 class="col-black">Complete</h5>';
            }
            else {
                $status = '<h5 class="col-green">Upcoming</h5>';
            }
            $card =
                '<div class="body">
                <div class="row" style="margin: 0 10px 10px 10px;background-color: white;border-radius: 10px ">
                    <div class="col-md-3" style="text-align: center;center;background-color: #676C56;color: #F6F6F4;border-radius: 10px 0 0 10px ">
                        <div class="row">
                            '.$divdate.'
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12"  style="margin-top:20%;">
                                        <small>Product Category :</small>
                                        <h5>'.$b->productCategory.' - '.$b->productType.'</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12"  style="margin-top:20%;">
                                        <small>Product Item :</small>
                                        <h5>'.$b->productName.'</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12" style="margin-top:20%;">
                                        <small>Number Of Booking :</small>
                                        <h5>'.$b->bookingCount.' bookings</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-10" style="margin-top:20%;">
                                        <small>Activity Status :</small>
                                        '.$status.'
                                    </div>
                                    <div class="col-md-2 align-middle align-center" style="margin-top:20%;">
                                        <a href="'.url("booking/schedule/".$b->bookingProductId).'">
                                            <button type="button" class="btn btn-warning waves-effect" id="add_more_schedule">
                                                <i class="material-icons">keyboard_arrow_right</i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>';
                $html=$html.$card;
        }
		return $html;
    }

    public function listbyschedule($id){
        $schedule=DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
            ->selectRaw('book_products.*, product.productCategory, product.productType')
            ->where('bookingProductId', $id)->first();
        $startDate = $schedule->startDate;
        $endDate =$schedule->endDate;
        $startHours = $schedule->startHours;
        $endHours = $schedule->endHours;
        $totalperson = DB::table('book_products')
            ->where('book_products.startDate', $startDate)
            ->where('book_products.endDate', $endDate)
            ->where('book_products.startHours', $startHours)
            ->where('book_products.endHours', $endHours)
            ->sum('numberOfPerson');
        $maxbooking = DB::table('book_products')->join('schedule', 'schedule.scheduleId', 'book_products.scheduleId')
            ->where('book_products.startDate', $startDate)
            ->where('book_products.endDate', $endDate)
            ->where('book_products.startHours', $startHours)
            ->where('book_products.endHours', $endHours)
            ->value('maximumBooking');
        $booking = DB::table('book_products')
            ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
            ->join('product', 'product.productId', 'book_products.productId')
            ->join('member', 'member.memberId', 'booking_transaction.memberId')
            ->where('book_products.startDate', $startDate)
            ->where('book_products.endDate', $endDate)
            ->where('book_products.startHours', $startHours)
            ->where('book_products.endHours', $endHours)
            ->select('booking_transaction.created_at as transactionDate',
                'book_products.bookingProductId as bookingProductId',
                'book_products.bookingNumber as bookingNumber',
                'book_products.productId as productID',
                'book_products.productCode as productCode',
                'product.productCategory as productCategory',
                'product.productType as productType',
                'product.productName as productName',
                'product.startSellingDate as startCommencingDateTime',
                'product.endSellingDate as endCommencingDateTime',
                'book_products.pricePerPerson AS pricePerPerson',
                'book_products.numberOfPerson as totalPerson',
                'member.fullName as bookedBy_name',
                'member.emailAddress as bookedBy_emailAddress',
                'booking_transaction.updated_at as updatedAt',
                'booking_transaction.bookingStatus as bookingStatus'
                )
			->orderBy('booking_transaction.created_at', 'desc')
            ->get();    
	    return view('page.bookingschedule', [
            'schedule' => $schedule,
            'booking' => $booking,
            'totalperson' => $totalperson,
            'maxbooking' => $maxbooking
        ]);
    }

    public function detail($id){
        $booking = DB::table('book_products')
            ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
            ->join('product', 'product.productId', 'book_products.productId')
            ->join('member', 'member.memberId', 'booking_transaction.memberId')
            ->where('bookingProductId', $id)
            ->select('booking_transaction.created_at as transactionDate',
                'book_products.bookingNumber as bookingNumber',
                'book_products.productId as productID',
                'book_products.productCode as productCode',
                'book_products.startDate as startDate',
                'book_products.endDate as endDate',
                'book_products.startHours as startHours',
                'book_products.endHours as endHours',
                'product.productCategory as productCategory',
                'product.productType as productType',
                'product.productName as productName',
                'product.startSellingDate as startCommencingDateTime',
                'product.endSellingDate as endCommencingDateTime',
                'book_products.pricePerPerson AS pricePerPerson',
                'book_products.numberOfPerson as totalPerson',
                'bookings.commission as commission',
                'member.fullName as bookedBy_name',
                'member.emailAddress as bookedBy_emailAddress',
                'booking_transaction.updated_at as updatedAt',
                'booking_transaction.picName as picName',
                'booking_transaction.picPhoneNumber as picPhoneNumber',
                'booking_transaction.picEmailAddress as picEmailAddress',
                'booking_transaction.bookingStatus as bookingStatus'
                )
			->orderBy('booking_transaction.created_at', 'desc')
            ->first();
        $booking_title = ''.$booking->bookingNumber.'';
	    return view('page.bookingdetail', [
            'booking' => $booking,
            'booking_title' => $booking_title
        ]);
    }
    public function detailbyschedule($id){
        $booking = DB::table('book_products')
            ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
            ->join('product', 'product.productId', 'book_products.productId')
            ->join('member', 'member.memberId', 'booking_transaction.memberId')
            ->where('bookingProductId', $id)
            ->select('booking_transaction.created_at as transactionDate',
                'book_products.bookingNumber as bookingNumber',
                'book_products.productId as productID',
                'book_products.productCode as productCode',
                'book_products.startDate as startDate',
                'book_products.endDate as endDate',
                'book_products.startHours as startHours',
                'book_products.endHours as endHours',
                'product.productCategory as productCategory',
                'product.productType as productType',
                'product.productName as productName',
                'product.startSellingDate as startCommencingDateTime',
                'product.endSellingDate as endCommencingDateTime',
                'book_products.pricePerPerson AS pricePerPerson',
                'book_products.numberOfPerson as totalPerson',
                'bookings.commission as commission',
                'member.fullName as bookedBy_name',
                'member.emailAddress as bookedBy_emailAddress',
                'booking_transaction.updated_at as updatedAt',
                'booking_transaction.picName as picName',
                'booking_transaction.picPhoneNumber as picPhoneNumber',
                'booking_transaction.picEmailAddress as picEmailAddress',
                'booking_transaction.bookingStatus as bookingStatus'
                )
			->orderBy('booking_transaction.created_at', 'desc')
            ->first();
        $booking_title = ''.$booking->productName.'('.date('d F Y', strtotime($booking->startDate)).'-'.date('d F Y', strtotime($booking->endDate)).') >'.$booking->bookingNumber.'';
	    return view('page.bookingdetail', [
            'booking' => $booking,
            'booking_title' => $booking_title
        ]);
    }
}
