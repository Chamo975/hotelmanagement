@extends('layouts.master')

@section('title')
Amenities|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Add Amenities</h3>
            <div class="col-md-12 text-right">
            <a data-id="exampleModalLabe"id="rommtypeaddmodal"class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" >   <span class="btn-inner-icon" ><i class="fa fa-plus"></i></span>Add</a>
            </div>
          </div>
          <div class="card-body">

            <div class="card-body">
                <div class="table-responsive">
                   <table  id="myTable"class="table">
                       <thead class="text-primary">
                           <th>ID</th>
                           <th>Name</th>
                           <th>Status</th>
                           <th>Image</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                        @foreach($amenities as $amenity)
                        <tr>
                            <td>{{$amenity->id}}</td>
                            <td>{{$amenity->name}}</td>
                            <td>{{$amenity->a_status}}</td>
                            <td><img src="{{asset('uploads/amenity/'. $amenity->a_img)}}" class="card-img-top" alt="amenity" width="75" height="75"></td>
                            <td>
                            <a data-id="{{$amenity->id}}"id="uamenityid" class="btn btn-success" type="button" data-toggle="modal" data-target="#editamenity" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                            <button class="btn btn-icon btn-danger" type="button" onclick="deleteamenity({{$amenity->id}})">
                            <span class="btn-inner-icon"><i class="fa fa-trash"></i></span>Delete</a>
                            <button type="button" class="btn btn-info userdeletebtn">   <span class="btn-inner-icon" ><i class="fa fa-eye"></i></span>View</a>
                            </td>
                        </tr>
                      @endforeach
                          

                       </tbody>
                   </table>

                </div>
            </div>


        </div>

    </div>
    <div>
<!-------------------------------------------------- amenity add MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Amenities</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="amenity" method="POST" id="saveamenityid">
        <div class="modal-body">
            {{ csrf_field() }}
<!--------------------------------------name------------------------------------------------------------------------------------>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" placeholder=" Amenity Name" id="aname" name="aname">
                    <span id="anameerror" style="color:red;"></span>
                </div>


<!--------------------------------------image------------------------------------------------------------------------------------>               
<div class="row">
            <div class="col-md-6">
            <label for="roomtype_img"> Image</label><span class="required"  style="color:red;">*</span></label>
            <input type="file"  class="form-control" name="aimge" id="aimge">
            <span id="aimageerror" style="color:red;"></span>
            </div> 
            </div>
<!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
        <div class="col-md-2">
        <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
        <textarea class="form-control"  rows="10" cols="600" name="adescription" id="adescription"></textarea>
        <span id="adescriptionerror" style="color:red;"></span>
        </div>
        </div>
         
        <br>


<!--------------------------------------Active------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
          <label for="amenity_active" class="form-control-label">Active</label>
          <br>
          <label class="custom-toggle">
            <input type="checkbox" checked id="aactive" name="aactive">
            <span id="aactiveerror" style="color:red;"></span>
          <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
          </label>
    
          </div>
           </div>


        <div class="modal-footer">
          {{-- <input type="hidden" class="form-control" name="userid" id="huserid"> --}}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
      </div>
    </div>
  </div>
    </div>



<!-------------------------------------------------- amenity edit MODAL---------------------------------->
<div class="modal fade" id="editamenity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Amenities</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="amenity" method="POST" id="updateamenityid">
      <div class="modal-body">
          {{ csrf_field() }}
<!--------------------------------------name------------------------------------------------------------------------------------>
              <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" placeholder=" Amenity Name" id="uaname" name="uaname">
                  <span id="uanameerror" style="color:red;"></span>
              </div>


<!--------------------------------------image------------------------------------------------------------------------------------>               
<div class="row">
          <div class="col-md-6">
          <label for="amenity_img"> Image</label><span class="required"  style="color:red;">*</span></label>
          <input type="file"  class="form-control" name="uaimge" id="uaimge">
          <span id="uaimageerror" style="color:red;"></span>
          </div> 
          </div>
<!--------------------------------------description------------------------------------------------------------------------------------>              
      <div class="row">
      <div class="col-md-2">
      <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
      <textarea class="form-control"  rows="10" cols="600" name="uadescription" id="uadescription"></textarea>
      <span id="uadescriptionerror" style="color:red;"></span>
      </div>
      </div>
       
      <br>


<!--------------------------------------Active------------------------------------------------------------------------------------>         
        <div class="row">
        <div class="col-md-6">
        <label for="amenity_active" class="form-control-label">Active</label>
        <br>
        <label class="custom-toggle">
          <input type="checkbox" checked id="uaactive" name="uaactive">
          <span id="uaactiveerror" style="color:red;"></span>
        <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
        </label>
  
        </div>
         </div>


      <div class="modal-footer">
        <input type="hidden" class="form-control" name="amenityid" id="hamenityid">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>






 
@endsection
@section('scripts')
<script>
        $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        });

   

$('#saveamenityid').on('submit',function (event) {
$("#anameerror").html('');
$("#aimageerror").html('');
$("#adescriptionerror").html('');
$("#aactiveerror").html('');

event.preventDefault();
$.ajax({
type:'POST',

url:"saveamenity",

data:new FormData(this),
dataType:'JSON',
contentType:false,
cache:false,
processData:false,
success:function(data){
console.log(data)

  if (data.errors != null) {
      $.each(data.errors, function (key, value) {
          if(data.errors.name){
              var p = document.getElementById('anameerror');
              p.innerHTML = data.errors.name[0];

          }
          if(data.errors.a_image){
              var p = document.getElementById('aimageerror');
              p.innerHTML = data.errors.a_image[0];

          }
          if(data.errors.a_description){
              var p = document.getElementById('adescriptionerror');
              p.innerHTML = data.errors.a_description[0];

          }
          
        });
  }

  if (data.success != null) {

    alert("successfully added");
    
  }


}
});
});











// delete function

function deleteamenity(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deleteamenity',{
            id:id
          },function(data){
              console.log(data)
          })

            swal("successfully Deleted!", {
              icon: "success",
    });
                    location.reload();
  } else {
    swal("Your imaginary file is safe!");
  }
});

}






//update

$(document).on('click', '#uamenityid', function () {
        var amenityId = $(this).data("id");
        
    
        $.post('getByamenityId',{
          amenityId:amenityId
        },function(data){

            $("#uaname").val(data.name);
            $("#uaimge").val(data.a_image);
            $("#uadescription").val(data.a_description);
            $("#uaactive").val(data.a_status);
            $("#hamenityid").val(data.id);
            console.log(data)
        })
      
    });




        $('#uamenityid').on('submit',function (event) {
        $("#uanameerror").html(''); 
        $("#uaimageerror").html('');
        $("#uadescriptionerror").html('');
        $("#uaactiveerror").html('');

event.preventDefault();
$.ajax({  
    type:'POST',

    url:"editamenity",

    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){
    console.log(data)

        if (data.errors != null) {
            $.each(data.errors, function (key, value) {
              if(data.errors.name){
              var p = document.getElementById('uanameerror');
              p.innerHTML = data.errors.name[0];

          }
          if(data.errors.a_image){
              var p = document.getElementById('uaimageerror');
              p.innerHTML = data.errors.a_image[0];

          }
          if(data.errors.a_description){
              var p = document.getElementById('uadescriptionerror');
              p.innerHTML = data.errors.a_description[0];

          }
          if(data.errors.a_status){
              var p = document.getElementById('uaactiveerror');
              p.innerHTML = data.errors.a_status[0];

          }
         
          
    
            });
        }
        if(data){
       location.reload()
        }


    }
});
});



//data table
$(document).ready( function () {
    $('#myTable').DataTable();
} );

 </script>
@endsection
