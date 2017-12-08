<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use Redirect;
class ServermonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
      $servers = Server::paginate(5);
      $server2 = new Server();
      return view('servermon.index', ['servers' => $servers,'server2' => $server2]);
    }

    public function status()
    {
      $servers = Server::paginate(10);

      return view('servermon.status', compact('servers'));
    }

    public function updateServers()
    {

      $servers = Server::all();
      ini_set('max_execution_time', 300);

      foreach ($servers as $server)
      {
          //$server->firewall = @fsockopen($server->ip, 80, $errno, $errstr, 30);

          exec("ping -w 60 " . $server->ip, $output, $result);

          if($result != 0)
          {
            $server->status = 0;
            $server->latency = "None";
          }
          else
          {
            $last_latency = $server->latency;
            $current_latency = $this->pingDomain($server->ip);

            if($current_latency > $last_latency)
            {
              $server->peak = $current_latency;
              $server->peak_time = date('Y-m-d H:i:s');
            }

            $server->status = 1;
            $server->latency = $current_latency;
          }

          $server->last_update = date('Y-m-d H:i:s');
          $server->save();
      }

        $notification = array(
                 'message' => 'All server status updated',
                 'alert-type' => 'success'
             );

        return redirect('/status')->with($notification);

    }

    public function pingServer(Request $request, $id)
    {
      $server = Server::findOrFail($id);

      exec("ping -w 60 ". $server->ip, $output, $result);

      if($result != 0)
      {
        $server->status = 0;
        $server->latency = "None";
      }
      else
      {
        $last_latency = $server->latency;
        $current_latency = $this->pingDomain($server->ip);

        if($current_latency > $last_latency)
        {
          $server->peak = $current_latency;
          $server->peak_time = date('Y-m-d H:i:s');
        }

        $server->status = 1;
        $server->latency = $current_latency;
      }


      $server->last_update = date("Y-m-d H:i:s");

      $server->save();

      $notification = array(
               'message' => 'Server Status Updated',
               'alert-type' => 'success'
           );

      return Redirect::back()->with($notification);
    }

    public function deleteServer(Request $request, $id)
    {

      $server = Server::findOrFail($id);

      $server->delete();

      $notification = array(
               'message' => 'Server removed',
               'alert-type' => 'info'
           );

      return redirect('/servermon')->with($notification);
    }

    public function pingSearch(Request $request)
    {

      $server2 = new Server;
      $servers = Server::paginate(5);

      $server2->name = $request->ip;

      exec("ping -w 60 ". $request->ip, $output, $result);

      if($result != 0)
      {
        $server2->status = 0;
        $server2->latency = "None";
      }
      else
      {
        $server2->status = 1;
        $server2->latency = $this->pingDomain($request->ip);
      }

      $server2->last_update = date("Y-m-d H:i:s");

      $notification = array(
               'message' => 'Server Status Updated',
               'alert-type' => 'success'
           );

      return view('servermon.index', ['servers' => $servers,'server2' => $server2]);
    }


    public function pingDomain($domain)
    {
      $ping = exec("ping $domain");
      $pingTime = explode(',',trim($ping));
      $time = explode("=",trim($pingTime[2]));
      return $time[1];
    }

    public function updateServerScheduler()
    {
      $servers = Server::all();
      ini_set('max_execution_time', 300);

      foreach ($servers as $server)
      {
          //$server->firewall = @fsockopen($server->ip, 80, $errno, $errstr, 30);

          exec("ping -w 60 " . $server->ip, $output, $result);

          if($result != 0)
          {
            $server->status = 0;
            $server->latency = "None";
          }
          else
          {
            $last_latency = $server->latency;
            $current_latency = $this->pingDomain($server->ip);

            if($current_latency > $last_latency)
            {
              $server->peak = $current_latency;
              $server->peak_time = date('Y-m-d H:i:s');
            }

            $server->status = 1;
            $server->latency = $current_latency;
          }

          $server->last_update = date('Y-m-d H:i:s');
          $server->save();
      }
    }

    public function addServer(Request $request)
    {

       $server = new Server;

       $server->name = $request->name;
       $server->ip = $request->ip;

       exec("ping -w 60 " . $server->ip, $output, $result);

       if($result != 0)
       {
         $server->status = 0;
         $server->latency = "None";
       }
       else
       {
         $last_latency = $server->latency;
         $current_latency = $this->pingDomain($server->ip);

         if($current_latency > $last_latency)
         {
           $server->peak = $current_latency;
           $server->peak_time = date('Y-m-d H:i:s');
         }

         $server->status = 1;
         $server->latency = $current_latency;
       }


       $server->last_update = date("Y-m-d H:i:s");

       $server->save();

      $notification = array(
               'message' => 'Server Added',
               'alert-type' => 'success'
           );
      return Redirect::back()->with($notification);
    }
public function updateServer(Request $request, $id)
    {
      $server = Server::findOrFail($id);
      $server->name = $request->name;
      $server->ip = $request->ip;

      exec("ping -w 60 " . $server->ip, $output, $result);

      if($result != 0)
      {
        $server->status = 0;
        $server->latency = "None";
      }
      else
      {
        if($server->latency === "None")
        {
          $last_latency = 0;
        }

        $last_latency = $server->latency;
        $current_latency = $this->pingDomain($server->ip);

        if($current_latency > $last_latency)
        {
          $server->peak = $current_latency;
          $server->peak_time = date('Y-m-d H:i:s');
        }

        $server->status = 1;
        $server->latency = $current_latency;
      }


      $server->last_update = date("Y-m-d H:i:s");


      $server->save();

      $notification = array(
               'message' => 'Server Updated',
               'alert-type' => 'success'
           );
      return redirect('/servermon')->with($notification);
    }
}
