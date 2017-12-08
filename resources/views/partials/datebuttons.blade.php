<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editEvent">
  <i class="fa fa-edit"></i> Edit Event Details
</button>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removeModal">
  <i class="fa fa-remove"></i> Remove
</button>

<!-- Modal -->
<div class="modal fade" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit Event</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('calendar/'.$event->id)}}" method="POST">
         {{ csrf_field() }} {{method_field('PUT')}}
        <div class="modal-body">
          <div class="">
            <label>Event Name</label>
            <input type="text" name="title" placeholder="Event Name" class="form-control" value="{{$event->title}}" required>
          </div>

          <div class="">
            <label>Start Date Time</label>
            <input type="datetime-local" name="start" placeholder="Start Date" class="form-control" required>
          </div>

          <div class="">
            <label>End Date Time</label>
            <input type="datetime-local" name="end" placeholder="End Date" class="form-control" required>
          </div>

          <div class="">
            <label>Short Description</label>
            <textarea name="desc" placeholder="Enter Short Description" value="{{$event->desc}}" class="form-control">
            {{$event->desc}}
            </textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Submit Event</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Remove Event?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="{{url('delete/calendar/'.$event->id)}}" method="post">
        {{ csrf_field() }} {{method_field('DELETE')}}
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
