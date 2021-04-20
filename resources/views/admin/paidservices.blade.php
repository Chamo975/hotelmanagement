@extends('layouts.master')

@section('title')
Paid Services|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Paid Services</h3>
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
                           <th>Title</th>
                           <th>Status</th>
                           <th>Acion</th>
                       </thead>
                       <tbody>

                        @foreach ($paidservices as $paidservice)
                        <tr>
                            <td>{{$paidservice->id}}</td>
                            <td>{{$paidservice->title}}</td>
                            <td>{{$paidservice->status}}</td>
                            
                            <td>
                            <a data-id="{{$paidservice->id}}"id="upaidservice" class="btn btn-success" type="button" data-toggle="modal" data-target="#editpaidservice" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                            <button class="btn btn-icon btn-danger" type="button" onclick="deletepaidservices({{$paidservice->id}})">
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
<!-------------------------------------------------- Paid Services MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Paid Services</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            {{ csrf_field() }}



<!--------------------------------------Title------------------------------------------------------------------------------------>
<div class="row">
          <div class="col-md-6">
              <label for="Title"> Title</label>
              <input type="text" class="form-control" placeholder="Title" name="ptitle" id="ptitle">
              <span id="ptitleerror" style="color:red;"></span>
              </div> 
        </div>


  {{-- <!------------------------------------------Room Type-------------------------------------------------------------->
  <div class="row">
              <div class="col-md-6">
              <label for="lastname"> Room Type</label>
              <input type="text" class="form-control" placeholder="Address"name="roomtype" id="roomtype">
              <span id="lastnameerror" style="color:red;"></span>
              </div>
           </div> --}}

        

<!--------------------------------------Price Type------------------------------------------------------------------------------------>
<div class="row">
            <div class="col-md-6">
            <label for="gender">Price Type</label>
            <select class=" browser-default custom-select" name="pricetype" id="pricetype">
                <option selected>--select Price Type--</option>
                <option value="perperson">Per Person</option>
                <option value="pernight">Per Night</option>
                <option value="fixedprice">Fixed Price</option>
              </select>
              <span id="ptypeerror" style="color:red;"></span>
            </div>
        </div>



        
<!--------------------------------------Price------------------------------------------------------------------------------------>         
<div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Price</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="price" id="price"/>
            <span id="peerror" style="color:red;"></span>
            </div>
           </div>


      

<!--------------------------------------Status------------------------------------------------------------------------------------>         
<div class="row">
          <div class="col-md-6">
          <label for="room_description" class="form-control-label">Status</label>
          <br>
          <label class="custom-toggle">
          <input type="checkbox" checked id="pactive" name="pactive">
          <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
          </label>
    
          </div>
          </div>   


 <!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
        <div class="col-md-2">
        <label for="room_description" class="form-control-label">Description</label>
        <textarea class="form-control" id="summernote" rows="5" name="pdescription" id="pdescription"></textarea>
        <span id="pdescriptionerror" style="color:red;"></span>
        </div>
        </div>  

<!-------------------------------------- short  description------------------------------------------------------------------------------------>              
<div class="row">
  <div class="col-md-6">
  <label for="room_description" class="form-control-label">  Short Description</label><span class="required"  style="color:red;">*</span></label>
  <textarea class="form-control" id="psdescription" rows="5" name="psdescription" id="summernote"></textarea>
  <span id="upsdescriptionerror" style="color:red;"></span>
  </div>
  </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="savepaidservices()">Add</button>
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


$('#summernote').summernote({
              placeholder: '',
              tabsize: 2,
              height: 100
});



  
// save paidservice
function savepaidservices(){
    var ptitle =$("#ptitle").val(); 
    var pricetype =$("#pricetype").val(); 
    var price =$("#price").val(); 
    var pactive = $('#pactive:checked').val(); 
      if(active="on"){
      var pactive=1;
      }
      else{
        var pactive=0;
      }
      var pdescription =$("#pdescription").val(); 
      var psdescription =$("#psdescription").val(); 
      $.post('savepaidservices',{
        ptitle:ptitle,pricetype:pricetype,price:price,pactive:pactive,pdescription:pdescription,psdescription:psdescription
      },function(data){


        if (data.errors != null) {
         $.each(data.errors, function (key, value) {
          if(data.errors.fname){
              var p = document.getElementById('fnameerror');
              p.innerHTML = data.errors.fname[0];

          }
          if(data.errors.fnumber){
              var p = document.getElementById('fnumbererror');
              p.innerHTML = data.errors.fnumber[0];

          }
          if(data.errors.fdescription){
              var p = document.getElementById('fdescriptionerror');
              p.innerHTML = data.errors.fdescription[0];

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





// delete function

function deletepaidservices(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deletepaidservices',{
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
