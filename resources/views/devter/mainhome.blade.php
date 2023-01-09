@extends('layouts.app1')
@section('content')
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading" style="background-color: #2A00FF; color: #fff">

                            </div>
                            <div id="sear" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <form method="post" action="group">
                                        <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="card text-white bg-warning" style="border-left: .25rem solid #f58027;">
                                            <div class="container">
                                                
                                            <h3 style="color: #f58027"><img src="{{asset('image/Picture7.png')}}" alt="logo" class="logo-default" height="30px"/> <b>Хяналт</b></h3>
                                        
                                            </div>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="card text-white bg-success" style="border-left: .25rem solid green ">
                                            <div class="container">
                                            <h3 style="color: green"><img src="{{asset('image/Picture2.png')}}" alt="logo" class="logo-default" height="30px" /> <b>Ашиглалт</b></h3>
                                        
                                            </div>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="card text-white bg-info" style="border-left: .25rem solid #2A00FF ">
                                            <div class="container">
                                            <h3 style="color: #2A00FF"><img src="{{asset('image/Picture4.png')}}" alt="logo" class="logo-default" width="35px" /> <b>Засвар</b></h3>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="card  text-white bg-danger" style="border-left: .25rem solid #8F0000 ">
                                            <div class="container">
                                            <h3 style="color: #8F0000"><img src="{{asset('image/Picture9.png')}}" alt="logo" class="logo-default" width="35px" /> <b>Аюулгүй байдал</b></h3>
                                           
                                            </div>
                                            </div>
                                            </div>

                                            </div>
                                            <div class="col-md-12" style="margin-top:60px">
                                            <div class="col-md-3">
                            <div class="card " style="border-left: .25rem solid #f58027 ">
                                <div class="container">
                                <h4 style="color: #f58027"><b>Чанарын үзүүлэлт</b></h4>
                                
                                </div>
                            </div>
                        </div>
                                            <div class="col-md-3">
                            <div class="card" style="border-left: .25rem solid green ">
                                <div class="container">
                                    <h4 style="color: green"><b><a href="{{ route('report01') }}">Машинчийн маршрут, түлш</a></b></h4>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" style="border-left: .25rem solid #2A00FF ">
                                <div class="container">
                                    <h4 style="color: #2A00FF"><b><a href="{{ route('devedangi') }}">Цахим пасспорт, эд анги</a></b></h4>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" style="border-left: .25rem solid #8F0000 ">
                                <div class="container">
                                    <h4 style="color: #8F0000"><b>Зурмагийн Гүйцэтгэл</b></h4>
                                    
                                </div>
                            </div>
                        </div>
                      
                                            </div>

                                           
                                            <div class="col-md-12" style="margin-top:60px">

                                            <div class="col-md-3">
                                            <div class="card " style="border-left: .25rem solid #f58027 ">
                                                    <div class="container">
                                                    <h4 style="color: #f58027"><b>Гүйлт</b></h4>
                                                  
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="card" style="border-left: .25rem solid green ">
                                                    <div class="container">
                                                    <h4 style="color: green"><b><a href="{{ route('urtuu30') }}">Тууз бүртгэл</a></b></h4>
                                                  
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="card" style="border-left: .25rem solid #2A00FF ">
                                                    <div class="container">
                                                    <h4 style="color: #2A00FF"><b><a href="{{ route('zasplan') }}">Засварын чанарын хяналт</a></b></h4>
                                                  
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="card" style="border-left: .25rem solid #8F0000 ">
                                                    <div class="container">
                                                    <h4 style="color: #8F0000"><b>Гологдол, дутагдал, тасалдал </b></h4>
                                                 
                                                    </div>
                                                    </div>
                                                    </div>

                                                    </div>
                                                    <div class="col-md-12" style="margin-top:60px">

                                                    <div class="col-md-3 col-md-offset-3">
                                                    <div class="card" style="border-left: .25rem solid green ">
                                                    <div class="container">
                                                    <h4 style="color: green"><b>Зүтгүүрийн бригад</b></h4>
                                                    
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="card" style="border-left: .25rem solid #2A00FF ">
                                                    <div class="container">
                                                    <h4 style="color: #2A00FF"><b>Сэлбэгийн зарцуулалт</b></h4>
                                                   
                                                    </div>
                                                    </div>
                                                    </div>
                                                   
                                                    </div>
                                        </form>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                </div>
</div>
  @include('layouts.partials.modal')
   @endsection
          
@section('cscript')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<?php
    $groupname = array();
    $grouphour = array();
    $tsahilgaanname = array();
    $tsahilgaancount = array();
    $zasname = array();
    $zascount = array();
    $seriname = array();
    $sericount = array();
    foreach($group as $wag)
    {array_push($groupname,$wag->locgroupname); array_push($grouphour,$wag->stopclean); }
    foreach($niit as $wag)
    {array_push($zasname,$wag->zastype_name); array_push($zascount,$wag->niit); }
    foreach($tsahilgaan as $wag)
    {array_push($tsahilgaanname,$wag->gemtel_name); array_push($tsahilgaancount,$wag->niit); }
    foreach($seri as $wag)
    {array_push($seriname,$wag->seriname); array_push($sericount,$wag->niit); }
    ?>
    
 <script type="text/javascript">

        $(function () {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold',
                autoSkip: false
            }

            var mode = 'index'
            var intersect = true
            var randomColorGenerator = function () {
                return '#' + (Math.random().toString(16) + '0000000').slice(2, 8);
            };
    
            var groupname = <?php echo json_encode($groupname); ?>;
            var grouphour = <?php echo json_encode($grouphour); ?>;
            var tsahilgaanname = <?php echo json_encode($tsahilgaanname); ?>;
            var tsahilgaancount = <?php echo json_encode($tsahilgaancount); ?>;
            var zasname = <?php echo json_encode($zasname); ?>;
            var zascount = <?php echo json_encode($zascount); ?>;
            var seriname = <?php echo json_encode($seriname); ?>;
            var sericount = <?php echo json_encode($sericount); ?>;
            var ctx = document.getElementById('myChart').getContext('2d');
            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var ctx3 = document.getElementById('myChart3').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: zasname,
        datasets: [{
            label: 'Засварын төрөл',
            data: zascount,
            backgroundColor: [
                              
                "#DB4437",
                "#4285F4",
                "#002D62",
                "#79C1F1",
               
            ],

        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },  legend: {
            display: false
        },
        title: {
            display: true,
            text: 'Засварын төрөл'
        },
    }
    
});
            var myChart2 = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: groupname,
                    datasets: [{
                        label: 'Засварын төрөл',
                        data: grouphour,
                        backgroundColor: [
                            
                "#DB4437",
                "#F4B400",
                "#0F9D58",
                "#4285F4",
                "#002D62",
                "#79C1F1",
                        ],

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },  legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Гэмтлийн групп'
                    },
                }

            });
            var myChart3 = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: seriname,
                    datasets: [{
                        label: 'Засварын төрөл',
                        data: sericount,
                        backgroundColor:'transparent',
                        borderColor: "#F4B400"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },  legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Засварын зогсолт'
                    },
                }
            });
            });
    </script>
<style>
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    /* On mouse-over, add a deeper shadow */
    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    /* Add some padding inside the card container */
    .container {
        padding: 2px 16px;
    }
</style>
@include('layouts.partials.devterscript')
@endsection