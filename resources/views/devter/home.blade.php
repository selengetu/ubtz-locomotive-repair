 @extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                <div class="row">
                <div class="col-md-5">
                        <canvas id="myChart" width="400" height="250"></canvas>
                        </div>
                        <div class="col-md-6">
                        <canvas id="myChart2" width="400" height="250"></canvas>
                        </div>
                        <div class="col-md-5">
                        <canvas id="myChart3" width="400" height="250"></canvas>
                        </div>
                        <div class="col-md-6">
                        <canvas id="myChart1" width="400" height="250"></canvas>
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

    
            var groupname = <?php echo json_encode($groupname); ?>;
            var grouphour = <?php echo json_encode($grouphour); ?>;
            var tsahilgaanname = <?php echo json_encode($tsahilgaanname); ?>;
            var tsahilgaancount = <?php echo json_encode($tsahilgaancount); ?>;
            var zasname = <?php echo json_encode($zasname); ?>;
            var zascount = <?php echo json_encode($zascount); ?>;
            var seriname = <?php echo json_encode($seriname); ?>;
            var sericount = <?php echo json_encode($sericount); ?>;
            var ctx = document.getElementById('myChart').getContext('2d');
            var ctx1 = document.getElementById('myChart1').getContext('2d');
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
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
   
    }
    
});
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: groupname,
        datasets: [{
            label: 'Группээр нь',
            data: grouphour,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
   
    }
    
});
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: seriname,
        datasets: [{
            label: 'Илчит тэрэгний серийн төрлөөр',
            data: sericount,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
   
    }
    
});
var myChart3= new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: tsahilgaanname,
        datasets: [{
            label: 'ТЦХ-ийн гэмтлийн судалгаа',
            data: tsahilgaancount,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
   
    }
    
});
   
        })
    </script>
@include('layouts.partials.devterscript')
@endsection