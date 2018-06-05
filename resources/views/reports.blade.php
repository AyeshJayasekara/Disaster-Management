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
                    Carefully fill required information below to report an incident. (Report)
                </div>
            </div>
<form class="form-group" method="post" action="Report">
            <div class="panel-body">



                My name : <input type="text"  value="{{auth::user()->name}}" name="username">  <br/>
                My email : <input type="text"  value="{{auth::user()->email}}" name="useremail">  <br/>
                Incident Type : <select required name="type">
                    <option style="display:none">
                    @foreach($type as $t)
                        <option value="{{$t->id}}">{{$t->type}}</option>
                        {{$t->type}}
                    @endforeach
                </select><br>
                Threat Level : <select required name="level">
                    <option style="display:none">
                    <option value="1">1  - Lowest</option>
                    <option value="2">2  - Average Low</option>
                    <option value="3">3  - Medium</option>
                    <option value="4">4  - Average High</option>
                    <option value="5">5  - Highest</option>
                </select>
            </div>

            <div class="panel-body animated bounce" id="map"></div>
            <!-- Replace the value of the key parameter with your own API key. -->
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key={{env('APP_GOOGLEKEY')}}&callback=initMap">
            </script>

            Latitude :<br><input type='text' id='lat' required name="Lat" /> <br>
            Logitude :<br><input type='text' id='lon' required name="Lon" />

            <br>
    {{ csrf_field() }}
            <input type="submit">


</form>
           <div class="panel-body">
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
