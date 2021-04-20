@extends('layouts.master')

@section('title')
Hall Types|Mount Holiday Inn
@endsection

@section('content')
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Hall Types</h3>
            <div class="col-md-12 text-right">
            <a data-id="exampleModalLabe"id="hlltypeaddmodal"class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal" >   <span class="btn-inner-icon" ><i class="fa fa-plus"></i></span>Add</a>
            </div>
          </div>
          <div class="card-body">

            <div class="card-body">
                <div class="table-responsive">
                   <table  id="myTable"class="table">
                       <thead class="text-primary">
                           <th>ID</th>
                           <th>Name</th>
                           <th>Short Code</th>
                           <th>Image</th>
                           <th>Base Price</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                        @foreach($halltypes as $halltype)
                        <tr>
                            <td>{{$halltype->id}}</td>
                            <td>{{$halltype->title}}</td>
                            <td>{{$halltype->sc}}</td>
                            <td><img src="{{asset('uploads/halltype/'. $halltype->halltypeimg)}}" class="card-img-top" alt="halltype" width="75" height="75"></td>
                            <td>{{$halltype->baseprice}}</td>
                            <td>
                            <a data-id="{{$halltype->id}}"id="updatehalltypeid" class="btn btn-success" type="button" data-toggle="modal" data-target="#edithalltype" >   <span class="btn-inner-icon" ><i class="fa fa-edit"></i></span>Edit</a>
                            <button class="btn btn-icon btn-danger" type="button" onclick="deletehalltype({{$halltype->id}})">
                            <span class="btn-inner-icon"><i class="fa fa-trash"></i></span>Delete</a>
                            <button type="button" class="btn btn-primary">   <span class="btn-inner-icon" ><i class="fa fa-eye"></i></span>View</a>
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


<!--------------------------------------------------Hall type modal---------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Hall Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="savehalltype" method="POST" id="savehalltypeid">
        <div class="modal-body">
            {{ csrf_field() }}
<!--------------------------------------Title------------------------------------------------------------------------------------>
                  <div class="row">
                <div class="form-group">
                    <label for="Name">Title</label>
                    <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                    <span id="halltypenmeerror" style="color:red;"></span>
                </div>
                </div>

<!--------------------------------------short code------------------------------------------------------------------------------------>               
               <div class="row">
                <div class="form-group">
                    <label for="Name">Short Code</label>
                    <input type="text" class="form-control" placeholder="short code" id="sc" name="sc">
                    <span id="scerror" style="color:red;"></span>
                </div>
                </div>
<!--------------------------------------description------------------------------------------------------------------------------------>              
        <div class="row">
        <div class="col-md-6">
        <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
       
        <textarea class="form-control" id="summernote" rows="10" cols="30" name="halldescription"></textarea>
        <span id="hdescriptionerror" style="color:red;"></span>
        </div>
        </div>
       


<!--------------------------------------base occupancy------------------------------------------------------------------------------------>         
          <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Base occupancy</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="baseoccupancy" id="baseoccupancy"/>
            <span id="hbaseoccupancyerror" style="color:red;"></span>
            </div>
           </div>
<!--------------------------------------higher occupancy------------------------------------------------------------------------------------>         
        <div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Higher occupancy</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="higheroccupancy" id="higheroccupancy"/>
            <span id="hhigheroccupancyerror" style="color:red;"></span>
            </div>
           </div>


{{-- 
<!--------------------------------------Amenities------------------------------------------------------------------------------------>     
<p>Amenities
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
  <label class="custom-control-label" for="customCheck1">Health Club</label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="2">
  <label class="custom-control-label" for="customCheck1">Swimming Pool</label>
</div>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="3">
  <label class="custom-control-label" for="customCheck1">Bar</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="4">
  <label class="custom-control-label" for="customCheck1">Restaurant</label>
</div>

<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" value="5">
  <label class="custom-control-label" for="customCheck1">Spa</label>
</div>

</p>
   --}}

<!--------------------------------------Base Price------------------------------------------------------------------------------------>     
<div class="row">
          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">Base Price</label><span class="required"  style="color:red;">*</span></label>
            <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="baseprice" id="baseprice"/>
            <span id="hbpriceerror" style="color:red;"></span>
            </div>
           </div>

           
<!--------------------------------------Image------------------------------------------------------------------------------------>   

<div class="row">
            <div class="col-md-6">
            <label for="roomtype_img"> Image</label><span class="required"  style="color:red;">*</span></label>
            <input type="file" id="halltypeimg" class="form-control" name="halltypeimg">
            <span id="himageerror" style="color:red;"></span>
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
 
    </div>
<!--------------------------------------------------Hall type edit modal---------------------------------->
<div class="modal fade" id="edithalltype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Hall Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="halltype" method="POST" id="updatehalltypeid">
      <div class="modal-body">
          {{ csrf_field() }}
<!--------------------------------------Title------------------------------------------------------------------------------------>
                <div class="row">
              <div class="form-group">
                  <label for="Name">Title</label>
                  <input type="text" class="form-control" placeholder="Name" id="uname" name="uname">
                  <span id="uhalltypenameerror" style="color:red;"></span>
              </div>
              </div>

<!--------------------------------------short code------------------------------------------------------------------------------------>               
             <div class="row">
              <div class="form-group">
                  <label for="Name">Short Code</label>
                  <input type="text" class="form-control" placeholder="short code" id="usc" name="usc">
                  <span id="uscerror" style="color:red;"></span>
              </div>
              </div>
<!--------------------------------------description------------------------------------------------------------------------------------>              
      <div class="row">
      <div class="col-md-6">
      <label for="room_description" class="form-control-label">Description</label><span class="required"  style="color:red;">*</span></label>
      <textarea class="form-control" id="uhalldescription" rows="5" name="uhalldescription" id="summernote"></textarea>
      <span id="uhdescriptionerror" style="color:red;"></span>
      </div>
      </div>
     


<!--------------------------------------base occupancy------------------------------------------------------------------------------------>         
        <div class="row">
        <div class="col-md-6">
          <label for="example-number-input" class="form-control-label">Base occupancy</label><span class="required"  style="color:red;">*</span></label>
          <input   class="form-control" type="number" min="0" max="5000"  name="ubaseoccupancy" id="ubaseoccupancy"/>
          <span id="uhbaseoccupancyerror" style="color:red;"></span>
          </div>
         </div>
<!--------------------------------------higher occupancy------------------------------------------------------------------------------------>         
      <div class="row">
        <div class="col-md-6">
          <label for="example-number-input" class="form-control-label">Higher occupancy</label><span class="required"  style="color:red;">*</span></label>
          <input   class="form-control" type="number" min="0" max="5000"  name="uhigheroccupancy" id="uhigheroccupancy"/>
          <span id="uhhigheroccupancyerror" style="color:red;"></span>
          </div>
         </div>


{{-- 
<!--------------------------------------Amenities------------------------------------------------------------------------------------>     
<p>Amenities
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="customCheck1" value="1">
<label class="custom-control-label" for="customCheck1">Health Club</label>
</div>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="customCheck1" value="2">
<label class="custom-control-label" for="customCheck1">Swimming Pool</label>
</div>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="customCheck1" value="3">
<label class="custom-control-label" for="customCheck1">Bar</label>
</div>

<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="customCheck1" value="4">
<label class="custom-control-label" for="customCheck1">Restaurant</label>
</div>

<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="customCheck1" value="5">
<label class="custom-control-label" for="customCheck1">Spa</label>
</div>

</p>
 --}}

<!--------------------------------------Base Price------------------------------------------------------------------------------------>     
<div class="row">
        <div class="col-md-6">
          <label for="example-number-input" class="form-control-label">Base Price</label><span class="required"  style="color:red;">*</span></label>
          <input   class="form-control" type="number" min="0.00" max="10000.00" step="0.01"  name="ubaseprice" id="ubaseprice"/>
          <span id="uhbpriceerror" style="color:red;"></span>
          </div>
         </div>

         
<!--------------------------------------Image------------------------------------------------------------------------------------>   

<div class="row">
          <div class="col-md-6">
          <label for="roomtype_img"> Image</label><span class="required"  style="color:red;">*</span></label>
          <input type="file" id="halltypeimg" class="form-control" name="uhalltypeimg">
          <span id="uhimageerror" style="color:red;"></span>
          </div> 
          </div>

      <div class="modal-footer">
        <input type="hidden" class="form-control" name="halltypeid" id="hhalltypeid">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
  </form>
  
    </div>
  </div>
</div>
</html>

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



$('#savehalltypeid').on('submit',function (event) {
$("#halltypenmeerror").html('');
$("#scerror").html('');
$("#hdescriptionerror").html('');
$("#hbaseoccupancyerror").html('');
$("#hhigheroccupancyerror").html('');
$("#hbpriceerror").html('');
$("#himageerror").html('');


event.preventDefault();
$.ajax({
type:'POST',

url:"savehalltype",

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
              var p = document.getElementById('halltypenmeerror');
              p.innerHTML = data.errors.title[0];

          }
        
          if(data.errors.sc){
              var p = document.getElementById('scerror');
              p.innerHTML = data.errors.sc[0];

          }
          if(data.errors.h_description){
              var p = document.getElementById('hdescriptionerror');
              p.innerHTML = data.errors.h_description[0];

          }
          if(data.errors.baseoccupancy){
              var p = document.getElementById('hbaseoccupancyerror');
              p.innerHTML = data.errors.baseoccupancy[0];

          }
          if(data.errors.higheroccupancy){
              var p = document.getElementById('hhigheroccupancyerror');
              p.innerHTML = data.errors.higheroccupancy[0];

          }
          // if(data.errors.a_description){
          //     var p = document.getElementById('adescriptionerror');
          //     p.innerHTML = data.errors.a_description[0];

          // }
          if(data.errors.baseprice){
              var p = document.getElementById('hbpriceerror');
              p.innerHTML = data.errors.baseprice[0];

          }

          if(data.errors.halltypeimg){
              var p = document.getElementById('himageerror');
              p.innerHTML = data.errors.halltypeimg[0];

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


//summernote

$('#summernote').summernote({
              placeholder: '',
              tabsize: 2,
              height: 100
});

                 




//update

$(document).on('click', '#updatehalltypeid', function () {
        var halltypeId = $(this).data("id");
        
    
        $.post('getByhalltypeId',{
          halltypeId:halltypeId
        },function(data){

            $("#uname").val(data.title);
            $("#usc").val(data.sc);
            $("#uhalldescription").val(data.h_description);
            $("#ubaseoccupancy").val(data.baseoccupancy);
            $("#uhigheroccupancy").val(data.higheroccupancy);
            $("#ubaseprice").val(data.baseprice);
            $("#uhalltypeimg").val(data.halltypeimg);
            $("#hhalltypeid").val(data.id);

            console.log(data)
        })
      
    });




        $('#updatehalltypeid').on('submit',function (event) {
        $("#uhalltypenameerror").html(''); 
        $("#uscerror").html('');
        $("#uhdescriptionerror").html('');
        $("#uhbaseoccupancyerror").html('');
        $("#uhhigheroccupancyerror").html('');
        $("#uhbpriceerror").html('');
        $("#uhimageerror").html('');
     
        

event.preventDefault();
$.ajax({  
    type:'POST',

    url:"edithalltype",

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
              var p = document.getElementById('uhalltypenameerror');
              p.innerHTML = data.errors.title[0];

          }
          if(data.errors.sc){
              var p = document.getElementById('uscerror');
              p.innerHTML = data.errors.sc[0];

          }
          if(data.errors.h_description){
              var p = document.getElementById('uhdescriptionerror');
              p.innerHTML = data.errors.h_description[0];

          }
          if(data.errors.baseoccupancy){
              var p = document.getElementById('uhbaseoccupancyerror');
              p.innerHTML = data.errors.baseoccupancy[0];

          }
          if(data.errors.higheroccupancy){
              var p = document.getElementById('uhhigheroccupancyerror');
              p.innerHTML = data.errors.higheroccupancy[0];

          }
         
          if(data.errors.baseprice){
              var p = document.getElementById('uhbpriceerror');
              p.innerHTML = data.errors.baseprice[0];

          }
         
          if(data.errors.halltypeimg){
              var p = document.getElementById('uhbpriceerror');
              p.innerHTML = data.errors.halltypeimg[0];

          }
          if(data.errors.halltypeimg){
              var p = document.getElementById('uhimageerror');
              p.innerHTML = data.errors.halltypeimg[0];

          }
         
      

         
          
    
            });
        }
        if(data){
       location.reload()
        }


    }
});
});





























// delete function

function deletehalltype(id) {
  swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
})
.then((willDelete) => {
        if (willDelete) {
          
          $.post('deletehalltype',{
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
