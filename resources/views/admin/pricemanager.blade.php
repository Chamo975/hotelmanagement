@extends('layouts.master')

@section('title')
Price Manager|Mount Holiday Inn
@endsection

@section('content')


<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class=" col ">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Price Manager</h3>
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
{{--                            
                       @foreach ($departments as $department)
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


         

<!---------------------------------------room type----------------------------------------------------------------------------->
            <div class="row">
              <div class="col-md-4">
              <label for="designation"> Room Type</label>
              <select class=" browser-default custom-select" name="roomtype" id="roomtype">
                  <option selected>--select Room Type --</option>
                  <option value="male">1</option>
                  <option value="female">2</option>
                  <option value="female">3</option>
                  <option value="female">4</option>
                </select>
                <span id="roomtypeerror" style="color:red;"></span>
              </div>
          </div>

        </div>

  
        <div class="bs-example">
          <ul class="nav nav-tabs">
              <li class="nav-item">
                  <a href="panel1" class="nav-link active">Regular Price</a>
              </li>
              <li class="nav-item">
                  <a href="panel2" class="nav-link">Special Price</a>
              </li>
             
          </ul>
      </div>
      <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
        <div class="col-md-6">
          <label for="example-number-input" class="form-control-label">MON</label></label>
          <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="price" id="price"/>
          <span id="peerror" style="color:red;"></span>
          </div>


          <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">TUE</label></label>
            <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="price" id="price"/>
            <span id="peerror" style="color:red;"></span>
            </div>

             <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">WED</label></label>
            <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="price" id="price"/>
            <span id="peerror" style="color:red;"></span>
          </div>
            <div class="col-md-6">
            <label for="example-number-input" class="form-control-label">THU</label></label>
            <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="price" id="price"/>
            <span id="peerror" style="color:red;"></span>
            </div>

            <div class="col-md-6">
              <label for="example-number-input" class="form-control-label">FRI</label></label>
              <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="price" id="price"/>
              <span id="peerror" style="color:red;"></span>
              </div>

              <div class="col-md-6">
                <label for="example-number-input" class="form-control-label">SAT</label></label>
                <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="price" id="price"/>
                <span id="peerror" style="color:red;"></span>
                </div>

                <div class="col-md-6">
                  <label for="example-number-input" class="form-control-label">SUN</label></label>
                  <input   class="form-control" type="number" min="0.00" max="5" step="0.01"  name="price" id="price"/>
                  <span id="peerror" style="color:red;"></span>
                  </div>
           

       </div>



{{-- 

 <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Nunc tincidunt</a></li>
    <li><a href="#tabs-2">Proin dolor</a></li>
    <li><a href="#tabs-3">Aenean lacinia</a></li>
  </ul>
  <div id="tabs-1">
    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
  </div>
  <div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
</div> --}}



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

   


          //data tables
          $(document).ready( function () {
                $('#myTable').DataTable();
            } );



//tabs
    $( function() {
    $( "#tabs" ).tabs();
  } );

 </script>
@endsection
