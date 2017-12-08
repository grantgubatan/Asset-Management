@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="">
            <div class="panel panel-primary event-primary">
                <div class="panel-heading">
                  <h2><a href="#">{{$event->title}}</a></h2>
                  @include('partials.datebuttons')
                </div>
                <div class="panel-body nopadding">
                    <div class="row nopadding">
                        <div class="col-sm-6 nopadding">
                            <time class="start white">
                                Start <span class="day">{{$event->start->format('d')}}</span>
                                <span class ="month">{{$event->start->format('M')}}</span>
                                <span class="year">{{$event->start->format('Y')}}</span>
                                {{$event->start->format('h:i A')}}
                            </time>
                        </div>
                        <div class="col-sm-6 nopadding">
                            <time class="end dkblue">
                                End <span class="day">{{$event->end->format('d')}}</span>
                                <span class ="month">{{$event->end->format('M')}}</span>
                                <span class="year">{{$event->end->format('Y')}}</span>
                                {{$event->end->format('h:i A')}}
                            </time>
                        </div>
                    </div>
                </div>
                <div class="panel-footer panel-primary">
                    <p>
                      {{$event->desc}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
