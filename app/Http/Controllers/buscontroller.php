<?php

namespace App\Http\Controllers;
use App\bus;
use App\seats;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DateTime;

class buscontroller extends Controller

{
   
  public function index()
  {
	$seats=seats::all();
	$date = new \DateTime('NOW');
	$tomorrow= new \DateTime('tomorrow');
    $nextday= new \DateTime('tomorrow + 1day');
    return view('bus.busview',['mytime'=>$date,'seats'=>$seats,'nextday'=>$nextday,'tomorrow'=>$tomorrow]);
  
}

  public function book(Request $request)
  {
	$name=$request->get('name');
	$contact=$request->get('contact');
	$check=$request->get('check');

	$checkarray = serialize($check);

	$select=$request->get('select');
	
	$totalcheckboxchecked=sizeof('$check');	
for($i=0;$i<=$totalcheckboxchecked;$i++)
{
	if (array_key_exists($i,$check) )
{   
    $booked=$check[$i];
    seats::where('book',$booked)->update(['available'=>'0']);	
}

	$book=bus::insert(['name'=>$name,'contact'=>$contact, 'booked_seats'=>$checkarray, 'active'=>'1','booked_for'=>$select]);
 }
		return redirect('/bus')
			->with('message','booked successfully!!!');

}
}