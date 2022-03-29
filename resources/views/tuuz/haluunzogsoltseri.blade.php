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
                             Халуун зогсолтын тайлан
                        </span>
                    </div>
         
                </div>
            </div>

                    <div class="panel">
                        <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                            <h4 class="panel-title">
                                <a class="accordion-toggle accordion-toggle-styled " data-toggle="collapse" data-parent="#accordion" href="#sear" style="font-weight: bold;"> <i class="fa fa-search"> Хайлт </i>
                                </a>
                            </h4>
                        </div>
                        <div id="sear" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <fieldset class="scheduler-border">
                                    <form method="post" action="haluunzogsolttailan">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="name">Төрөл</label>
                                                    <select class="form-control" id="haluun_type" name="haluun_type">
                                                        <option value="1">Халуун зогсолт</option>
                                                        <option value="2">Зөөвөр</option>
                                                        <option value="3">Нэмэгдэл</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input class="form-control datepicker" id="haluun_start" name="haluun_start" type="text" value="{{$startdate}}"/>
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
                                                        <input class="form-control datepicker" id="haluun_end" name="haluun_end" type="text"  value="{{$enddate}}"/>
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
                    <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                    <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                  
                   <div class="table-container" id="printarea">
                      <p> <b><center>  {{$startdate}} -аас {{$enddate}} -ны @if( Auth::user()->depo_id  == 1)
                        Сүхбаатар
                    @elseif( Auth::user()->depo_id == 2)
                        Улаанбаатар
                    @elseif( Auth::user()->depo_id == 3)
                        Сайншанд
                    @elseif( Auth::user()->depo_id == 5)
                        Дархан
                    @elseif( Auth::user()->depo_id == 13)
                        Замын-Үүд
                    @endif депогийн  сэлгээний илчит тэрэгний ажилласан ба халуун зогссон судалгаа</center>  </b> </p>
                       <h5>Тайлан хэвлэсэн огноо: {{Carbon\Carbon::now()->format('Y-m-d H:i')}}</h5>
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <table class="table table-striped table-bordered table-hover"  id="testTable">
                                                    <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>
                                                        <th> № </th>


                                                        <th> Ажилласан и/т №</th>
                                                        <th> Хэдэн удаа</th>
                                                        <th> Ажиллах нормт цаг</th>
                                                        <th> Ажилласан цаг</th>
                                                        <th> Ажилласан хувь</th>
                                                        <th> Халуун зогссон цаг </th>
                                                        <th> Халуун зогссон хувь </th>
                                                

                                                      </tr>
                                                </thead>
                                                  <tbody>
                                                  <?php $s=1;
                                                  $p=0;
                                                  $p1=0;
                                                  $iall=0;
                                                  $i1=0;
                                                  $i2=0;
                                                  $i3=0;
                                                  $i4=0;

                                                  ?>
                                                  <?php $all=count($haluun);?>
                                                  @foreach($haluun as $haluuns)
                                                  	@if($p!=$haluuns->locno and $p>0 )
                                                        <tr>
                                                            <td colspan="2"><center>Дүн</center></td>




                                                            <td>{{number_format($i1)}}</td>
                                                            <td>{{$i5}}</td>
                                                            <td>{{$i6}}</td>
                                                            <td>{{$i8}}%</td>
                                                            <td>{{$i7}}</td>
                                                            <td>{{$i9}}%</td>

                                                        </tr>
                                                  @endif

                                                  <?php if($p!=$haluuns->locno) { $p=$haluuns->locno;
                                                      $i1=0;
                                                      $i2=0;
                                                      $i3=0;
                                                      $i4=0;

                                                  } else  { $p1=$haluuns->locno; }?>
                                                  @if($p!=$p1 and $p>0)
                                                      <Tr><Td>{{$s}}</Td><td colspan="9" style="font-weight: bold;font-size: 12px;"> {{$haluuns->locserial}}</td></Tr>
                                                      <?php $s++; ?>
                                                      <tr>
                                                          <td></td>
                                                          <td>{{$haluuns->locserial}} {{$haluuns->zutnumber}}</td>
                                                          <td>{{$haluuns->niit}} </td>
                                                          <td> <?php echo str_pad(floor($haluuns->niitajil / 60),  2, "0", STR_PAD_LEFT)?>:<?php echo str_pad(floor($haluuns->niitajil % 60),  2, "0", STR_PAD_LEFT) ?>:00    <?php $d =(explode(':', $haluuns->niitajil))  ?></td>
                                                          <td><?php echo str_pad(floor($haluuns->yalgawar / 60),  2, "0", STR_PAD_LEFT)?>:<?php echo str_pad(floor($haluuns->yalgawar % 60),  2, "0", STR_PAD_LEFT) ?>:00 </td>
                                                          <td><?php $i10= round(($haluuns->yalgawar/($haluuns->niit*720))*100, 2) ?>{{$i10}}%</td>
                                                          <td> <?php echo str_pad(floor($haluuns->haluun / 60),  2, "0", STR_PAD_LEFT)?>:<?php echo str_pad(floor($haluuns->haluun % 60),  2, "0", STR_PAD_LEFT) ?>:00</td>
                                                          <td><?php $i11= 100-$i10 ?>{{$i11}}%</td>

                                                      </tr>
                                                  @else
                                                      <tr>
                                                          <td></td>
                                                          <td>{{$haluuns->locserial}} {{$haluuns->zutnumber}}</td>
                                                          <td>{{$haluuns->niit}}</td>
                                                          <td> <?php echo str_pad(floor($haluuns->niitajil / 60),  2, "0", STR_PAD_LEFT)?>:<?php echo str_pad(floor($haluuns->niitajil % 60),  2, "0", STR_PAD_LEFT) ?>:00 <?php $d =(explode(':', $haluuns->niitajil))  ?></td>
                                                          <td> <?php echo str_pad(floor($haluuns->yalgawar / 60),  2, "0", STR_PAD_LEFT)?>:<?php echo str_pad(floor($haluuns->yalgawar % 60),  2, "0", STR_PAD_LEFT) ?>:00</td>
                                                          <td><?php $i10= round(($haluuns->yalgawar/($haluuns->niit*720))*100, 2) ?>{{$i10}}%</td>
                                                          <td><?php echo str_pad(floor($haluuns->haluun / 60),  2, "0", STR_PAD_LEFT)?>:<?php echo str_pad(floor($haluuns->haluun % 60),  2, "0", STR_PAD_LEFT) ?>:00 </td>
                                                          <td><?php $i11= 100-$i10 ?>{{$i11}}%</td>

                                                      </tr>
                                                      @endif

                                                  <?php

                                                  $i1=$i1+$haluuns->niit;
                                                  $i2=$i2 +($haluuns->niitajil);
                                                  $i3= $i3 + $haluuns->yalgawar;
                                                  $i4=$i4 +$haluuns->haluun;
                                                  $i5=  str_pad(floor($i2/60), 2, "0", STR_PAD_LEFT). ':'.str_pad(($i2 - floor($i2/60)*60), 2, "0", STR_PAD_LEFT). ':00';
                                                  $i6= str_pad(floor($i3/60), 2, "0", STR_PAD_LEFT). ':'.str_pad(($i3 - floor($i3/60)*60), 2, "0", STR_PAD_LEFT). ':00';
                                                  $i7= str_pad(floor($i4/60), 2, "0", STR_PAD_LEFT). ':'.str_pad(($i4 - floor($i4/60)*60), 2, "0", STR_PAD_LEFT). ':00';
                                                  $i8 = round(($i3/$i2)*100, 2);
                                                  $i9= 100-$i8;
                                                  ?>
                                                  <?php
                                                  if(++$iall === $all) { ?>
                                                    <tr>
                                                        <td colspan="2"><center>Дүн</center></td>




                                                        <td>{{number_format($i1)}}</td>
                                                        <td> {{$i5}}</td>
                                                        <td> {{$i6}}</td>
                                                        <td>{{$i8}}%</td>
                                                        <td>{{$i7}}</td>
                                                        <td>{{$i9}}%</td>

                                                    </tr>

                                                  <?php } ?>



                        @endforeach

          </tbody>
                                            </table>

              <table class="table table-striped table-bordered table-hover"  id="example">
                  <thead style="background-color: #81b5d5; color: #fff">
                  <tr>
                      <th> # </th>
                      <th>Чиглэл</th>
                      <th> И/т № </th>
                      <th> Эхэлсэн огноо </th>
                      <th> Дууссан огноо </th>
                      <th> Ажилласан цаг </th>
                      <th> Маршрут № </th>
                      <th> Халуун зогссон цаг</th>

                      <th>Гал тэрэг  №</th>
                      <th>Жин</th>
                      <th>Гол</th>

                  </tr>
                  </thead>

                  <tbody>
                  <?php $no = 1; ?>
                  @foreach($del as $dels)
                      <tr>
                          <td>{{$no}}</td>
                          <td>{{$dels->statfullname}}</td>
                          <td>{{$dels->locserial}} {{$dels->zutnumber}}</td>

                          <td>{{$dels->arrtime}}</td>
                          <td>{{$dels->deptime}}</td>
                          <td>{{$dels->ajillasantsag}}</td>
                          <td>{{$dels->route_id}}</td>
                          <td>{{$dels->endtime}}</td>

                          <td>{{$dels->train_no}}</td>
                          <td>{{$dels->train_dirtyweight}}</td>
                          <td>{{$dels->train_gol}}</td>


                      </tr>
                      <?php $no++; ?>
                  @endforeach



                  </tbody>
              </table>
              <div class="row">
                  <div class="col-md-6" style="padding: 10px 100px"><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span>
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
                     $("#haluun_start").datepicker({
                         format: 'yyyy-mm-dd',
                         todayBtn:  1,
                         autoclose: true,
                     }).on('changeDate', function (selected) {
                         var minDate = new Date(selected.date.valueOf());
                         $('#haluun_end').datepicker('setStartDate', minDate);
                     });

                     $("#haluun_end").datepicker({
                         format: 'yyyy-mm-dd',
                     })
                         .on('changeDate', function (selected) {
                             var minDate = new Date(selected.date.valueOf());
                             $('#haluun_start').datepicker('setEndDate', minDate);
                         });


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
                 var tableToExcel = (function () {
                     var uri = 'data:application/vnd.ms-excel;base64,'
                         , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>  <p> <b><center>  {{$startdate}} -аас {{$enddate}} -ны сэлгээний илчит тэрэгний ажилласан ба халуун зогссон судалгаа</center>  </b> </p><table border="1">{table}</table><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
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
             @endsection