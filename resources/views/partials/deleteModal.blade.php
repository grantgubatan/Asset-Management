<!-- Modal -->
<div class="modal fade" id="deleteModal{{$hardware->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{url('/delete/delivery/'.$hardware->id)}}" method="POST">
<<<<<<< HEAD
        {{csrf_field()}} {{method_field('PUT')}}
=======
        {{csrf_field()}} {{method_field('DELETE')}}
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
        <div class="modal-body">
          <h3>Remove {{$hardware->model_name}} ?</h3>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
