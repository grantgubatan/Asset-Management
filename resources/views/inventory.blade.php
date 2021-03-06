@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD

  <div class="">
    <a class="btn btn-primary btn-sm" href="{{url('inventory/report')}}" target="_blank"><i class="fa fa-print"></i> Generate Inventory Report</a>
  </div>
  <br>

=======
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
    <h2>Inventory</h2>
    <div class="row">
      <div class="right-inner-addon">
        <div class="pull-right">
          <i class="fa fa-desktop" ></i>
        </div>
        <input id="search" type="text" name="search" class="form-control" placeholder="Quick Search Device"><br>
      </div>
    </div>

    <div class="row">
      <div class="table-responsive">
        @include('partials.multipleButtons')

        <select class="pull-right" name="forma" onchange="location = this.value;">
          <option>Sort By</option>
          <option value="{{url('inventory/warranty/asc')}}" {{(Request::is('inventory/warranty/asc')) ? 'selected' : ''}}>Warranty - Recent First</option>
          <option value="{{url('inventory/warranty/desc')}}" {{(Request::is('inventory/warranty/desc')) ? 'selected' : ''}}>Warranty - Latest First</option>
          <option value="{{url('inventory/purchased-date/asc')}}" {{(Request::is('inventory/purchased-date/asc')) ? 'selected' : ''}}>Purchased Date - Recent First</option>
          <option value="{{url('inventory/purchased-date/desc')}}" {{(Request::is('inventory/purchased-date/desc')) ? 'selected' : ''}}>Purchased Date - Latest First</option>
          <option value="{{url('inventory')}}">Default</option>
        </select>

        <table class="table table-striped">
          <thead>
            <tr>
              <th><input type="checkbox" name="select-all" id="select-all" class="btn btn-primary" /></th>
              <th>Serial</th>
              <th>Model</th>
              <th>Hardware</th>
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
                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#outModal{{$hardware->id}}">Deploy</a>
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
              <h4><i class="fa fa-exclamation-circle"></i> No Inventory Devices found.</h4>
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
