@extends('layouts.app2')
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
                           Суудлын нөхөлт
                        </span>
                    </div>


                </div>
            </div>

            <div class="panel">
                <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                    <h4 class="panel-title">
                        <a style="font-weight: bold;"> <i class="fa fa-search"> Хайлт </i>
                        </a>
                    </h4>
                </div>
                <div id="sear" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <fieldset class="scheduler-border">
                            <form method="post" action="nagon">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input has-success">
                                            <div class="input-icon">
                                                <input class="form-control datepicker" id="nagon_start" name="nagon_start" type="text" value="{{$startdate}}"/>
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
                                                <input class="form-control datepicker" id="nagon_end" name="nagon_end" type="text" value="{{$enddate}}"/>
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
                                            <button class="btn btn-success" style="background-color: #81b5d5; border-color: #81b5d5;"><i class="fa fa-search"></i> Хайх</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="table-container">
                <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                <button class="btn btn-info" id="btnExport" onclick="ex()"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                <p><center><b> {{$startdate}} -аас {{$enddate}} -ны суудлын нөхөлтийн судалгаа</b></center> </p>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead style="background-color: #4BD3C2; color: #fff">
                        <tr>
                            <?php $sum_sum = 0 ?>
                            <?php $sum_count = 0 ?>
                            <th> # </th>
                            <th> Огноо</th>
                            <th> Марш</th>
                            <th> Машинч </th>
                            <th> Туслах </th>
                            <th>И/т №</th>
                            <th>Нөхөлтийн минут</th>


                        </tr>
                        </thead>

                        <tbody>
                        <?php $no = 1; ?>
                        @foreach($achaa as $achaas)
                            <tr >
                                <td>{{$no}}</td>
                                <td>{{date('Y-m-d', strtotime($achaas->arrtime))}}</td>
                                <td>{{$achaas->marshid}}</td>
                                <td>{{$achaas->mashname}}</td>
                                <td>{{$achaas->tuslname}}</td>
                                <td>{{$achaas->seriname}} -  {{$achaas->zutnumber}}</td>


                                <td>{{$achaas->patchmin}}@if($achaas->patchmin_speed == 0 ) (-) @endif</td>

                            </tr>

                            @if($achaas->patchmin_speed == 1 )
                            <?php $sum_sum += (substr($achaas->patchmin ,3, 2))+(substr($achaas->patchmin , 0, 2)*60) ?>
                            @elseif($achaas->patchmin_speed == 0 )
                                <?php $sum_sum -= (substr($achaas->patchmin ,3, 2))+(substr($achaas->patchmin , 0, 2)*60)
                                 ?>

                            @endif
                            <?php $no++; ?>
                        @endforeach

                        </tbody>

                    </table>
                    <?php $i5 = str_pad(floor($sum_sum/60), 2, "0", STR_PAD_LEFT). ':'.str_pad(($sum_sum - floor($sum_sum/60)*60), 2, "0", STR_PAD_LEFT). ''  ?>
                    <center><b>Нийт: {{$no-1}} удаа {{$i5}} цаг</b></center>
                </div>
                <div id="printarea"  style=" display:none;" >
                    <p><center><b> {{$startdate}} -аас {{$enddate}} -ны суудлын нөхөлтийн судалгаа</b></center> </p>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="testTable"  border="1" cellspacing="0">
                            <thead style="background-color: #4BD3C2; color: #fff">
                            <tr>
                                <?php $sum_sum = 0 ?>
                                <?php $sum_count = 0 ?>
                                <th> # </th>
                                    <th> Огноо</th>
                                <th> Марш</th>
                                <th> Машинч </th>
                                <th> Туслах </th>
                                <th>И/т №</th>
                                <th>Нөхөлтийн минут</th>


                            </tr>
                            </thead>

                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($achaa as $achaas)
                                <tr >
                                    <td>{{$no}}</td>
                                    <td>{{date('Y-m-d', strtotime($achaas->arrtime))}}</td>
                                    <td>{{$achaas->marshid}}</td>
                                    <td>{{$achaas->mashname}}</td>
                                    <td>{{$achaas->tuslname}}</td>
                                    <td>{{$achaas->seriname}} -  {{$achaas->zutnumber}}</td>
                                    <td>{{$achaas->patchmin}} @if($achaas->patchmin_speed == 0 ) (-) @endif</td>



                                </tr>

                                    <?php $sum_sum += (substr($achaas->patchmin ,3, 2))+(substr($achaas->patchmin , 0, 2)*60) ?>
                                @if($achaas->patchmin_speed == 0 )
                                    <?php $sum_sum -= (substr($achaas->patchmin ,3, 2))+(substr($achaas->patchmin , 0, 2)*60) ?>
                                @endif
                                <?php $no++; ?>
                            @endforeach



                            </tbody>
                        </table>
                        <?php $i5 = str_pad(floor($sum_sum/60), 2, "0", STR_PAD_LEFT). ':'.str_pad(($sum_sum - floor($sum_sum/60)*60), 2, "0", STR_PAD_LEFT). ''  ?>
                        <center><b>Нийт: {{$no-1}} удаа {{$i5}} цаг</b></center>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-6" style="padding: 10px 100px"><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
@section('cscript')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#nagon_start").datepicker({
                format: 'yyyy-mm-dd',
                todayBtn:  1,
                autoclose: true,
            }).on('changeDate', function (selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#nagon_end').datepicker('setStartDate', minDate);
            });

            $("#nagon_end").datepicker({
                format: 'yyyy-mm-dd',
            })
                .on('changeDate', function (selected) {
                    var minDate = new Date(selected.date.valueOf());
                    $('#nagon_start').datepicker('setEndDate', minDate);
                });
            $('#example').DataTable( {

                "language": {
                    "lengthMenu": " _MENU_ бичлэг",
                    "zeroRecords": "Бичлэг олдсонгүй",
                    "info": "_PAGE_ ээс _PAGES_ хуудас" ,
                    "infoEmpty": "Бичлэг олдсонгүй",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Хайлт:"
                },
                dom: 'lfrtpi',
                buttons: [

                    'csv', 'excel', 'pdf'


                ]


            } );

        } );
    </script>
    <script type="text/javascript">
        function printDiv() {

            var printContents = document.getElementById('printarea').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>
    <script type="text/javascript">
        function ex()
        {
            $("#printarea").table2excel({

                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "Tuuz" //do not include extension
            });
        }
    </script>
@endsection