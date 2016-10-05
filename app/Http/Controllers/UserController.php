<?php



namespace App\Http\Controllers;


use App\User;
use DB;
use Illuminate\Http\Request;


use App\Http\Requests;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   

  public function index()
  {
      $users = DB::select('select * from users where id=23');
    return View('users.index',['users'=>$users]);	

 }

  public function create()
  {
      return View('users.create');
  }
public function store(Request $request)
{
      $input = $request->all();
      $e = new User();

      $e->name = $input['name'];
      $e->email = $input['email'];
     
      $e->save();
}

  public function show($id)
  {
    
    $users=User::find($id);
    return View('users.show',compact('users'));
     
  }
  public function edit($id)
  {
    
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('users.index');
	}
        return View('users.edit', compact('user'));
  }

  public function update($id)
  {
   
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);
        if ($validation->passes())
        {
            $user = User::find($id);
            $user->update($input);
            return Redirect::route('users.index')
			->with('message','successfully saved.');

        }
	return Redirect::route('users.edit', $id)
          ->withInput()
            ->withErrors($validation)
            ->with('message', 'There are Validation errors.');
              
 }
  

public function destroy($id)
  {
     User::find($id)->delete();
     return Redirect::route('users.index')
			->with('message', 'Information Deleted.');

  }
  
}