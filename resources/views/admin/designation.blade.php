@extends('layouts.master')

@section('title')
Designationt|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Add Designation</h3>
            <div class="col-md-12 text-right">
            <div class="col-md-12 text-right">
            <a data-id="exampleModalLabe"id="rommtypeaddmodal"class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" >   <span class="btn-inner-icon" ><i class="fa fa-plus"></i></span>Add</a>
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
                           <th>Action</th>
                          
                       </thead>
                       <tbody>
                          @foreach ($designations as $designation)
                                <tr>
                                <td>{{$designation->id}}</td>
                                <td>{{$designation->name}}</td>
                                <td> 
                               
                                <a data-id="{{$designation->id}}"id="udesignationid" class="btn btn-success" type="button" data-toggle="modal" data-target="#editdesignation" > 
                                <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                                <button class="btn btn-icon btn-danger" type="button" onclick="deletedesignation({{$designation->id}})">
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
<!-------------------------------------------------- Department Add MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Designation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

  
        <div class="modal-body">
            {{ csrf_field() }}



<!--------------------------------------name------------------------------------------------------------------------------------>
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" placeholder=" Designation Name" id="dname" name="dname">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="savedesignation()">Add</button>
                </div>
      </div>
    </div>
  </div>
  </div>




<!-------------------------------------------------- designation edit MODAL---------------------------------->
<div class="modal fade" id="editdesignation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="Name"> Designation Name</label>
                    <input type="text" class="form-control" placeholder=" Designation Name" id="udname" name="udname">
                </div> 
                <div class="modal-footer">
                   <input type="hidden" class="form-control" name="designationid" id="hdesignationid"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editdesignation()">Edit</button>
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
            function savedesignation(){
            var dname =$("#dname").val(); 

            $.post('savedesignation',{
              dname:dname
            },function(data){


                swal({
                title: "Successfully Added",
                text: "You clicked the button!",
                icon: "success",
                button: "ok!",
            });
            location.reload();


            })
                  
            }
  //edit designation 

        $(document).on('click', '#udesignationid', function () {
                var designationId = $(this).data("id");

                $.post('getBydesignationId',{
                  designationId:designationId
          },function(data){
            
            $("#udname").val(data.name); 
            $("#hdesignationid").val(data.id);
          })    
          });


          function editdesignation(){
          var udname =$("#udname").val(); 
          var hdesignationid = $('#hdesignationid').val();

          $.post('editdesignation',{
            udname:udname,hdesignationid:hdesignationid
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

function deletedesignation(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deletedesignation',{
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
