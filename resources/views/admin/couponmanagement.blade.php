@extends('layouts.master')

@section('title')
Coupan Management|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Coupan Management</h3>
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
                           <th>img</th>
                           <th>Status</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                         
                        @foreach ($coupanmanagements as $coupanmanagement)
                        <tr>
                            <td>{{$coupanmanagement->id}}</td>
                            <td>{{$coupanmanagement->title}}</td>
                            <td>{{$coupanmanagement->c_img}}</td>
                            <td>{{$coupanmanagement->c_status}}</td>
                          
                            <td>
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
<!-------------------------------------------------- coupan manegment MODAL---------------------------------->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="coupanmanagement" method="POST" id="savecoupanmanagementid">
              <div class="modal-body">
                  {{ csrf_field() }}



<!--------------------------------------title------------------------------------------------------------------------------------>
                <div class="form-group">
                    <label for="Name">Title</label>
                    <input type="text" class="form-control" placeholder=" Enter Your Title" id="ctitle" name="ctitle">
                    <span id="ctitleerror" style="color:red;"></span>
                </div>

<!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
        <div class="col-md-2">
        <label for="room_description" class="form-control-label">Description</label></label>
        <textarea class="form-control" id="summernote" rows="5" name="c_description"></textarea>
        <span id="cdescriptionerror" style="color:red;"></span>
        </div>
        </div>
       
<!-------------------------------------- offer Image------------------------------------------------------------------------------------>   

           <div class="row">
            <div class="col-md-6">
            <label for="roomtype_img"> Image</label></label>
            <input type="file" id="c_img" class="form-control" name="c_img">
            <span id="cimageerror" style="color:red;"></span>
            </div> 
            </div>

 <!-------------------------------------- coupan period------------------------------------------------------------------------------------>   

<br>


 <div class="input-daterange datepicker row align-items-center">
  <div class="col">
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
              </div>
              <input class="form-control" placeholder="Start date" type="text" value="06/18/2020" name="cperiod" id="cperiod">
              <span id="cperioderror" style="color:red;"></span>
          </div>
      </div>
  </div>
  <div class="col">
      <div class="form-group">
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
              </div>
              <input class="form-control" placeholder="End date" type="text" value="06/22/2020" name="ceperiod" id="ceperiod" >
              <span id="ceperioderror" style="color:red;"></span>
          </div>
      </div>
  </div>
</div>
    

<!-----------------------------------------------------Coupan Code----------------------------------------------------->
      <div class="row">
          <div class="col-md-6">
              <label for="Coupan Code"> Coupan Code</label>
              <input type="text" class="form-control" placeholder="Coupan Code" name="c_code" id="c_code">
              <span id="c_coderror" style="color:red;"></span>
              </div> 
        </div>


<!--------------------------------------Coupan Type------------------------------------------------------------------------------------>
<div class="row">
  <div class="col-md-6">
  <label for="gender">Coupan Type</label>
  <select class=" browser-default custom-select" name="ctype" id="ctype">
      <option selected>--select Coupan Type--</option>
      <option value="fixed">Fixed</option>
      <option value="percentage">Percentaget</option>
     >
    </select>
    <span id="ctypeerror" style="color:red;"></span>
  </div>
</div>


<!--------------------------------------Coupan value------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Coupan Value</label></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="coupan_value" id="coupan_value"/>
            <span id="coupanvalueerror" style="color:red;"></span>
            </div>
           </div>

<!--------------------------------------Minimum Value------------------------------------------------------------------------------------>         
<div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Minimum Value</label></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="minimum_value" id="minimum_value"/>
            <span id="minimumvalueerror" style="color:red;"></span>
            </div>
           </div>
 <!--------------------------------------Maximum Value------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Maximum Value</label></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="maximum_value" id="maximum_value"/>
            <span id="maximumvalueerror" style="color:red;"></span>
            </div>
           </div>

 <!----------include user  and exclude user---------------------------------------------------->

<!-------------------------------------Limited Per User------------------------------------------------------------------------------------>  
  <div class="row">
  <div class="col-md-6">
    <label for="example-number-input" class="form-control-label">Limit Per User</label><span class="required"  style="color:red;">*</span></label>
    <input   class="form-control" type="number"   name="Limited_per_user" id="Limited_per_user"/>
    <span id="Limitedperusererror" style="color:red;"></span>
    </div>
    </div> 
<!-------------------------------------Limited Per coupan------------------------------------------------------------------------------------>  
  <div class="row">
  <div class="col-md-6">
    <label for="example-number-input" class="form-control-label">Limit Per Coupan</label><span class="required"  style="color:red;">*</span></label>
    <input   class="form-control" type="number"   name="Limited_per_coupan" id="Limited_per_coupn"/>
    <span id="Limitedpercoupnerror" style="color:red;"></span>
    </div>
    </div>



    <!--------------------------------------Active------------------------------------------------------------------------------------>         
    <div class="row">
      <div class="col-md-6">
      <label for="coupan_active" class="form-control-label">Active</label>
      <br>
      <label class="custom-toggle">
        <input type="checkbox" checked id="cactive" name="cactive">
        <span id="cactiveerror" style="color:red;"></span>
      <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
      </label>

      </div>
       </div>

    
{{-- 
<!-------------------------------------Paid Services------------------------------------------------------------------------------------>     

        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
        <label class="custom-control-label" for="customCheck1">Airport Pickup</label>
        </div>
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
        <label class="custom-control-label" for="customCheck1">Casino</label>
        </div>
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
        <label class="custom-control-label" for="customCheck1">SPA</label>
        </div>

        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
        <label class="custom-control-label" for="customCheck1">Cinema</label>
        </div>

        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
        <label class="custom-control-label" for="customCheck1">Airport Drop</label>
        </div>
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
        <label class="custom-control-label" for="customCheck1">Gym</label>
        </div>  --}}
        <div class="modal-footer">
          {{-- <input type="hidden" class="form-control" name="userid" id="huserid"> --}}
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
              </div>
              </form>
      </div>
    </div>
  </div>









  <!---- user edit modal----->

  <!-------------------------------------------------- coupan manegment MODAL---------------------------------->
  <div class="modal fade" id="editcoupanmanegment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Coupon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="coupanmanagement" method="POST" id="updatecoupanmanagementid">
        <div class="modal-body">
            {{ csrf_field() }}



<!--------------------------------------title------------------------------------------------------------------------------------>
          <div class="form-group">
              <label for="Name">Title</label>
              <input type="text" class="form-control" placeholder=" Enter Your Title" id="uctitle" name="uctitle">
              <span id="uctitleerror" style="color:red;"></span>
          </div>

<!--------------------------------------description------------------------------------------------------------------------------------>              
  <div class="row">
  <div class="col-md-2">
  <label for="room_description" class="form-control-label">Description</label></label>
  <textarea class="form-control" id="uc_description" rows="5" name="uc_description"></textarea>
  <span id="ucdescriptionerror" style="color:red;"></span>
  </div>
  </div>
 
<!-------------------------------------- offer Image------------------------------------------------------------------------------------>   

     <div class="row">
      <div class="col-md-6">
      <label for="roomtype_img"> Image</label></label>
      <input type="file" id="uc_img" class="form-control" name="uc_img">
      <span id="ucimageerror" style="color:red;"></span>
      </div> 
      </div>

<!-------------------------------------- coupan period------------------------------------------------------------------------------------>   

<br>


<div class="input-daterange datepicker row align-items-center">
<div class="col">
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
        </div>
        <input class="form-control" placeholder="Start date" type="text" value="06/18/2020" name="ucperiod" id="ucperiod">
        <span id="ucperioderror" style="color:red;"></span>
    </div>
</div>
</div>
<div class="col">
<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
        </div>
        <input class="form-control" placeholder="End date" type="text" value="06/22/2020" name="uceperiod" id="uceperiod" >
        <span id="uceperioderror" style="color:red;"></span>
    </div>
</div>
</div>
</div>


<!-----------------------------------------------------Coupan Code----------------------------------------------------->
<div class="row">
    <div class="col-md-6">
        <label for="Coupan Code"> Coupan Code</label>
        <input type="text" class="form-control" placeholder="Coupan Code" name="uc_code" id="uc_code">
        <span id="uc_coderror" style="color:red;"></span>
        </div> 
  </div>


<!--------------------------------------Coupan Type------------------------------------------------------------------------------------>
<div class="row">
<div class="col-md-6">
<label for="gender">Coupan Type</label>
<select class=" browser-default custom-select" name="uctype" id="uctype">
<option selected>--select Coupan Type--</option>
<option value="fixed">Fixed</option>
<option value="percentage">Percentaget</option>
>
</select>
<span id="uctypeerror" style="color:red;"></span>
</div>
</div>


<!--------------------------------------Coupan value------------------------------------------------------------------------------------>         
    <div class="row">
    <div class="col-md-6">
      <label for="example-number-input" class="form-control-label">Coupan Value</label></label>
      <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="ucoupan_value" id="ucoupan_value"/>
      <span id="ucoupanvalueerror" style="color:red;"></span>
      </div>
     </div>

<!--------------------------------------Minimum Value------------------------------------------------------------------------------------>         
<div class="row">
    <div class="col-md-6">
      <label for="example-number-input" class="form-control-label">Minimum Value</label></label>
      <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="uminimum_value" id="uminimum_value"/>
      <span id="uminimumvalueerror" style="color:red;"></span>
      </div>
     </div>
<!--------------------------------------Maximum Value------------------------------------------------------------------------------------>         
    <div class="row">
    <div class="col-md-6">
      <label for="example-number-input" class="form-control-label">Maximum Value</label></label>
      <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="umaximum_value" id="umaximum_value"/>
      <span id="umaximumvalueerror" style="color:red;"></span>
      </div>
     </div>

<!----------include user  and exclude user---------------------------------------------------->

<!-------------------------------------Limited Per User------------------------------------------------------------------------------------>  
<div class="row">
<div class="col-md-6">
<label for="example-number-input" class="form-control-label">Limit Per User</label></label>
<input   class="form-control" type="number"   name="uLimited_per_user" id="uLimited_per_user"/>
<span id="uLimitedperusererror" style="color:red;"></span>
</div>
</div> 
<!-------------------------------------Limited Per coupan------------------------------------------------------------------------------------>  
<div class="row">
<div class="col-md-6">
<label for="example-number-input" class="form-control-label">Limit Per Coupan</label><span class="required"  style="color:red;">*</span></label>
<input   class="form-control" type="number"   name="uLimited_per_coupan" id="uLimited_per_coupn"/>
<span id="Limitedpercoupnerror" style="color:red;"></span>
</div>
</div>



<!--------------------------------------Active------------------------------------------------------------------------------------>         
<div class="row">
<div class="col-md-6">
<label for="amenity_active" class="form-control-label">Active</label>
<br>
<label class="custom-toggle">
  <input type="checkbox" checked id="ucactive" name="ucactive">
  <span id="ucactiveerror" style="color:red;"></span>
<span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
</label>

</div>
 </div>


{{-- 
<!-------------------------------------Paid Services------------------------------------------------------------------------------------>     

  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
  <label class="custom-control-label" for="customCheck1">Airport Pickup</label>
  </div>
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
  <label class="custom-control-label" for="customCheck1">Casino</label>
  </div>
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
  <label class="custom-control-label" for="customCheck1">SPA</label>
  </div>

  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
  <label class="custom-control-label" for="customCheck1">Cinema</label>
  </div>

  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
  <label class="custom-control-label" for="customCheck1">Airport Drop</label>
  </div>
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
  <label class="custom-control-label" for="customCheck1">Gym</label>
  </div>  --}}
  <div class="modal-footer">
    <input type="hidden" class="form-control" name="couponmanagementid" id="hcouponmanagementid">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Edit</button>
  </div>
        </div>
        </form>
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
$('#savecoupanmanagementid').on('submit',function (event) {
$("#ctitleerror").html('');
$("#cdescriptionerror").html('');
$("#cimageerror").html('');
$("#cperioderror").html('');
$("#ceperioderror").html('');
$("#c_coderror").html('');
$("#ctypeerror").html('');
$("#coupanvalueerror").html('');
$("#minimumvalueerror").html('');
$("#maximumvalueerror").html('');
$("#Limitedperusererror").html('');
$("#Limitedpercoupnerror").html('');
$("#coupanvalueerror").html('');
$("#cactiveerror").html('');

event.preventDefault();
$.ajax({
type:'POST',

url:"savecoupanmanagement",

data:new FormData(this),
dataType:'JSON',
contentType:false,
cache:false,
processData:false,
success:function(data){
console.log(data)

  if (data.errors != null) {
      $.each(data.errors, function (key, value) {
          if(data.errors.name){
              var p = document.getElementById('anameerror');
              p.innerHTML = data.errors.name[0];

          }
          if(data.errors.a_image){
              var p = document.getElementById('aimageerror');
              p.innerHTML = data.errors.a_image[0];

          }
          if(data.errors.a_description){
              var p = document.getElementById('adescriptionerror');
              p.innerHTML = data.errors.a_description[0];

          }
          
        });
  }

  if (data.success != null) {

    alert("successfully added");
    
  }


}
});
});







//summer note
$('#summernote').summernote({
              placeholder: '',
              tabsize: 2,
              height: 100
});




//update

$(document).on('click', '#ucoupanmanagementid', function () {
        var coupanmanagementId = $(this).data("id");
        
    
        $.post('getBycoupanmanagementId',{
          coupanmanagementId:coupanmanagementId
        },function(data){

            $("#uctitle").val(data.title);
            $("#uc_description").val(data.c_description);
            $("#uc_img").val(data.c_img);
            $("#ucperiod").val(data.cperiod);
            $("#uceperiod").val(data.ceperiod);
            $("#uc_code").val(data.c_code);
            $("#uctype").val(data.c_type);
            $("#ucoupan_value").val(data.c_value);
            $("#uminimum_value").val(data.min_value);
            $("#umaximum_value").val(data.max_value);
            $("#uLimited_per_user").val(data.cl_user);
            $("#uLimited_per_coupn").val(data.l_coupans);
            $("#ucactive").val(data.c_status);
            $("#hcouponmanagementid").val(data.id);
            console.log(data)
        })
      
    });

        $('#ucoupanmanagementid').on('submit',function (event) {
        $("#uctitleerror").html(''); 
        $("#ucdescriptionerror").html('');
        $("#ucimageerror").html('');
        $("#ucperioderror").html('');
        $("#uceperioderror").html('');
        $("#uc_coderror").html('');
        $("#uctypeerror").html('');
        $("#ucoupanvalueerror").html('');
        $("#uminimumvalueerror").html('');
        $("#umaximumvalueerror").html('');
        $("#uLimitedperusererror").html('');
        $("#Limitedpercoupnerror").html('');
        $("#ucactiveerror").html('');
      

event.preventDefault();
$.ajax({  
    type:'POST',

    url:"editcoupanmanegment",

    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){
    console.log(data)

        if (data.errors != null) {
            $.each(data.errors, function (key, value) {
              if(data.errors.name){
              var p = document.getElementById('uanameerror');
              p.innerHTML = data.errors.name[0];

          }
          if(data.errors.a_image){
              var p = document.getElementById('uaimageerror');
              p.innerHTML = data.errors.a_image[0];

          }
          if(data.errors.a_description){
              var p = document.getElementById('uadescriptionerror');
              p.innerHTML = data.errors.a_description[0];

          }
          if(data.errors.a_status){
              var p = document.getElementById('uaactiveerror');
              p.innerHTML = data.errors.a_status[0];

          }
         
          
    
            });
        }
        if(data){
       location.reload()
        }


    }
});
});





   
//data table
$(document).ready( function () {
    $('#myTable').DataTable();
} );







// delete function

function deletecoupanmanagement(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deletecoupanmanagement',{
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