<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventModel;
use Redirect;
use Carbon;
class CalendarController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
        $events = [];
        $data = EventModel::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = \Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start),
                    new \DateTime($value->end.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#2c3e50',
	                    'url' => 'calendar/'.$value->id,
	                ]
                );
            }
        }
        $calendar = \Calendar::addEvents($events);
        return view('calendar', compact('calendar'));
  }

  public function addEvent(Request $request)
  {
    $event = new EventModel();
    $event->title = $request->title;
    $event->start = Carbon\Carbon::parse($request->start)->format('Y-m-d H:i:s');
    $event->end = Carbon\Carbon::parse($request->end)->format('Y-m-d H:i:s');
    $event->desc = $request->desc;

    $event->save();

    $notification = array(
             'message' => "Event Saved",
             'alert-type' => 'info'
         );
    return Redirect::back()->with($notification);
  }

  public function event(Request $request, $id)
  {
    $event = EventModel::findOrFail($id);

    return view('showEvent', compact('event'));
  }

  public function updateEvent(Request $request, $id)
  {
    $event = EventModel::findOrFail($id);
    $event->title = $request->title;
    $event->start = Carbon\Carbon::parse($request->start)->format('Y-m-d H:i:s');
    $event->end = Carbon\Carbon::parse($request->end)->format('Y-m-d H:i:s');
    $event->desc = $request->desc;

    $event->save();

    $notification = array(
             'message' => "Event Updated",
             'alert-type' => 'info'
         );
    return Redirect::back()->with($notification);
  }

  public function deleteEvent(Request $request, $id)
  {
    $event = EventModel::findOrFail($id)->delete();

    $notification = array(
             'message' => "Event Removed",
             'alert-type' => 'error'
         );
    return redirect()->route('calendar')->with($notification);
  }
}
