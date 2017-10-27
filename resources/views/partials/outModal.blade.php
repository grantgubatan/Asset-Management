<!-- Modal -->
<div class="modal fade" id="outModal{{$hardware->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{url('/out/delivery/'.$hardware->id)}}" method="POST">
        {{csrf_field()}} {{method_field('PUT')}}
        <div class="modal-body">
          <h3>Deploy {{$hardware->model_name}}?</h3>
          <input type="hidden" name="status" value="Deployed">

          <div>
            <p>
              <b>Deployed By</b>
            </p>
            <input type="text" name="deployed_by" placeholder="Deployed By" class="form-control" required>
          </div>

          <div>
            <p>
              <b>Employee ID</b>
            </p>
            <input type="text" name="emp_id" placeholder="Employee ID" class="form-control" required>
          </div>

          <div>
            <p>
              <b>Full Name</b>
            </p>
            <input type="text" name="fullname" placeholder="Full Name" class="form-control" required>
          </div>

          <div>
            <p>
              <b>Seat Number</b>
            </p>
            <input type="text" name="seat" placeholder="Seat Number" class="form-control">
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
