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

class RegisterController extends Controller{
    public function formSegment(){
        session()->forget('status');
        return view('register.segment');
    }
    public function formRegister(){
        return view('register.register');
    }
    public function registerProcess(Request $req){
        // dd($req->all()); 
        $validate = User::where('email',$req->input('email'))->first();
        if($validate == null){
            $company = Company::create([
                'companyName' => $req->companyName,
                'fullName' => $req->fullName,
                'phone' => $req->format.'-'.$req->phone,
                'email' => $req->email
            ]);
            $company->companyId;
            $data = $req->all();
            $data['phone'] = $req->format.'-'.$req->phone;
            $data['password'] = str_random(50);
            $data['token'] = str_random(50);
            $data['roleId'] = 1;
            $data['companyId'] = $company->companyId;
            $user = User::create($data);

            Mail::to($req->input('email'))->send(new WelcomeMail($user));
            return view('register.success',['email' => $req->input('email')]);
        }else{
            session()->put('status','Email Already Used');
            return view('register.segment',['email' => $req->input('email')]);
        }

    }
    public function verification($token){
        $verification = User::with('company')->where('token',$token)->first();
        if($verification != null){
            if($verification->company->status == 'NotVerified')
            {
                session()->put('verif', $verification);
                return view('register.password');
            }else{
                return redirect('/login');
            }
        }else{
            return view('404');
        }
    }
    public function activated(Request $req){
        $data = User::with('company')->where('token',session()->get('verif')->token)->first();
        $data->update([
            'password' => Hash::make($req->input('password')),
            'token' => str_random(50),
        ]);
        $active = Company::where('companyId',session()->get('verif')->companyId)->update([
            'status' => 'AwaitingSubmission'
        ]);
        $navbaractivity = DB::table('navbar_activity')
            ->select('navbarActivityId')
            ->get();
        foreach($navbaractivity as $na){
            $roleactivity = DB::table('role_activity')
                ->insert([
                    'userId' => $data->userId,
                    'roleId' => 1,
                    'navbarActivityId' => $na->navbarActivityId,
                    'roleActivityStatus' => 1
            ]);
        }
        return redirect('/register/profile');
    }
    public function formCompany(){
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
        ->where('userId',session()->get('verif')->userId)
        ->first();
        // $data = User::with('company')->where('userId',session()->get('verif')->userId)->first();
        $province = DB::table('provinces')->get();
        return view('register.company',['data'=>$data,'provinces'=> $province]);
    }
    public function profileSave(Request $req){
        // SAVE COMPANY PROFILE
        $update = Company::where('companyId',session()->get('verif')->company->companyId);
        $update->update([
            'fullName' => $req->fullName,
            'phone' => $req->format.'-'.$req->phone,
            'email' => $req->email,
            'role' => $req->role,
            'companyName' => $req->companyName,
            'companyPhone' => $req->formatCompany.'-'.$req->companyPhone,
            'companyEmail' => $req->companyEmail,
            'companyProvince' => $req->companyProvince,
            'companyCity' => $req->companyCity,
            'companyAddress' => $req->companyAddress,
            'companyPostal' => $req->companyPostal,
            'companyWeb' => $req->companyWeb,
            'companyBookSystem' => $req->bookingSystemName,
            'companyBankName' => $req->bankName,
            'companyBankAccountNumber' => $req->bankAccountNumb,
            'companyBankAccountTitle' => $req->bankAccountHolderTitle,
            'companyBankAccountName' => $req->bankAccountHolderName,
            'companyFileReq' => $req->onwershipType,
            'status' => 'AwaitingModeration',
        ]);
        // BANK
        $bankpic = $req->file('bankPic');
        if($req->hasFile('bankPic')){
            $bankExt = $bankpic->getClientOriginalExtension();
            $bankToSave = 'bank'.time().'.'.$bankExt;
            $bank = $bankpic->move('upload/document/bankAccount',$bankToSave);
            $update->update([
                'bankAccountScanUrl' => 'upload/document/bankAccount/'.$bankToSave
            ]);
        }
        // AKTA
        $aktaPic = $req->file('aktaPic');
        if($req->hasFile('aktaPic')){
            $aktaExt = $aktaPic->getClientOriginalExtension();
            $aktaToSave = 'akta'.time().'.'.$aktaExt;
            $akta = $aktaPic->move('upload/document/akta',$aktaToSave);
            $update->update([
                'aktaUrl' => 'upload/document/akta/'.$aktaToSave
            ]);
        }
        // SIUP
        $SIUPPic = $req->file('SIUPPic');
        if($req->hasFile('SIUPPic')){
            $siupExt = $SIUPPic->getClientOriginalExtension();
            $siupToSave = 'siup'.time().'.'.$siupExt;
            $siup = $SIUPPic->move('upload/document/siup',$siupToSave);
            $update->update([
                'siupUrl' => 'upload/document/siup/'.$siupToSave
            ]);
        }
        // NPWP
        $NPWPPic = $req->file('NPWPPic');
        if($req->hasFile('NPWPPic')){
            $npwpExt = $NPWPPic->getClientOriginalExtension();
            $npwpToSave = 'npwp'.time().'.'.$npwpExt;
            $npwp = $NPWPPic->move('upload/document/npwp',$npwpToSave);
            $update->update([
                'npwpUrl' => 'upload/document/npwp/'.$npwpToSave
            ]);
        }
        // KTP
        $KTPPic = $req->file('KTPPic');
        if($req->hasFile('KTPPic')){
            $ktpExt = $KTPPic->getClientOriginalExtension();
            $ktpToSave = 'ktp'.time().'.'.$ktpExt;
            $ktp = $KTPPic->move('upload/document/ktp',$ktpToSave);
            $update->update([
                'ktpUrl' => 'upload/document/ktp/'.$ktpToSave
            ]);
        }
        // EVIDANCE
        $evidancePic = $req->file('evidancePic');
        if($req->hasFile('evidancePic')){
            $evidanceExt = $evidancePic->getClientOriginalExtension();
            $evidanceToSave = 'evidance'.time().'.'.$evidanceExt;
            $evidance = $evidancePic->move('upload/document/evidance',$evidanceToSave);
            $update->update([
                'evidanceUrl' => 'upload/document/evidance/'.$evidanceToSave
            ]);
        }
        // Product
        $companyId = session()->get('verif')->company->companyId;
        $productCodeNow = Product::where('companyId', $companyId)->orderBy('created_at', 'desc')->first();
        if($productCodeNow == null){
            $productCode = '101-'.$companyId.'1';
        }else{
            $productCodeNow = $productCodeNow->productCode;
            $number = substr($productCodeNow, 5);
            $productCode = '101-'.$companyId.($number+1);
        }
        if($req->cancellationType == 1){
            $cancellationType = "No Cancellation";
            $minCancellationDay = '-';
            $cancelationFee = '-';
            $cancellationDetails = '-';
        }else if($req->cancellationType == 2){
            $cancellationType = "Free Cancellation";
            $minCancellationDay = '-';
            $cancelationFee = '-';
            $cancellationDetails = '-';
        }else{
            $cancellationType = "Cancel Policy";
            $minCancellationDay = $req->minCancellationDay;
            $cancelationFee = $req->cancellationFee;
            $cancellationDetails = $req->cancellationFee;
        }
        $product = Product::create([
            'PICName' => $req->PICName,
            'PICPhone' => $req->formatPIC.'-'.$req->PICPhone,
            'productCode' => $productCode,
            'productName' => $req->productName,
            'productCategory' => $req->productCategory,
            'productType' => $req->productType,
            'minPerson' => $req->minPerson,
            'maxPerson' => $req->maxPerson,
            'meetingPointAddress' => $req->meetingPoint,
            'meetingPointLatitude' => $req->meetingPointLatitude,
            'meetingPointLongitude' => $req->meetingPointLongitude,
            'meetingPointNote' => $req->meetingPointNotes,
            'startSellingDate' => $req->startSellingDate,
            'endSellingDate' => $req->endSellingDate,
            'termCondition' => $req->termCondition,
            'additionalInfo' => $req->additionalInfo,
            'cancellationType' => $cancellationType,
            'minCancellationDay' => $minCancellationDay,
            'cancellationFee' => $cancelationFee,
            'cancellationDetails' => $cancellationDetails,
            'status' => 'noactive',
            'companyId' => $companyId
        ]);
        // INCLUDE
        if($req->priceIncludes != null){
            foreach($req->priceIncludes as $includes){
                $includes = Includes::create([
                    'productId' => $product->productId,
                    'description' => $includes
                ]);
            }
        }
        // EXCLUDE
        if($req->priceExcludes != null){
            foreach($req->priceExcludes as $excludes){
                $excludes = Excludes::create([
                    'productId' => $product->productId,
                    'description' => $excludes
                ]);
            }
        }
        /// DESTINATION
        if($req->place != null){
            foreach($req->place as $place){
                // using this if destination still null
                if(array_key_exists('destination',$place)){
                    $destination = $place['destination'];
                }else{
                    $destination = null;
                }
                //
                $destination = ProductDestination::create([
                    'productId' => $product->productId,
                    'provinceId' =>$place['province'],
                    'cityId' => $place['city'],
                    'destinationId' => $destination
                    // 'destinationId' => $place['destination']
                ]);
            }
        }
        // ACTIVITY
        if($req->activityTag != null){
            foreach($req->activityTag as $activity)
            {
                $destination = ProductActivity::create([
                    'productId' => $product->productId,
                    'activityId' => $activity
                ]);
            }
        }
        // SCHEDULE
        if($req->scheduleType == 1){
            if($req->schedule != null){
                foreach($req->schedule  as $schedule)
                {
                    $scheduleList = Schedule::create([
                        'scheduleType' => 'Multiple Days',
                        'startDate' => date("Y-m-d",strtotime($schedule['startDate'])),
                        'endDate' => date("Y-m-d",strtotime($schedule['endDate'])),
                        'startHours' =>'00:00',
                        'endHours' =>'23:59',
                        'maxBookingDateTime' => date("Y-m-d H:i:s",strtotime($schedule['maxBookingDate'].' 23:59:00')),
                        'maximumGroup' =>$schedule['maximumGroup'],
                        'maximumBooking' =>$schedule['maximumGroup'],
                        'productId' =>$product->productId
                    ]);
                }
            }
        }else if($req->scheduleType == 2){
            if($req->schedule != null){
                foreach($req->schedule as $schedule){
                    $scheduleList = Schedule::create([
                        'scheduleType' => 'Couple of Hours',
                        'startDate' =>date("Y-m-d",strtotime($schedule['startDate'])),
                        'endDate' =>date("Y-m-d",strtotime($schedule['startDate'])),
                        'startHours' =>$schedule['startHours'],
                        'endHours' =>$schedule['endHours'],
                        'maxBookingDateTime' => date("Y-m-d H:i:s",strtotime($schedule['startDate'].' '.$schedule['startHours'])),
                        'maximumGroup' =>$schedule['maximumGroup'],
                        'maximumBooking' =>$schedule['maximumGroup'],
                        'productId' =>$product->productId
                    ]);
                }
            }
        }else{
            if($req->schedule != null){
                foreach($req->schedule  as $schedule){
                    $scheduleList = Schedule::create([
                        'scheduleType' => 'Single Days',
                        'startDate' =>date("Y-m-d",strtotime($schedule['startDate'])),
                        'endDate' =>date("Y-m-d",strtotime($schedule['startDate'])),
                        'startHours' =>'00:00',
                        'endHours' =>'23:59',
                        'maxBookingDateTime' => date("Y-m-d H:i:s",strtotime($schedule['maxBookingDate'].' 23:59:00')),
                        'maximumGroup' =>$schedule['maximumGroup'],
                        'maximumBooking' =>$schedule['maximumGroup'],
                        'productId' =>$product->productId
                    ]);
                }
            }
        }
        // ITINERARY
        if($req->itinerary != null){
            foreach($req->itinerary as $itinerary){
                foreach($itinerary['list'] as $list){
                    // if($list['activityCategory'] == 1 || $list['activityCategory'] == 4){
                    //  $destination = 1;
                    //  $activity = '';
                    // }else if($list['activityCategory'] == 2){
                    //  $destination = $list['destination'];
                    //  $activity = '';
                    // }else{
                    //  $destination = $list['destination'];
                    //  $activity = $list['activity'];
                    // }
                    $itineraryList = Itinerary::create([
                        'day' => $itinerary['day'],
                        'startTime' => $list['startTime'],
                        'endTime' => $list['endTime'],
                        // 'agendaCategory' => $list['activityCategory'],
                        // 'destinationId' => $list['destination'],
                        // 'agenda' => $list['activity'],
                        'description' => $list['description'],
                        'productId' => $product->productId
                    ]);
                }
            }
        }
        // PRICE
        // dd($req->price);
        if(count($req->price) != 0){
            if(count($req->price) > 1){
                $priceType = 'Based';
            }else{
                $priceType = 'Fix';
            }
            foreach($req->price as $price){
                $priceList = Price::create([
                    'priceType' => $priceType,
                    'numberOfPerson' => $price['people'],
                    'priceIDR'=> str_replace(".", "", $price['IDR']),
                    'priceUSD'=> str_replace(".", "", $price['USD']),
                    'productId'=> $product->productId
                ]);
            }
        }
        // IMAGE DESTINATION
        if($req->hasFile('image_destination')){
            $i = 0;
            foreach($req->image_destination as $file)
            {
                $i++;
                $fileName = 'destination'.$i.'_';
                $fileExt = $file->getClientOriginalExtension();
                $fileToSave = $fileName.time().'.'.$fileExt;
                $path = $file->move('upload/image/destination',$fileToSave);

                $picSurround = ImageDestination::create([
                    // 'fileCategory' => 'destination',
                    'url' => 'upload/image/destination/'.$fileToSave,
                    'productId' => $product->productId
                ]);
            }
        }
        // IMAGE ACTIVITY
        if($req->hasFile('image_activities')){
            $i = 0;
            foreach($req->image_activities as $file)
            {
                $i++;
                $fileName = 'activity_'.$i.'_';
                $fileExt = $file->getClientOriginalExtension();
                $fileToSave = $fileName.time().'.'.$fileExt;
                $path = $file->move('upload/image/activities',$fileToSave);

                $picActivity = ImageActivity::create([
                    'fileCategory' => 'activity',
                    'url' => 'upload/image/activities/'.$fileToSave,
                    'productId' => $product->productId
                ]);
            }
        }
        // IMAGE ACCOMMODATION
        if($req->hasFile('image_accommodation')){
            $i = 0;
            foreach($req->image_accommodation as $file)
            {
                $i++;
                $fileName = 'accommodation_'.$i.'_';
                $fileExt = $file->getClientOriginalExtension();
                $fileToSave = $fileName.time().'.'.$fileExt;
                $path = $file->move('upload/image/accommodation',$fileToSave);

                $picAccommodation = ImageAccommodation::create([
                    'fileCategory' => 'accommodation',
                    'url' => 'upload/image/accommodation/'.$fileToSave,
                    'productId' => $product->productId
                ]);
            }
        }
        // IMAGE OTHER
        if($req->hasFile('image_other')){
            $i = 0;
            foreach($req->image_other as $file)
            {
                $i++;
                $fileName = 'other_'.$i.'_';
                $fileExt = $file->getClientOriginalExtension();
                $fileToSave = $fileName.time().'.'.$fileExt;
                $path = $file->move('upload/image/other',$fileToSave);

                $picAccommodation = ImageOther::create([
                    'fileCategory' => 'other',
                    'url' => 'upload/image/other/'.$fileToSave,
                    'productId' => $product->productId
                ]);
            }
        }
        // VIDEO
        foreach($req->videoUrl as $video){
            $video = Videos::create([
                'fileCategory' => 'video',
                'url' => $video,
                'productId' => $product->productId
            ]);
        }
        return redirect('/register/complete');
    }
    public function registerComplete(){
        return view('register.registercomplete');
    }
    public function complete(){
        return view('register.complete');
    }
    public function awaiting(){
        return view('register.awaiting');
    }
    public function formLogin(){
        // dd(session()->all());
        session()->put('status',null);
        return view('register.login');
    }
    public function loginProcess(Request $req){
        // dd(session()->all());
        $valid = User::with('company')->where(['email'=>$req->email])->first();
        if($valid == null){
            session()->put('status','Email Not Found');
            return view('register.login');
        }else{
            if(Hash::check($req->password,$valid->password)){
                if($valid->company->status == 'AwaitingSubmission'){
                session()->put('verif',$valid);
                    return redirect('register/profile');
                }else if($valid->company->status == 'AwaitingModeration'){
                    return redirect('/register/waiting');
                }else if($valid->company->status == 'InsufficientData'){
                    session()->put('verif',$valid);
                    return redirect('register/profile');
                }else if($valid->company->status == 'Rejected'){
                    return "rejected page";
                    // return redirect('/login');
                }else if($valid->company->status == 'Disable'){
                    return redirect('/login');
                }else if($valid->company->status == 'Active'){
                    $this->useraccess($valid->userId);
                    session()->put('verif',$valid);
                    return redirect('/overview');
                }else{
                    return view('register.login');
                }
            }else{
                session()->put('status','Wrong Password');
                return view('register.login');
            }
        }
    }
    public function homePage(){
        if(session()->get('verif')){
            session()->put('page','overview');
            //overview zikri
            // $companyId = 1; //from auth
            // $month_booking = DB::table('book_products')->where('companyId', $companyId)->count();
            // $month_cancelled = DB::table('book_products')
            //     ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            //     ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
            //     ->where('bookingStatus', 'Cancelled')
            //     ->count();
            // $month_totalearning = DB::table('book_products')
            //     ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            //     ->sum('sellingPrice');
            // $month_netearning = DB::table('book_products')
            //     ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            //     ->sum('netPrice');
            // $upcoming = DB::table('book_products')->join('product', 'product.productId', 'book_products.productId')
            //     ->join('schedule', 'book_products.scheduleId', 'schedule.scheduleId')
            //     ->join('bookings','bookings.bookingId', 'book_products.bookingId')
            //     ->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingTransactionId')
            //     ->join('member', 'member.memberId', 'booking_transaction.memberId')
            //     ->where('book_products.endDate', '>', date('Y-m-d'))
            //     ->limit(6)
            //     ->get();
            // $best_seller = DB::table('product')->join('book_products', 'product.productId', 'book_products.productId')
            //     ->selectRaw('product.*, count(book_products.bookingId) as bookingCount')
            //     ->groupBy('book_products.productId')
            //     ->orderBy('bookingCount')
            //     ->limit(5)
            //     ->get();
            // $business_coverage = DB::table('destination')->join('product_destination', 'product_destination.destinationId', 'destination.destinationId')
            //     ->join('product', 'product.productId', 'product_destination.productId')
            //     ->where('companyId', $companyId)
            //     ->select('latitude', 'longitude')
            //     ->get();
            //     // dd($business_coverage);
            //     // dd($best_seller);
            // $year = date('Y');
            // for($i=1; $i<=12; $i++){
            //     $month = sprintf("%'02d", $i);
            //     $sales = DB::table('book_products')->where('created_at', 'like', $year.'-'.$month.'%')->count();
            //     $data_sales[$month] = $sales;
            // }
            // dd($upcoming);
            // return view('page.overview',[
            //     'month_booking' => $month_booking,
            //     'month_cancelled' => $month_cancelled,
            //     'month_totalearning' => $month_totalearning,
            //     'month_netearning' => $month_netearning,
            //     'upcoming' => $upcoming,
            //     'best_seller' => $best_seller,
            //     'business_coverage' => $business_coverage,
            //     'data_sales' => $data_sales
            // ]);
            return view('page.overview');
        }else{
            return redirect('/login');
        }
    }
    public function logout(){
        session()->flush();
        return redirect('/login');
    }
    public function resend(Request $req){
        $user = User::where('email',$req->input('email'))->first();
        Mail::to($req->input('email'))->send(new WelcomeMail($user));
        return response()->json('success', 200);
    }
    public function draft(Request $req){
        // SAVE COMPANY PROFILE
            $update = Company::where('companyId',session()->get('verif')->company->companyId);
            $update->update([
                'fullName' => $req->fullName,
                'phone' => $req->phone,
                'email' => $req->email,
                'role' => $req->role,
                'companyPhone' => $req->companyPhone,
                'companyEmail' => $req->companyEmail,
                'companyProvince' => $req->companyProvince,
                'companyCity' => $req->companyCity,
                'companyAddress' => $req->companyAddress,
                'companyPostal' => $req->companyPostal,
                'companyWeb' => $req->companyWeb,
                'companyBookSystem' => $req->bookingSystemName,
                'companyBankName' => $req->bankName,
                'companyBankAccountNumber' => $req->bankAccountNumb,
                'companyBankAccountName' => $req->bankAccountHolderName,
                'status' => 'kuration'
            ]);
        // BANk
            $bankpic = $req->file('bankPic');
            if($req->hasFile('bankPic')){
                $bankExt = $bankpic->getClientOriginalExtension();
                $bankToSave = 'bank'.time().'.'.$bankExt;
                $bank = $bankpic->move('upload/document/bankAccount',$bankToSave);
                $update->update([
                    'bankAccountScanUrl' => 'upload/document/bankAccount/'.$bankToSave
                ]);
            }
        // AKTA
            $aktaPic = $req->file('aktaPic');
            if($req->hasFile('aktaPic')){
                $aktaExt = $aktaPic->getClientOriginalExtension();
                $aktaToSave = 'akta'.time().'.'.$aktaExt;
                $akta = $aktaPic->move('upload/document/akta',$aktaToSave);
                $update->update([
                    'aktaUrl' => 'upload/document/akta/'.$aktaToSave
                ]);
            }
        // SIUP
            $SIUPPic = $req->file('SIUPPic');
            if($req->hasFile('SIUPPic')){
                $siupExt = $SIUPPic->getClientOriginalExtension();
                $siupToSave = 'siup'.time().'.'.$siupExt;
                $siup = $SIUPPic->move('upload/document/siup',$siupToSave);
                $update->update([
                    'siupUrl' => 'upload/document/siup/'.$siupToSave
                ]);
            }
        // NPWP
            $NPWPPic = $req->file('NPWPPic');
            if($req->hasFile('NPWPPic')){
                $npwpExt = $NPWPPic->getClientOriginalExtension();
                $npwpToSave = 'npwp'.time().'.'.$npwpExt;
                $npwp = $NPWPPic->move('upload/document/npwp',$npwpToSave);
                $update->update([
                    'npwpUrl' => 'upload/document/npwp/'.$npwpToSave
                ]);
            }
        // KTP
            $KTPPic = $req->file('KTPPic');
            if($req->hasFile('KTPPic')){
                $ktpExt = $KTPPic->getClientOriginalExtension();
                $ktpToSave = 'ktp'.time().'.'.$ktpExt;
                $ktp = $KTPPic->move('upload/document/ktp',$ktpToSave);
                $update->update([
                    'ktpUrl' => 'upload/document/ktp/'.$ktpToSave
                ]);
            }
        // EVIDANCE
            $evidancePic = $req->file('evidancePic');
            if($req->hasFile('evidancePic')){
                $evidanceExt = $evidancePic->getClientOriginalExtension();
                $evidanceToSave = 'evidance'.time().'.'.$evidanceExt;
                $evidance = $evidancePic->move('upload/document/evidance',$evidanceToSave);
                $update->update([
                    'evidanceUrl' => 'upload/document/evidance/'.$evidanceToSave
                ]);
            }
        //  end
        // Product
            $companyId = session()->get('verif')->company->companyId;
            $companyName = session()->get('verif')->company->companyName;
            $productCodeNow = Product::where('companyId', $companyId)->orderBy('created_at', 'desc')->first();
            if($productCodeNow == null){
                $productCode = $companyName.'-1';
            }else{
                $productCodeNow = $productCodeNow->productCode;
                dd($length = strpos($productCodeNow,"-"));
                dd($number = substr($productCodeNow, $length+1));
                $productCode = $companyName.'-'.($number+1);
            }
            if($req->cancellationType == 1){
                $cancellationType = "No Cancellation";
                $minCancellationDay = '-';
                $cancelationFee = '-';
                $cancellationDetails = '-';
            }else if($req->cancellationType == 2){
                $cancellationType = "Free Cancellation";
                $minCancellationDay = '-';
                $cancelationFee = '-';
                $cancellationDetails = '-';
            }else{
                $cancellationType = "Cancel Policy";
                $minCancellationDay = $req->minCancellationDay;
                $cancelationFee = $req->cancellationFee;
                $cancellationDetails = $req->cancellationFee;
            }
            $product = Product::create([
                'PICName' => $req->PICName,
                'PICEmail' => $req->PICEmail,
                'PICPhone' => $req->PICPhone,
                'productCode' => $productCode,
                'productName' => $req->productName,
                'productCategory' => $req->productCategory,
                'productType' => $req->productType,
                'minPerson' => $req->minPerson,
                'maxPerson' => $req->maxPerson,
                'meetingPointAddress' => $req->meetingPoint,
                'meetingPointLatitude' => $req->meetingPointLatitude,
                'meetingPointLongitude' => $req->meetingPointLongitude,
                'meetingPointNote' => $req->meetingPointNotes,
                'startSellingDate' => $req->startSellingDate,
                'endSellingDate' => $req->endSellingDate,
                'termCondition' => $req->termCondition,
                'additionalInfo' => $req->additionalInfo,
                'cancellationType' => $cancellationType,
                'minCancellationDay' => $minCancellationDay,
                'cancellationFee' => $cancelationFee,
                'cancellationDetails' => $cancellationDetails,
                'status' => 'noactive',
                'companyId' => $companyId
            ]);
        // INCLUDE
            if($req->priceIncludes != null){
                foreach($req->priceIncludes as $includes){
                    $includes = Includes::create([
                        'productId' => $product->productId,
                        'description' => $includes
                    ]);
                }
            }
        // EXCLUDE
            if($req->priceExcludes != null){
                foreach($req->priceExcludes as $excludes){
                    $excludes = Excludes::create([
                        'productId' => $product->productId,
                        'description' => $excludes
                    ]);
                }
            }
        /// DESTINATION
            if($req->destination != null){
                foreach($req->destination as $destination)
                    {
                        $destination = ProductDestination::create([
                            'productId' => $product->productId,
                            'destinationId' => $destination
                        ]);
                    }
                }
        // ACTIVITY
            if($req->activityTag != null){
                foreach($req->activityTag as $activity)
                {
                    $destination = ProductActivity::create([
                        'productId' => $product->productId,
                        'activityId' => $activity
                    ]);
                }
            }
        // SCHEDULE
            if($req->scheduleType != null){
                if($req->scheduleType == 1)
                {
                    foreach($req->schedule  as $schedule)
                    {
                        if($req->productType == 'Open')
                        {
                            $maxBooking = $req->maxPerson*$schedule['maximumGroup'];
                        }else{
                            $maxBooking = $schedule['maximumGroup'];
                        }
                        $scheduleList = Schedule::create([
                            'startDate' =>$schedule['startDate'],
                            'endDate' =>$schedule['endDate'],
                            'startHours' =>'00:00:00',
                            'endHours' =>'23:59:59',
                            'maximumGroup' =>$schedule['maximumGroup'],
                            'maximumBooking' =>$maxBooking,
                            'productId' =>$product->productId
                        ]);
                    }
                }else if($req->scheduleType == 2){
                    foreach($req->schedule as $schedule)
                    {
                        if($req->productType == 'Open')
                        {
                            $maxBooking = $req->maxPerson*$schedule['maximumGroup'];
                        }else{
                            $maxBooking = $schedule['maximumGroup'];
                        }
                        $scheduleList = Schedule::create([
                            'startDate' =>$schedule['startDate'],
                            'endDate' =>$schedule['startDate'],
                            'startHours' =>$schedule['startHours'],
                            'endHours' =>$schedule['endHours'],
                            'maximumGroup' =>$schedule['maximumGroup'],
                            'maximumBooking' =>$maxBooking,
                            'productId' =>$product->productId
                        ]);
                    }
                }else{
                    foreach($req->schedule  as $schedule)
                    {
                        if($req->productType == 'Open')
                        {
                            $maxBooking = $req->maxPerson*$schedule['maximumGroup'];
                        }else{
                            $maxBooking = $schedule['maximumGroup'];
                        }
                        $scheduleList = Schedule::create([
                            'startDate' =>$schedule['startDate'],
                            'endDate' =>$schedule['startDate'],
                            'startHours' =>'00:00',
                            'endHours' =>'23:59',
                            'maximumGroup' =>$schedule['maximumGroup'],
                            'maximumBooking' =>$maxBooking,
                            'productId' =>$product->productId
                        ]);
                    }
                }
            }
        // ITINERARY
            if($req->itinerary != null){
                foreach($req->itinerary as $itinerary){
                    foreach($itinerary['list'] as $list){
                        // if($list['activityCategory'] == 1 || $list['activityCategory'] == 4){
                        //  $destination = 1;
                        //  $activity = '';
                        // }else if($list['activityCategory'] == 2){
                        //  $destination = $list['destination'];
                        //  $activity = '';
                        // }else{
                        //  $destination = $list['destination'];
                        //  $activity = $list['activity'];
                        // }
                        $itineraryList = Itinerary::create([
                            'day' => $itinerary['day'],
                            'startTime' => $list['startTime'],
                            'endTime' => $list['endTime'],
                            'agendaCategory' => $list['activityCategory'],
                            'destinationId' => $list['destination'],
                            'agenda' => $list['activity'],
                            'description' => $list['description'],
                            'productId' => $product->productId
                        ]);
                    }
                }
            }
        // PRICE
            if($req->price != null){
                foreach($req->price as $price){
                    $priceList = Price::create([
                        'priceType' => $req->priceType,
                        'numberOfPerson' => $price['people'],
                        'priceIDR'=> str_replace(".", "",$price['IDR']),
                        'priceUSD'=> str_replace(".", "",$price['USD']),
                        'productId'=> $product->productId
                    ]);
                }
            }
        // IMAGE DESTINATION
            if($req->hasFile('image_destination')){
                $i = 0;
                foreach($req->image_destination as $file)
                {
                    $i++;
                    $fileName = 'destination'.$i.'_';
                    $fileExt = $file->getClientOriginalExtension();
                    $fileToSave = $fileName.time().'.'.$fileExt;
                    $path = $file->move('upload/image/destination',$fileToSave);

                    $picSurround = ImageDestination::create([
                        // 'fileCategory' => 'surround',
                        'url' => 'upload/image/destination/'.$fileToSave,
                        'productId' => $product->productId
                    ]);
                }
            }
        // IMAGE ACTIVITY
            if($req->hasFile('image_activities')){
                $i = 0;
                foreach($req->image_activities as $file)
                {
                    $i++;
                    $fileName = 'activity_'.$i.'_';
                    $fileExt = $file->getClientOriginalExtension();
                    $fileToSave = $fileName.time().'.'.$fileExt;
                    $path = $file->move('upload/image/activities',$fileToSave);

                    $picActivity = ImageActivity::create([
                        // 'fileCategory' => 'activity',
                        'url' => 'upload/image/activities/'.$fileToSave,
                        'productId' => $product->productId
                    ]);
                }
            }
        // IMAGE ACCOMMODATION
            if($req->hasFile('image_accommodation')){
                $i = 0;
                foreach($req->image_accommodation as $file)
                {
                    $i++;
                    $fileName = 'accommodation_'.$i.'_';
                    $fileExt = $file->getClientOriginalExtension();
                    $fileToSave = $fileName.time().'.'.$fileExt;
                    $path = $file->move('upload/image/accommodation',$fileToSave);

                    $picAccommodation = ImageAccommodation::create([
                        // 'fileCategory' => 'accommodation',
                        'url' => 'upload/image/accommodation/'.$fileToSave,
                        'productId' => $product->productId
                    ]);
                }
            }
        // IMAGE OTHER
            if($req->hasFile('image_other')){
                $i = 0;
                foreach($req->image_other as $file)
                {
                    $i++;
                    $fileName = 'other_'.$i.'_';
                    $fileExt = $file->getClientOriginalExtension();
                    $fileToSave = $fileName.time().'.'.$fileExt;
                    $path = $file->move('upload/image/other',$fileToSave);

                    $picAccommodation = ImageOther::create([
                        // 'fileCategory' => 'other',
                        'url' => 'upload/image/other/'.$fileToSave,
                        'productId' => $product->productId
                    ]);
                }
            }
        // VIDEO
            foreach($req->videoUrl as $video){
                $video = Videos::create([
                    // 'fileCategory' => 'video',
                    'url' => $video,
                    'productId' => $product->productId
                ]);
            }
        return redirect('/logout');
    }

    // FUNCTION
    public function useraccess($userid){
        $userrole = DB::table('user')->where('userId', $userid)->value('roleId');

        $usermenuaccess = DB::table('user')->join('role_activity', 'user.userId', 'role_activity.userId')
            ->where('role_activity.userId', $userid)
            ->orderBy('navbarActivityId')
            ->select('navbarActivityId', 'roleActivityStatus')
            ->get();
        session([
            'userrole' => $userrole,
            'overviewfullaccess' => $usermenuaccess[0]->roleActivityStatus,
            'productsfullaccess' => $usermenuaccess[1]->roleActivityStatus,
            'productsview' => $usermenuaccess[2]->roleActivityStatus,
            'productsupdate' => $usermenuaccess[3]->roleActivityStatus,
            'productsadd' => $usermenuaccess[4]->roleActivityStatus,
            'bookingsfullaccess' => $usermenuaccess[5]->roleActivityStatus,
            'campaignfullaccess' => $usermenuaccess[6]->roleActivityStatus,
            'campaignview' => $usermenuaccess[7]->roleActivityStatus,
            'campaignupdate' => $usermenuaccess[8]->roleActivityStatus,
            'campaignadd' => $usermenuaccess[9]->roleActivityStatus,
            'reportsfullaccess' => $usermenuaccess[10]->roleActivityStatus,
            'usersfullaccess' => $usermenuaccess[11]->roleActivityStatus,
            'usersview' => $usermenuaccess[12]->roleActivityStatus,
            'usersupdate' => $usermenuaccess[13]->roleActivityStatus,
            'usersadd' => $usermenuaccess[14]->roleActivityStatus
        ]);
    }
    // KURATION
    public function kuration($type,Request $req){
        if($type == 'approve'){
            Company::where('companyId',$req->id)->update([
                'status' => 'active'
            ]);
        }else{
            Company::where('companyId',$req->id)->update([
                'status' => 'decline'
            ]);
        }
        return response()->json('success',200);
    }
}
