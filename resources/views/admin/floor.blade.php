@extends('layouts.master')

@section('title')
Floor|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Add Floor</h3>
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
                           <th>Name</th>
                           <th>Floor Number</th>
                           <th>Status</th>
                           <th>Action</th>
                       </thead>

                       <tbody>
                        @foreach ($floors as $floor)
                          <tr>
                              <td>{{$floor->id}}</td>
                              <td>{{$floor->name}}</td>
                              <td>{{$floor->floor_number}}</td>
                              <td>{{$floor->status }}</td>
                              <td>
                              <a data-id="{{$floor->id}}"id="ufloorid" class="btn btn-success" type="button" data-toggle="modal" data-target="#editfloor" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                              <button class="btn btn-icon btn-danger" type="button" onclick="deletefloor({{$floor->id}})">
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

<!-------------------------------------------------- floor edit MODAL---------------------------------->
<div class="modal fade" id="editfloor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Floor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        
        <div class="modal-body">
            {{ csrf_field() }}
<!---------------------------------------------------------name--------------------------------------------------------------------------->
               <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" placeholder=" floor Name" id="ufname" name="ufname">
                    <span id="uname" style="color:red;"></span>
                </div>


<!--------------------------------------floor number------------------------------------------------------------------------------------>               
                <div class="form-group">
                    <label for="number">Floor Number</label>
                    <input type="text" class="form-control" placeholder="floor number" id="ufnumber" name="ufnumber">
                    <span id="bdescriptionerror" style="color:red;"></span>
                </div>
<!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
        <div class="col-md-12">
        <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
        <textarea class="form-control" id="ufdescription"  cols="30" rows="10"  name="ufdescription"></textarea>
        <span id="bdescriptionerror" style="color:red;"></span>
        </div>
        </div>
         
        <br>


<!--------------------------------------Active------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
          <label for="floor_active" class="form-control-label">Active</label>
          <br>
          <label class="custom-toggle">
          <input type="checkbox" checked id="ufactive" name="ufactive">
          <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
          </label>
    
          </div>
           </div>


        <div class="modal-footer">
         <input type="hidden" class="form-control" name="floorid" id="hfloorid"> 
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="editfloor()">Edit</button>
        </div>

              
      </div>
    </div>
  </div>
</div>



<!-------------------------------------------------- floor add MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Floor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        
        <div class="modal-body">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" placeholder=" floor Name" id="fname" name="fname">
                    <span id="fnameerror" style="color:red;"></span>
                </div>


<!--------------------------------------floor number------------------------------------------------------------------------------------>               
                <div class="form-group">
                    <label for="number">Floor Number</label>
                    <input type="text" class="form-control" placeholder="floor number" id="fnumber" name="fnumber">
                    <span id="fnumbererror" style="color:red;"></span>
                </div>
<!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
        <div class="col-md-2">
        <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
        <textarea class="form-control" id="fdescription" rows="10"  name="fdescription"></textarea>
        <span id="fdescriptionerror" style="color:red;"></span>
        </div>
        </div>
         
        <br>


<!--------------------------------------Active------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
          <label for="floor_active" class="form-control-label">Active</label>
          <br>
          <label class="custom-toggle">
          <input type="checkbox" checked id="factive" name="factive">
          <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
          </label>
    
          </div>
           </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="savefloor()">Add</button>
        </div>
<!--------------------------------------name------------------------------------------------------------------------------------>
              
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

   
// save floor
    function savefloor(){
    var fname =$("#fname").val(); 
    var fnumber =$("#fnumber").val(); 
    var fdescription =$("#fdescription").val(); 
    var active = $('#factive:checked').val(); 
      if(active="on"){
      var factive=1;
      }
      else{
        var factive=0;
      }
      $.post('savefloor',{
        fname:fname,fnumber:fnumber,fdescription:fdescription,factive:factive
      },function(data){

        swal({
      title: "Sucessfully Added!",
      text: "You clicked the button!",
      icon: "success",
      button: "ok!",
    });
    location.reload();
    
      })

  
   
 }


 // edit function

 $(document).on('click', '#ufloorid', function () {
        var floorId = $(this).data("id");

        $.post('getByfloorId',{
          floorId:floorId
   },function(data){
     
    $("#ufname").val(data.name);
    $("#ufnumber").val(data.floor_number);
    $("#ufdescription").val(data.description);
    $("#hfloorid").val(data.id);

    if(data.status=="1"){
      document.getElementById("ufactive").checked = true;
    }
    else{
      document.getElementById("ufactive").checked = false;

    }
    
   })
  });
  function editfloor(){
   var ufname =$("#ufname").val(); 
   var ufnumber =$("#ufnumber").val(); 
   var ufdescription =$("#ufdescription").val(); 
   var uactive = $('#ufactive:checked').val(); 
   var hfloorid = $('#hfloorid').val(); 
  if(uactive="on"){
    var ufactive=1;
  }
  else{
    var ufactive=0;
  }
   $.post('editfloor',{
    ufname:ufname,ufnumber:ufnumber,ufdescription:ufdescription,ufactive:ufactive,hfloorid:hfloorid
   },function(data){

    swal({
        title: "Successfully Updated",
        text: "You clicked the button!",
        icon: "success",
        button: "ok!",
    });
    location.reload();

   })
   
 }




//data table
$(document).ready( function () {
    $('#myTable').DataTable();
} );






// delete function

function deletefloor(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deletefloor',{
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
