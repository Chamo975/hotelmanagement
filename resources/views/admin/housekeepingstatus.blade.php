@extends('layouts.master')

@section('title')
Housekeeping status|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Add Housekeeping Status</h3>
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
                           <th>Action</th>
                       </thead>
                       <tbody>
                       @foreach ($hstatuses as $hstatus)
                          <tr>
                              <td>{{$hstatus->id}}</td>
                              <td>{{$hstatus->title}}</td>
                              <td>{{$hstatus->status }}</td>
                              <td>
                              <a data-id="{{$hstatus->id}}"id="uhstatusid" class="btn btn-success" type="button" data-toggle="modal" data-target="#edithouskeepings" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                              <button class="btn btn-icon btn-danger" type="button" onclick="deletehousekeepings({{$hstatus->id}})">
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
<!-------------------------------------------------- housekeeping  MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Housekeeping Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

       
        <div class="modal-body">
            {{ csrf_field() }}
<!--------------------------------------title------------------------------------------------------------------------------------>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder=" Title" id="title" name="title">
                </div>



<!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
        <div class="col-md-2">
        <label for="hk_description" class="form-control-label"> Small Description</label><span class="required"  style="color:red;">*</span></label>
        <textarea class="form-control" id="smalldescription" rows="10" cols="600" name="smalldescription"></textarea>
        <span id="bdescriptionerror" style="color:red;"></span>
        </div>
        </div>
         
        <br>


<!--------------------------------------Active------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
          <label for="hk_description" class="form-control-label">Active</label>
          <br>
          <label class="custom-toggle">
          <input type="checkbox" checked id="hactive" name="hactive">
          <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
          </label>
    
          </div>
           </div>

           <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="savehousekeepingstatus()">Add</button>
          </div>
</div>
</div>
</div>
</div>


<!-------------------------------------------------- housekeeping edit MODAL---------------------------------->
<div class="modal fade" id="edithouskeepings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!---------------------------------------------------------title--------------------------------------------------------------------------->
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" placeholder=" Title" id="uhtitle" name="uhtitle">
        </div>


<!--------------------------------------description------------------------------------------------------------------------------------>              
      <div class="row">
      <div class="col-md-12">
      <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
      <textarea class="form-control" id="uhdescription"  cols="30" rows="10"  name="uhdescription"></textarea>
      <span id="bdescriptionerror" style="color:red;"></span>
      </div>
      </div>
       
      <br>


<!--------------------------------------Active------------------------------------------------------------------------------------>         
        <div class="row">
          <div class="col-md-6">
          <label for="hk_description" class="form-control-label">Active</label>
          <br>
          <label class="custom-toggle">
          <input type="checkbox" checked id="uhactive" name="uhactive">
          <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
          </label>

          </div>
          </div>


      <div class="modal-footer">
       <input type="hidden" class="form-control" name="hkid" id="hhkid"> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="edithouskeepings()">Edit</button>
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



// save housekeepingstatus
function savehousekeepingstatus(){
    var title =$("#title").val(); 
    var smalldescription =$("#smalldescription").val(); 
    var hactive = $('#hactive:checked').val(); 
      if(active="on"){
      var hactive=1;
      }
      else{
      var hactive=0;
      }
      $.post('savehousekeepingstatus',{
        title:title,smalldescription:smalldescription,hactive:hactive
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

 $(document).on('click', '#uhstatusid', function () {
        var houskeepingsId = $(this).data("id");

        $.post('getByhouskeepingsId',{
          houskeepingsId:houskeepingsId
   },function(data){
     
    $("#uhtitle").val(data.title);
    $("#uhdescription").val(data.smalldescription);
    $("#uhactive").val(data.status);
    $("#hhkid").val(data.id);

    if(data.status=="1"){
      document.getElementById("uhactive").checked = true;
    }
    else{
      document.getElementById("uhactive").checked = false;

    }
    
   })
  });
  function edithouskeepings(){
   var uhtitle =$("#uhtitle").val(); 
   var uhdescription =$("#uhdescription").val(); 
   var uhactive = $('#uhactive:checked').val(); 
   var hhkid = $('#hhkid').val(); 
  if(uhactive="on"){
    var uhactive=1;
  }
  else{
    var uhactive=0;
  }
   $.post('edithouskeepings',{
    uhtitle:uhtitle,uhdescription:uhdescription,uhactive:uhactive,hhkid:hhkid
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




      
//data tables
$(document).ready( function () {
    $('#myTable').DataTable();
} );





// delete function

function deletehousekeepings(id) {
        swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
      })
      .then((willDelete) => {
              if (willDelete) {
                
                $.post('deletehousekeepings',{
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
