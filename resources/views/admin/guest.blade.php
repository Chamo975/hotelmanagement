@extends('layouts.master')

@section('title')
Guests|Mount Holiday Inn
@endsection

@section('content')


 <!-- Card stats -->
 <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Services</h5>
                      <span class="h2 font-weight-bold mb-0">5</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 0.5%</span>
                    <span class="text-nowrap">This Week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Today's Revenue</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 5.45%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">VIP Guests</h5>
                      <span class="h2 font-weight-bold mb-0">10</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 5.45%</span>
                    <span class="text-nowrap">This Week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                                <!-- Card body -->
                                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Income</h5>
                      <span class="h2 font-weight-bold mb-0">20,500</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 10.45%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
           

<br>



<!-- <div class="col-xl-3 col-md-6">
              <div class="card card-stats"> -->
<div class="container-fluid mt-6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Add Guest</h3>
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
                           <th>Country</th>
                           <th>Email</th>
                           <th>Mobile</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                           
                          
                        @foreach ($guests as $guest)
                        <tr>
                            <td>{{$guest->id}}</td>
                            <td>{{$room->title}}</td>
                            <td>{{$room->c_img}}</td>
                            <td>{{$room->c_status}}</td>
                          
                            <td>
                              <a data-id="{{$coupanmanagement->id}}"id="ucoupanmanagementid" class="btn btn-success" type="button" data-toggle="modal" data-target="#Houskeeping" >   <span class="btn-inner-icon" ><i class="fa fa-house"></i></span>Edit</a>  
                            <a data-id="{{$coupanmanagement->id}}"id="ucoupanmanagementid" class="btn btn-success" type="button" data-toggle="modal" data-target="#editcoupanmanegment" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                            <button class="btn btn-icon btn-danger" type="button" onclick="deletecoupanmanagement({{$coupanmanagement->id}})">
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



<!-------------------------------------------------- Room add MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Guest</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        {{-- <form action="fllor" method="POST" id="#"> --}}
        <div class="modal-body">
            {{ csrf_field() }}
<!--------------------------------------Floor (reference from floor) ------------------------------------------------------------------------------------>
                <div class="form-group">
                    <label for="Name">Floor </label>
                    <input type="text" class="form-control" placeholder=" floor Name" id="fname" name="fname">
                    <span id="fnameerror" style="color:red;"></span>
                </div>


<!--------------------------------------Room type (selection box ekak auto)------------------------------------------------------------------------------------>               
                <div class="form-group">
                    <label for="number">Room Type</label>
                    <input type="text" class="form-control" placeholder="room typer" id="rtype" name="rtype">
                    <span id="roomtypeerror" style="color:red;"></span>
                </div>
<!--------------------------------------Room Number------------------------------------------------------------------------------------>              
                    <div class="form-group">
                    <label for="Name">Room Number</label>
                    <input type="text" class="form-control" placeholder="Room Number" id="roomnumber" name="roomnumber">
                    <span id="roomnumbererror" style="color:red;"></span>

                </div>
         
        <br>

        <a data-id="exampleModalLabe"id="rommtypeaddmodal"class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" >   <span class="btn-inner-icon" ><i class="fa fa-plus"></i></span> Add more</a>



        <div class="modal-footer">
          <input type="hidden" class="form-control" name="roomid" id="hroomid">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
  </div>
 




  

<!-------------------------------------------------- Room edit MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <span id="roomtypeerror" style="color:red;"></span>
              </div>


<!--------------------------------------Room type (selection box ekak auto)------------------------------------------------------------------------------------>               
              <div class="form-group">
                  <label for="number">Room Type</label>
                  <input type="text" class="form-control" placeholder="room type" id="urtype" name="urtype">
                  <span id="roomtypeerror" style="color:red;"></span>
              </div>
<!--------------------------------------Room Number------------------------------------------------------------------------------------>              
                  <div class="form-group">
                  <label for="Name">Room Number</label>
                  <input type="text" class="form-control" placeholder="Name" id="unumber" name="unumber">
                  <span id="numbererror" style="color:red;"></span>
                  
              </div>
       
      <br>

      <a data-id="exampleModalLabe"id="rommtypeaddmodal"class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" >   <span class="btn-inner-icon" ><i class="fa fa-plus"></i></span> Add more</a>



      <div class="modal-footer">
        <input type="hidden" class="form-control" name="roomid" id="hroomid">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
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





 //data table
$(document).ready( function () {
    $('#myTable').DataTable();
} );
  

 










// // delete function

// function deleteroom(id) {
//   swal({
//         title: "Are you sure?",
//         text: "Once deleted, you will not be able to recover this imaginary file!",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
// })
// .then((willDelete) => {
//         if (willDelete) {
          
//           $.post('deleteroom',{
//             id:id
//           },function(data){
//               console.log(data)
//           })

//             swal("successfully Deleted!", {
//               icon: "success",
//     });
//                     location.reload();
//   } else {
//     swal("Your imaginary file is safe!");
//   }
// });

// }


 </script>
@endsection