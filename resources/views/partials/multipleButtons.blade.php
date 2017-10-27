<button style="margin-bottom: 10px" class="btn btn-primary btn-xs dAll {{(\Request::is())}}" data-url="{{ url('delivery/all') }}"> <span class="glyphicon glyphicon-log-in"></span>  Put all to Delivery</button>
<button style="margin-bottom: 10px" class="btn btn-success btn-xs inAll" data-url="{{ url('in/all') }}"> <span class="glyphicon glyphicon glyphicon-new-window"></span>  Put all to Inventory</button>
<button style="margin-bottom: 10px" class="btn btn-danger btn-xs deleteAll" data-url="{{ url('delete/all') }}"> <span class="glyphicon glyphicon-remove"></span> Delete all selected</button>
