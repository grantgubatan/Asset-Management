<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hardware;
use App\Employee;
use App\User;
use Redirect;
use Excel;
use DB;
use Illuminate\Support\Facades\Input;
class HardwareController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function searchHardware(Request $request)
  {
    if($request->ajax())
    {
      $output = "";
      $hardwares = Hardware::where('serial', 'LIKE', '%'.$request->search.'%')
                           ->orWhere('model_name', 'LIKE', '%'.$request->search.'%')
                           ->orWhere('brand', 'LIKE', '%'.$request->search.'%')
                           ->get();
      if($hardwares)
      {
        foreach ($hardwares as $hardware)
        {
          $csrf = csrf_field();
          $put = method_field('PUT');
          $delete = method_field('DELETE');


          $output.= '<tr>'.
                    "<td><input type='checkbox' name='checkbox' class='sub_chk' data-id=$hardware->id></td>".
                    '<td>'.$hardware->serial.'</td>'.
                    '<td>'.$hardware->model_name.'</td>'.
                    '<td>'.$hardware->hardware_type.'</td>'.
                    '<td>'.$hardware->brand.'</td>'.
                    '<td>'.$hardware->processor.'</td>'.
                    '<td>'.$hardware->ram.'</td>'.
                    '<td>'.$hardware->storage.'</td>'.
                    '<td>'.$hardware->storage_type.'</td>'.
                    '<td>'.$hardware->purchased_date->format('M d, Y').'</td>'.
                    '<td>'.$hardware->warranty_date->format('M d, Y').'</td>'.
                    '<td>'.$hardware->status.'</td>'.
                    "
                    <td>
                    <a href='/device/$hardware->id' target='_blank' class='btn btn-primary btn-xs'>View Details</a>
                    <a href='#' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#deleteModal$hardware->id'>Remove</a>

                    <!-- Modal -->
                    <div class='modal fade' id='inModal$hardware->id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <form action='/in/delivery/$hardware->id' method='POST'>
                            $csrf $put
                            <div class='modal-body'>
                              <h3>Put $hardware->model_name in Inventory?</h3>
                              <input type='hidden' name='status' value='Inventory'>
                            </div>
                            <div class='modal-footer'>
                              <button type='submit' class='btn btn-primary btn-sm'>Confirm</button>
                              <button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal -->
                    <div class='modal fade' id='outModal$hardware->id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <form action='/out/delivery/$hardware->id' method='POST'>
                            $csrf $put
                            <div class='modal-body'>
                              <h3>Deploy $hardware->model_name?</h3>
                              <input type='hidden' name='status' value='Deployed'>

                              <div>
                                <p>
                                  <b>Employee ID</b>
                                </p>
                                <input type='text' name='emp_id' placeholder='Employee ID' class='form-control'>
                              </div>

                              <div>
                                <p>
                                  <b>Full Name</b>
                                </p>
                                <input type='text' name='fullname' placeholder='Full Name' class='form-control'>
                              </div>

                            </div>
                            <div class='modal-footer'>
                              <button type='submit' class='btn btn-primary btn-sm'>Confirm</button>
                              <button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>



                    <!-- Modal -->
                    <div class='modal fade' id='editModal$hardware->id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Edit $hardware->model_name</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <form action='edit/delivery/$hardware->id' method='POST'>
                              $csrf  $put
                            <div class='modal-body long-modal'>
                              <div>
                                <p>
                                  <strong>Serial Number</strong>
                                </p>
                                <input type='text' name='serial' value='{$hardware->serial}' placeholder='Serial Number' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Model Name</strong>
                                </p>
                                <input type='text' name='model_name' value='{$hardware->model_name}' placeholder='Model Name' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Hardware Type</strong>
                                </p>
                                <input type='text' name='hardware_type' value='{$hardware->hardware_type}' placeholder='Hardware Type' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Brand</strong>
                                </p>
                                <input type='text' name='brand' value='{$hardware->brand}' placeholder='Brand' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Processor</strong>
                                </p>
                                <input type='text' name='processor' value='{$hardware->processor}' placeholder='Processor' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>RAM</strong>
                                </p>
                                <input type='text' name='ram' value='{$hardware->ram}' placeholder='RAM' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Storage</strong>
                                </p>
                                <input type='text' name='storage' value='{$hardware->storage}' placeholder='Storage' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Storage Type</strong>
                                </p>
                                <input type='text' name='storage_type' value='{$hardware->storage_type}' placeholder='Storage Type' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Purchased Date</strong>
                                </p>
                                <input type='date' name='purchased_date' value={$hardware->purchased_date->format('m-d-Y')} placeholder='Purchased Date' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Warranty Date</strong>
                                </p>
                                <input type='date' name='warranty_date' value={{$hardware->warranty_date->format('m-d-Y')}} placeholder='Warranty Date' class='form-control' required>
                              </div>

                            </div>
                            <div class='modal-footer'>
                              <button type='submit' class='btn btn-primary btn-sm'>Save changes</button>
                              <button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal -->
                    <div class='modal fade' id='deleteModal$hardware->id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <form action='/delete/delivery/$hardware->id' method='POST'>
                            $csrf  $delete
                            <div class='modal-body'>
                              <h3>Remove $hardware->model_name ?</h3>
                            </div>
                            <div class='modal-footer'>
                              <button type='submit' class='btn btn-primary btn-sm'>Confirm</button>
                              <button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    </td>
                    ".
                    '</tr>';
        }
      }
      return Response($output);
    }
  }

  public function searchUser(Request $request)
  {
    if($request->ajax())
    {
      $output = "";
      $employees = Employee::where('name', 'LIKE', '%'.$request->search2.'%')
                           ->orWhere('emp_id', 'LIKE', '%'.$request->search2.'%')
                           ->orWhere('seat', 'LIKE', '%'.$request->search2.'%')
                           ->get();
      if($employees)
      {
        foreach ($employees as $employee)
        {
          $csrf = csrf_field();
          $put = method_field('PUT');
          $delete = method_field('DELETE');
          $emphardware = $employee->hardware;


          $output.= '<tr>'.
                    "<td><input type='checkbox' name='checkbox' class='sub_chk' data-id=$emphardware->id></td>".
                    '<td>'.$emphardware->serial.'</td>'.
                    '<td>'.$emphardware->model_name.'</td>'.
                    '<td>'.$emphardware->hardware_type.'</td>'.
                    '<td>'.$emphardware->brand.'</td>'.
                    '<td>'.$emphardware->owners[0]->emp_id.'</td>'.
                    '<td>'.$emphardware->owners[0]->seat.'</td>'.
                    '<td>'.$emphardware->owners[0]->name.'</td>'.
                    '<td>'.$emphardware->hardware[0]->deployed_by.'</td>'.
                    '<td>'.$emphardware->hardware[0]->deployed_date->format('M d, Y').'</td>'.
                    "
                    <td>
                    <a href=/device/$emphardware->id target='_blank' class='btn btn-primary btn-xs'>View Details</a>
                    <a href='#' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#deleteModal$emphardware->id'>Remove</a>

                    <!-- Modal -->
                    <div class='modal fade' id='inModal$emphardware->id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <form action='/in/delivery/$emphardware->id' method='POST'>
                            $csrf $put
                            <div class='modal-body'>
                              <h3>Put $emphardware->model_name in Inventory?</h3>
                              <input type='hidden' name='status' value='Inventory'>
                            </div>
                            <div class='modal-footer'>
                              <button type='submit' class='btn btn-primary btn-sm'>Confirm</button>
                              <button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal -->
                    <div class='modal fade' id='outModal$emphardware->id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <form action='/out/delivery/$emphardware->id' method='POST'>
                            $csrf $put
                            <div class='modal-body'>
                              <h3>Deploy $emphardware->model_name?</h3>
                              <input type='hidden' name='status' value='Deployed'>

                              <div>
                                <p>
                                  <b>Employee ID</b>
                                </p>
                                <input type='text' name='emp_id' placeholder='Employee ID' class='form-control'>
                              </div>

                              <div>
                                <p>
                                  <b>Full Name</b>
                                </p>
                                <input type='text' name='fullname' placeholder='Full Name' class='form-control'>
                              </div>

                            </div>
                            <div class='modal-footer'>
                              <button type='submit' class='btn btn-primary btn-sm'>Confirm</button>
                              <button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>



                    <!-- Modal -->
                    <div class='modal fade' id='editModal$emphardware->id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Edit $emphardware->model_name</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <form action='edit/delivery/$emphardware->id' method='POST'>
                              $csrf  $put
                            <div class='modal-body long-modal'>
                              <div>
                                <p>
                                  <strong>Serial Number</strong>
                                </p>
                                <input type='text' name='serial' value='{$emphardware->serial}' placeholder='Serial Number' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Model Name</strong>
                                </p>
                                <input type='text' name='model_name' value='{$emphardware->model_name}' placeholder='Model Name' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Hardware Type</strong>
                                </p>
                                <input type='text' name='hardware_type' value='{$emphardware->hardware_type}' placeholder='Hardware Type' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Brand</strong>
                                </p>
                                <input type='text' name='brand' value='{$emphardware->brand}' placeholder='Brand' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Processor</strong>
                                </p>
                                <input type='text' name='processor' value='{$emphardware->processor}' placeholder='Processor' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>RAM</strong>
                                </p>
                                <input type='text' name='ram' value='{$emphardware->ram}' placeholder='RAM' class='form-control' required>
                              </div>


                              <div>
                                <p>
                                  <strong>Storage</strong>
                                </p>
                                <input type='text' name='storage' value='{$emphardware->storage}' placeholder='Storage' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Storage Type</strong>
                                </p>
                                <input type='text' name='storage_type' value='{$emphardware->storage_type}' placeholder='Storage Type' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Purchased Date</strong>
                                </p>
                                <input type='date' name='purchased_date' value={$emphardware->purchased_date->format('m-d-Y')} placeholder='Purchased Date' class='form-control' required>
                              </div>

                              <div>
                                <p>
                                  <strong>Warranty Date</strong>
                                </p>
                                <input type='date' name='warranty_date' value={{$emphardware->warranty_date->format('m-d-Y')}} placeholder='Warranty Date' class='form-control' required>
                              </div>

                            </div>
                            <div class='modal-footer'>
                              <button type='submit' class='btn btn-primary btn-sm'>Save changes</button>
                              <button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal -->
                    <div class='modal fade' id='deleteModal$emphardware->id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <form action='/delete/delivery/$emphardware->id' method='POST'>
                            $csrf  $delete
                            <div class='modal-body'>
                              <h3>Remove $emphardware->model_name ?</h3>
                            </div>
                            <div class='modal-footer'>
                              <button type='submit' class='btn btn-primary btn-sm'>Confirm</button>
                              <button type='button' class='btn btn-secondary btn-sm' data-dismiss='modal'>Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    </td>
                    ".
                    '</tr>';
        }
      }
      return Response($output);
    }
  }




  public function showDevice(Request $request, $id)
  {
    $hardware = Hardware::findOrFail($id);

    return view('showDevice', compact('hardware'));

  }

  public function InDelivery(Request $request, $id)
  {
      $hardware = Hardware::findOrFail($id);
      $hardware->status = "Inventory";
      $hardware->disposed_date = null;
      $hardware->save();

      $notification = array(
               'message' => "Device Updated",
               'alert-type' => 'success'
           );
      return Redirect::back()->with($notification);
  }

  public function putDeviceOnDelivery(Request $request, $id)
  {
      $hardware = Hardware::findOrFail($id);
      $hardware->status = "Delivered";
      $hardware->save();

      $notification = array(
               'message' => "Device Updated",
               'alert-type' => 'success'
           );
      return Redirect::back()->with($notification);
  }

  public function OutDelivery(Request $request, $id)
  {
    $hardware = Hardware::findOrFail($id);
    $hardware->status = "Deployed";
    $hardware->deployed_by = $request->deployed_by;
    $hardware->deployed_date = date('Y-m-d');
    $hardware->save();

    $employee = new Employee;
    $employee->hardware_id = $hardware->id;
    $employee->emp_id = $request->emp_id;
    $employee->name = $request->fullname;
    $employee->seat = $request->seat;

    $employee->save();

    $notification = array(
             'message' => "Device Updated",
             'alert-type' => 'success'
         );
    return Redirect::back()->with($notification);
  }



  public function deliveries()
  {
    $hardwares = Hardware::where('status', '=', 'Delivered')->orderBy('created_at', 'desc')->paginate(10);

    return view('deliveries', compact('hardwares'));
  }

  public function deliveriesSortByWarrantyASC()
  {
    $hardwares = Hardware::where('status', '=', 'Delivered')->orderBy('warranty_date', 'asc')->paginate(10);

    return view('deliveries', compact('hardwares'));
  }

  public function deliveriesSortByWarrantyDESC()
  {
    $hardwares = Hardware::where('status', '=', 'Delivered')->orderBy('warranty_date', 'desc')->paginate(10);

    return view('deliveries', compact('hardwares'));
  }

  public function deliveriesSortByPurchasedDateASC()
  {
    $hardwares = Hardware::where('status', '=', 'Delivered')->orderBy('purchased_date', 'asc')->paginate(10);

    return view('deliveries', compact('hardwares'));
  }

  public function deliveriesSortByPurchasedDateDESC()
  {
    $hardwares = Hardware::where('status', '=', 'Delivered')->orderBy('purchased_date', 'desc')->paginate(10);

    return view('deliveries', compact('hardwares'));
  }

  public function editDelivery(Request $request, $id)
  {
    $hardware = Hardware::findOrFail($id);

    $hardware->serial = $request->serial;
    $hardware->model_name = $request->model_name;
    $hardware->hardware_type = $request->hardware_type;
    $hardware->brand = $request->brand;
    $hardware->processor = $request->processor;
    $hardware->ram = $request->ram;
    $hardware->storage = $request->storage;
    $hardware->storage_type = $request->storage_type;
    $hardware->purchased_date = $request->purchased_date;
    $hardware->warranty_date = $request->warranty_date;

    $hardware->save();

    $notification = array(
             'message' => "Device Updated",
             'alert-type' => 'success'
         );
    return Redirect::back()->with($notification);
  }

  public function deleteDelivery(Request $request, $id)
  {
     $hardware = Hardware::findOrFail($id);

     $hardware->status = "Disposed";
     $hardware->disposed_date = date('Y-m-d');

     $hardware->save();

     $notification = array(
              'message' => "Device Disposed",
              'alert-type' => 'success'
          );
     return Redirect::back()->with($notification);
  }


  public function importExcel(Request $request)
  {

    $rows = Excel::load(Input::file('excel'), function ($reader){})->get()->toArray();
    foreach($rows as $row)
    {
      $hardware = new Hardware();
      $hardware->serial = $row['serial'];
      $hardware->model_name = $row['model_name'];
      $hardware->hardware_type = $row['hardware_type'];
      $hardware->brand = $row['brand'];
      $hardware->processor = $row['processor'];
      $hardware->ram = $row['ram'];
      $hardware->storage = $row['storage'];
      $hardware->storage_type = $row['storage_type'];
      $hardware->purchased_date = $row['purchased_date'];
      $hardware->warranty_date = $row['warranty_date'];
      $hardware->status = "Delivered";
      $hardware->save();

    }


  $notification = array(
           'message' => "Excel Data Saved",
           'alert-type' => 'info'
       );
  return Redirect::back()->with($notification);

  }

  public function importExcelDeployed(Request $request)
  {

        $rows = Excel::load(Input::file('excel'), function ($reader){})->get()->toArray();
        foreach($rows as $row)
        {
          $hardware = new Hardware();
          $hardware->serial = $row['serial'];
          $hardware->model_name = $row['model_name'];
          $hardware->hardware_type = $row['hardware_type'];
          $hardware->brand = $row['brand'];
          $hardware->processor = $row['processor'];
          $hardware->ram = $row['ram'];
          $hardware->storage = $row['storage'];
          $hardware->storage_type = $row['storage_type'];
          $hardware->purchased_date = $row['purchased_date'];
          $hardware->warranty_date = $row['warranty_date'];
          $hardware->status = "Deployed";
          $hardware->deployed_by = "Deployed";
          $hardware->status = "Deployed";
          $hardware->deployed_by = $row['deployed_by'];
          $hardware->deployed_date = $row['deployed_date'];
          $hardware->save();


          $employee = new Employee();
          $employee->hardware_id = $hardware->id;
          $employee->emp_id = $row['emp_id'];
          $employee->seat = $row['seatnum'];
          $employee->name = $row['deployed_to'];
          $employee->save();

        }


      $notification = array(
               'message' => "Excel Data Saved",
               'alert-type' => 'info'
           );
      return Redirect::back()->with($notification);


  }

  public function deleteAllSelected(Request $request)
  {
    $ids = $request->ids;
    DB::table("hardwares")->whereIn('id',explode(",",$ids))->update([
      'status' => 'Disposed',
      'disposed_date' => date('Y-m-d')
    ]);

    $notification = array(
             'message' => "All Selected Devices Removed",
             'alert-type' => 'error'
         );
    return Redirect::back()->with($notification);

  }

  public function InAllSelected(Request $request)
  {
    $ids = array();

    $ids = explode(",",$request->ids);

    foreach ($ids as $id)
    {
      $hardware = Hardware::findOrFail($id);
      $hardware->status = "Inventory";
      $hardware->disposed_date = null;
      $hardware->save();
    }

    $notification = array(
             'message' => "Devices put to Inventory",
             'alert-type' => 'info'
         );
    return Redirect::back()->with($notification);

  }

  public function DeliveryAllSelected(Request $request)
  {
    $ids = array();

    $ids = explode(",",$request->ids);

    foreach ($ids as $id)
    {
      $hardware = Hardware::findOrFail($id);
      $hardware->status = "Delivered";
      $hardware->save();
    }

    $notification = array(
             'message' => "Devices put to Delivery",
             'alert-type' => 'info'
         );
    return Redirect::back()->with($notification);

  }

  public function inventory()
  {
    $hardwares = Hardware::where('status', '=', 'Inventory')->orderBy('created_at', 'desc')->paginate(10);

    return view('inventory', compact('hardwares'));
  }

  public function disposed()
  {
    $hardwares = Hardware::where('status', '=', 'Disposed')->orderBy('created_at', 'desc')->paginate(10);

    return view('disposed', compact('hardwares'));
  }

  public function inventorySortByWarrantyASC()
  {
    $hardwares = Hardware::where('status', '=', 'Inventory')->orderBy('warranty_date', 'asc')->paginate(10);

    return view('inventory', compact('hardwares'));
  }

  public function inventorySortByWarrantyDESC()
  {
    $hardwares = Hardware::where('status', '=', 'Inventory')->orderBy('warranty_date', 'desc')->paginate(10);

    return view('inventory', compact('hardwares'));
  }

  public function inventorySortByPurchasedDateASC()
  {
    $hardwares = Hardware::where('status', '=', 'Inventory')->orderBy('purchased_date', 'asc')->paginate(10);

    return view('inventory', compact('hardwares'));
  }

  public function inventorySortByPurchasedDateDESC()
  {
    $hardwares = Hardware::where('status', '=', 'Inventory')->orderBy('purchased_date', 'desc')->paginate(10);

    return view('inventory', compact('hardwares'));
  }

  public function deployed()
  {
    $hardwares = Hardware::where('status', '=', 'Deployed')->orderBy('created_at', 'desc')->paginate(10);

    return view('deployed', compact('hardwares'));
  }

  public function deployedSortByWarrantyASC()
  {
    $hardwares = Hardware::where('status', '=', 'Deployed')->orderBy('warranty_date', 'asc')->paginate(10);

    return view('deployed', compact('hardwares'));
  }

  public function deployedSortByWarrantyDESC()
  {
    $hardwares = Hardware::where('status', '=', 'Deployed')->orderBy('warranty_date', 'desc')->paginate(10);

    return view('deployed', compact('hardwares'));
  }

  public function deployedSortByPurchasedDateASC()
  {
    $hardwares = Hardware::where('status', '=', 'Deployed')->orderBy('purchased_date', 'asc')->paginate(10);

    return view('deployed', compact('hardwares'));
  }

  public function deployedSortByPurchasedDateDESC()
  {
    $hardwares = Hardware::where('status', '=', 'Deployed')->orderBy('purchased_date', 'desc')->paginate(10);

    return view('deployed', compact('hardwares'));
  }

  public function singleDelivery(Request $request)
  {
    $delivery = new Hardware();

    $delivery->serial = $request->serial;
    $delivery->model_name = $request->model;
    $delivery->hardware_type = $request->ht;
    $delivery->brand = $request->brand;
    $delivery->processor = $request->processor;
    $delivery->ram = $request->ram;
    $delivery->storage = $request->storage;
    $delivery->storage_type = $request->st;
    $delivery->purchased_date = $request->pd;
    $delivery->warranty_date = $request->wt;

    $delivery->save();

    $notification = array(
             'message' => "Delivery Saved",
             'alert-type' => 'info'
         );
    return Redirect::back()->with($notification);
  }

  public function singleDeployed(Request $request)
  {
    $hardware = new Hardware();

    $hardware->serial = $request->serial;
    $hardware->model_name = $request->model;
    $hardware->hardware_type = $request->ht;
    $hardware->brand = $request->brand;
    $hardware->processor = $request->processor;
    $hardware->ram = $request->ram;
    $hardware->storage = $request->storage;
    $hardware->storage_type = $request->st;
    $hardware->purchased_date = $request->pd;
    $hardware->warranty_date = $request->wt;
    $hardware->status = 'Deployed';
    $hardware->deployed_by = $request->db;
    $hardware->deployed_date = $request->dd;
    $hardware->save();

    $employee = new Employee();

    $employee->hardware_id = $hardware->id;
    $employee->emp_id = $request->empid;
    $employee->seat = $request->sn;
    $employee->name = $request->dt;
    $employee->save();

    $notification = array(
             'message' => "Device Saved",
             'alert-type' => 'info'
         );
    return Redirect::back()->with($notification);
  }

}
