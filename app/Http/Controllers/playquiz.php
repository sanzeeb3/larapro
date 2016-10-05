<?php
namespace App\Http\Controllers;

use App\quiz;
use App\Result;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

class playquiz extends Controller

{
   
  public function index()
  {
     
      $high1 = Result::where('level','1')->orderBy('Score','desc')->first();
      $high2 = Result::where('level','2')->orderBy('Score','desc')->first();
      $high3 = Result::where('level','3')->orderBy('Score','desc')->first();
      
      $ch = quiz::where('category','gk')->get();
      $cat = quiz::where('category','gk')->first();
      return View('quiz.index',['quiz'=>$ch,'cat'=>$cat,'high1'=>$high1,'high2'=>$high2,'high3'=>$high3]);
 }

  public function check(Request $request, $name, $no)
  {

	$count=0; 
	$input=$request->all();
	$mycheck=$input['mycheck'];
    $eman=$input['name'];

	$validator=Validator::make($request->all(),[
	'name'=>'required',
        ]);

	if($validator->fails()){
	return redirect('/quiz')
		->withErrors($validator);	
         }

        $stmt = quiz::where('category',$name)->where('level',$no)->get(); 

        $array=['category'=>$name,'level'=>$no];
        
        $cat = quiz::where($array)->first();  // the alternative of using two where s.
		
	foreach ($stmt as $c)
	{
 
		 if(array_key_exists($c->qid, $mycheck) && $mycheck[$c->qid]==$c->answer)
      		{
				$count=$count+1;
	 	}
	}

$imageName = $request->file('image');
if($imageName!==null)
{
      
    // get the extension
    $extension = $imageName->getClientOriginalExtension();

    // create a new file name
    $new_name = date( 'Y-m-d' ) . '-' . str_random( 10 ) . '.' . $extension;

    // move file to public/images/new and use $new_name
    $imageName->move( public_path('images'), $new_name);
}
else
{
	$new_name='image not uploaded!';
}
$addscore= Result::insert(['Name'=>$eman,'Score'=>$count,'Level'=>$no,'Category'=>$name,'Image'=>$new_name]);

        return View('quiz.check',['stmt'=>$stmt,'input'=>$input,'count'=>$count,'eman'=>$eman,'cat'=>$cat,'mycheck'=>$mycheck,'addscore'=>$addscore]);	 

}


  public function category($name)
  {
        $ch = quiz::where('category',$name)->get();
        $cat = quiz::where('category',$name)->first();

      $high1 = Result::where('level','1')->where('category',$name)->orderBy('Score','desc')->first();
      $high2 = Result::where('level','2')->orderBy('Score','desc')->first();
      $high3 = Result::where('level','3')->orderBy('Score','desc')->first();
      
        return View('quiz.index',['quiz'=>$ch,'cat'=>$cat,'high1'=>$high1,'high2'=>$high2,'high3'=>$high3]);	 


 }

public function loginform()
{
		return View('quiz.login');
}

public function contact()
{
		return View('quiz.contactform');
}

public function contactprocess(Request $request)
{
	Mail::send('quiz.email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
    {
        $message->to('sanzeeb.aryal@gmail.com', 'Admin')->subject('Subject of Feedback');
    });
}

public function register(Request $request)
{
	$input=$request->all();
	$password=Hash::make($input['password']);
	$name=$input['name'];
    $email=$input['email'];
	$insert= User::insert(['username'=>$name,'password'=>$password,'email'=>$email]);
	return redirect('/quiz/login')
			->with('message','successfully Registered.');
}

public function authenticate(Request $request)
         {
            $input=$request->all();
            $password=$input['password'];
            $email=$input['email'];

        if (Auth::attempt(['email' => $email, 'password' => $password]) )
        {   
 		
        	return redirect()->intended('/quiz/home');
        }   else 
          {
                return redirect('/quiz/login')->with('message','Not logged in again!!');
            }
        }

public function umust() 
{
    return redirect('/quiz/login')			
                ->with('message','You must login to access this category!!');

}
public function home() 
{
    return redirect('/quiz/contact')			
                ->with('message','You are logged in! Now send us a message.');

}
public function logout() 
{
    Auth::logout();   
    return redirect('/quiz/login')			
                ->with('message','Logged out!');

}	
}