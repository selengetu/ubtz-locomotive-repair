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
                        @if($zastype ==1 ) 
                        Төлөвлөгөөт засварын
                        @elseif($zastype ==2 ) 
                        Төлөвлөгөөт бус засварын
                        @endif
                            тайлан
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
                                                     <form method="post"    
                                                     action="zasplan"
                        
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
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Зүтгүүрийн сери</label>
                                                  <select class="form-control select2" id="zas_sericode" name="zas_sericode" required="true">
                                                      <option value="0">Бүгд</option>
                                                      @foreach($locserial as $locserials)
                                                          <option value= "{{$locserials->sericode}}">{{$locserials->seriname}}</option>
                                                      @endforeach
                                                  </select>

                                              </div>
                                          </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="name">Зүтгүүрийн дугаар</label>
                                                    <select class="form-control select2" id="zas_zutnumber" name="zas_zutnumber" >


                                                    </select>
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
          

                
                        <div id="ho" class="tab-pane fade in active">
                            <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                            <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                            <p><center><b> {{$startdate}} -аас {{$enddate}} -ны @if($zastype ==1 ) 
                        төлөвлөгөөт засвар
                        @elseif($zastype ==2 ) 
                        төлөвлөгөөт бус засвар 
                        @endif</b></center> </p>
                            <table class="table table-striped table-bordered table-hover"  id="testTable">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>
                                    <th> # </th>
                                    <th>Илчит тэрэг</th>
                                    <th>Засвар</th>
                                    <th>Засварт орсон хугацаа</th>
                                    <th>Засвараас гарсан хугацаа</th>
                                    <th>Нийт зогсолт</th>
                                    <th>Нэмэлт зогсолт</th>
                                    <th>Засварын зогсолт</th>
                                    <th>Гүйлт</th>
                                    @if($zastype ==2 ) 
                                    <th>Сүүлийн засварын огноо</th>
                                    <th>Гэмтлийн шалтгаан</th>
                                    <th>Групп</th>
                                    <th>Шийдвэр</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $stopsum=0;
                                    $stopadd=0;
                                    $stopclean=0;
                                    $runkm=0;
                                    ?>
                                <?php $no = 1; ?>
                                @foreach($zasplan as $zasplans)
                                    <tr class="zasplan" data-id="{{$zasplans->repairid}}" tag="{{$zasplans->repairid}}">
                                        <td>{{$no}}</td>
                                        <td>{{$zasplans->seriname}} -{{$zasplans->zutnumber}}</td>
                                        <td>{{$zasplans->repshname}}</td>
                                        <td>{{$zasplans->repindate}}</td>
                                        <td>{{$zasplans->repoutdate}}</td>
                                        <td>{{$zasplans->stopsum}}</td>
                                        <td>{{$zasplans->stopadd}}</td>
                                        <td>{{$zasplans->stopclean}}</td>
                                        <td>{{$zasplans->runkm}}</td>
                                        @if($zastype ==2 ) 
                                        <td>{{$zasplans->to2depo}}</td>
                                        <td>{{$zasplans->replastdate}}</td>
                                        <td>{{$zasplans->gpart_name}}</td>
                                        <td>{{$zasplans->locgroupname}}</td>
                                        <td>{{$zasplans->decision}}</td>
                                        @endif
                                    </tr>
                                    <?php
                                      $stopsum=$stopsum+$zasplans->stopsum;
                                      $stopadd=$stopadd+$zasplans->stopadd;
                                      $stopclean=$stopclean+$zasplans->stopclean;
                                      $runkm=$runkm+$zasplans->runkm;
                                          ?>
                                    <?php $no++; ?>
                                @endforeach
                                <tr>
                                                <td colspan=5>Нийт</td>
                                                <td>{{  $stopsum}}</td>
                                                <td>{{  $stopadd}}</td>
                                                <td>{{  $stopclean}}</td>
                                                <td>{{  $runkm}}</td>
                                                <td></td>
                                                @if($zastype ==2 ) 
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        @endif
                                                </tr>

                                </tbody>
                            </table>
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