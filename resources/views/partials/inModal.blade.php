<!-- Modal -->
<div class="modal fade" id="inModal{{$hardware->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{url('/in/delivery/'.$hardware->id)}}" method="POST">
        {{csrf_field()}} {{method_field('PUT')}}
        <div class="modal-body">
          <h3>Put {{$hardware->model_name}} in Inventory?</h3>
          <input type="hidden" name="status" value="Inventory">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
