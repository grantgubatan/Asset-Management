<!-- Modal -->
<div class="modal fade" id="owner{{$hardware->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body long-modal">
        <h4>Hardware Details</h4>
        <p><b>Serial:</b> {{ $hardware->serial }}</p>
        <p><b>Model Name:</b> {{ $hardware->model_name }}</p>
        <p><b>Hardware:</b> {{ $hardware->hardware_type }}</p>
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
        @if($key === 0 && $hardware->status !== 'Inventory')
        <h4>Current Owner</h4>
        <h5><b>Employee Number:</b> {{ $employee->emp_id }}</h5>
        <h5><b>Seat Number:</b> {{ $employee->seat }}</h5>
        <h5><b>Employee Name:</b> {{ $employee->name }}</h5>
        <h5><b>Deployed By:</b> {{ $employee->hardware->deployed_by }}</h5>
        <p><b>Deployed at:</b> {{$employee->hardware->created_at->format('M d, Y  g:i A')}}</p>
        @elseif($hardware->status === 'Inventory')
        <hr>
        <h5><b>Past Owner:</b> <h5>{{ $employee->name }}</h5></h5>
        <h5><b>Deployed By:</b> {{ $employee->hardware->deployed_by }}</h5>
        <p><b>Deployed at:</b> {{$employee->hardware->created_at->format('M d, Y  g:i A')}}</p>
        @else
        <hr>
        <h5><b>Past Owner:</b> <h5>{{ $employee->name }}</h5></h5>
        <h5><b>Deployed By:</b> {{ $employee->hardware->deployed_by }}</h5>
        <p><b>Deployed Date:</b> {{$employee->hardware->deployed_date->format('M d, Y  g:i A')}}</p>
        @endif
        @endforeach
      </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#inModal{{$hardware->id}}">Put to Inventory</a>
          <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#outModal{{$hardware->id}}">Deploy</a>
          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{$hardware->id}}">Edit</a>
          <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$hardware->id}}">Remove</a>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
