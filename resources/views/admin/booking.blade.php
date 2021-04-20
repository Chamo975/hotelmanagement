@extends('layouts.master')

@section('title')
Make Reservation|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Make Reservation</h3>
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
                           <th>Booking Number</th>
                           <th>Customer Name </th>
                           <th>Room/Hall</th>
                           <th>Checkin Date</th>
                           <th>Checkout Date</th>
                           <th>Booking Date</th>
                           <th>Payment Status</th>
                           <th>Booking Status</th>
                       </thead>
                       <tbody>
                           
                       {{-- @foreach ($departments as $department)
                                <tr>
                                <td>{{$department->department_id}}</td>
                                <td>{{$department->name}}</td>
                                <td> 
                                <a data-id="{{$department->id}}"id="udepartmentid" class="btn btn-success" type="button" data-toggle="modal" data-target="#editdepartment" > 
                                <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                                <button class="btn btn-icon btn-danger" type="button" onclick="deletedepartment({{$department->id}})">
                                <span class="btn-inner-icon"><i class="fa fa-trash"></i></span>Delete</a>
                                </td>
                                </tr>
                           @endforeach --}}
                          

                       </tbody>
                   </table>

                </div>
            </div>


        </div>

    </div>
</div>
<!--------------------------------------------------Booking Add MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Booking</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ csrf_field() }}



<!--------------------------------------Guest------------------------------------------------------------------------------------>

         
<div class="row">
    <div class="col-md-6">
    <label for="department"> Guest</label>
    <select class=" browser-default custom-select" name="edepartment" id="edepartment">
        <option selected>--select Guest--</option>
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
        <option value="">4</option>
      </select>
      <span id="bookinggerror" style="color:red;"></span>
    </div>
</div>

 
<!--------------------------------------Booking Type------------------------------------------------------------------------------------>

         
<div class="row">
    <div class="col-md-6">
    <label for="Booking"> Booking Type</label>
    <select id='purpose' class=" browser-default custom-select">
        <option selected>--select Reservation--</option>
        <option value="1">Room Booking use</option>
        <option value="2">Hall Booking</option>
        
        
        </select>
        <div style='display:none;' id='business'><br/>&nbsp;
        <br/>&nbsp;
    
        <label for="Booking">Room Type</label>
            <select id='purpose' class=" browser-default custom-select">
            <option value="0">1</option>
            <option value="1">2</option>
           
            </select>


            <!-----Adults--------->
            <div class="form-group">
                <label for="number">Adults</label>
                <input type="text" class="form-control" placeholder="room type" id="urtype" name="urtype">
                <span id="roomtypeerror" style="color:red;"></span>
            </div>
            <!----Kids--------->
            <div class="form-group">
                <label for="number">Kids</label>
                <input type="text" class="form-control" placeholder="room type" id="urtype" name="urtype">
                <span id="roomtypeerror" style="color:red;"></span>
            </div>
            <!------Check in Date----->
            <div class="form-group">
                <label for="number">Check-In Date</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control" placeholder="Start date" type="text" value="06/18/2020" name="ucperiod" id="ucperiod">
                    <span id="ucperioderror" style="color:red;"></span>
                </div>
            </div>
                <!-------check out dte-------------->

                <div class="form-group">
                    <label for="number">Check-Out-Date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control" placeholder="Start date" type="text" value="06/18/2020" name="ucperiod" id="ucperiod">
                        <span id="ucperioderror" style="color:red;"></span>
                    </div>
                </div>  

                
                  
        <div style='display:none;' id='business_new'>Business Name<br/>&nbsp;
        <br/>&nbsp;
            <input type='text' class='text' name='business' value="1254" size='20' />
            <input type='text' class='text' name='business' value size='20' />
            <br/>
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

    

   //data tables
   $(document).ready( function () {
        $('#myTable').DataTable();
    } );



    $(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
           $("#business_new").hide();
        $("#business").show();
      }
      else  if ( this.value == '2')
      {
          $("#business").hide();
        $("#business_new").show();
      }
       else  
      {
        $("#business").hide();
      }
    });
});

 </script>
@endsection
