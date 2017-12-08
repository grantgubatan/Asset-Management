<button style="margin-bottom: 10px" class="btn btn-primary btn-xs dAll {{(\Request::is())}}" data-url="{{ url('delivery/all') }}"> <span class="fa fa-truck"></span>  Put all to Delivery</button>
<button style="margin-bottom: 10px" class="btn btn-success btn-xs inAll" data-url="{{ url('in/all') }}"> <span class="fa fa-dropbox"></span>  Put all to Inventory</button>
<button style="margin-bottom: 10px" class="btn btn-danger btn-xs deleteAll" data-url="{{ url('delete/all') }}"> <span class="fa fa-remove"></span> Dispose all selected</button>
