<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

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
        $types = DB::table('Disaster_Types')->select('id', 'type')->get();

        if(Auth::user()->email == env('APP_MANAGER'))
            return view('manager');

        if(Auth::user()->email == env('APP_ADMIN'))
            return view('admin');


        return view('home')->with(['type' => $types]);
    }


    public function reportRecieve(Request $request)
    {
        $name = $request->input('username');
        $email = $request->input('useremail');
        $type = $request->input('type');
        $lon = $request->input('Lon');
        $lat = $request->input('Lat');
        $level = $request->input('level');
        $date = strftime("%F");
        $time = strftime("%T"); //Asia/Colombo


        DB::table('Reported_Incidents')->insertGetId(
            ['RepotedBy' => $name, 'ReportedEmail' => $email , 'Lon'=> $lon , 'Lat' => $lat, 'Type'=>$type , 'Date' => $date , 'Time' => $time , 'Level'=> $level]
        );

        $types = DB::table('Disaster_Types')->select('id', 'type')->get();
        return view('home')->with(['type' => $types]);
    }

    public function showincidents()
    {
        $incidents = DB::table('Approved_Incidents')->select('id', 'Type' , 'reportedby' , 'reportedemail', 'Lon','Lat', 'Date', 'Time', 'Level')->get();
        //$types = DB::table('Disaster_Types')->select('id', 'type')->get();

        if(Auth::user()->email == env('APP_MANAGER'))
            return view('manager');

        if(Auth::user()->email == env('APP_ADMIN'))
            return view('admin');


        return view('show')->with(['inc' => $incidents]);
    }

    public function reports()
    {
        $types = DB::table('Disaster_Types')->select('id', 'type')->get();

        if(Auth::user()->email == env('APP_MANAGER'))
            return view('manager');

        if(Auth::user()->email == env('APP_ADMIN'))
            return view('admin');


        return view('reports')->with(['type' => $types]);
    }




}
