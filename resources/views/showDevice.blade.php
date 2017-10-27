@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#inModal{{$hardware->id}}">Put to Inventory</a>
      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#outModal{{$hardware->id}}">Deploy</a>
      <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{$hardware->id}}">Edit</a>
      @include('partials.details')
      @include('partials.inModal')
      @include('partials.outModal')
      @include('partials.editModal')
    </div>
    <div class="row">
      <h1>Device Details</h1>
      <h4>Hardware Details</h4>
      <p><b>Serial:</b> {{ $hardware->serial }}</p>
      <p><b>Model Name:</b> {{ $hardware->model_name }}</p>
      <p><b>Hardware:</b> {{ $hardware->hardware_type }}</p>
      <p><b>Vendor:</b> {{ $hardware->vendor }}</p>
      <p><b>Brand:</b> {{ $hardware->brand }}</p>
      <p><b>Processor:</b> {{ $hardware->processor }}</p>
      <p><b>RAM:</b> {{ $hardware->ram }}</p>
      <p><b>Graphics:</b> {{ $hardware->graphics }}</p>
      <p><b>Storage:</b> {{ $hardware->storage }}</p>
      <p><b>Storage Type:</b> {{ $hardware->storage_type }}</p>
      <p><b>Purchased Date:</b> {{ $hardware->purchased_date->format('M d, Y') }}</p>
      <p><b>Warranty Date:</b> {{ $hardware->warranty_date->format('M d, Y') }}</p>
      <p><b>Status:</b> {{ $hardware->status }}</p>

      <hr>
      @foreach(App\Employee::where('hardware_id', $hardware->id)->orderBy('updated_at', 'desc')->cursor() as $key=>$employee)
      @if($key === 0)
      <h4>Current Owner</h4>
      <h5><b>Employee Name:</b> {{ $employee->name }}</h5>
      <h5><b>Deployed By:</b> {{ $employee->deployed_by }}</h5>
      <p><b>Deployed at:</b> {{$employee->deployed_date->format('M d, Y')}}</p>
      @else
      <hr>
      <h5><b>Past Owner:</b> <h5>{{ $employee->name }}</h5></h5>
      <h5><b>Deployed By:</b> {{ $employee->deployed_by }}</h5>
      <p><b>Deployed at:</b> {{$employee->deployed_date->format('M d, Y')}}</p>
      @endif
      @endforeach
    </div>
</div>
@endsection
