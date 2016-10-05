<?php

namespace App\Http\Controllers;
use App\Crud;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Crudcontroller extends Controller
{
	public function index()
  	{
		$display=Crud::all();
		if($display)
		{	
        	return view('crud.index',['display'=>$display]);	
        }
	}

	public function addform()
  	{
        return view('crud.add');	
	}

	public function edit($name)
  	{
	  	$edit=Crud::where('name',$name)->first();
    	if($edit)
    	{
    		return view('crud.edit',['edit'=>$edit]);
    	}
    	else
    	{
    		abort(403, 'Unauthorized action.');
    	}
	}

	public function addnow(Request $request)
  	{
  		if($request->ajax())
  		{
			$name=$request->get('name');
			$address=$request->get('address');
			$contact=$request->get('contact');
			$class=$request->get('class');
			$image=$request->get('uploadedimage');

			if(!empty($name) || !empty($address) || !empty($contact) || !empty($class))
			{
  				Crud::insert(['name'=>$name,'address'=>$address,'phone'=>$contact,'class'=>$class,'image'=>$image]);
				echo json_encode(TRUE);die;
			}
  		}
		echo json_encode(FALSE);die;
  	}

	public function update(Request $request)
  	{
  		if($request->ajax())
  		{
  			$id=$request->get('id');
			$name=$request->get('name');
			$address=$request->get('address');
			$contact=$request->get('contact');
			$class=$request->get('class');

			if(!empty($name) || !empty($address) || !empty($contact) || !empty($class))
			{
  				Crud::where('id',$id)->update(['name'=>$name,'address'=>$address,'phone'=>$contact,'class'=>$class]);
				echo json_encode(TRUE);die;
			}
  		}
		echo json_encode(FALSE);die;
  	}

	public function delete(Request $request)
  	{
  		if($request->ajax())
  		{
			$id=$request->get('id');
			if($id)
			{
				$delete=Crud::where('id',$id)->first();
				$imgfile="C:/xampp/htdocs/larapro/public/newuploads/{$delete->image}";
				if($imgfile)
				{
					unlink($imgfile);
				}
				$delete->delete();
				echo json_encode(TRUE);die;
			}
  		}
		echo json_encode(FALSE);die;
  	}

	public function show(Request $request)
  	{
  		if($request->ajax())
  		{
			$id=$request->get('id');
			if($id)
			{
				$show=CRUD::where(['id'=>$id])->first();				
	    		echo json_encode(array('status' => TRUE,  'show'=>$show)); die;
			}
  		}
		echo json_encode(FALSE);die;
  	}

  	public function uploadimage()
    {
        $target_dir = 'C:\xampp\htdocs\larapro\public\newuploads';
        $tmpname = $_FILES["image"]["tmp_name"];
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file= $target_dir.DIRECTORY_SEPARATOR.basename($newfilename);
        if(move_uploaded_file($tmpname, $target_file)){
            echo json_encode($newfilename);die;
        }
        else
        {
            echo json_encode(false);die;
        }
    }

    public function loginform()
	{
		return View('crud.login');
	}

	public function register(Request $request)
	{
		$password=Hash::make($request->get('password'));
		$name=$request->get('name');
    	$email=$request->get('email');
    	$token = str_shuffle('abcdefgh1234567890xsY');
		$insert= User::insert(['username'=>$name,'password'=>$password,'email'=>$email,'status'=>0,'remember_token'=>$token]);
		
		return '/crud/verify/'.$name.'/'.$token;

	}

	public function verify($username, $token)
	{ 			
		$getModel=User::where(['username'=>$username])->first();			
		if($getModel->remember_token==$token)
		{
			$getModel->status=1;
			$getModel->update();
			return redirect('/crud/login')->with('message','Email verified!!');	
		}
		else
		{
			return redirect('/crud/login')->with('message','Email verification failed. Token mismatch!');	
		}
	}

	public function authenticate(Request $request)
    {
    	$password=$request->get('password');
        $email=$request->get('email');
        if (Auth::attempt(['email' => $email, 'password' => $password,'status'=>1]) )
        {     
   	    	return redirect()->intended('/crud');   
        }
        else 
        {
            return redirect('/login')->with('message','Invalid email or password!!');
        }
   		
    }

    public function forgot()
	{
		return View('crud.forgot');
	}

	public function token(Request $request)
	{
		$token = str_shuffle('abcdefgh1234567890xsY');
		$getEmail=$request->get('email');
		$getModel=User::where(['email'=>$getEmail])->first();
			
		if($getModel)
		{
			$getModel->remember_token=$token;
			$getModel->update();

			return '/crud/reset/'.$getModel->username.'/'.$token;
		}
		else
		{
            return redirect('/login')->with('message','Email doesnot exist!');
		}
		
		}

    public function reset($username, $token)
	{ 			
		$getModel=User::where(['username'=>$username])->first();			
		if($getModel->remember_token==$token)
		{
				return View('crud.change', ['id' =>$getModel->id]);	
		}
		else
		{
			return redirect('/crud/forgot');	
		}
	}

	public function change(Request $request)
	{ 
		$getid=$request->get('id');
		$getModel=User::where(['id'=>$getid])->first();
		$password=Hash::make($request->get('password'));
		$getModel->password=$password;
		$getModel->update();
		return redirect('/crud/login')	
                ->with('message','Password changed!');
	}

	public function checkemail(Request $request)
	{
		if($request->ajax())
		{
			$check=User::where(['email'=>$_POST['email']])->first();
			if(!$check)
			{
				echo json_encode(TRUE);die;
			}

			echo json_encode(FALSE);die;
		}	
	}

	public function logout() 
	{
   	 	Auth::logout();   
    	return redirect('/login')			
                ->with('message','Logged out!');
    }
}
//here is the comment
