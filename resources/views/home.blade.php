@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
