@extends('layouts.master')

@section('title')
Halls|Mount Holiday Inn
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
            <h3 class="mb-0">Add Hall</h3>
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
                           <th>Hall Number</th>
                           <th>Hall Type</th>
                           <th>Floor Number</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                                    
                        @foreach ($halls as $hall)
                          <tr>
                            <td>{{$hall->id}}</td>
                            <td>{{$hall->hallnumber}}</td>
                            <td>{{$hall->halltype}}</td>
                            <td>{{$hall->Floortype}}</td>
                          
                            <td>
                              <a data-id="{{$hall->id}}"id="halltid" class="btn btn-success" type="button" data-toggle="modal" data-target="#Houskeeping" >   <span class="btn-inner-icon" ><i class="fa fa-house"></i></span>Housekeeping</a>  
                            <a data-id="{{$hall->id}}"id="uhallid" class="btn btn-success" type="button" data-toggle="modal" data-target="#edithall" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                            <button class="btn btn-icon btn-danger" type="button" onclick="deletehall({{$hall->id}})">
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




<!--------------------------------------------------hallEdit MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Hall</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

 
        <div class="modal-body">
            {{ csrf_field() }}
<!--------------------------------------Floor (reference from floor) ------------------------------------------------------------------------------------>
<div class="row">
            <div class="col-md-6">
            <label for="country">Floor</label>
            <select class=" browser-default custom-select" name="floor" id="floor">
                <option selected>--select Floor--</option>
                @foreach (App\Floor::get() as $floor)
                <option value='{{$floor->id}}'>{{ $floor->name}}</option>
                @endforeach
                
              </select>
              <span id="gendererror" style="color:red;"></span>
            </div>
        </div>


<!--------------------------------------Hall type (selection box ekak auto)------------------------------------------------------------------------------------>               
<div class="row">
            <div class="col-md-6">
            <label for="reigon"> Hall Type</label>
            <select class=" browser-default custom-select" name="halltype" id="halltype">
                <option selected>--select Hall Type--</option>
                @foreach (App\HallType::get() as $halltype)
                <option value='{{$halltype->id}}'>{{ $halltype->title}}</option>
                @endforeach
                
              </select>
              <span id="gendererror" style="color:red;"></span>
            </div>
        </div>
<!--------------------------------------Hall Number------------------------------------------------------------------------------------>              
              <div class="row">
              <div class="col-md-6">
                    <label for="Name">Hall Number</label>
                    <input type="text" class="form-control" placeholder="Hall Number" id="hnumber" name="hnumber">
                     </div>
                </div>
        
        <br>
        <br>
        
        <div class="modal-footer">
          {{-- <input type="hidden" class="form-control" name="userid" id="huserid"> --}}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="savehall()">Add</button>
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
 
      





// save floor
function savehall(){
    var floor =$("#floor").val(); 
    var halltype =$("#halltype").val(); 
    var hnumber =$("#hnumber").val(); 
    
      $.post('savehall',{
        floor:floor,halltype:halltype,hnumber:hnumber
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








// delete function

function deletehall(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deletehall',{
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
