@extends('layouts.master')

@section('title')
 Room Type|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Room Types</h3>
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
                           <th>Room Type</th>
                           <th>Short Code</th>
                           <th>Image</th>
                           <th>Base Price</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                           
                       @foreach($roomtypes as $roomtype)
                        <tr>
                            <td>{{$roomtype->id}}</td>
                            <td>{{$roomtype->title}}</td>
                            <td><img src="{{asset('uploads/roomtype/'. $roomtype->image)}}" class="card-img-top" alt="roomtype" width="75" height="75"></td>
                            <td>{{$roomtype->	short_code}}</td>
                            <td>{{$roomtype->base_price}}</td>
                            <td>
                            <a data-id="{{$roomtype->id}}"id="updatehalltypeid" class="btn btn-success" type="button" data-toggle="modal" data-target="#edithall" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                            <button class="btn btn-icon btn-danger" type="button" onclick="deleteroomtype({{$roomtype->id}})">
                            <span class="btn-inner-icon"><i class="fa fa-trash"></i></span>Delete</a>
                           
                            </td>
                        </tr>
                      @endforeach 
                           

                       </tbody>
                   </table>

                </div>
            </div>


        </div>

    </div>
</div>


<!--------------------------------------------------add MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Room Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="saveroomtype" method="POST" id="saveroomtypeid">
        <div class="modal-body">
            {{ csrf_field() }}
<!--------------------------------------name------------------------------------------------------------------------------------>
                <div class="form-group">
                    <label for="Name">Room Type</label>
                    <input type="text" class="form-control" placeholder="Room Type" id="roomtype" name="roomtype">
                    <span id="nameerror" style="color:red;"></span>
                </div>


<!--------------------------------------short code------------------------------------------------------------------------------------>               
                <div class="form-group">
                    <label for="Name">Short Code</label>
                    <input type="text" class="form-control" placeholder="short code" id="sc" name="sc">
                    <span id="scerror" style="color:red;"></span>
                </div>
<!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
          <div class="col-md-2">
          <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
    
          <textarea class="form-control" id="summernote" rows="10" cols="30" name="room_description"></textarea>
         
        <span id="descriptionerror" style="color:red;"></span>
      
        </div>
      
        </div>

<!--------------------------------------base occupancy------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Base occupancy</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="baseoccupancy" id="baseoccupancy"/>
            <span id="boccupancyerror" style="color:red;"></span>
            </div>
           </div>
<!--------------------------------------higher occupancy------------------------------------------------------------------------------------>         
        <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Higher occupancy</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="higheroccupancy" id="uhigheroccupancy"/>
            <span id="hoccupancyerror" style="color:red;"></span>
            </div>
           </div>


<!--------------------------------------Extra bed------------------------------------------------------------------------------------>     

  

  {{-- <div class='row'>
  <div class='col-lg-4'>
          <div class="custom-control custom-checkbox">
          <input type="checkbox" onclick="extrabed()" class="custom-control-input customCheck1" id="customCheck1" value="1" name="extrabed">
          <label class="custom-control-label" for="customCheck1">Extra Bed</label>
 

      <div class='col-lg-4' id='hideShowExtra'style='display:none'>
      <input type="text" class="form-control" placeholder="No Of Beds" id="name" name="noofbeds">
      <span id="eberror" style="color:red;"></span>
      </div>
      </div>
    </div>
  </div> --}}
  <label for="myCheck">Extra Bed:</label> 
<input type="checkbox" id="myCheck" onclick="myFunction()">

<p id="text" style="display:none">

<input type="text" id="name"  name="noofbeds" class="form-control" onclick="myFunction()" placeholder="No Of Beds">


</p>



  <!--------------------------------------Kids Occupancy------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Kids occupancy</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="kids_occupancy" id="ubanquet_price"/>
            <span id="koerror" style="color:red;"></span>
            </div>
           </div>

    
<!--------------------------------------Amenities------------------------------------------------------------------------------------>     

<div class="row">
  <div class="col-md-6">
  <label for="designation"> Amenities</label>
  <select class=" browser-default custom-select" name="amenityname" id="amenityname">
      <option selected>--select Amenities--</option>
      @foreach (App\Amenity::get() as $amenity)
      <option value='{{$amenity->name}}'>{{ $amenity->name}}</option>
      @endforeach
    </select>
    <span id="eamenityerror" style="color:red;"></span>
  </div>
</div>

  

<!--------------------------------------Base Price------------------------------------------------------------------------------------>     
<div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Base Price</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="base_price" id="ubase_price"/>
            <span id="bpriceerror" style="color:red;"></span>
            </div>
           </div>
<!--------------------------------------Additional person  Price------------------------------------------------------------------------------------>     
          <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Additional Person Price</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="ap_price" id="uap_price"/>
            <span id="aperror" style="color:red;"></span>
            </div>
           </div>
           <!--------------------------------------Extra Bed Price------------------------------------------------------------------------------------>     
          <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Extra Bed Price</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="extrab_price" id="uextrab_price"/>
            <span id="ebperror" style="color:red;"></span>
            </div>
           </div>
           
<!--------------------------------------Image------------------------------------------------------------------------------------>   

<div class="row">
            <div class="col-md-6">
            <label for="roomtype_img"> Image</label><span class="required"  style="color:red;">*</span></label>
            <input type="file" id="myFile" class="form-control" name="roomtype_img">
            <span id="imageerror" style="color:red;"></span>
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



//data table
$(document).ready( function () {
    $('#myTable').DataTable();
} );




$('#saveroomtypeid').on('submit',function (event) {
$("#nameerror").html('');
$("#scerror").html('');
$("#descriptionerror").html('');
$("#boccupancyerror").html('');
$("#hoccupancyerror").html('');
$("#eberror").html('');
$("#koerror").html('');
$("#eamenityerror").html('');
$("#bpriceerror").html('');
$("#aperror").html('');
$("#ebperror").html('');
$("#bpriceerror").html('');
$("#imageerror").html('');


event.preventDefault();
$.ajax({
type:'POST',


url:"saveroomtype",

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
              var p = document.getElementById('nameerror');
              p.innerHTML = data.errors.name[0];

          }
          if(data.errors.sc){
              var p = document.getElementById('scerror');
              p.innerHTML = data.errors.sc[0];

          }
          if(data.errors.room_description){
              var p = document.getElementById('descriptionerror');
              p.innerHTML = data.errors.room_description[0];

          }     
          if(data.errors.baseoccupancy){
              var p = document.getElementById('boccupancyerror');
              p.innerHTML = data.errors.baseoccupancy[0];

          }
          if(data.errors.higheroccupancy){
              var p = document.getElementById('hoccupancyerror');
              p.innerHTML = data.errors.higheroccupancy[0];

          }
          if(data.errors.banquet_img){
              var p = document.getElementById('koerror');
              p.innerHTML = data.errors.banquet_img[0];

          }
          if(data.errors.banquet_price){
              var p = document.getElementById('bpriceerror');
              p.innerHTML = data.errors.banquet_price[0];

          }
          if(data.errors.status){
              var p = document.getElementById('aperror');
              p.innerHTML = data.errors.status[0];

          }
          if(data.errors.status){
              var p = document.getElementById('ebperror');
              p.innerHTML = data.errors.status[0];

          }
          if(data.errors.status){
              var p = document.getElementById('bpriceerror');
              p.innerHTML = data.errors.status[0];

          }
          if(data.errors.status){
              var p = document.getElementById('imageerror');
              p.innerHTML = data.errors.status[0];

          }
    
        });
  }

  if (data.success != null) {

    alert("successfully added");
    
  }


}
});
});


        $('#summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 100
      });

    // var checkedValue = $('.customCheck1:checked').val();
    //   function extrabed(){
    //     var checkBox = document.getElementById("customCheck1");
    //     if(checkBox.checked==true){
    //     $("#hideShowExtra").show();
    //     }else{
    //       $("#hideShowExtra").hide();
    //     }
    //   }

   function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
      


//data table
$(document).ready( function () {
    $('#myTable').DataTable();
} );








          
// delete function

function deleteroomtype(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deleteroomtype',{
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


 </script>
@endsection
