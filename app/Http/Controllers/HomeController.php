<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Hardware;
use App\Employee;
use App\User;
<<<<<<< HEAD
use App;
use PDF;
use Dompdf\Dompdf;
=======
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $status = Charts::database(Hardware::all(), 'bar', 'highcharts')
                ->colors(['#3ba594', '#64cefc', '#ffee07'])
                ->title('Device Status')
                ->elementLabel("Device Status")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->groupBy('status')
                ->width(600);

<<<<<<< HEAD
      $vendor = Charts::database(Hardware::where('status', '!=', 'Disposed')->get(), 'pie', 'highcharts')
=======
      $vendor = Charts::database(Hardware::all(), 'pie', 'highcharts')
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
                  ->colors(['#3ba594', '#64cefc', '#ffee07'])
                  ->title('Vendors')
                  ->elementLabel("Device Vendors")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('brand')
                  ->width(600);

<<<<<<< HEAD
      $hardware_type = Charts::database(Hardware::where('status', '!=', 'Disposed')->get(), 'donut', 'highcharts')
=======
      $hardware_type = Charts::database(Hardware::all(), 'donut', 'highcharts')
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
                  ->colors(['#3ba594', '#64cefc', '#ffee07'])
                  ->title('Hardware Type')
                  ->elementLabel("Hardware")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('hardware_type')
                  ->width(700);

     return view('home', ['status' => $status,  'vendor' => $vendor, 'hardware_type' => $hardware_type ]);

    }
<<<<<<< HEAD

    public function dashboard()
    {
      $status = Charts::database(Hardware::all(), 'bar', 'highcharts')
                ->colors(['#3ba594', '#64cefc', '#ffee07'])
                ->title('Device Status')
                ->elementLabel("Device Status")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->groupBy('status')
                ->width(600);

      $vendor = Charts::database(Hardware::all(), 'pie', 'highcharts')
                            ->colors(['#3ba594', '#64cefc', '#ffee07'])
                            ->title('Vendors')
                            ->elementLabel("Device Vendors")
                            ->dimensions(1000, 500)
                            ->responsive(false)
                            ->groupBy('brand')
                            ->width(600);

      $hardware_type = Charts::database(Hardware::all(), 'donut', 'highcharts')
                            ->colors(['#3ba594', '#64cefc', '#ffee07'])
                            ->title('Hardware Type')
                            ->elementLabel("Hardware")
                            ->dimensions(1000, 500)
                            ->responsive(false)
                            ->groupBy('hardware_type')
                            ->width(700);



      $pdf = App::make('snappy.pdf.wrapper');
      $pdf = PDF::loadView('reports/dashboard-report',
      ['status' => $status,  'vendor' => $vendor, 'hardware_type' => $hardware_type ])
      ->setOption('enable-javascript', true)
              ->setOption('images', true)
              ->setOption('javascript-delay', 13000)
              ->setOption('enable-smart-shrinking', true)
              ->setOption('no-stop-slow-scripts', true);

      return $pdf->inline();
    }

    public function deliveries()
    {
      $delivery_count = Hardware::where('status', '=', 'Delivered')->count();

      $laptop_count = Hardware::where('status', '=', 'Delivered')
                      ->where('hardware_type', '=','Laptop')->count();

      $desktop_count = Hardware::where('status', '=', 'Delivered')
              ->where('hardware_type', '=','Desktop')->count();



      $deliveries = Charts::database(Hardware::where('status', '=', 'Delivered')->get(), 'bar', 'highcharts')
                ->colors(['#3ba594', '#64cefc', '#ffee07'])
                ->title('Delivery Quantity')
                ->elementLabel("Delivery Quantity")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->groupBy('brand')
                ->width(600);

                 $pdf = App::make('snappy.pdf.wrapper');
                 $pdf = PDF::loadView('reports/deliveries-report',
                 ['deliveries' => $deliveries, 'delivery_count' => $delivery_count, 'laptop_count' => $laptop_count,
                   'desktop_count' => $desktop_count])
                 ->setOption('enable-javascript', true)
                         ->setOption('images', true)
                         ->setOption('javascript-delay', 13000)
                         ->setOption('enable-smart-shrinking', true)
                         ->setOption('no-stop-slow-scripts', true);

                 return $pdf->inline();


                            //return view('reports/deliveries-report', compact('deliveries' , $deliveries));
    }



    public function inventory()
    {
      $inventory_count = Hardware::where('status', '=', 'Inventory')->count();

      $laptop_count = Hardware::where('status', '=', 'Inventory')
                      ->where('hardware_type', '=','Laptop')->count();

      $desktop_count = Hardware::where('status', '=', 'Inventory')
              ->where('hardware_type', '=','Desktop')->count();



      $inventory = Charts::database(Hardware::where('status', '=', 'Inventory')->get(), 'bar', 'highcharts')
                ->colors(['#3ba594', '#64cefc', '#ffee07'])
                ->title('Inventory Quantity')
                ->elementLabel("Inventory Quantity")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->groupBy('brand')
                ->width(600);

                 $pdf = App::make('snappy.pdf.wrapper');
                 $pdf = PDF::loadView('reports/inventory-report',
                 ['inventory'=>$inventory, 'inventory_count' => $inventory_count, 'laptop_count' => $laptop_count,
                   'desktop_count' => $desktop_count])
                 ->setOption('enable-javascript', true)
                         ->setOption('images', true)
                         ->setOption('javascript-delay', 13000)
                         ->setOption('enable-smart-shrinking', true)
                         ->setOption('no-stop-slow-scripts', true);

                 return $pdf->inline();

                 //return view('reports/deliveries-report', compact('deliveries' , $deliveries));
    }


    public function deployed()
    {
      $deployed_count = Hardware::where('status', '=', 'Deployed')->count();

      $laptop_count = Hardware::where('status', '=', 'Deployed')
                      ->where('hardware_type', '=','Laptop')->count();

      $desktop_count = Hardware::where('status', '=', 'Deployed')
              ->where('hardware_type', '=','Desktop')->count();



      $deployed = Charts::database(Hardware::where('status', '=', 'Deployed')->get(), 'bar', 'highcharts')
                ->colors(['#3ba594', '#64cefc', '#ffee07'])
                ->title('Deployed Devices Quantity')
                ->elementLabel("Deployed Devices Quantity")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->groupBy('brand')
                ->width(600);

                 $pdf = App::make('snappy.pdf.wrapper');
                 $pdf = PDF::loadView('reports/deployed-report',
                 ['deployed'=>$deployed, 'deployed_count' => $deployed_count, 'laptop_count' => $laptop_count,
                   'desktop_count' => $desktop_count])
                 ->setOption('enable-javascript', true)
                         ->setOption('images', true)
                         ->setOption('javascript-delay', 13000)
                         ->setOption('enable-smart-shrinking', true)
                         ->setOption('no-stop-slow-scripts', true);

                 return $pdf->inline();

                 //return view('reports/deliveries-report', compact('deliveries' , $deliveries));
    }


    public function disposed()
    {
      $disposed_count = Hardware::where('status', '=', 'Disposed')->count();

      $laptop_count = Hardware::where('status', '=', 'Disposed')
                      ->where('hardware_type', '=','Laptop')->count();

      $desktop_count = Hardware::where('status', '=', 'Disposed')
              ->where('hardware_type', '=','Desktop')->count();



      $disposed = Charts::database(Hardware::where('status', '=', 'Disposed')->get(), 'bar', 'highcharts')
                ->colors(['#3ba594', '#64cefc', '#ffee07'])
                ->title('Disposed Devices Quantity')
                ->elementLabel("Disposed Devices Quantity")
                ->dimensions(1000, 500)
                ->responsive(false)
                ->groupBy('brand')
                ->width(600);

                 $pdf = App::make('snappy.pdf.wrapper');
                 $pdf = PDF::loadView('reports/disposed-report',
                 ['disposed'=>$disposed, 'disposed_count' => $disposed_count, 'laptop_count' => $laptop_count,
                   'desktop_count' => $desktop_count])
                 ->setOption('enable-javascript', true)
                         ->setOption('images', true)
                         ->setOption('javascript-delay', 13000)
                         ->setOption('enable-smart-shrinking', true)
                         ->setOption('no-stop-slow-scripts', true);

                 return $pdf->inline();

                 //return view('reports/deliveries-report', compact('deliveries' , $deliveries));
    }
=======
>>>>>>> aa2fc3d1235a337744c74bf69933a8f7115f110f
}
