@extends('layouts.master')

@section('title')
Location|Mount Holiday Inn
@endsection

@section('content')


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
