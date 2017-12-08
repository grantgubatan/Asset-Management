@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="jumbotron">
        <div class="text-center">
        </div>

        <div class="row">
          <h3>Want a quick ping?</h3>
          <form action="{{url('servermon')}}" method="post">
            {{csrf_field()}}
            <input type="text" name="ip" class="form-control" placeholder="Enter hostname, url or ip address">
          </form>
        </div>

        @if($server2->name !== null)
        <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Average Latency</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$server2->name}}</td>
            <td class="{{($server2->status) ? 'online' : 'offline'}}">{{($server2->status) ? "Online" : "Offline"}}</td>
            <td>{{($server2->status) ? $server2->latency : 'None'}}</td>
          </tr>
        </tbody>
      </table>
        @endif
      </div>
    </div>
    <div class="row">
      @include('servermon.servers')
    </div>
</div>
@endsection
