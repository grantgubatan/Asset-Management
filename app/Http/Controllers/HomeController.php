<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Hardware;
use App\Employee;
use App\User;
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

     return view('home', ['status' => $status,  'vendor' => $vendor, 'hardware_type' => $hardware_type ]);

    }
}
