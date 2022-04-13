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
                            Төлөвлөгөөт бус засвар
                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="  " id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                    Төлөвлөгөөт бус засвар бүртгэх
                                </label>
                            </a>
                        </div>
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
                                                     <form method="post" action="zasunplan">
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
                                        
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#ho">Үндсэн</a></li>
                        <li class="disabled disabledTab" ><a data-toggle="tab" href="#me1" id="addtab">Нэмэлт ажил</a></li>

                    </ul>

                    <div class="tab-content">
                        <div id="ho" class="tab-pane fade in active">
                            <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                            <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                            <p><center><b> {{$startdate}} -аас {{$enddate}} -ны төлөвлөгөөт бус засвар</b></center> </p>
                            <table class="table table-striped table-bordered table-hover"  id="example">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>

                                    <th> # </th>
                                    <th>Данстай депо</th>
                                    <th>И/т сери, №</th>
                                    <th>Секц</th>
                                    <th>То-2 орсон огноо</th>
                                    <th>Засварын код</th>
                                    <th>Засварын томьёолол</th>
                                    <th>Засварт орсон хугацаа</th>
                                    <th>Засвараас гарсан хугацаа</th>
                                    <th>Нийт зогсолт</th>
                                    <th>Гэмтэл</th>
                                    <th>Гэмтлийн шалтгаан</th>
                                   
                                </tr>
                                </thead>
                                <tbody>

                                <?php $no = 1; ?>
                                @foreach($zasunplan as $zasunplans)
                                    <tr class="zasunplan" data-id="{{$zasunplans->repairid}}" tag="{{$zasunplans->repairid}}"  onclick="$('#addtab').trigger('click');">
                                        <td>{{$no}}</td>
                                        <td>{{$zasunplans->dansdepo}}</td>
                                        <td>{{$zasunplans->seriname}}-{{$zasunplans->zutnumber}}</td>
                                        <td>{{$zasunplans->repshname}}</td>
                                        <td>{{$zasunplans->repindate}}</td>
                                        <td>{{$zasunplans->repoutdate}}</td>
                                        <td>{{$zasunplans->stopsum}}</td>
                                        <td>{{$zasunplans->damage}}</td>
                                        <td>{{$zasunplans->damcause}}</td>
                                        <td>{{$zasunplans->calcdepo}}</td>
                                        <td>{{$zasunplans->decision}}</td>
                                        <td>{{$zasunplans->workdo}}</td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="me1" class="tab-pane fade">
                        <div class="row">
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered table-hover" id="planadd">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>

                                    <th> # </th>
                                    <th>Төрөл</th>
                                    <th>Ажлын код </th>
                                    <th>Нэмэлт ажлын нэр</th>
                                    <th>Ажлын цаг</th>
                                    <th>Удаа</th>
                                    <th>Нийт цаг</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                           
                        </div>
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered table-hover" id="planadd">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>

                                <th>Тооцох депо</th>
                                    <th>Групп</th>
                                    <th>Шийдвэр</th>
                                    <th>Хийгдэх ажил</th>
                                    <th>Материал</th>
                                    <th>Хүлээн авагч</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                           
                        </div>
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered table-hover" id="planbaig">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>

                                    <th> # </th>
                                    <th>Код</th>
                                    <th>Байгууллагын нэр </th>
                                    <th>Тооцох цаг</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered table-hover"  id="planmat">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>

                                    <th> # </th>
                                    <th>Код</th>
                                    <th>Материалын нэр </th>
                                    <th>Ширхэг</th>

                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        </div>
        
                           
                        </div>

                    </div>

        </div>   

                </div>
                <!-- END CONTENT BODY -->
            </div>
          <div class="modal fade" id="myModal1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Төлөвлөгөөт бус засвар бүртгэх</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Үндсэн</a></li>
                              <li><a data-toggle="tab" href="#menu1">Нэмэлт ажил</a></li>
                              <li><a data-toggle="tab" href="#menu2">Байгууллага</a></li>
                              <li><a data-toggle="tab" href="#menu3">Материал</a></li>
                          </ul>


                          <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                  <form method="post" action="
                                  ">
                                      <div class="col-md-12">
                                      {{ csrf_field() }}
                                      <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Татах хэсэг</label>
                                                  <select class="form-control select2" id="zas_owndepo" name="zas_owndepo" >
                                                      <option value="5">ТЧ-1</option>
                                                      <option value="2">ТЧ-2</option>
                                                      <option value="3">ТЧ-3</option>
                                                      <option value="1">Сүхбаатар</option>
                                                      <option value="13">Замын-Үүд</option>
                                                  </select>

                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Зүтгүүрийн сери</label>
                                                  <select class="form-control select2" id="zas_seri" name="zas_seri" required="true">
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
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Урсгал засварын томьёолол</label>
                                                  <select class="form-control select2" id="repid" name="repid" >
                                                      @foreach($rep as $reps)
                                                          <option value= "{{$reps->repid}}" tag="{{$reps->repshname}}"> {{$reps->repshname}} - {{$reps->repname}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-icon">
                                                    <label for="form_control_1">
                                                        Засварт орсон огноо
                                                        </label>
                                                        <input class="form-control datepicker" id="repindate" name="repindate" type="text" value="{{$enddate}}">
                                                
                                                    </div>
                                                </div>
                                            </div>     <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-icon">
                                                       
                                                        <label for="form_control_1">
                                                        Засвараас гарсан огноо
                                                        </label>
                                                        <input class="form-control datepicker" id="repoutdate" name="repoutdate" type="text" value="{{$enddate}}">
                                                    </div>
                                                </div>
                                            </div>
                                       
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Нийт цаг</label>
                                                  <input type="number" class="form-control inputtext" id="stopsum" name="stopsum" >
                                              </div>

                                          </div>

                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">ТО-2 хийсэн депо</label>
                                                  <select class="form-control select2" id="to2depo" name="to2depo" >
                                                      <option value="5">ТЧ-1</option>
                                                      <option value="2">ТЧ-2</option>
                                                      <option value="3">ТЧ-3</option>
                                                      <option value="1">Сүхбаатар</option>
                                                      <option value="13">Замын-Үүд</option>
                                                  </select>

                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Гэмтэл</label>
                                                  <input type="number" class="form-control inputtext" id="zasrun" name="zasrun">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Гэмтлийн шалтгаан</label>
                                                  <input type="number" class="form-control inputtext" id="stopto4" name="stopto4">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Тооцох депо</label>
                                                  <select class="form-control select2" id="calcdepo" name="calcdepo" >
                                                      <option value="5">ТЧ-1</option>
                                                      <option value="2">ТЧ-2</option>
                                                      <option value="3">ТЧ-3</option>
                                                      <option value="1">Сүхбаатар</option>
                                                      <option value="13">Замын-Үүд</option>
                                                  </select>
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Групп</label>
                                                  <input type="text" class="form-control inputtext" id="reciever" name="reciever">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Шийдвэр</label>
                                                  <input type="text" class="form-control inputtext" id="reciever" name="reciever">
                                              </div>

                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">.</label><br>
                                                  <a class="btn btn-primary back">Go Back</a>
                                                 <a class="btn btn-primary continue">Place Order</a>
                                              </div>
                                          </div>
                                      </div>
                                  </form>

                              </div>
                              <div id="menu1" class="tab-pane fade">
                                 <div class="col-md-12">
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">Төрөл</label>
                                             <select class="form-control select2" id="addtype" name="addtype" >
                                                   <option value="1">Хос дугуй</option>
                                                   <option value="2">Хүлээлэг</option>
                                                   </select>
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">Ажлын код</label>
                                             <select class="form-control select2" id="addname" name="addname" >
                                                   
                                                  </select>
                                         </div>
                                     </div>
                                
                                     <div class="col-md-2">
                                         <div class="form-group">
                                             <label for="name">Ажлын цаг</label>
                                             <input type="text" class="form-control inputtext" id="worktime" name="worktime">
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <div class="form-group">
                                             <label for="name">Удаа</label>
                                             <input type="text" class="form-control inputtext" id="totaltime" name="totaltime">
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <div class="form-group">
                                             <label for="name">.</label><br>
                                             <button class="btn btn-success">Хадгалах</button>
                                         </div>
                                     </div>
                                 </div>
                                   <table class="table table-bordered table-hover">
                  <thead>
                  <tr>

                      <th> # </th>
                      <th>Төрөл</th>
                      <th>Ажлын код </th>
                      <th>Нэмэлт ажлын нэр</th>
                      <th>Ажлын цаг</th>
                      <th>Удаа</th>
                      <th>Нийт цаг</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
                              </div>
                              <div id="menu2" class="tab-pane fade">
                                  <div class="col-md-12">
                                    
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Байгууллагын нэр</label>
                                              <select class="form-control select2" id="zasbaig" name="zasbaig" >
                                                      @foreach($zasbaig as $baigs)
                                                          <option value= "{{$baigs->baigcode}}" tag="{{$baigs->baigcode}}">{{$baigs->baigcode}} - {{$baigs->baigshname}}</option>
                                                      @endforeach
                                                  </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Тооцох газар</label>
                                              <input type="text" class="form-control inputtext" id="planbaig" name="planbaig">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">.</label><br>
                                              <button class="btn btn-success">Хадгалах</button>
                                          </div>
                                      </div>
  <table class="table table-bordered table-hover">
                  <thead>
                  <tr>

                      <th> # </th>
                      <th>Код</th>
                      <th>Байгууллагын нэр </th>
                      <th>Тооцох цаг</th>

                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>                                  </div>
                              </div>
                              <div id="menu3" class="tab-pane fade">
                                  <div class="col-md-12">
                                  <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name"> Илчит тэрэгний эд анги</label>
                                                  <select class="form-control select2" id="zasmat" name="zasmat" >
                                                  <option value="0">Бүгд</option>
                                                                          @foreach($part as $parts) 
                                                                               <option value= "{{$parts->part_id}}">{{$parts->part_name}}</option>
                                                                           @endforeach
                                                  </select>
                                              </div>

                                          </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Эд ангийн сери</label>
                                              <input type="text" class="form-control inputtext" id="ed_seri" name="ed_seri">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Эд ангийн дугаар</label>
                                              <input type="text" class="form-control inputtext" id="ed_dugaar" name="ed_dugaar">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">.</label><br>
                                              <button class="btn btn-success">Хадгалах</button>
                                          </div>
                                      </div>
                                  </div>
                                  <table class="table table-bordered table-hover">
                  <thead>
                  <tr>

                      <th> # </th>
                      <th>Эд ангийн төрөл</th>
                      <th>Эд ангийн сери </th>
                      <th>Эд ангийн дугаар</th>

                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>   
                              </div>
                          </div>

                      </div>
                      <div class="modal-footer">

                      </div>
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
$("#repindate").datetimepicker({format: 'YYYY-MM-DD HH:mm'});
$("#repoutdate").datetimepicker({format: 'YYYY-MM-DD HH:mm'});
$("#repoutdate").change(function(){  
         var date1 = $("#repoutdate").val();
          console.log(date1);
        var date2 = $("#repindate").val();
        diff = Math.abs(date1 - date2) / 36e5;
        console.log(diff);
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
                  $('.continue').click(function(){
                        $('.nav-tabs > .active').next('li').find('a').trigger('click');
                        });
                        $('.back').click(function(){
                        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
                    });
                  $('#zas_seri').change(function(){
                      var itag=$(this).val();
                      var itag1=$('#zas_owndepo').val();
                      $.get('getzut/'+itag+'/'+itag1,function(data){
                          $('#zas_zutnumber').empty();

                          $.each(data,function(i,qwe){
                              $('#zas_zutnumber').append($('<option>', {
                                  value: qwe.zutnumber,
                                  id: qwe.zutnumber,
                                  text: qwe.zutnumber
                              })).trigger('change');
                          });
                      });
                      $.get('getzasplanbase/'+itag,function(data){
                          $('#repid').empty();

                          $.each(data,function(i,qwe){
                              $('#repid').append($('<option>', {
                                  value: qwe.repid,
                                  id: qwe.repid,
                                  text: qwe.repshname
                              })).trigger('change');
                          });
                      });
                  });

                  $('#zas_owndepo').change(function(){
                      var itag=$(this).val();
                      $.get('getloc/'+itag,function(data){
                          $('#zas_seri').empty();

                          $.each(data,function(i,qwe){
                              console.log(qwe);
                              $('#zas_seri').append($('<option>', {
                                  value: qwe.sericode,
                                  id: qwe.sericode,
                                  text: qwe.seriname
                              })).trigger('change');
                          });
                      });
                  });
                  $('#addtype').change(function(){
                      var itag=$(this).val();
                      $.get('getaddname/'+itag,function(data){
                          $('#addname').empty();

                          $.each(data,function(i,qwe){
                              console.log(qwe);
                              $('#addname').append($('<option>', {
                                  value: qwe.addid,
                                  id: qwe.addid,
                                  text: qwe.addname
                              })).trigger('change');
                          });
                      });
                  });
                  $('.zasplan').on('click',function(){
                      var itag=$(this).attr('tag');
                      $.get('getplanadd/'+itag,function(data){
                          $("#planadd tbody").empty();
                          $.each(data,function(i,qwe1){
                              var sHtml = "<tr>" +
                                  "   <td class='m1'>" + qwe1.addtype + "</td>" +
                                  "   <td class='m2'>" + qwe1.addid + "</td>" +
                                  "   <td class='m3'>" + qwe1.addhour + "</td>" +
                                  "   <td class='m3'>" + qwe1.addval + "</td>"+
                                  "</tr>";

                              $("#planadd tbody").append(sHtml);

                          });
                      $.get('getplanbaig/'+itag,function(data){
                          $("#planbaig tbody").empty();
                          $.each(data,function(i,qwe1){
                              var sHtml1 = "<tr>" +
                                  "   <td class='m1'>" + qwe1.baigcode + "</td>" +
                                  "   <td class='m2'>" + qwe1.baigtime + "</td>" +
                                  "</tr>";

                              $("#planbaig tbody").append(sHtml1);

                          });
                      });
                      $.get('getplanmat/'+itag,function(data){
                          $("#planmat tbody").empty();
                          $.each(data,function(i,qwe1){
                              var sHtml2 = "<tr>" +
                                  "   <td class='m1'>" + qwe1.matcode + "</td>" +
                                  "   <td class='m2'>" + qwe1.matname + "</td>" +
                                  "   <td class='m2'>" + qwe1.matunit + "</td>" +
                                  "   <td class='m2'>" + qwe1.mattoo + "</td>" +

                                  "</tr>";

                              $("#planmat tbody").append(sHtml2);

                          });
                      });
                  } );
              } );
              } );
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