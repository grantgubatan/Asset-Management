<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#single"> <i class="fa fa-caret-right"></i> Single Entry</button>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#bulk"><i class="fa fa-database"></i> Bulk Entry</button>

<!-- Modal -->
<div id="single" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delivery</h4>
      </div>
      <form class="" action="{{url('single')}}" method="POST">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4">
              <label>Serial</label>
              <input type="text" name="serial" class="form-control" placeholder="Serial Number" required>
            </div>

            <div class="col-sm-4">
<<<<<<< HEAD
              <label>Model Unit Name</label>
              <input type="text" name="model" class="form-control" placeholder="Model Unit Name" required>
=======
              <label>Model Name</label>
              <input type="text" name="model" class="form-control" placeholder="Model Name" required>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            </div>

            <div class="col-sm-4">
              <label>Hardware Type</label>
<<<<<<< HEAD
              <select type="select" name="ht" class="form-control" placeholder="Hardware Type" required>
                <option value="">Choose One</option>
                <option value="Laptop">Laptop</option>
                <option value="Desktop">Desktop</option>
              </select>
=======
              <input type="text" name="ht" class="form-control" placeholder="Hardware Type" required>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            </div>

          </div>


          <div class="row">
            <div class="col-sm-4">
              <label>Brand</label>
              <input type="text" name="brand" class="form-control" placeholder="Brand" required>
            </div>

            <div class="col-sm-4">
              <label>Processor</label>
              <input type="text" name="processor" class="form-control" placeholder="Processor" required>
            </div>

            <div class="col-sm-4">
<<<<<<< HEAD
              <label>RAM (gb)</label>
              <input type="number" name="ram" class="form-control" placeholder="RAM" min="2"required>
=======
              <label>RAM</label>
              <input type="text" name="ram" class="form-control" placeholder="RAM" required>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
<<<<<<< HEAD
              <label>Storage Size</label>
=======
              <label>Storage</label>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
              <input type="text" name="storage" class="form-control" placeholder="Storage" required>
            </div>

            <div class="col-sm-4">
              <label>Storage Type</label>
<<<<<<< HEAD
              <select type="text" name="st" class="form-control" placeholder="Storage Type" required>
                <option value="">Choose One</option>
                <option value="HDD">HDD</option>
                <option value="SSD">SSD</option>
              </select>
=======
              <input type="text" name="st" class="form-control" placeholder="Storage Type" required>
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
            </div>

            <div class="col-sm-4">
              <label>Purchased Date</label>
              <input type="date" name="pd" class="form-control" placeholder="Purchased Date" required>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <label>Warranty Date</label>
              <input type="date" name="wt" class="form-control" placeholder="Warranty Date" required>
            </div>
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">

            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Confirm</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="bulk" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import Excel File</h4>
      </div>
      <div class="modal-body">
        <div>
          <div class="panel panel-default">
            <div class="panel-heading">Import Excel Delivery File</div>
            <div class="panel-body">
              <form action="{{url('add/deliveries/excel')}}" method="POST"  enctype="multipart/form-data">
                {{csrf_field()}}
                <div>
                  <input type="file" name="excel" class="form-control" required>
                </div>
                <div><br>
                  <input type="submit" class="form-control btn btn-primary" value="Confirm">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
