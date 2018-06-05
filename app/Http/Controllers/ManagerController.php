<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{

    public function land(Request $request)
    {
        $types = DB::table('Disaster_Types')->select('id', 'type')->get();
        //return view('manager')->with(['type' => $types]);

       // if($request->ajax()) {
         //   return view('manager')->renderSections()['content']->with(['type' => $types]);
        //}
        if(Auth::user()->email == env('APP_MANAGER'))
        return view('manager')->with(['type' => $types]);
        else
            abort(404);
    }

    public function mod()
    {
        $incidents = DB::table('AlT_Reported_Incidents')->select('id', 'Type' , 'repotedby' , 'reportedemail', 'id', 'Lon','Lat', 'Date', 'Time', 'Level')->get();

        if(Auth::user()->email == env('APP_MANAGER'))
            return view('moderate')->with(['inc' => $incidents]);
        else
            abort(404);
    }

    public function approve(Request $request)
    {
        $id = $request->input('id');
        $level = $request->input('level');

        $appoved = DB::table('AlT_Reported_Incidents')->select('RepotedBy','ReportedEmail','Lon','Lat','Date','Time','Level','Type')->where('id', '=', $id)->get()->first();

        DB::table('Approved_Incidents')->insert(
            ['id' => $id,
                'ReportedBy' => $appoved->RepotedBy,
                'ReportedEmail' => $appoved->ReportedEmail,
                'Lon' => $appoved->Lon,
                'Lat' => $appoved->Lat,
                'Date' => $appoved->Date,
                'Time' => $appoved->Time,
                'Level' => ($level == 0)? $appoved->Level : $level,
                'Type' => $appoved->Type
            ]
        );
        DB::table('Reported_Incidents')->where('id', '=', $id)->delete();





        $incidents = DB::table('AlT_Reported_Incidents')->select('id', 'Type' , 'repotedby' , 'reportedemail', 'id', 'Lon','Lat', 'Date', 'Time', 'Level')->get();

        if(Auth::user()->email == env('APP_MANAGER'))
            return redirect('moderate')->with(['inc' => $incidents]);
        else
            abort(404);
    }

}
