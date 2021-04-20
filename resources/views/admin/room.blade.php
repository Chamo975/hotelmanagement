

 @extends('layouts.master')

@section('title')
Room|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Add Room</h3>
            <div class="col-md-12 text-right">
            <div class="col-md-12 text-right">
            <a class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" >   <span class="btn-inner-icon" ><i class="fa fa-plus"></i></span>Add</a>
            </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-body">
                <div class="table-responsive">
                   <table  id="myTable"class="table">
                   <thead class="text-primary">
                          <th>ID</th>
                          <th>Floor Name</th>
                          <th>Room Type</th>
                          <th>Room Number</th>
                          <th>Action</th>
                      </thead>

                       <tbody>
                        
                        @foreach ($rooms as $room)
                        <tr>
                            <td>{{$room->id}}</td>
                            <td>{{$room->floorname}}</td>
                            <td>{{$room->room_type}}</td>
                            <td>{{$room->room_number}}</td>
                          
                            <td>
                            {{-- <a data-id="{{$room->id}}"id="uroomid" class="btn btn-success" type="button" data-toggle="modal" data-target="#Houskeeping" >   <span class="btn-inner-icon" ><i class="fa fa-house"></i></span>Houskeeping</a>   --}}
                            <a data-id="{{$room->id}}"id="uroomid" class="btn btn-success" type="button" data-toggle="modal" data-target="#editroom" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                            <button class="btn btn-icon btn-danger" type="button" onclick="deleteroom({{$room->id}})">
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
</div>
    </div>
<!-------------------------------------------------- Room add MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Room</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

       
        <div class="modal-body">
            {{ csrf_field() }}
<!--------------------------------------Floor (reference from floor) ------------------------------------------------------------------------------------>
                 
<div class="row">
  <div class="col-md-6">
  <label for="department">Floor</label>
  <select class=" browser-default custom-select" name="floortype" id="floortype">

      <option selected>--select Floor Type--</option>
      @foreach (App\Floor::get() as $floortype)
  
      <option value='{{$floortype->name}}'>{{$floortype->name}}</option>
      

     @endforeach
    </select>
    <span id="floortypeerror" style="color:red;"></span>
  </div>
</div>

<!--------------------------------------Room type (selection box ekak auto)------------------------------------------------------------------------------------>               
                  
                <div class="row">
                  <div class="col-md-6">
                  <label for="department"> Room Type</label>
                  <select class=" browser-default custom-select" name="roomtype" id="roomtype">
                      <option selected>--select Room Type--</option>
                      @foreach (App\RoomType::get() as $roomtype)
                  
                      <option value='{{$roomtype->title}}'>{{ $roomtype->	title}}</option>
                     @endforeach
                    </select>
                    <span id="roomtypeerror" style="color:red;"></span>
                  </div>
              </div>
<!--------------------------------------Room Number------------------------------------------------------------------------------------>              
                    <div class="form-group">
                    <label for="Name">Room Number</label>
                    <input type="text" class="form-control" placeholder="roomnumber" id="roomnumber" name="roomnumber">
                    <span id="roomnumbererror" style="color:red;"></span>

                </div>
         
        <br>

        <a data-id="exampleModalLabe"id="rommtypeaddmodal"class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" >   <span class="btn-inner-icon" ><i class="fa fa-plus"></i></span> Add more</a>



        <div class="modal-footer">
          <input type="hidden" class="form-control" name="roomid" id="hroomid">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="saveroom()">Add</button>
        </div>
      </div>
    </div>
  </div>
 




  

<!-------------------------------------------------- Room edit MODAL---------------------------------->
<div class="modal fade" id="editroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      {{-- <form action="fllor" method="POST" id="#"> --}}
      <div class="modal-body">
          {{ csrf_field() }}
<!--------------------------------------Floor (reference from floor) ------------------------------------------------------------------------------------>
              <div class="form-group">
                  <label for="Name">Floor</label>
                  <input type="text" class="form-control" placeholder=" floor Name" id="ufname" name="ufname">
                  <span id="ufloortypeerror" style="color:red;"></span>
              </div>


<!--------------------------------------Room type (selection box ekak auto)------------------------------------------------------------------------------------>               
              <div class="form-group">
                  <label for="number">Room Type</label>
                  <input type="text" class="form-control" placeholder="room type" id="urtype" name="urtype">
                  <span id="uroomtypeerror" style="color:red;"></span>
              </div>
<!--------------------------------------Room Number------------------------------------------------------------------------------------>              
                  <div class="form-group">
                  <label for="Name">Room Number</label>
                  <input type="text" class="form-control" placeholder="Name" id="unumber" name="unumber">
                  <span id="uroomnumbererror" style="color:red;"></span>
                  
              </div>
       
      <br>

      <a data-id="exampleModalLabe"id="rommtypeaddmodal"class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" >   <span class="btn-inner-icon" ><i class="fa fa-plus"></i></span> Add more</a>



      
       
        <div class="modal-footer">
          <input type="hidden" class="form-control" name="floorid" id="hroomid"> 
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" >Edit</button>
        </div>
      </div>
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

   

 
// save room
function saveroom(){
    var floortype =$("#floortype").val(); 
    var roomtype =$("#roomtype").val(); 
    var roomnumber =$("#roomnumber").val(); 
    
      $.post('saveroom',{
        floortype:floortype,roomtype:roomtype,roomnumber:roomnumber
      },function(data){


        if (data.errors != null) {
         $.each(data.errors, function (key, value) {
          if(data.errors.floor_id){
              var p = document.getElementById('fnameerror');
              p.innerHTML = data.errors.floor_id[0];

          }
          if(data.errors.room_type_id){
              var p = document.getElementById('roomtypeerror');
              p.innerHTML = data.errors.room_type_id[0];

          }
          if(data.errors.room_number){
              var p = document.getElementById('roomnumbererror');
              p.innerHTML = data.errors.room_number[0];

          }
        
         
    
        });
  }

  if (data.success != null) {
    swal({
      title: "Sucessfully Added!",
      text: "You clicked the button!",
      icon: "success",
      button: "ok!",
    });
    location.reload();
    
  }

       

      })

  
   
 }



 
//data table
$(document).ready( function () {
    $('#myTable').DataTable();
} );








 // edit function

 $(document).on('click', '#uroomid', function () {
        var floorId = $(this).data("id");

        $.post('getByroomId',{
          roomId:roomId
   },function(data){
     
    $("#ufname").val(data.floorname);
    $("#urtype").val(data.room_type);
    $("#unumber").val(data.room_number);
    $("#hroomid").val(data.id);


    
   })
  });
  function editroom(){
   var ufname =$("#ufname").val(); 
   var urtype =$("#urtype").val(); 
   var unumber =$("#unumber").val(); 
   var hroomid = $('#hroomid').val(); 

   $.post('editroom',{
    ufname:ufname,urtype:urtype,unumber:unumber,hroomid:hroomid
   },function(data){

   })
   
 }






// delete function

function deleteroom(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deleteroom',{
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
