<?php

namespace App\Http\Controllers;

use App\review;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DateTime;
use DB;

class reviewcontroller extends Controller

{
   
  public function index()
  {
		$show=review::orderBy('score','desc')->get();
        return view('bus.review',['show'=>$show]);
}
 public function now(Request $request)
  {
        $name=$request->get('name');
	    $email=$request->get('email');
		$comment=$request->get('comment');
		$addreview= review::insert(['name'=>$name,'email'=>$email,'comment'=>$comment]);	
   	   return redirect('/review')
		->with('message','your comment has been published.' );
 
      
}
public function nowadd(Request $request,$id)
  {
		$add=review::where('id',$id)->first();
		$count=$add->score;
		$plus=$request->get('plus');
		$minus=$request->get('minus');
		if($plus)
		{		$now=$count+1;
		}
		else if($minus)
		{
			$now=$count-1;
		}
		$nowadd= review::where('id',$id)->update(['score'=>$now]);	
	    return redirect('/review')
		->with('message','your have responded to the comment.' );      
}
}