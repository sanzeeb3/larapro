<?php

namespace App\Http\Controllers;
use App\telephone;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use DateTime;

class telephonecontroller extends Controller
{
   
 	public function index()
  	{
		$mostviewed=telephone::orderBy('views','desc')->limit(10)->get();
		$lists=telephone::orderBy('name')->simplePaginate(10);
	    $i = $lists->perPage() * ($lists->currentPage()-1);
		return view('telephone.telephoneview',['lists'=>$lists,'mostviewed'=>$mostviewed,'i'=>$i]);
	}

	public function addview()
  	{
	
		$mostviewed=telephone::orderBy('views','desc')->limit(10)->get();	
        return view('telephone.addview',['mostviewed'=>$mostviewed]);
	}

 	public function addnow(Request $request)
  	{
		$validator=Validator::make($request->all(),[
		'name'=>'required',
		'telephone'=>'regex:/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/|required|unique:telephone',
		'mobile'=>'regex:/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/|unique:telephone',
    	'email'=>'unique:telephone',
		'altemail'=>'unique:telephone',
    	'image'=>'image',
		'company_email'=>'unique:telephone',
		'company_phone_primary'=>'regex:/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/|unique:telephone',
		'company_phone_secondary'=>'regex:/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/|unique:telephone',
 		]);

		if($validator->fails())
		{
			return redirect('/telephone/addview')
			->withErrors($validator);	
        }
		 
		$name=$request->get('name');
		$address=$request->get('address');
		$telephone=$request->get('telephone');
		$mobile=$request->get('mobile');
		$email=$request->get('email');
		$altemail=$request->get('altemail');
		$cname=$request->get('company_name');
		$caddress=$request->get('company_address');
		$ctelephone=$request->get('company_phone_primary');
		$ctelephone2=$request->get('company_phone_secondary');

		$cemail=$request->get('compay_email');
		$imageName = $request->file('image');
		
		if($imageName!==null)
		{
      
    		$extension = $imageName->getClientOriginalExtension();
    		$new_name = date( 'Y-m-d' ) . '-' . str_random( 10 ) . '.' . $extension;
	   		$imageName->move( public_path('images'), $new_name);
		}
		else
		{
			$new_name='default.png';
		}

		telephone::insert(['Name'=>$name,'Address'=>$address,'Mobile'=>$mobile,'Telephone'=>$telephone,'Mobile'=>$mobile,'Email'=>$email,'altemail'=>$altemail,'company_name'=>$cname,'company_address'=>$caddress,'company_phone_primary'=>$ctelephone,'company_phone_secondary'=>$ctelephone2,'company_address'=>$caddress,'Image'=>$new_name,'company_email'=>$cemail]);
		
		return redirect('/telephone')
				->with('message','Records Successfully Inserted!');
        
	}

  	public function search(Request $request)
  	{
		
		$mostviewed=telephone::orderBy('views','desc')->limit(10)->get();
		$name=$request->get('search');
		$search=telephone::where('Name','like',$name)
      		               ->orWhere('Telephone','like',"$name%")
      		               ->orWhere('Name','like',"$name%")
      		               ->orWhere('Telephone','like',"$name")
						   ->simplePaginate(10);
		
	    $i = $search->perPage() * ($search->currentPage()-1);						
	    return view('telephone.searchview',['search'=>$search,'mostviewed'=>$mostviewed,'i'=>$i]);
	}

	public function delete($id)
  	{
		
		telephone::where('id',$id)->delete();				
	    return redirect('/telephone')
			->with('message','Recored deleted!');
	}

	public function edit($id)
  	{
	  	$mostviewed=telephone::orderBy('views','desc')->limit(10)->get();
	    $edit=telephone::where('id',$id)->first();
	    return View('telephone.edit',['edit'=>$edit,'mostviewed'=>$mostviewed]);
	}

	public function update(Request $request, $id)
  	{
		 		
		$validator=Validator::make($request->all(),[
    	'image'=>'image',
		'name'=>'required',
		'telephone'=>'regex:/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/|required|unique:telephone,telephone,'.$id,
    	'mobile'=>'regex:/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/|unique:telephone,mobile,'.$id,
		'email'=>'unique:telephone,email,'.$id,
		'altemail'=>'unique:telephone,altemail,'.$id,
		'company_email'=>'unique:telephone,company_email,'.$id,
		'company_phone_primary'=>'regex:/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/|unique:telephone,company_phone_primary,'.$id,
		'company_phone_secondary'=>'regex:/^[+#*\(\)\[\]]*([0-9][ ext+-pw#*\(\)\[\]]*){6,45}$/|unique:telephone,company_phone_secondary,'.$id,
		]);
	
		if($validator->fails())
		{
			return redirect("/telephone/edit/{$id}")
		    ->withErrors($validator);	
        }
		 
	    $name=$request->get('name');
		$address=$request->get('address');
		$telephone=$request->get('telephone');
		$mobile=$request->get('mobile');
		$email=$request->get('email');
		$altemail=$request->get('altemail');
		$cname=$request->get('company_name');
		$caddress=$request->get('company_address');
		$ctelephone=$request->get('company_phone_primary');
		$ctelephone2=$request->get('company_phone_secondary');
		$cemail=$request->get('company_email');
		$imageName = $request->file('image');
		
		$oth=telephone::where('id',$id)->first();
		if($imageName!==null)
		{
      
  			$extension = $imageName->getClientOriginalExtension();
    		$new_name = date( 'Y-m-d' ) . '-' . str_random( 10 ) . '.' . $extension;
    		$imageName->move( public_path('images'), $new_name);
		}
		else
		{
			$new_name=$oth->Image;
		}
	 
	  	$edit=telephone::where('id',$id)
                       ->update(['Name'=>$name,'Address'=>$address,'Mobile'=>$mobile,'Telephone'=>$telephone,'Mobile'=>$mobile,'Email'=>$email,'altemail'=>$altemail,'company_name'=>$cname,'company_address'=>$caddress,'company_phone_primary'=>$ctelephone,'company_phone_secondary'=>$ctelephone2,'company_address'=>$caddress,'company_email'=>$cemail,'Image'=>$new_name]);

					   return redirect('/telephone')
					   ->with ('message','Successfully Edited!');
	}


	public function show($id)
  	{
		$mostviewed=telephone::orderBy('views','desc')->limit(10)->get();
		$show=telephone::where('id',$id)->first();			
	    $count=$show->views;
		$add=$count+1;
		telephone::where('id',$id)->update(['views'=>$add]);
		return View('telephone.show',['show'=>$show,'mostviewed'=>$mostviewed]);
	}
}