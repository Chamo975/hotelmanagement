@extends('layouts.master')

@section('title')
Department|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Add Department</h3>
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
                           <th>Action</th>
                       </thead>
                       <tbody>
                           
                       @foreach ($departments as $department)
                                <tr>
                                <td>{{$department->id}}</td>
                                <td>{{$department->name}}</td>
                                <td> 
                                <a data-id="{{$department->id}}"id="udepartmentid" class="btn btn-success" type="button" data-toggle="modal" data-target="#editdepartment" > 
                                <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                                <button class="btn btn-icon btn-danger" type="button" onclick="deletedepartment({{$department->id}})">
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
<!-------------------------------------------------- Department  Add MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Department</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ csrf_field() }}



<!--------------------------------------name------------------------------------------------------------------------------------>
<div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" placeholder=" Department Name" id="dpname" name="dpname">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="savedepartment()">Add</button>
                </div>
      </div>
    </div>
  </div>
  </div>
  
<!-------------------------------------------------- department edit MODAL---------------------------------->
<div class="modal fade" id="editdepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

               <div class="form-group">
                    <label for="Name"> Department Name</label>
                    <input type="text" class="form-control" placeholder=" Department Name" id="udpname" name="udpname">
                </div> 
                <div class="modal-footer">
                   <input type="hidden" class="form-control" name="departmentid" id="hdepartmentid"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editdepartment()">Edit</button>
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

    //save
      function savedepartment(){
        var dpname =$("#dpname").val();
        $.post('savedepartment',{
          dpname:dpname
        },function(data){

          swal({
          title: "Successfully Added!",
          text: "You clicked the button!",
          icon: "success",
          button: "ok!",
    });
           location.reload();
        })
              
        }



      //edit designation 

      $(document).on('click', '#udepartmentid', function () {
            var departmentId = $(this).data("id");

            $.post('getBydepartmentId',{
              departmentId:departmentId
      },function(data){
        
        $("#udpname").val(data.name); 
        $("#hdepartmentid").val(data.id);
      })    
      });


      function editdepartment(){
      var udpname =$("#udpname").val(); 
      var hdepartmentid = $('#hdepartmentid').val();
     
      $.post('editdepartment',{
        udpname:udpname,hdepartmentid:hdepartmentid
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

function deletedepartment(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deletedepartment',{
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
