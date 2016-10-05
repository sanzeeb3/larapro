<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Http\Requests;


class portfolio extends Controller

{
    

public function index()
{
	return view('portfolio.index');
}

public function portfolio()
{
	return view('portfolio.portfolio');
}

public function articles()
{
	return view('portfolio.articles');
}

public function contact()
{
	return view('portfolio.contact');
}


}
