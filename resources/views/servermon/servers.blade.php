
    <div class="row">
      <h2>Servers</h2><hr>
      <div >


        <form action="{{url('/servers')}}" method="post">
          <!-- Button trigger modal -->
        <button id="lol" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
          <span class="fa fa-plus"></span>  Add Server
        </button>
        <a href="{{url('status')}}" class="btn btn-info btn-sm">View Network Status</a>
        </form>


      </div>
      <div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Label</th>
              <th>IP Address</th>
              <th>Commands</th>
            </tr>
          </thead>
          <tbody>
            @forelse($servers as $server)
            <tr>
              <td>{{$server->name}}</td>
              <td>{{$server->ip}}</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewDetails{{$server->id}}">
                  <span class="fa fa-eye"></span> View Details
                </button>

                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editDetails{{$server->id}}">
                  <span class="fa fa-pencil"></span> Edit Details
                </button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removeServer{{$server->id}}">
                  <span class="fa fa-remove"></span> Remove Server
                </button>

                  <!-- Modal -->
                  <div class="modal fade" id="viewDetails{{$server->id}}" class="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h2 class="modal-title" id="myModalLabel">Server Details</h2>
                        </div>
                        <div class="modal-body">
                          <p>
                            Name: {{$server->name}}
                          </p>
                          <p>
                            IP Address: {{$server->ip}}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="editDetails{{$server->id}}" class="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <form action="{{url('edit-server/'.$server->id)}}" method="post">
                          {{csrf_field()}} {{method_field('PUT')}}
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Server</h4>
                          </div>
                          <div class="modal-body">
                            <div>
                                <label for="name">Server Name</label>
                                <input type="text" name="name" placeholder="Server Name" class="form-control" value="{{$server->name}}" required>
                            </div>

                            <div>
                                <label for="name">IP Address</label>
                                <input type="text" name="ip" placeholder="IP Address" class="form-control" value="{{$server->ip}}" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Modal -->
                  <div class="modal fade" id="removeServer{{$server->id}}" class="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <form action="{{url('delete-server/'.$server->id)}}" method="post">
                          {{csrf_field()}} {{method_field('DELETE')}}
                          <div class="modal-body">
                            <h3>Remove {{$server->name}}?</h3>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </td>
            </tr>
            @empty
            @endforelse


          </tbody>
        </table>
        {{$servers->links()}}
      </div>
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" id="myModal" role="document">
          <div class="modal-content">
            <form action="{{url('add-server')}}" method="post">
              {{csrf_field()}}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Server</h4>
              </div>
              <div class="modal-body">
                <div>
                    <label for="name">Server Name</label>
                    <input type="text" name="name" placeholder="Server Name" class="form-control" required>
                </div>

                <div>
                    <label for="name">IP Address</label>
                    <input type="text" name="ip" placeholder="IP Address" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add Server</button>
              </div>
            </div>
            </form>
        </div>
      </div>
    </div>



    <script type="text/javascript">
    </script>
