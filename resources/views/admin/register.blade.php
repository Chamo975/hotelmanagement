@extends('layouts.master')

@section('title')
 Register Roles|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Register Roles</h3>
            <div>
            </div>
          </div>
          <div class="card-body">

            <div class="card-body">
                <div class="table-responsive">
                   <table  id="myTable"class="table">
                       <thead class="text-primary">

                           <th>ID</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>User Type</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                            @foreach ($users as $row)
                           <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email }}</td>
                                <td>-{{$row->usertype }}</td>
                                <td>
                                  
                                   <a data-id="{{$row->id}}"id="uuserid" class="btn btn-success" type="button" data-toggle="modal" data-target="#edituser" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                                   <button class="btn btn-icon btn-danger" type="button" onclick="deleteuser({{$row->id}})">
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

<!-------------------------------------------------- User Edit MODAL---------------------------------->
 <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User Roles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="edituser" method="POST" id="#">
        <div class="modal-body">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" placeholder="Name" id="uname" name="uname">
                </div>
                <div class="form-group">
                  <label for="User role"> Give User Role</label>
                  <select name="usertype" id="usertype" class="form-control">
                      <option value="admin">Admin</option>
                      <option value="receptionist">Receptionist</option>
                      <option value="Guest">Guest</option>
                  </select>
                </div>

            </form>
        </div>
        <div class="modal-footer">
          {{-- <input type="hidden" class="form-control" name="userid" id="huserid"> --}}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div> 

@endsection

@section('scripts')

 <script>
  $(document).ready(function(){
    $(selection).click(function (e){
      e.preventDefault();
    });

  });

//data tables
$(document).ready( function () {
    $('#myTable').DataTable();
} );





//  // edit function

//  $(document).on('click', '#uuserid', function () {
//         var floorId = $(this).data("id");

//         $.post('getByfloorId',{
//           floorId:floorId
//    },function(data){
     
//     $("#uname").val(data.name);
//     $("#unumber").val(data.floor_number);
//     $("#udescription").val(data.description);
//     $("#hloorid").val(data.id);

//     if(data.status=="1"){
//       document.getElementById("ufactive").checked = true;
//     }
//     else{
//       document.getElementById("ufactive").checked = false;

//     }
    
//    })
//   });
//   function editfloor(){
//    var ufname =$("#ufname").val(); 
//    var ufnumber =$("#ufnumber").val(); 
//    var ufdescription =$("#ufdescription").val(); 
//    var uactive = $('#ufactive:checked').val(); 
//    var hfloorid = $('#hfloorid').val(); 
//   if(uactive="on"){
//     var ufactive=1;
//   }
//   else{
//     var ufactive=0;
//   }
//    $.post('editfloor',{
//     ufname:ufname,ufnumber:ufnumber,ufdescription:ufdescription,ufactive:ufactive,hfloorid:hfloorid
//    },function(data){

//    })
   
//  }


 // delete function

function deleteuser(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deleteuser',{
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
