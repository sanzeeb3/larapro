
@extends('crud.main')
@section('content')       

<div class="container">
	<div class="row">
		<div class="col-sm-10">
			<a href="{{url('/crud/add')}}">Add New Record</a><br><br>
			<table id="tableid"  class="table table-bordered">
                <thead><tr><td>S.N.</td><td>Image</td><td>Name</td><td>Contact</td><td>Address</td><td>Class</td><td>Options</td></tr></thead>
            	<?php $i=1;?>
            	<?php foreach($display as $disp):?>
            		<tbody>
            		<tr>    			
  		          		<td>
        	    			<?php echo $i++;?>	
          				</td>
          				<td>
            				<img src="{{asset("newuploads/{$disp->image}")}}">
            			</td>
          				<td>
          					<?php echo $disp->name;?>
          				</td>
          				<td>
          					<?php echo $disp->phone;?>
          				</td>
          				<td>
          					<?php echo $disp->address;?>
          				</td>
          				<td>
          					<?php echo $disp->class;?>
      					</td>
      					<td>
	      					<a href="" class="remove" data-id="<?php echo $disp->id;?>">Delete</a>
	      					<a href="" class="show" data-id="<?php echo $disp->id;?>">Show</a> 
      						<a href="{{url("/crud/edit/{$disp->name}")}}" class="edit" data-id="<?php echo $disp->id;?>">Edit</a>
      					</td>
      				</tr>
            		</tbody>
            	<?php endforeach;?>
            	</thead>
            </table>
		</div>
		<div class="col-sm-2">
			<div id="result">
			</div>
		</div>
	</div>
</div>
<script>

$('#tableid').DataTable();
$(document).on('click', '.remove', function (e) {
    e.preventDefault();
    var id = $(this).data('id');

    swal({
            title: "Are you sure!",
            text: "You will not be able to recover this record",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function(isConfirm) {

            if(isConfirm)
            {
                $.ajax({
                    type: "POST",
                    url: "{{url('/crud/delete')}}",
                    data: {id:id},
                    success: function (data) {
                        var res = $.parseJSON(data);
                        if(res != false) {
                            swal("Record Deleted", "", "success");
                            window.location.href = "{{url('/crud')}}";
                        }
                    }
                });
            }
            else
            {
                    swal("Record not deleted!","Something went wrong!!","error");
            }

        }
    );
});

$(document).on('click', '.show', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        type: "POST",
        url: "{{url('/crud/show')}}",
        data: {id:id},
        success: function (data) {
        var res = $.parseJSON(data);

        if(res.status == true)
           {       
                var result = 'Name:'+res.show.name+'<br>'+
                			 'Phone:'+res.show.phone+'<br>'+
                			 'Class:'+res.show.class+'<br>'+
                			 'Address:'+res.show.address+'<br>';
                    
                    $('#result').html(result);  
            }
        }
    });          
});

</script>
@endsection

