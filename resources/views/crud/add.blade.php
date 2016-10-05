@extends('crud.main')
@section('content')       

<div class="container">
	<div class="row">
		<div class="col-sm-4">

   			<form class="formclass" method="POST" action="{{url('/crud/addnow')}}" role="form"  enctype="multipart/form-data" id="register-form"> 
                {!! csrf_field() !!}
	            <label>Upload Image</label>
    	        <input id="input-id" type="file" class="file" name="image" data-preview-file-type="text">
                <input type="hidden" id="getimagename" name="uploadedimage" value=""><br><br>                
            	<label>Name:</label><input type="name" id="name" name="name" class="form-control" ><br><br>
            	<label>Contact:</label><input type="text" id="contact" name="contact" class="form-control" ><br><br>
            	<label>Address:</label><input type="text" id="address" name="address" class="form-control" ><br><br>
            	<label>Class:</label><input type="text" id="class" name="class" class="form-control"><br><br>
            	<button type="submit" class="btn btn-primary">ADD</button><BR><BR>
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
                        title: "Record successfully added.",
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

$("#input-id").fileinput({
        maxFileSize: 24000,
        uploadUrl: "{{url('/crud/uploadimage')}}", // server upload action
        uploadAsync: true,
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
        maxFileCount: 1,
        showUpload: true,
        dropZoneEnabled: true
});

// CATCH RESPONSE
$("#input-id").on('fileuploaderror', function(event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra,
        response = data.response, reader = data.reader;
    console.log(data.response.upload_error);
});

$("#input-id").on('fileuploaded', function(event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra,
        response = data.response, reader = data.reader;
    console.log(response);
    $('#getimagename').val(response);
});

</script>
@endsection

