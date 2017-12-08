@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<<<<<<< HEAD
      <a href="{{url('/dashboard-pdf')}}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> Generate Report</a>
    </div>
    <div class="row">
=======
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
      <div class="col-sm-6">
        {!! $status->html() !!}
      </div>
      <div class="col-sm-6">
        {!! $hardware_type->html() !!}
      </div>
    </div>
    <hr>
    <div class="row">
       <div class="col-sm-6">
         {!! $vendor->html() !!}
       </div>
    </div>


</div>

<!-- End Of Main Application -->
{!! Charts::scripts() !!}
{!! $status->script() !!}
{!! $vendor->script() !!}
{!! $hardware_type->script() !!}
@endsection
