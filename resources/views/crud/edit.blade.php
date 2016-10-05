@extends('crud.main')
@section('content')       

<div class="container">
	<div class="row">
		<div class="col-sm-4">
   			<form class="formclass" method="POST" action="{{url('/crud/update')}}" role="form"  id="register-form">                 
            	<label>Name:</label><input type="name" id="name" value="<?php echo $edit->name;?>" name="name" class="form-control" ><br><br>
            	<label>Contact:</label><input type="text" id="contact" name="contact" value="<?php echo $edit->phone;?>"  class="form-control" ><br><br>
            	<label>Address:</label><input type="text" id="address" name="address" value="<?php echo $edit->address;?>" class="form-control" ><br><br>
            	<label>Class:</label><input type="text" id="class" name="class" value="<?php echo $edit->class;?>"  class="form-control"><br><br>
                <input type="hidden" value="<?php echo $edit->id;?>" name="id">
            	<button type="submit" class="btn btn-primary">UPDATE</button><BR><BR>
            </form> 
		</div>
	</div>
</div>
<script>

$("#register-form").validate({
    rules: 
        {
          	name: {required:true},
            contact:{required:true,number:true},
            address:{required:true},
            class:{required:true,number:true},
        },
        message:
        {
        	name:{required:'Name is required.'},
        	contact:{required:'Name is required.',number:'Only Numbers allowed,'},
	    },
        
});

$(document).on('submit', '#register-form', function (e) 
{         
    e.preventDefault();
    var frm = $(this);
    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data)
            {
                var res = $.parseJSON(data);
                if(res == true)
                {
                    swal({
                        title: "Record successfully edited.",
                        type: "success",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "OK!",
                        closeOnConfirm: false
                    });    
                    window.location.href = "{{url('/crud')}}";
                }

                else
                {
                    swal("Opps!", "Something went wrong!", "error");
                }
                
            }
    });       
});  
</script>
@endsection

