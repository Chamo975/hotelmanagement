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
            <h3 class="mb-0">Send Email</h3>
            <div class="col-md-12 text-right">
            <div class="col-md-12 text-right">
           
            </div>
          </div>
          </div>
          <div class="card-body">
           <div class="card-body">
                <div class="container">
                    <div class="row">
                        
                        <form action="{{route('contact.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="name" class="form-control" required>
                         </div>


                         <div class="form-group">
                            <label for="phone"> Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="formgroup">
                            <label for="msg"> Message</label>
                            <textarea name="msg" id="" cols="30" rows="10" class="form-control"></textarea>
                          
                        </div>
                        <input type="submit" class="btn btn-primary float-right" value="Submit">
                        </form>

                        </div>
                    </div>
                 

                </div>
            </div>


        </div>

    </div>
</div>

 
@endsection

@section('scripts')
<script>
  




 </script>
@endsection
