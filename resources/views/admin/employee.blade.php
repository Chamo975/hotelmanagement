@extends('layouts.master')

@section('title')
Employee|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Employee</h3>
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
                           <th>Department</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                       
                        @foreach ($employees as $employee)
                        <tr>
                        {{-- <td>{{\App\Department::find($employee->department_id)->name}}</td> --}}
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->username}}</td>
                        <td>{{$employee->edepartment}}</td>
                        <td> 
                        <a data-id="{{$employee->id}}"id="udepartmentid" class="btn btn-success" type="button" data-toggle="modal" data-target="#editemployee" > 
                        <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                        <button class="btn btn-icon btn-danger" type="button" onclick="deleteemployee({{$employee->id}})">
                        <span class="btn-inner-icon"><i class="fa fa-trash"></i></span>Delete</a>
                        <button class="btn btn-icon btn-primary" type="button" >
                          <span class="btn-inner-icon"><i class="fa fa-eye"></i></span>view</a>
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




<!-------------------------------------------------- Employee MODAL---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="employee" method="POST" id="saveemployeeid">
      <div class="modal-body">
       {{ csrf_field() }}



<!--------------------------------------title------------------------------------------------------------------------------------>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
        <label for="Name">Title</label>
        <input type="text" class="form-control" placeholder=" Title" id="title" name="title">
        <span id="etitleerror" style="color:red;"></span>
     </div>
      </div>
      </div>


<!-----------------------------------------------------first name----------------------------------------------------->
    <div class="row">
      <div class="col-md-6">
          <label for="firstname"> First Name</label>
          <input type="text" class="form-control" placeholder="First name" name="firstname" id="firstname">
          <span id="efirstnameerror" style="color:red;"></span>
          </div> 
    </div>
     <!-------------------------------------------------------------------------------last name---------------------------------------------------------------------------------------------->
      <div class="row">
        <div class="col-md-6">
        <label for="lastname"> Last Name</label>
        <input type="text" class="form-control" placeholder="Last name"name="lastname" id="lastname">
        <span id="elastnameerror" style="color:red;"></span>
        </div>
      </div> 

     <!----------------------------------------------------------------------------user name-------------------------------------------------------------------------------------------->
     <div class="row">
      <div class="col-md-6">
      <label for="lastname"> User Name</label>
      <input type="text" class="form-control" placeholder="User name"name="username" id="username">
      <span id="eusernameerror" style="color:red;"></span>
      </div>
      </div> 

     <!------------------------------------------------------------------------------email-------------------------------------------------------------->
     <div class="row">
      <div class="col-md-6">
     <label for="exampleFormControlInput1">Email address</label>
     <input type="email"    placeholder="name@example.com"  class="form-control" id="eemail" name="eemail" >
     <span id="eemailerror" style="color:red;"></span>
     </div>
     </div>


     <!-------------------------------------------------------------password--------------------------------->

        <div class="row">
        <div class="col-md-6">
        <label for="example-password-input" class="form-control-label">Password</label>
        <input class="form-control" type="password" value="password" id="epassword" name="epassword">
        <span id="epassworderror" style="color:red;"></span>
        </div>
        </div>
      <!------------------------------------------------------------- confirm password--------------------------------->

        <div class="row">
          <div class="col-md-6">
            <label for="example-password-input" class="form-control-label"> Confirm Password</label>
            <input class="form-control" type="password" value="password" id="ecpassword" name="ecpassword">
          <span id="ecpassworderror" style="color:red;"></span>
          </div>
        </div>


      <!--------------------------------------deprtment---------------------------------------------------------------------------------->
         
      <div class="row">
        <div class="col-md-6">
        <label for="department"> Department</label>
        <select class=" browser-default custom-select" name="edepartment" id="edepartment">
  
            <option selected>--select Department--</option>
            @foreach (App\Department::get() as $department)
        
            <option value='{{$department->id}}'>{{ $department->name}}</option>
            

           @endforeach
          </select>
          <span id="edepartmenterror" style="color:red;"></span>
        </div>
    </div>

    <!-----------------------------------------designation---------------------------------------------------------------------------------->
         
    <div class="row">
      <div class="col-md-6">
      <label for="designation"> Designation</label>
      <select class=" browser-default custom-select" name="edesignation" id="edesignation">
          <option selected>--select Designation--</option>
          @foreach (App\Designation::get() as $designation)
          <option value='{{$designation->id}}'>{{ $designation->name}}</option>
          @endforeach
        </select>
        <span id="edesigntionerror" style="color:red;"></span>
      </div>
  </div>


  <!-----------------------------------------Country---------------------------------------------------------------------------------->
 <div class="row">
  <div class="col-md-6">
      <label for="ucountry"> Country </label>
      <input type="text" class="form-control" placeholder="Country" name="ecountry" id="ecountry" required>
      <span id="ecountrynameerror" style="color:red;"></span>
      </div> 
</div>


  <!-----------------------------------------Reigon---------------------------------------------------------------------------------->
                         
                   
  <div class="row">
    <div class="col-md-6">
        <label for="reigon"> Reigon </label>
        <input type="text" class="form-control" placeholder="Reigon Name" name="ereigon" id="ereigon" required>
        <span id="ereigonerror" style="color:red;"></span>
        </div> 
  </div>

  <!-----------------------------------------city---------------------------------------------------------------------------------->
                         
  <div class="row">
    <div class="col-md-6">
        <label for="ureigon"> City </label>
        <input type="text" class="form-control" placeholder="City" name="ecity" id="ecity" required>
        <span id="ecityerror" style="color:red;"></span>
        </div> 
  </div>


  
  <!------------------------------------------Address--------------------------------------------------------->
  <div class="row">
    <div class="col-md-6">
    <label for="address"> Address</label>
    <input type="text" class="form-control" placeholder="Address"name="eaddress" id="eaddress">
    <span id="eaddresserror" style="color:red;"></span>
    </div>
 </div>

  <!--------------------------------------type of ID-------------------------------------------------------------------->
    
     <div class="row">
      <div class="col-md-6">
       <label for="id"> Type Of ID</label>
       <select class=" browser-default custom-select" name="eidtype" id="eidtype">
       <option selected>-- select Your ID Type--</option>
       <option value="nic">NIC</option>
       <option value="passport">Passport</option>
       <option value="drivinglicence">Driving License</option>
       </select>
       <span id="eiderror" style="color:red;"></span>
       </div>

    </div>

  <!-------------------------------------------ID number---------------------------------------------------->
  <div class="row">
    <div class="col-md-6">
    <label for="id"> ID Number</label>
    <input type="text" class="form-control" placeholder="ID Number" class="form-control" name="eidnumber" id="eidnumber">
    <span id="eidnumbererror" style="color:red;"></span>
    </div>
</div>    


 <!---------------------------------------------------upload id card------------------------------------>
 <div class="row">
  <div class="col-md-6">
  <label for="file"> Upload ID card</label>
  <input type="file" id="myFile"  class="form-control" name="euploadidcard" id="euploadidcard">
  <span id="eidimagerror" style="color:red;"></span>
  </div>
</div>    


<!--------------------------------------remark------------------------------------------------------------------------------------>              
<div class="row">
  <div class="col-md-2">
  <label for="remark" class="form-control-label">Remark</label>
  <textarea class="form-control"  rows="5" name="eremark" id="eremark"></textarea>
  <span id="eremarkerror " style="color:red;"></span>
  </div>
  </div>
  </div> 

  <div class="modal-footer">
    {{-- <input type="hidden" class="form-control" name="userid" id="huserid"> --}}
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
</form>
</div>
</div>
</div>


<!-------------------------------------------------------------  edit-------------------------------------------------------------------------------------------->






  <!---------------------------------------------------employee edit modal----------------------------------------------------------------------->




  
  <div class="modal fade" id="editemployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Add Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="editemployee" method="POST" id="uemployeeid">
        <div class="modal-body">
            {{ csrf_field() }}



<!--------------------------------------title------------------------------------------------------------------------------------>
        <div class="row">
          <div class="col-md-6">
                <div class="form-group">
                    <label for="Name">Title</label>
                    <input type="text" class="form-control" placeholder=" Title" id="utitle" name="utitle">
                    <span id="utitleerror" style="color:red;"></span>
                </div>
                </div>
                </div>
<!-----------------------------------------gender---------------------------------------------------------------------------------->
         <div class="row">
            <div class="col-md-6">
            <label for="gender"> Gender</label>
            <select class=" browser-default custom-select" name="uselectgender" id="uselectgender">
                <option selected>--select Gender--</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              <span id="ugendererror" style="color:red;"></span>
            </div>
        </div>
          <!-----------------------------------------------------first name----------------------------------------------------->
          <div class="row">
          <div class="col-md-6">
              <label for="firstname"> First Name</label>
              <input type="text" class="form-control" placeholder="First name" name="ufirstname" id="ufirstname" required>
              <span id="ufirstnameerror" style="color:red;"></span>
              </div> 
        </div>

        
        <!------------------------------------------last name--------------------------------->
        <div class="row">
              <div class="col-md-6">
              <label for="lastname"> Last Name</label>
              <input type="text" class="form-control" placeholder="Last name"name="ulastname" id="ulastname">
              <span id="ulastnameerror" style="color:red;"></span>
              </div>
        </div> 

         <!------------------------------------------user name--------------------------------->
         <div class="row">
              <div class="col-md-6">
              <label for="lastname"> User Name</label>
              <input type="text" class="form-control" placeholder="User name"name="uusername" id="uusername">
              <span id="usernameerror" style="color:red;"></span>
              </div>
        </div>
        
         <!------------------------------------------email--------------------------------->
         <div class="row">
         <div class="col-md-6">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="uemail" name="uemail"placeholder="name@example.com">
        <span id="uemailerror" style="color:red;"></span>
        </div>
        </div>
<!-------------------------------------------------------------password--------------------------------->

    <div class="row">
         <div class="col-md-6">
        <label for="example-password-input" class="form-control-label">Password</label>
        <input class="form-control" type="password" value="password" id="upassword" name="upassword">
        <span id="upassworderror" style="color:red;"></span>
    </div>
    </div>

    <!------------------------------------------------------------- confirm password--------------------------------->

    <div class="row">
         <div class="col-md-6">
        <label for="example-password-input" class="form-control-label"> Confirm Password</label>
        <input class="form-control" type="password" value="password" id="ucpassword" name="ucpassword">
        <span id="ucpassworderror" style="color:red;"></span>
    </div>
    </div>

<!-----------------------------------------deprtment---------------------------------------------------------------------------------->
         
         <div class="row">
            <div class="col-md-6">
            <label for="gender"> Department</label>
            <select class=" browser-default custom-select" name="udepartment" id="udepartment">
                <option selected>--select Department--</option>
                <option value="male">1</option>
                <option value="female">2</option>
                <option value="female">3</option>
                <option value="female">4/option>
              </select>
              <span id="udepartmenterror" style="color:red;"></span>
            </div>
        </div>


<!-----------------------------------------designation---------------------------------------------------------------------------------->
         
       <div class="row">
            <div class="col-md-6">
            <label for="designation"> Designation</label>
            <select class=" browser-default custom-select" name="udesignation" id="udesignation">
                <option selected>--select Designation--</option>
                <option value="male">1</option>
                <option value="female">2</option>
                <option value="female">3</option>
                <option value="female">4</option>
              </select>
              <span id="udesignationerror" style="color:red;"></span>
            </div>
        </div>

 <!-----------------------------------------Country---------------------------------------------------------------------------------->
                         
      <div class="row">
        <div class="col-md-6">
            <label for="ucountry"> Country </label>
            <input type="text" class="form-control" placeholder="Country" name="ucountry" id="ucountry" required>
            <span id="ucountryerror" style="color:red;"></span>
            </div> 
      </div>
        <!-----------------------------------------Reigon---------------------------------------------------------------------------------->
                         
        <div class="row">
          <div class="col-md-6">
              <label for="ureigon"> Country </label>
              <input type="text" class="form-control" placeholder="Reigon Name" name="ureigon" id="ureigon" required>
              <span id="ureigonerror" style="color:red;"></span>
              </div> 
        </div>



  <!-----------------------------------------city---------------------------------------------------------------------------------->
     
  <div class="row">
    <div class="col-md-6">
        <label for="ureigon"> City </label>
        <input type="text" class="form-control" placeholder="City" name="ucity" id="ucity" required>
        <span id="ucityerror" style="color:red;"></span>
        </div> 
  </div>


  <!------------------------------------------Address-------------------------------->
           <div class="row">
              <div class="col-md-6">
              <label for="Address"> Address</label>
              <input type="text" class="form-control" placeholder="Address"name="uaddress" id="uaddress">
              <span id="uaddresserror" style="color:red;"></span>
              </div>
           </div>

    <!--------------------------------------type of ID--------------------------------------->
    
    <div class="row">
           <div class="col-md-6">
            <label for="id"> Type Of ID</label>
            <select class=" browser-default custom-select" name="uidtype" id="uidtype">
            <option selected>-- select Your ID Type--</option>
            <option value="nic">NIC</option>
            <option value="passport">Passport</option>
            <option value="drivinglicence">Driving License</option>
            </select>
            <span id="uiderror" style="color:red;"></span>
            </div>

</div>

    <!-------------------------------------------ID number---------------------------------------------------->
        <div class="row">
            <div class="col-md-6">
            <label for="id"> ID Number</label>
            <input type="text" class="form-control" placeholder="ID Number" class="form-control" name="uidnumber" id="uidnumber">
            <span id="uidnumbererror" style="color:red;"></span>
            </div>
        </div>    

 <!---------------------------------------------------upload id card------------------------------------>
 <div class="row">
   <div class="col-md-6">
          <label for="file"> Upload ID card</label>
          <input type="file" class="form-control" name="uuploadidcard" id="uuploadidcard">
          <span id="uidimagerror" style="color:red;"></span>
          </div>
</div>    



<!--------------------------------------remark------------------------------------------------------------------------------------>              
<div class="row">
        <div class="col-md-2">
        <label for="remark" class="form-control-label">Remark</label>
        <textarea class="form-control" id="uremark" rows="5" name="uremark"></textarea>
        <span id="uremarkerror" style="color:red;"></span>
        </div>
        </div>
            
        </div>

        <div class="modal-footer">
          <input type="hidden" class="form-control" name="employeeid" id="hemployeeid">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
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

   
$('#saveemployeeid').on('submit',function (event) {
$("#etitleerror").html('');
$("#efirstnameerror").html('');
$("#elastnameerror").html('');
$("#eusernameerror").html('');
$("#eemailerror").html('');
$("#epassworderror").html('');
$("#ecpassworderror").html('');
$("#edepartmenterror").html('');
$("#edesigntionerror").html('');
$("#ecountrynameerror").html('');
$("#ereigonerror").html('');
$("#ecityerror").html('');
$("#eaddresserror").html('');
$("#eiderror").html('');
$("#eidnumbererror").html('');
$("#eidimagerror").html('');
$("#eremarkerror").html('');



event.preventDefault();
$.ajax({
type:'POST',

url:"saveemployee",

data:new FormData(this),
dataType:'JSON',
contentType:false,
cache:false,
processData:false,
success:function(data){
console.log(data)

  if (data.errors != null) {
      $.each(data.errors, function (key, value) {
         
          if(data.errors.title){
              var p = document.getElementById('etitleerror');
              p.innerHTML = data.errors.title[0];

          }
          if(data.errors.firstname){
              var p = document.getElementById('efirstnameerror');
              p.innerHTML = data.errors.firstname[0];

          }
          if(data.errors.lastname){
              var p = document.getElementById('elastnameerror');
              p.innerHTML = data.errors.lastname[0];

          }
          if(data.errors.username){
              var p = document.getElementById('eusernameerror');
              p.innerHTML = data.errors.username[0];

          }
          if(data.errors.email){
              var p = document.getElementById('eemailerror');
              p.innerHTML = data.errors.email[0];

          }

          if(data.errors.password){
              var p = document.getElementById('adescription');
              p.innerHTML = data.errors.password[0];

          }

          if(data.errors.confirmpassword){
              var p = document.getElementById('epassworderror');
              p.innerHTML = data.errors.confirmpassword[0];

          }
          if(data.errors.country){
              var p = document.getElementById('ecpassworderror');
              p.innerHTML = data.errors.country[0];

          }
          // if(data.errors.department_id){
          //     var p = document.getElementById('edepartmenterror');
          //     p.innerHTML = data.errors.department_id[0];

          // }
          // if(data.errors.designation_id){
          //     var p = document.getElementById('edesigntionerror');
          //     p.innerHTML = data.errors.designation_id[0];

          // }

          if(data.errors.country){
              var p = document.getElementById('ecountrynameerror');
              p.innerHTML = data.errors.country[0];

          }
          if(data.errors.reigon){
            var p = document.getElementById('ereigonerror');
              p.innerHTML = data.errors.reigon[0];

          }
          if(data.errors.idnumber){
            var p = document.getElementById('ecityerror');
              p.innerHTML = data.errors.idnumber[0];

          }
          if(data.errors.idtype){
              var p = document.getElementById('eiderror');
              p.innerHTML = data.errors.idtype[0];

          }
          if(data.errors.idnumber){
              var p = document.getElementById('eidnumbererror');
              p.innerHTML = data.errors.idnumber[0];

          }
          if(data.errors.e_img){
              var p = document.getElementById('eidimagerror');
              p.innerHTML = data.errors.e_img[0];

          }
          if(data.errors.remark){
              var p = document.getElementById('eremarkerror');
              p.innerHTML = data.errors.remark[0];

          }

          
        });
  }

  if (data.success != null) {

    alert("successfully added");
    
  }


}
});
});





//data table
$(document).ready( function () {
    $('#myTable').DataTable();
} );


// delete function

function deleteemployee(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deleteemployee',{
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





$(document).on('click', '#uemployeeid', function () {
        var amenityId = $(this).data("id");
        
    
        $.post('getByemployeeId',{
          employeeId:employeeId
        },function(data){

            $("#utitle").val(data.name);
            $("#ufirstname").val(data.a_description);
            $("#ulastname").val(data.a_status);
            $("#uusername").val(data.id);
            $("#uemail").val(data.id);
            $("#upassword").val(data.id);
            $("#ucpassword").val(data.id);
            $("#udepartment").val(data.id);
            $("#udesignation").val(data.id);
            $("#ucountry").val(data.id);
            $("#ureigon").val(data.id);
            $("#ucity").val(data.id);
            $("#uaddress").val(data.id);
            $("#uidtype").val(data.id);
            $("#uidnumber").val(data.id);
            $("#uuploadidcard").val(data.id);
            $("#uremark").val(data.id);
            $("#hemployeeid").val(data.id);
            console.log(data)
        })
      
    });




        $('#uemployeeid').on('submit',function (event) {
        $("#utitleerror").html(''); 
        $("#ugendererror").html('');
        $("#ufirstnameerror").html('');
        $("#ulastnameerror").html('');
        $("#usernameerror").html('');
        $("#uemailerror").html('');
        $("#upassworderror").html('');
        $("#ucpassworderror").html('');
        $("#udepartment").html('');
        $("#udesignationerror").html(''); 
        $("#ucountryerror").html('');
        $("#ureigonerror").html('');
        $("#ucityerror").html('');
        $("#uaddresserror").html('');
        $("#uiderror").html('');
        $("#uidnumbererror").html('');
        $("#uidimagerror").html('');
        $("#uremarkerror").html('');
      




event.preventDefault();
$.ajax({  
    type:'POST',

    url:"editemployee",

    data:new FormData(this),
    dataType:'JSON',
    contentType:false,
    cache:false,
    processData:false,
    success:function(data){
    console.log(data)

    if (data.errors != null) {
      $.each(data.errors, function (key, value) {
         
          if(data.errors.title){
              var p = document.getElementById('utitleerror');
              p.innerHTML = data.errors.title[0];

          }
          if(data.errors.gender){
              var p = document.getElementById('ugendererror');
              p.innerHTML = data.errors.gender[0];

          }
          if(data.errors.firstname){
              var p = document.getElementById('ufirstnameerror');
              p.innerHTML = data.errors.firstname[0];

          }
          if(data.errors.lastname){
              var p = document.getElementById('usernameerror');
              p.innerHTML = data.errors.lastname[0];

          }
          if(data.errors.username){
              var p = document.getElementById('eusernameerror');
              p.innerHTML = data.errors.username[0];

          }
          if(data.errors.email){
              var p = document.getElementById('uemailerror');
              p.innerHTML = data.errors.email[0];

          }

          if(data.errors.password){
              var p = document.getElementById('upassworderror');
              p.innerHTML = data.errors.password[0];

          }

          if(data.errors.confirmpassword){
              var p = document.getElementById('ucpassworderror');
              p.innerHTML = data.errors.confirmpassword[0];

          }

          if(data.errors.department_id){
              var p = document.getElementById('udepartment');
              p.innerHTML = data.errors.department_id[0];

          }
          if(data.errors.designation_id){
              var p = document.getElementById('udesignation');
              p.innerHTML = data.errors.designation_id[0];

          }
          if(data.errors.country){
              var p = document.getElementById('ucountryerror');
              p.innerHTML = data.errors.country[0];

          }
        
          if(data.errors.reigon){
            var p = document.getElementById('ureigonerror');
              p.innerHTML = data.errors.reigon[0];

          }
         
          if(data.errors.city	){
            var p = document.getElementById('ucityerror');
              
              p.innerHTML = data.errors.city	[0];

          }
          if(data.errors.address	){
            var p = document.getElementById('uaddresserror');
              
              p.innerHTML = data.errors.address	[0];

          }

          if(data.errors.idtype){
              var p = document.getElementById('uiderror');
              p.innerHTML = data.errors.idtype[0];

          }

          if(data.errors.idnumber){
              var p = document.getElementById('uidnumbererror');
              p.innerHTML = data.errors.idnumber[0];

          }
          if(data.errors.e_img){
              var p = document.getElementById('uidimagerror');
              p.innerHTML = data.errors.e_img[0];

          }
          if(data.errors.remark){
              var p = document.getElementById('uremarkerror');
              p.innerHTML = data.errors.remark[0];

          }
          
    
            });
        }
        if(data){
       location.reload()
        }


    }
});
}); 











  </script>
  @endsection















