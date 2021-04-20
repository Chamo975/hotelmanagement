@extends('layouts.master')

@section('title')
Booked Halls|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Booked Halls</h3>
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



 </script>
@endsection
