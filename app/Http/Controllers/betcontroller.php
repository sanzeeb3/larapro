<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DateTime;

class betcontroller extends Controller

{
	
  public function index()
  {

      return view('bus.betview');
}

  public function now(Request $request)
  {
		$name=$request->get('name');
	    $contact=$request->get('contact');
		$champions=$request->get('champions');
		$derby=$request->get('derby');
				
		if($champions)
		{
		$city=$request->get('city');
		$manu=$request->get('manu');
		$arsenal=$request->get('arsenal');
		$chelsea=$request->get('chelsea');
		$total=$city+$manu+$chelsea+$arsenal;
		$count=$city*4+$manu*3+$chelsea*2+$arsenal*5;
		 return redirect('/bet')
				->with ('message'," Hello $name. You bet a total of Rs. $total and you will get Rs.$count if you were correct on your prediction.");
		
		}
		
else if($derby)
{
	$mci23mun=$request->get('mci23mun');	
	$mci10mun=$request->get('mci10mun');
	$mci20mun=$request->get('mci20mun');
	$ot=$request->get('others');
	$total=$mci23mun+$mci10mun+$mci20mun+$ot;
	$count=$ot*2+$mci20mun*4.5+$mci10mun*3+$mci23mun*5;
			    return redirect('/bet')
				->with ('message'," Hello $name. You bet a total of   Rs.$total  and you will get Rs.$count if you were correct.");
}

else
{
	return redirect('/bet')
				->with ('message'," Bet some money on!");
}
  }
}
