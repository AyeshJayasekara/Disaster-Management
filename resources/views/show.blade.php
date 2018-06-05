@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body animated bounceIn">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Carefully fill required information below to report an incident.
                </div>
            </div>

 <div class="panel-body">
     Already Reported Incidents

     <table class="table">
         <tr><th>ID</th><th>Type</th><th>Reporter Name</th><th>Reporter Email</th><th>Lon</th><th>Lat</th><th>Date</th><th>Time</th><th>Level</th><th>Location</th></tr>
         @foreach($inc as $i)
             <tr>

                 <td>{{$i->id}} </td>
                 <td>{{$i->Type}}</td>
                 <td>{{$i->reportedby}}</td>
                 <td>{{$i->reportedemail}}</td>
                 <td>{{$i->Lon}}</td>
                 <td>{{$i->Lat}}</td>
                 <td>{{$i->Date}}</td>
                 <td>{{$i->Time}}</td>
                 <td>{{$i->Level}}</td>
                 <td><a href="http://maps.google.com/?q={{$i->Lat}},{{$i->Lon}}">View On Map</a> </td>
             </tr>

         @endforeach
     </table>
               <script type="text/javascript">
                   tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
                   tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

                   function GetClock(){
                       var d=new Date();
                       var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
                       var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

                       if(nhour==0){ap=" AM";nhour=12;}
                       else if(nhour<12){ap=" AM";}
                       else if(nhour==12){ap=" PM";}
                       else if(nhour>12){ap=" PM";nhour-=12;}

                       if(nmin<=9) nmin="0"+nmin;
                       if(nsec<=9) nsec="0"+nsec;

                       document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
                   }

                   window.onload=function(){
                       GetClock();
                       setInterval(GetClock,1000);
                   }
               </script>
               <div id="clockbox"></div>

           </div>
        </div>
    </div>
</div>

@endsection
