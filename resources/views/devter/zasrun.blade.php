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
                         Илчит тэрэгний гүйлт
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
                            <form method="post" action="searchzastul">
                                <div class="col-md-12">

                                    <div class="col-md-3">

                                        <div class="form-group form-md-line-input has-success">
                                            <div class="input-icon">
                                                <select class="form-control select2" id="loc_seri" name="loc_seri" >
                                                    <option value="0">Бүгд</option>
                                                    @foreach($locserial as $locserials)
                                                        <option value= "{{$locserials->sericode}}">{{$locserials->seriname}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="form_control_1" style="font-size:12px;">
                                                    Илчит тэрэгний сери
                                                </label>
                                                <span class="help-block">
                                                                    </span>

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

                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>

            <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
            <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
            <div class="table-container">
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="printarea">
                    <p><center><b>Илчит тэрэгний гүйлт</b></center> </p>
                    <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead style="background-color: #81b5d5; color: #fff">
                        <tr>

                            <th> # </th>
                            <th>И/т сери, дугаар</th>
                            <th>Засварын төрөл</th>
                            <th>Сүүлд орсон огноо</th>
                            <th>Гүйлт</th>
                            <th>Эхэлсэн гүйлт</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $no = 1; ?>
                        @foreach($zasrun as $zasruns)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$zasruns->seriname}} - {{$zasruns->zutnumber}}</td>
                                <td>{{$zasruns->repshname}}</td>
                                <td>{{$zasruns->replastdate}}</td>
                                <td>{{number_format($zasruns->runkm,2)}}</td>
                                <td>{{number_format($zasruns->begrun,2)}}</td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>



        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
@section('cscript')
    <script type="text/javascript">
        $("#datepicker").datepicker( {
            format: "mm-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });
        function printDiv() {

            var printContents = document.getElementById('printarea').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>
    <script type="text/javascript">
        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><p><center><b>  УБТЗ-ын Улаанбаатар Зүтгүүрийн депогийн 2018 оны 7-р сарын тууз бүртгэлийн тайлан</b> </center> </p><table border="1">{table}</table><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
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
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {

                "language": {
                    "lengthMenu": " _MENU_ бичлэг",
                    "zeroRecords": "Бичлэг олдсонгүй",
                    "info": "_PAGE_ ээс _PAGES_ хуудас" ,
                    "infoEmpty": "Бичлэг олдсонгүй",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Хайлт:"
                },
                dom: 'Bfrtip',
                buttons: [

                    'csv', 'excel', 'pdf'

                ]


            } );

        } );
    </script>
    <script type="text/javascript">
        function myfunc(sel)
        {

            $.get('getrep/' + sel,function(data){
                $('#repid').empty();

                $.each(data,function(i,qwe){
                    console.log(qwe);
                    $('#repid').trigger('change');

                    $('#repid').append($('<option>', {
                        value: qwe.repid,
                        id: qwe.repid,
                        text: qwe.repshname
                    }));

                    $('#repid').focus();

                });
            });
        }
    </script>
@endsection