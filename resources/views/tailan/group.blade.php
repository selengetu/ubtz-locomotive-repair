@extends('layouts.app')
@section('content')

          <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                         <div class="portlet light portlet-fit portlet-datatable">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green">
                        </i>
                        <span class="caption-subject font-green sbold uppercase">

                        Төлөвлөгөөт бус засварын группийн судалгаа

                            тайлан
                        </span>
                    </div>

                </div>
            </div>
                <div class="panel">
                                                   <div class="panel-heading" style="background-color: #81b5d5; color: #fff">

                                            </div>
                                            <div id="sear" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post"
                                                     action="group"

                         >
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input class="form-control datepicker" id="zas_start" name="zas_start" type="text" value="{{$startdate}}">
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Эхлэх огноо
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>
                                                        <i class="fa fa-calendar-plus-o">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input class="form-control datepicker" id="zas_end" name="zas_end" type="text" value="{{$enddate}}">
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Дуусах огноо
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>
                                                        <i class="fa fa-calendar-plus-o">
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group form-md-line-input has-success">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <button class="btn btn-info"  style="background-color: #2EB9A8; border-color: #2EB9A8"><i class="fa fa-search"></i> Хайх</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered table-hover"  id="testTable">
                                                <thead style="background-color: #81b5d5; color: #fff">
                                                <tr>

                                                    <th> # </th>
                                                    <th>Групп</th>
                                                    <th>Засварын зогсолт</th>
                                                    <th>Засварт орсон тоо</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                    $stopclean=0;
                                    $niit=0;
                                
                                    ?>
                                                <?php $no = 1; ?>
                                                @foreach($group as $groups)
                                                    <tr>
                                                        <td>{{$no}}</td>
                                                        <td>{{$groups->locgroupname}}</td>

                                                        <td>{{$groups->stopclean}}</td>
                                                    
                                                        <td>{{$groups->niit}}</td>

                                                    </tr>
                                                    <?php
                                      
                                        $stopclean=$stopclean+$groups->stopclean;
                                        $niit=$niit+$groups->niit;
                      
                                            ?>
                                                    <?php $no++; ?>
                                                @endforeach
                                                <tr>
                                                <td colspan=2><center>Нийт</center></td>
                                                <td>{{  $stopclean}}</td>
                                                <td>{{  $niit}}</td>
                                                </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                                         <div class="col-md-6">
                                                             <canvas id="myChart" width="400" height="250"></canvas>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <canvas id="myChart1" width="400" height="250"></canvas>
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

</div>
                <!-- END CONTENT BODY -->
            </div>

              </div>
          </div>
            @endsection
            @section('cscript')
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
          <script type="text/javascript">
            $("#zas_start").datepicker( {
    format: "yyyy-mm-dd",

});
$("#zas_end").datepicker( {
    format: "yyyy-mm-dd",

});
$("#zas_end").datepicker( {
    format: "yyyy-mm-dd HH:SS",

});


 function printDiv() {

    var divToPrint = document.getElementById('testTable');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding:0.2em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}

</script>
<?php
    $groupname = array();
    $grouphour = array();
    $groupcount = array();
    foreach($group as $wag)

    {array_push($groupname,$wag->locgroupname); array_push($grouphour,$wag->stopclean);array_push($groupcount,$wag->niit);
       }

    ?>
 <script type="text/javascript">
        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><p><center><b>  УБТЗ-ын Улаанбаатар Зүтгүүрийн депогийн 2018 оны 7-р сарын тууз бүртгэлийн тайлан</b> </center> </p><table border="1">{table}</table><span> ТАЙЛАН ГАРГАСАН:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
            return function (table, name) {
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
                var blob = new Blob([format(template, ctx)]);
                var blobURL = window.URL.createObjectURL(blob);

                if (ifIE()) {
                    csvData = table.innerHTML;
                    if (window.navigator.msSaveBlob) {
                        var blob = new Blob([format(template, ctx)], {
                            type: "text/html"
                        });
                        navigator.msSaveBlob(blob, '' + name + '.xls');
                    }
                }
                else
                window.location.href = uri + base64(format(template, ctx))
            }
        })()

        function ifIE() {
            var isIE11 = navigator.userAgent.indexOf(".NET CLR") > -1;
            var isIE11orLess = isIE11 || navigator.appVersion.indexOf("MSIE") != -1;
            return isIE11orLess;
        }
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
            var groupcount = <?php echo json_encode($groupcount); ?>;
            var ctx = document.getElementById('myChart').getContext('2d');
            var ctx1 = document.getElementById('myChart1').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: groupname,
        datasets: [{
            data: grouphour,
            backgroundColor: [
              
                "#DB4437",
                "#F4B400",
                "#0F9D58",
                "#4285F4",
                "#002D62",
                "#79C1F1",
            ],
            borderColor: [
                             
                "#DB4437",
                "#F4B400",
                "#0F9D58",
                "#4285F4",
                "#002D62",
                "#79C1F1",
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
        },
        title: {
            display: true,
            text: 'Засварын зогсолт'
        },
        legend: {
            display: false
        },
    }

});
            var myChart1 = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels:  groupname,
                    datasets: [{
                        backgroundColor:  [
                                         
                "#DB4437",
                "#F4B400",
                "#0F9D58",
                "#4285F4",
                "#002D62",
                "#79C1F1",
                        ],
                        borderColor:  [
                                        
                "#DB4437",
                "#F4B400",
                "#0F9D58",
                "#4285F4",
                "#002D62",
                "#79C1F1",
                        ],
                        data: groupcount
                    }
                    ]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Засварт орсон тоо'
                    },
                    maintainAspectRatio: true,

                    legend: {
                        display: false
                    },

                    scales: {
                        xAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true   // minimum value will be 0.
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },

                }
            })

        })
    </script>


          <style type="text/css">
              .disabledTab {
                  pointer-events: none;
              }
              .table-row{
                  cursor:pointer;
              }
              @page { size: landscape; }
          </style>
          <style>


              .tooltiptext {
                  visibility: hidden;
                  width: 120px;
                  background-color: black;
                  color: #fff;
                  text-align: center;
                  border-radius: 6px;
                  padding: 5px 0;

                  /* Position the tooltip */
                  position: absolute;
                  z-index: 1;
              }

              .tooltip:hover .tooltiptext {
                  visibility: visible;
              }
          </style>
@endsection