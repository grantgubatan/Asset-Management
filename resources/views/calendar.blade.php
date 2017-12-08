@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
       <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addEvent">
        <i class="fa fa-plus"></i> Add Event
      </button>

    <!-- Modal -->
    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Add Event</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{url('calendar')}}" method="POST">
             {{ csrf_field() }}
            <div class="modal-body">
              <div class="">
                <label>Event Name</label>
                <input type="text" name="title" placeholder="Event Name" class="form-control" required>
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
                <textarea name="desc" placeholder="Enter Short Description" class="form-control">
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
 </div>
 <br>
  <div class="row">
    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}
  </div>
</div>
@endsection
