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
use App\ProductActivity;
use App\Itinerary;
use App\Destination;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use App\ProductDestination;
use App\Mail\WelcomeMail;
use App\Mail\ConfirmMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Hash;
use DB;

class ProductController extends Controller
{
	public function productView(){
		// dd(session()->get('verif')->company->companyId);
		$destination = DB::table('destination')->get();
		$product = Product::with('image_destination')
			->where('companyId',session()->get('verif')->company->companyId)
			->get();
		// $product = DB::table('product')
		// 	->leftjoin('product_destination', 'product.productId', 'product_destination.productId')
		// 	->join('destination', 'destination.destinationId', 'product_destination.destinationId')
		// 	->select('product.*')
		// 	->groupBy('productId')
		// 	->get();
		return view('page.product', [
			'destination' => $destination,
			'product' => $product]);
	}
	public function addProductView(){
		return view('page.addProduct');
	}
	public function index()
	{
		// $data = Product::with([
		// 	''
		// ])->get();
		return $response->json($data, 200);
	}
	
	public function save(Request $req){
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

		return redirect('/products')->with('Message','New product added');
	}

	public function detail($id){
		$product = Product::with(
			'prices',
            'image_destination',
            'image_activity',
            'image_accommodation',
            'image_other',
            'videos',
            'itineraries',
            'schedules',
			'destinations',
			'destinations.province',
			'destinations.city',
			'destinations.dest',
            'activities',
            'includes',
            'excludes'
			)
			->where('productId',$id)
			->first();
		$province = Province::all();
		$city = City::all();
		$destination = ProductDestination::all();
		// dd($product);
		// DAY
		$startDate = strtotime($product->schedules[0]->startDate);
		$endDate = strtotime($product->schedules[0]->endDate);
		// HOUR
		$startTime = strtotime($product->schedules[0]->startHours);
		$endTime = strtotime($product->schedules[0]->endHours);

		$day = round(($endDate - $startDate)/(60 * 60 * 24));
		$hours = floor(($endTime - $startTime)/(60 * 60));
		$minutes = (($endTime - $startTime)/60)%60;
		$pushToBlade = [
			'product'=>$product,
			'product2'=>  new ProductDestination,
			'provinces'=> $province,
			'cities'=>$city,
			'cities2'=> new City,
			'destinations'=>$destination,
			'destination2' => new Destination,
			'day' => $day,
			'hours' => $hours,
			'minutes' => $minutes
		];
		// dd($pushToBlade);
		
		return view('page.productdetail1',$pushToBlade);
	}

	public function edit($id){

		// $product = DB::table('product')
		// 	->leftjoin('product_destination', 'product.productId', 'product_destination.productId')
		// 	->join('destination', 'destination.destinationId', 'product_destination.destinationId')
		// 	->where('product.productId', $id)
		// 	->first();
		// $itinerary = DB::table('itinerary')
		// 	->leftjoin('destination', 'itinerary.destinationId', 'destination.destinationId')
		// 	->where('productId', $id)
		// 	->orderBy('day', 'asc')
		// 	->get();
		// $days = DB::table('itinerary')
		// 	->where('productId', $id)
		// 	->max('day');
		// $pricetype = DB::table('price')
		// 	->where('productId', $id)
		// 	->first();
		// $price = DB::table('price')
		// 	->where('productId', $id)
		// 	->get();
		// $itinerarycount = DB::table('itinerary')
		// 	->where('productId', $id)
		// 	->selectRaw('itinerary.day, count(itinerary.day) as iCount')
		// 	->groupBy('itinerary.day')
		// 	->get();
		// $days = DB::table('itinerary')
		// 	->where('productId', $id)
		// 	->max('day');
		// $pricetype = DB::table('price')
		// 	->where('productId', $id)
		// 	->first();
		// $price = DB::table('price')
		// 	->where('productId', $id)
		// 	->get();
		// $pricecount = DB::table('price')
		// 	->where('productId', $id)
		// 	->count();
		// $priceincludes = DB::table('includes')->where('productId',$id)->get();
		// $picount = count($priceincludes);
		// $priceexcludes = DB::table('excludes')->where('productId',$id)->get();
		// $pecount = count($priceexcludes);
		// $schedule = DB::table('schedule')
		// 	->where('schedule.productId', $id)
		// 	->get();

		// $countschedule = count($schedule);
		// $checkschedule = DB::table('schedule')
		// 	->where('schedule.productId', $id)
		// 	->first();
		// $typeschedule="";
		// $countdayschedule="";
		// $startDate = Carbon::parse($checkschedule->startDate);
		// $endDate = Carbon::parse($checkschedule->endDate);
		// $startHours = Carbon::parse($checkschedule->startHours);
		// $endHours = Carbon::parse($checkschedule->endHours);
		// if($endDate->diffInDays($startDate) > 0){
		// 	$typeschedule = "Multiple days";
		// 	$countdayschedule = $endDate->diffInDays($startDate)+1;
		// }
		// else if($endDate->diffInDays($startDate) == 0){
		// 	if($endHours->diffInHours($startHours) >= 23 ){
		// 		$typeschedule = "One day full";
		// 	}
		// 	else{
		// 		$typeschedule = "A couple of hours";
		// 	}
		// }
		// $booking = DB::table('book_products')
		// 	->join('schedule', 'schedule.productId', 'book_products.productId')
		// 	->join('bookings', 'bookings.bookingId', 'book_products.bookingId')
		// 	->join('booking_transaction', 'booking_transaction.bookingTransactionId', 'bookings.bookingtransactionId')
		// 	->join('user', 'user.userId', 'booking_transaction.memberId')
		// 	->where('schedule.productId', $id)
		// 	->select('book_products.bookingId', 'book_products.created_at', 'book_products.productId',  'user.fullName')
		// 	->get();
		// $destination = DB::table('destination')
		// 	->join('product_destination', 'destination.destinationId', 'product_destination.destinationId')
		// 	->leftjoin('product', 'product.productId', 'product_destination.productId')
		// 	->where('product.productId', $id)
		// 	->get();

		// $countdestination = DB::table('destination')
		// 	->join('product_destination', 'product_destination.destinationId', 'destination.destinationId')
		// 	->where('productId', $id)
		// 	->count();
		// $file = DB::table('file')
		// 	->where('productId', $id)
		// 	->get();

		// $activity = DB::table('product_activity')
		// 	->join('activity', 'product_activity.activityId', 'activity.activityId')
		// 	->where('productId', $id)
		// 	->select('activity.*')
		// 	->get();
		// return view('page.productedit', [
		// 	'product' => $product,
		// 	'itinerary' => $itinerary,
		// 	'itinerarycount' => $itinerarycount,
		// 	'days'=> $days,
		// 	'pricetype' => $pricetype,
		// 	'price' => $price,
		// 	'pricecount' => $pricecount,
		// 	'priceincludes' =>$priceincludes,
		// 	'picount' =>$picount,
		// 	'priceexcludes' =>$priceexcludes,
		// 	'pecount' =>$pecount,
		// 	'schedule' =>$schedule,
		// 	'countschedule' =>$countschedule,
		// 	'typeschedule' =>$typeschedule,
		// 	'countdayschedule' =>$countdayschedule,
		// 	'booking' =>$booking,
		// 	'destination' =>$destination,
		// 	'countdestination' =>$countdestination,
		// 	'activity' => $activity,
		// 	'file' => $file]);
		$product = Product::with(
			'prices',
            'image_destination',
            'image_activity',
            'image_accommodation',
            'image_other',
            'videos',
            'itineraries',
            'schedules',
			'destinations',
			'destinations.province',
			'destinations.city',
			'destinations.destination',
            'activities',
            'includes',
            'excludes'
			)
			->where('productId',$id)
			->first();
		$province = Province::all();
		$city = City::all();
		$destination = ProductDestination::all();
		dd($product);
		return view('page.productedit1',['product'=>$product,'provinces'=> $province,'cities'=>$city,'destinations'=>$destination]);
	}

	public function update(Request $request){
		// dd($request->all());
		// PRODUCT UPDATE
		DB::table('product')
			->where('productId', $request["productId"])
			->update([
				'productCategory' => $request["productCategory"],
				'productCode' => $request["productCode"],
				'productName' => $request["productName"],
				'minPerson' => $request["minPerson"],
				'maxPerson' => $request["maxPerson"],
				'meetingPointAddress' => $request["meetingPoint"]["address"],
				'meetingPointLatitude' => $request["meetingPoint"]["latitude"],
				'meetingPointLongitude' => $request["meetingPoint"]["longitude"],
				'startSellingDate' => date('Y-m-d', strtotime($request["startSellingDate"])),
				'endSellingDate' => date('Y-m-d', strtotime($request["endSellingDate"])),
				'termCondition' => $request["termCondition"],
				'additionalInfo' => $request["additionalInfo"]
			]);

		// INCLUDE
		if($request->priceIncludes != null){
			dd(Includes::where('productId',$request->productId)->delete());
			foreach($request->priceIncludes as $includes){
				$includes = Includes::create([
					'productId' => $request->productId,
					'description' => $includes
				]);
			}
		}
		// EXCLUDE
		if($request->priceExcludes != null){
			Excludes::where('productId',$request->productId)->delete();
			foreach($request->priceExcludes as $excludes){
				$excludes = Excludes::create([
					'productId' => $request->productId,
					'description' => $excludes
				]);
			}
		}
		/// DESTINATION
		if($request->destination != null){
			ProductDestination::where('productId',$request->productId)->delete();
			dd($request->destination);
			foreach($request->destination as $destination){
				$destination = ProductDestination::create([
					'productId' => $request->productId,
					'destinationId' => $destination
				]);
			}
		}
		// ACTIVITY
		if($request->activityTag != null){
			ProductActivity::where('productId',$request->productId)->delete();
			foreach($request->activityTag as $activity){
				$destination = ProductActivity::create([
					'productId' => $request->productId,
					'activityId' => $activity
				]);
			}
		}
		if($request["cancellation"]["type"]==3){
			DB::table('product')
			->where('productId', $request["productId"])
			->update([
				'cancellationType' => $request["cancellation"]["type"],
				'minCancellationDay' => $request["cancellation"]["minDay"],
				'cancellationFee' => $request["cancellation"]["fee"],
				'cancellationDetails' => $request["cancellation"]["details"]
			]);
		}
		else{
			DB::table('product')
			->where('productId', $request["productId"])
			->update([
				'cancellationType' => $request["cancellation"]["type"],
				'minCancellationDay' => '',
				'cancellationFee' => '',
				'cancellationDetails' => ''
			]);
		}

		$deletedestination = DB::table('product_destination')
			->where('product_destination.productId', $request["productId"])
			->delete();
		foreach($request["destination"] as $destination){
			$insertdestination = DB::table('product_destination')
				->insert([
					'productId'=>$request["productId"],
					'destinationId' =>$destination
				]);
		};


		foreach($request["itinerary"] as $i){
			$day = $i["day"];
			foreach($i["list"] as $list){
				// dd($list);
				if($list["itineraryId"]!=NULL || $list["itineraryId"]!=""){
					DB::table('itinerary')->where('productId', $request["productId"])
						->where('itineraryId', $list["itineraryId"])
						->update([
							'day' => $day,
							'startTime' => $list["startTime"],
							'endTime' => $list["endTime"],
							'agendaCategory' => $list["activityCategory"],
							'destinationId' => $list["destination"],
							'agenda' => $list["activity"],
							'description' => $list["description"]
						]);
				}
				else{
					DB::table('itinerary')->insert([
						'day' => $day,
						'startTime' => $list["startTime"],
						'endTime' => $list["endTime"],
						'agendaCategory' => $list["activityCategory"],
						'destinationId' => $list["destination"],
						'agenda' => $list["activity"],
						'description' => $list["description"]
					]);
				}
			}
		};

		foreach($request["itinerary"] as $i){
			$day = $i["day"];
			foreach($i["list"] as $list){
				// dd($list);
				if($list["itineraryId"]!=NULL || $list["itineraryId"]!=""){
					DB::table('itinerary')->where('productId', $request["productId"])
						->where('itineraryId', $list["itineraryId"])
						->update([
							'day' => $day,
							'startTime' => $list["startTime"],
							'endTime' => $list["endTime"],
							'agendaCategory' => $list["activityCategory"],
							'destinationId' => $list["destination"],
							'agenda' => $list["activity"],
							'description' => $list["description"]
						]);
				}
				else{
					DB::table('itinerary')->insert([
						'day' => $day,
						'startTime' => $list["startTime"],
						'endTime' => $list["endTime"],
						'agendaCategory' => $list["activityCategory"],
						'destinationId' => $list["destination"],
						'agenda' => $list["activity"],
						'description' => $list["description"],
						'productId' => $request["productId"]
					]);
				}
			}
		};

		foreach($request["schedule"] as $schedule){
			dd($schedule);
			if($schedule["scheduleId"] != NULL || $schedule["scheduleId"] != ""){
				DB::table('schedule')->where('productId', $request["productId"])
					->where('scheduleId', $schedule["scheduleId"])
					->update([
						'startDate' => $schedule["startDate"],
						'endDate' => $schedule["endDate"],
						'startHours' => $schedule["startHours"],
						'endHours' => $schedule["endHours"],
						'maximumBooking' => ($schedule["maximumGroup"]*$request["maxPerson"]),
						'maximumGroup' => $schedule["maximumGroup"]
					]);
			}
			else{
				DB::table('schedule')->insert([
						'startDate' => $schedule["startDate"],
						'endDate' => $schedule["endDate"],
						'startHours' => $schedule["startHours"],
						'endHours' => $schedule["endHours"],
						'maximumBooking' => ($schedule["maximumGroup"]*$request["maxPerson"]),
						'maximumGroup' => $schedule["maximumGroup"],
						'productId' => $request["productId"]
					]);
			}
		}
	}
	// TEST
	public function update1(Request $req){
		// $companyId = session()->get('verif')->company->companyId;
        // $productCodeNow = Product::where('companyId', $companyId)->orderBy('created_at', 'desc')->first();
        // if($productCodeNow == null){
        //     $productCode = '101-'.$companyId.'1';
        // }else{
        //     $productCodeNow = $productCodeNow->productCode;
        //     $number = substr($productCodeNow, 5);
        //     $productCode = '101-'.$companyId.($number+1);
		// }
		// dd($req->all());
        if($req->cancellationType == 1){
            $cancellationType = "No Cancellation";
            $minCancellationDay = '-';
            $cancelationFee = '-';
        }else if($req->cancellationType == 2){
            $cancellationType = "Free Cancellation";
            $minCancellationDay = '-';
            $cancelationFee = '-';
        }else{
            $cancellationType = "Cancel Policy";
            $minCancellationDay = $req->minCancellationDay;
            $cancelationFee = $req->cancellationFee;
        }
		$product = Product::where('productId',$req->productId)
		->update([
            'PICName' => $req->PICName,
            'PICPhone' => $req->formatPIC.'-'.$req->PICPhone,
            'productName' => $req->productName,
            'productCategory' => $req->productCategory,
            'productType' => $req->productType,
            'minPerson' => $req->minPerson,
            'maxPerson' => $req->maxPerson,
            'meetingPointAddress' => $req->meetingPoint,
            'meetingPointLatitude' => $req->meetingPointLatitude,
            'meetingPointLongitude' => $req->meetingPointLongitude,
            'meetingPointNote' => $req->meetingPointNotes,
            'termCondition' => $req->termCondition,
            'cancellationType' => $cancellationType,
            'minCancellationDay' => $minCancellationDay,
            'cancellationFee' => $cancelationFee,
            'status' => 'noactive'
        ]);
        // INCLUDE
        if($req->priceIncludes != null){
			Includes::where('productId',$req->productId)->delete();
            foreach($req->priceIncludes as $includes){
                $includes = Includes::create([
                    'productId' => $req->productId,
                    'description' => $includes
                ]);
            }
        }
        // EXCLUDE
        if($req->priceExcludes != null){
			Excludes::where('productId',$req->productId)->delete();
            foreach($req->priceExcludes as $excludes){
                $excludes = Excludes::create([
                    'productId' => $req->productId,
                    'description' => $excludes
                ]);
            }
        }
        /// DESTINATION
        if($req->place != null){
			ProductDestination::where('productId',$req->productId)->delete();
            foreach($req->place as $place){
                // using this if destination still null
                if(array_key_exists('destination',$place)){
                    $destination = $place['destination'];
                }else{
                    $destination = null;
                }
                //
                $destination = ProductDestination::create([
                    'productId' => $req->productId,
                    'provinceId' =>$place['province'],
                    'cityId' => $place['city'],
                    'destinationId' => $destination
                    // 'destinationId' => $place['destination']
                ]);
            }
        }
        // ACTIVITY
        if($req->activityTag != null){
			ProductActivity::where('productId',$req->productId)->delete();
            foreach($req->activityTag as $activity)
            {
                $destination = ProductActivity::create([
                    'productId' => $req->productId,
                    'activityId' => $activity
                ]);
            }
        }
        // SCHEDULE
		if($req->scheduleType == 1){
            if($req->schedule != null){
				Schedule::where('productId',$req->productId)->delete();
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
                        'productId' =>$req->productId
                    ]);
                }
            }
        }else if($req->scheduleType == 2){
            if($req->schedule != null){
				Schedule::where('productId',$req->productId)->delete();
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
                        'productId' =>$req->productId
                    ]);
                }
            }
        }else{
            if($req->schedule != null){
				Schedule::where('productId',$req->productId)->delete();
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
                        'productId' =>$req->productId
                    ]);
                }
            }
        }
        // ITINERARY
        if($req->itinerary != null){
			Itinerary::where('productId',$req->productId)->delete();
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
                        'productId' => $req->productId
                    ]);
                }
            }
        }
        // PRICE
        // dd($req->price);
        if(count($req->price) != 0){
			Price::where('productId',$req->productId)->delete();
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
                    'productId'=> $req->productId
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
                    'productId' => $req->productId
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
                    'productId' => $req->productId
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
                    'productId' => $req->productId
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
                    'productId' => $req->productId
                ]);
            }
        }
        // VIDEO
        foreach($req->videoUrl as $video){
            $video = Videos::create([
                'fileCategory' => 'video',
                'url' => $video,
                'productId' => $req->productId
            ]);
        }

		return redirect()->back();
	}

	public function dataproduct(Request $request){
		$datasearch = $request->all();
		// $product_category="tour";
		// $product_type = "";
		$product = DB::table('product')
			->leftjoin('product_destination', 'product.productId', 'product_destination.productId')
			->join('destination', 'destination.destinationId', 'product_destination.destinationId')
			->where('productName', 'like', '%'.$datasearch["product_name"].'%')
			->where('productCategory', 'like', '%'.$datasearch["product_category"].'%')
			->where('productType', 'like', '%'.$datasearch["product_type"].'%')
			->where('destination.destination', 'like', '%'.$datasearch["product_destination"].'%')
			->where('productActive', 'like', '%'.$datasearch["product_status"].'%')
			->orderBy('product.created_at', ''.$datasearch["product_sort"].'')
			->select('product.*')
			->groupBy('productId')
			// ->where('productCategory', 'like', '%'.$product_category.'%')
			// ->where('productType', 'like', '%'.$product_type.'%')
			->get();
		$html="";
		$card="";

		foreach($product as $p){
			$active ="";
			if($p->productActive == 1){
				$active = "Active";
			}
			else{
				$active = "Disable";
			}
			$card =
				'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="card rounded">
							<a href="'.url('products/detail').'/'.$p->productId.'" data-sub-html="Demo Description">
								<img class="img-responsive img-rounded" src="../../images/Page.png">
							</a>
						<div class="body">
							<h4>'.$p->productName.'</h4>
							<span>'.$p->productCategory.' - '.$p->productType.'</span>
							<br><br>

							<div class="card-footer bg-transparent border-success">
								<div class="alignleft">Booked:</div>
								<div class="alignright">Product Status:</div>
								<br>
								<h4 class="alignleft">20 Times</h4>
								<h4 class="alignright fontgreen">'.$active.'</h4>
							</div>
							<br><br>
						</div>
					</div>
				</div>';
				$html=$html.$card;
		}
		return $html;
	}

	public function disabled($id){
		DB::table('product')->where('productId', $id)
			->update([
			'productActive' => 0
		]);
	}

	public function enabled($id){
		DB::table('product')->where('productId', $id)
			->update([
			'productActive' => 1
		]);
	}

	public function deletefile($id){
		$delete = DB::table('file')->where('fileId', $id)->delete();
		return redirect()->back();
	}

	public function remove($id){
		DB::table('product')->where('productId', $id)
			->delete();
			return redirect('/products');
	}
}
