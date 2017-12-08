@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">
      @include('partials.entry')
<<<<<<< HEAD
      <a class="btn btn-primary btn-sm" href="{{url('deliveries/report')}}" target="_blank"><i class="fa fa-print"></i> Generate Delivery Report</a>
=======
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
    </div>
    <br>
    <div class="row">
      <div class="right-inner-addon">
        <div class="pull-right">
          <i class="fa fa-desktop" ></i>
        </div>
        <input id="search" type="text" name="search" class="form-control" placeholder="Quick Search Device"><br>
      </div>
    </div>

    <h2>Recently Added Deliveries</h2>
    <div class="row">
      <div class="table-responsive">
        @include('partials.multipleButtons')

<<<<<<< HEAD


=======
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
        <select class="pull-right" name="forma" onchange="location = this.value;">
          <option>Sort By</option>
          <option value="{{url('deliveries/warranty/asc')}}">Warranty - Recent First</option>
          <option value="{{url('deliveries/warranty/desc')}}">Warranty - Latest First</option>
          <option value="{{url('deliveries/purchased-date/asc')}}">Purchased Date - Recent First</option>
          <option value="{{url('deliveries/purchased-date/desc')}}">Purchased Date - Latest First</option>
          <option value="{{url('deliveries')}}">Default</option>
        </select>

        <table class="table table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" name="select-all" id="select-all" class="btn btn-primary" /></th>
              <th>Serial</th>
              <th>Model</th>
              <th>Hardware Type</th>
              <th>Brand</th>
              <th>Processor</th>
              <th>RAM</th>
              <th>Storage</th>
              <th>Storage Type</th>
              <th>Purchased</th>
              <th>Warranty</th>
              <th>Status</th>
              <th>Commands</th>
            </tr>
          </thead>
          <tbody>
            @forelse($hardwares as $hardware)
            <tr>
              <td><input type="checkbox" name="checkbox" class="sub_chk" data-id="{{$hardware->id}}"></td>
              <td>{{$hardware->serial}}</td>
              <td>{{$hardware->model_name}}</td>
              <td>{{$hardware->hardware_type}}</td>
              <td>{{$hardware->brand}}</td>
              <td>{{$hardware->processor}}</td>
              <td>{{$hardware->ram}}</td>
              <td>{{$hardware->storage}}</td>
              <td>{{$hardware->storage_type}}</td>
              <td>{{$hardware->purchased_date->format('M d, Y')}}</td>
              <td><b>{{$hardware->warranty_date->format('M d, Y')}}</b></td>
              <td>{{$hardware->status}}</td>
              <td>
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#owner{{$hardware->id}}" >View Details</button>
                <!--<a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#inModal{{$hardware->id}}">In</a>
                <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#outModal{{$hardware->id}}">Out</a>-->
<<<<<<< HEAD
                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal{{$hardware->id}}">Dispose</a>
=======
                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal{{$hardware->id}}">Remove</a>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
                @include('partials.details')
                @include('partials.inModal')
                @include('partials.outModal')
                @include('partials.editModal')
                @include('partials.deleteModal')
              </td>
            </tr>
            @empty
            <div class="alert alert-success">
              <h4><i class="fa fa-exclamation-circle"></i> No deliveries found.</h4>
            </div>
            @endforelse
          </tbody>
        </table>
        <center>{{$hardwares->links()}}</center>
      </div>
    </div>
</div>
<script type="text/javascript">

</script>
@endsection
