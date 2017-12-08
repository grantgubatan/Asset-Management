<!-- Modal -->
<div class="modal fade" id="editModal{{$hardware->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{$hardware->model_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{url('edit/delivery/'.$hardware->id)}}" method="POST">
        {{csrf_field()}} {{method_field('PUT')}}
        <div class="modal-body long-modal">
          <div>
            <p>
              <strong>Serial Number</strong>
            </p>
            <input type="text" name="serial" value="{{$hardware->serial}}" placeholder="Serial Number" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>Model Name</strong>
            </p>
            <input type="text" name="model_name" value="{{$hardware->model_name}}" placeholder="Model Name" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>Hardware Type</strong>
            </p>
            <input type="text" name="hardware_type" value="{{$hardware->hardware_type}}" placeholder="Hardware Type" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>Brand</strong>
            </p>
            <input type="text" name="brand" value="{{$hardware->brand}}" placeholder="Brand" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>Processor</strong>
            </p>
            <input type="text" name="processor" value="{{$hardware->processor}}" placeholder="Processor" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>RAM</strong>
            </p>
            <input type="text" name="ram" value="{{$hardware->ram}}" placeholder="RAM" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>Storage</strong>
            </p>
            <input type="text" name="storage" value="{{$hardware->storage}}" placeholder="Storage" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>Storage Type</strong>
            </p>
            <input type="text" name="storage_type" value="{{$hardware->storage_type}}" placeholder="Storage Type" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>Purchased Date</strong>
            </p>
            <input type="date" name="purchased_date" value="{{$hardware->purchased_date->format('m-d-Y')}}" placeholder="Purchased Date" class="form-control" required>
          </div>

          <div>
            <p>
              <strong>Warranty Date</strong>
            </p>
            <input type="date" name="warranty_date" value="{{$hardware->warranty_date->format('m-d-Y')}}" placeholder="Warranty Date" class="form-control" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
