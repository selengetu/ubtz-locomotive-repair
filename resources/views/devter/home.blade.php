 @extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card" style="border-left: .25rem solid green ">
                                <div class="container">
                                    <h4 style="color: green"><b>Төлөвлөгөөт засвар</b></h4>
                                    <h2>17</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" style="border-left: .25rem solid #2A00FF ">
                                <div class="container">
                                    <h4 style="color: #2A00FF"><b>Төлөвлөгөөт бус засвар</b></h4>
                                    <h2>32</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" style="border-left: .25rem solid #8F0000 ">
                                <div class="container">
                                    <h4 style="color: #8F0000"><b>Гүйцэтгэл</b></h4>
                                    <h2>14,5%</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card" style="border-left: .25rem solid #3e6e99 ">
                                <div class="container">
                                    <h4 style="color: #3e6e99"><b>Нийт засварын цаг</b></h4>
                                    <h2>1040,0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading" style="background-color: #5432ff; color: #fff">

                            </div>
                            <div id="sear" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <form method="post" action="group">
                                            <div class="col-md-12">

                                                <div class="col-md-4">
                                                    <canvas id="myChart" width="666" height="416" style="display: block; height: 463px; width: 741px;" class="chartjs-render-monitor"></canvas>
                                                    <canvas id="myChart2" width="666" height="416" style="display: block; height: 463px; width: 741px;" class="chartjs-render-monitor"></canvas>
                                                </div>
                                                <div class="col-md-8">
                                                    <canvas id="myChart3" width="400" height="250"></canvas>
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
                 "#48b41b",
                "#e1cf3b",
                "#5be4f0",
                "#57c4d8",
                "#a4d17a",
                "#225b8",
                "#be608b",
                "#96b00c",
                "#088baf",
                "#f158bf",
                "#e145ba",
                "#ee91e3",
                "#05d371", "#5426e0", "#4834d0", "#802234",
                "#6749e8",
                "#0971f0",
                "#8fb413",
                "#b2b4f0",
                "#c3c89d",
                "#c9a941", "#41d158",
                "#fb21a3",
                "#51aed9", "#5bb32d", "#807fb", "#21538e", "#89d534", "#d36647",
                "#7fb411", "#0023b8", "#3b8c2a", "#986b53", "#f50422", "#983f7a", "#ea24a3",
                "#79352c", "#521250", "#c79ed2", "#d6dd92", "#e33e52", "#b2be57", "#fa06ec"
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

                            "#96b00c",
                            "#088baf",
                            "#05d371",
                            "#5426e0",
                            "#4834d0",
                            "#802234",
                            "#6749e8",
                            "#0971f0",
                            "#8fb413",
                            "#b2b4f0",
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
                        borderColor: "#679c9d"
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