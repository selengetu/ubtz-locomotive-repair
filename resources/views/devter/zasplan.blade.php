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
                     Засвар бүртгэл
                            
                        </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="add" data-toggle="modal" data-target="#myModal1" data-backdrop="static" data-keyboard="false">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                   Засвар бүртгэх
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
                                                     <form method="post" action="zasplan">
                                                         
                                        <div class="col-md-12">
                                        <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Төлөв</label>
                                                  <select class="form-control select2" id="zas_status" name="zas_status" required="true">
                                                      <option value="0" >Засвараас гараагүй</option>
                                                      <option value="1"  @if($zas_status == 1 ) selected @endif>Засвараас гарсан</option>
                                                  </select>

                                              </div>
                                          </div>
                                            <div class="col-md-2">
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
                                            <div class="col-md-2">
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
                                                          <option value= "{{$locserials->sericode}}"> {{$locserials->seriname}}</option>
                                                      @endforeach
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
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#ho">Үндсэн</a></li>
                        <li><a data-toggle="tab" href="#me1" id="addtab">Нэмэлт ажил</a></li>

                    </ul>

                    <div class="tab-content">
                        <div id="ho" class="tab-pane fade in active">
                            <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                            <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                            <p><center><b> @if($zas_status ==1 ) 
                            {{$startdate}}-с {{$enddate}} хооронд засвараас гарсан тэргүүд
                        @elseif($zas_status == 0 ) 
                      Өнөөдөр засварт байгаа тэргүүд
                        @endif
                        </b></center> </p>
                            <table class="table table-striped table-bordered table-hover"  id="example">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>
                                    <th>#</th>
                                    <th>Илчит тэрэг</th>
                                    <th>Засварын томьёолол</th>
                                    <th>Засварт орсон хугацаа</th>
                                    <th>Засвараас гарах хугацаа</th>
                                    <th>Төлөвлөсөн хугацаа</th>
                                    <th>Засвараас гарсан хугацаа</th>
                                    <th>Нийт зогсолт</th>
                                    <th>Хийсэн</th>
                                    <th>Хийхээр төлөвлөсөн</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $no = 1; ?>
                                @foreach($zasplan as $zasplans)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$zasplans->seriname}} -{{$zasplans->zutnumber}} -{{$zasplans->section}}</td> 
                                        <td> {{$zasplans->rep_name}} </td>
                                        <td>{{$zasplans->repindate}}</td>
                                        <td>{{$zasplans->repoutdate}}</td>
                                        <td>{{$zasplans->repplandate}}</td>
                                        <td>{{$zasplans->repouteddate}}</td>
                                        <td>{{$zasplans->stopsum}}</td>
                                        <td>{{$zasplans->done}}</td>
                                        <td>{{$zasplans->do}}</td>
                                        <td class='m2'> <button type='button' tag="{{$zasplans->repairid}}" class='btn btn-primary update' data-toggle='modal' data-target='#myModal1' data-backdrop='static' data-keyboard='false' style='background-color: #2EB9A8; border-color: #2EB9A8'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>
                        
                                        </tr>
                                    <?php $no++; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="me1" class="tab-pane fade">
                        <div class="row">
                        <div class="col-md-12">
                         <table class="table table-striped table-bordered table-hover"  id="planzas">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>
                                    <th>Илчит тэрэг</th>
                                    <th>Засварын томьёолол</th>
                                    <th>Засварт орсон хугацаа</th>
                                    <th>Засвараас гарах хугацаа</th>
                                    <th>Засвараас гарах нормт хугацаа</th>
                                    <th>Засвараас гарсан хугацаа</th>
                                    <th>Нийт зогсолт</th>
                                    <th>Хийсэн</th>
                                    <th>Хийхээр төлөвлөсөн</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                               
                                </tbody>
                            </table></div>
                        <div class="col-md-6">
                        <table class="table table-striped table-bordered table-hover" id="planadd">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>

                                <th>Төрөл</th>
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
                        <table class="table table-striped table-bordered table-hover" id="planbaig">
                                <thead style="background-color: #81b5d5; color: #fff">
                                <tr>

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

                                    <th>Материалын нэр </th>
                                    <th>Нэгж </th>
                                    <th>Ширхэг</th>
                                    <th></th>
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
                          <h5 class="modal-title" id="modal-title" name="modal-title">
                        Засвар бүртгэх</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#home">Үндсэн</a></li>
                              <li class="disabled disabledTab"><a data-toggle="tab" id="modaltabadd" href="#menu1">Нэмэлт ажил</a></li>
                              <li class="disabled disabledTab"><a data-toggle="tab" id="modaltabbaig" href="#menu2">Байгууллага</a></li>
                              <li class="disabled disabledTab"><a data-toggle="tab" id="modaltabmat" href="#menu3">Материал</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                  <form method="post" action="addzasplan">
                                      <div class="col-md-12">
                                      {{ csrf_field() }}
                                      <div class="col-md-2">
                                              <div class="form-group">
                                                  <label for="name">Засвар хийсэн депо</label>
                                                  <select class="form-control select2" id="depocode" name="depocode" >
                                                      @foreach($depo as $depos)
                                                          <option value= "{{$depos->depocode}}" tag="{{$depos->depocode}}"> {{$depos->deponame}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>

                                          </div>

                                          <div class="col-md-2">
                                              <div class="form-group">
                                                  <label for="name">Зүтгүүрийн сери</label>
                                                  <input class="form-control hidden" id="zastype" name="zastype" type="text" value="{{$zastype}}">
                                                  <input class="form-control hidden" id="type" name="type" type="text" value="1">
                                                  <input class="form-control hidden" id="zasid" name="zasid" type="text" value="">
                                                  <div id="zas_seridiv">
                                                  <select class="form-control select2" id="zas_seri" name="zas_seri" required="true">
                                                      <option value="0">Бүгд</option>
                                                      @foreach($locserial as $locserials)
                                                          <option value= "{{$locserials->sericode}}"> {{$locserials->seriname}}</option>
                                                      @endforeach
                                                  </select>
                                                     </div>
                                                     <div id="zas_seridiv1">
                                                  <select class="form-control select2" id="zas_seri1" name="zas_seri1" required="true">
                                                      <option value="0">Бүгд</option>
                                                      @foreach($locserial as $locserials)
                                                          <option value= "{{$locserials->sericode}}"> {{$locserials->seriname}}</option>
                                                      @endforeach
                                                  </select>
                                                  </div>
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
                                              <div class="form-group">
                                                  <label for="name">Секц</label>
                                                  <select class="form-control select2" id="section" name="section" >
                                                          <option value= "А">А</option>
                                                          <option value= "Б">Б</option>
                                                  </select>
                                              </div>

                                          </div>

                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name">Засвар</label>
                                                  <select class="form-control select2" id="repid" name="repid" >
                                                      @foreach($rep as $reps)
                                                          <option value= "{{$reps->rep_id}}">  {{$reps->rep_name}}</option>
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
                                            </div>    
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-icon">
                                                       
                                                        <label for="form_control_1">
                                                        Засвараас гарах огноо
                                                        </label>
                                                        <input class="form-control datepicker" id="repoutdate" name="repoutdate" type="text" value="{{$enddate}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-icon">
                                                       
                                                        <label for="form_control_1">
                                                        Төлөвлөсөн огноо
                                                        </label>
                                                        <input class="form-control datepicker" id="repplandate" name="repplandate" type="text" value="{{$enddate}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-icon">
                                                       
                                                        <label for="form_control_1">
                                                        Гарсан огноо
                                                        </label>
                                                        <input class="form-control datepicker" id="repouteddate" name="repouteddate" type="text" value="{{$enddate}}">
                                                    </div>
                                                </div>
                                            </div>
                                      
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Хийсэн</label>
                                                <textarea class="form-control" id="done" name="done" rows="2" maxlength="500"></textarea>
                                            </div>
                                               
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Хийхээр төлөвлөсөн</label>
                                                <textarea class="form-control" id="do" name ="do" rows="2" maxlength="500"></textarea>
                                            </div>
                                               
                                            </div>
                                      </div>
                                  
                                          <div class="col-md-12">
                                              <div class="col-md-3">
                                                  <div class="form-group">

                                                      <button type="submit" class="btn btn-primary" value="Submit">Хадгалах</button>

                                                  </div>
                                              </div>
                                          </div>

                                  </form>

                              </div>
                              
                              <div id="menu1" class="tab-pane fade">
                              <form method="post"  action="addzasadd" id='formzasadd'>
                                 <div class="col-md-12">
                                     <div class="col-md-3">
                                     {{ csrf_field() }}
                                         <div class="form-group">
                                             <label for="name">Төрөл</label>
                                             <input class='repaid form-control' style="display:none" name="repaid" id="repaid">
                                             <select class="form-control select2" id="addtype" name="addtype" >
                                                   <option value="1">Хос дугуй</option>
                                                   <option value="2">Хүлээлэг</option>
                                                   </select>
                                         </div>
                                     </div>
                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label for="name">Ажлын код</label>
                                             <select class="form-control select2" id="addid" name="addid" >
                                                   
                                                  </select>
                                         </div>
                                     </div>
                                
                                     <div class="col-md-2">
                                         <div class="form-group">
                                             <label for="name">Ажлын цаг</label>
                                             <input type="text" class="form-control inputtext" id="addhour" name="addhour">
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <div class="form-group">
                                             <label for="name">Удаа</label>
                                             <input type="text" class="form-control inputtext" id="addval" name="addval">
                                         </div>
                                     </div>
                                     <div class="col-md-2">
                                         <div class="form-group">
                                             <label for="name">.</label><br>
                                             <button class="btn btn-success">Хадгалах</button>
                                         </div>
                                     </div>
                                 </div>
                                   <table class="table table-bordered table-hover" id="tableplanadd">
                  <thead>
                  <tr>
                      <th>Төрөл</th>
                      <th>Нэмэлт ажлын нэр</th>
                      <th>Ажлын цаг</th>
                      <th>Удаа</th>
                      <th>Нийт цаг</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
              </form>
                              </div>
                        
                             
                              <div id="menu2" class="tab-pane fade">
                              <form method="post" id="formzasbaig" action="addzasbaig">
                                  <div class="col-md-12">
                                    
                                      <div class="col-md-3">
                                          <div class="form-group">
                                          {{ csrf_field() }}
                                          <input class='repaid form-control' style="display:none" name="repaidbaig" id="repaidbaig">
                                              <label for="name">Байгууллагын нэр</label>
                                              <select class="form-control select2" id="baigcode" name="baigcode" >
                                                      @foreach($zasbaig as $baigs)
                                                          <option value= "{{$baigs->baigid}}" tag="{{$baigs->baigcode}}">{{$baigs->baigcode}} - {{$baigs->baigshname}}</option>
                                                      @endforeach
                                                  </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Ажилласан цаг</label>
                                              <input type="text" class="form-control inputtext" id="baigtime" name="baigtime">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">.</label><br>
                                              <button class="btn btn-success">Хадгалах</button>
                                          </div>
                                      </div>
  <table class="table table-bordered table-hover tableplanbaig" id="tableplanbaig">
                  <thead>
                  <tr>

                    
                      <th>Байгууллагын нэр </th>
                      <th>Ажилласан цаг</th>

                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>                                  </div>
              </form>
                              </div>
                              
                             
                              <div id="menu3" class="tab-pane fade">
                              <form method="post"  id="formzasmat" action="addzasmat">
                                  <div class="col-md-12">
                                  <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="name"> Илчит тэрэгний эд анги</label>
                                                  {{ csrf_field() }}
                                                  <input class='repaid form-control' style="display:none" name="repaidmat" id="repaidmat">
                                                  <select class="form-control select2" id="matcode" name="matcode" >
                                                  <option value="0">Бүгд</option>
                                                                          @foreach($part as $parts) 
                                                                               <option value= "{{$parts->part_id}}">{{$parts->part_name}}</option>
                                                                           @endforeach
                                                  </select>
                                              </div>

                                          </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Материалын нэгж</label>
                                              <select class="form-control select2" id="matunit" name="matunit" >
                                                
                                                                          @foreach($unit as $units) 
                                                                               <option value= "{{$units->unitid}}">{{$units->unitshname}}</option>
                                                                           @endforeach
                                                  </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">Материалын тоо</label>
                                              <input type="text" class="form-control inputtext" id="mattoo" name="mattoo">
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="name">.</label><br>
                                              <button class="btn btn-success">Хадгалах</button>
                                          </div>
                                      </div>
                                  </div>
                                  <table class="table table-bordered table-hover tableplanmat" id="tableplanmat">
                  <thead>
                  <tr>

                      <th>Материалын нэр</th>
                      <th>Материалын нэгж </th>
                      <th>Материалын тоо</th>
                     
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>   
                              </div>
                              </form>
                          </div>

                      </div>
                      <div class="modal-footer">

                      </div>
                  </div>
              </div>
          </div>
            @endsection

            <style>
                 .disabledTab {
                    pointer-events: none;
                }
                </style>
            @section('cscript')
          <script type="text/javascript">
            $("#zas_start").datepicker( {
                format: "yyyy-mm-dd",
            });
            $("#zas_end").datepicker( {
                format: "yyyy-mm-dd",

            });
            $("#repindate").datetimepicker({format: 'YYYY-MM-DD HH:mm'});
            $("#replastdate").datetimepicker({format: 'YYYY-MM-DD HH:mm'});
            $("#repouteddate").datetimepicker({format: 'YYYY-MM-DD HH:mm'});
            $("#repplandate").datetimepicker({format: 'YYYY-MM-DD HH:mm'});
            $('#repoutdate').datetimepicker({format: 'YYYY-MM-DD HH:mm'}).on('dp.change', function (event) {
                var date1 = $("#repoutdate").val();   
                    var date2 = $("#repindate").val();
                    var fromDate = parseInt(new Date($("#repindate").val()).getTime()/1000); 
                var toDate = parseInt(new Date( $("#repoutdate").val()).getTime()/1000);
                var timeDiff = parseFloat((toDate - fromDate)/3600).toFixed(2);  // will give difference in hrs
                $("#stopsum").val(timeDiff);
                var stopadd = (timeDiff- $("#stoprep").val());
                $("#stopadd").val(stopadd);
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
                  getaddname(1);
                  getgemtel(101);
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
                  $('.add').on('click', function () {
                    $('#zas_seridiv1').hide();
                    $('#zas_seridiv').show();
                    $('#type').val('0');
                    $('#zasid').val('0');
                    var title = document.getElementById("modal-title");
                    title.innerHTML = "Засвар бүртгэх";
                } );   
              $('.update').on('click', function () {
                var itag=$(this).attr('tag');
                var title = document.getElementById("modal-title");
                title.innerHTML = "Засвар засварлах";
                $('#zas_seridiv1').show();
                $('#zas_seridiv').hide()
                $('#type').val('1');
  
              getzutnumber(0);
        $.get('getplan/'+itag,function(data){
              $("#planzas tbody").empty();
           
              $.each(data,function(i,qwe){
                         $('#zasid').val(qwe.repairid);
                          $('#zas_seri1').val(qwe.sericode).trigger('change'); 
                          $('#repindate').val(qwe.repindate);
                          $('#repoutdate').val(qwe.repoutdate);
                          $('#repouteddate').val(qwe.repouteddate);
                          $('#repplandate').val(qwe.repplandate);
                          $('#done').val(qwe.done);
                          $('#do').val(qwe.do);
                          $('#zas_zutnumber').val(qwe.zutnumber).trigger('change');
                          $('#repid').val(qwe.repid).trigger('change');

                  var sHtml1 = "<tr>" +
                      "   <td class='m1'>" + qwe.seriname +"-"+ qwe.zutnumber + "</td>" +
                      "   <td class='m2'>" + qwe.rep_name + "</td>" +
                      "   <td class='m2'>" + qwe.repindate + "</td>" +
                      "   <td class='m2'>" + qwe.repoutdate + "</td>" +
                      "   <td class='m2'>" + qwe.repplandate + "</td>" +
                      "   <td class='m2'>" + qwe.repouteddate + "</td>" +
                      "   <td class='m2'>" + qwe.stopsum + "</td>" +
                      "   <td class='m2'>" + qwe.done + "</td>" +                     
                      "   <td class='m2'>" + qwe.do + "</td>" +                  
                      "   <td class='m2'> <button type='button' class='btn btn-primary update' data-toggle='modal' data-target='#myModal1' data-backdrop='static' data-keyboard='false' style='background-color: #2EB9A8; border-color: #2EB9A8'><i class='fa fa-check-square-o' aria-hidden='true'></i></button></td>" +
                        
                      "</tr>";

                  $("#planzas tbody").append(sHtml1);

              });
          });
          $.get('getplanbaig/'+itag,function(data){
              $("#planbaig tbody").empty();
              $.each(data,function(i,qwe1){
                  console.log(qwe1);
                  var sHtml1 = "<tr>" +
                      "   <td class='m1'>" + qwe1.baigshname + "</td>" +
                      "   <td class='m2'>" + qwe1.baigtime + "</td>" +
                      "</tr>";

                  $("#planbaig tbody").append(sHtml1);

              });
          });
          $.get('getplanadd/'+itag,function(data){
              $("#planadd tbody").empty();
              $.each(data,function(i,qwe1){
                  console.log(qwe1);
                  var sHtml = "<tr>" +
                      "   <td class='m1'>" + qwe1.addshname + "</td>" +
                      "   <td class='m2'>" + qwe1.addname + "</td>" +
                      "   <td class='m3'>" + qwe1.addhour + "</td>" +
                      "   <td class='m3'>" + qwe1.addval + "</td>"+
                      "   <td class='m3'>" + qwe1.addsum + "</td>"+
                      "</tr>";

                  $("#planadd tbody").append(sHtml);

              });
   


    
      } );
      $.get('getplanmat/'+itag,function(data){
              $("#planmat tbody").empty();
              $.each(data,function(i,qwe1){
                  var sHtml2 = "<tr>" +
                      "   <td class='m1'>" + qwe1.part_name + "</td>" +
                      "   <td class='m2'>" + qwe1.unitname + "</td>" +
                      "   <td class='m2'>" + qwe1.mattoo + "</td>" +
                              
                      "</tr>";

                  $("#planmat tbody").append(sHtml2);

              });
          });
    } );
                  
           
                  $('#zas_seri').change(function(){
                      var itag=$(this).val();
          
                    getzutnumber(itag);
 
                  
                  });
                  $('#locgroup').change(function(){
                      var itag=$(this).val();
                        getgemtel(itag);
                  });
              
                  $('#addtype').change(function(){
                      var itag=$(this).val();
                    getaddname(itag);
           
                  });
                

                  function getgemtel($id){
                      $.get('getgemtel/'+$id,function(data){
                          $('#damage').empty();

                          $.each(data,function(i,qwe){
                              $('#damage').append($('<option>', {
                                  value: qwe.gemtel_id,
                                  id: qwe.gemtel_id,
                                  text: qwe.gemtel_name,
                              })).trigger('change');
                          });
                      });
                  }
        $('#formzasplan').submit(function(event){
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'addzasplan',
            data: $('form#formzasplan').serialize(),
         success: function(result){
            $('.repaid').val(result);
          alert('Засвар бүртгэгдлээ');
          $('#modaltabadd').trigger('click');
         },
  error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
    $('#formzasadd').submit(function(event){
        event.preventDefault();
        var itag =   $('#repaid').val();
        $.ajax({
            type: 'POST',
            url: 'addzasadd',
            data: $('form#formzasadd').serialize(),
         success: function(result){
          alert('Нэмэлт ажил бүртгэгдлээ');
          console.log(itag);
          getplanadd(itag);
         },
  error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
    $('#formzasbaig').submit(function(event){
        event.preventDefault();
        var itag =   $('#repaidbaig').val();
        $.ajax({
            type: 'POST',
            url: 'addzasbaig',
            data: $('form#formzasbaig').serialize(),
         success: function(result){
            console.log(itag);
          alert('Байгууллага бүртгэгдлээ');
          getplanbaig(itag);
         },
  error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
    $('#formzasmat').submit(function(event){
        event.preventDefault();
        var itag =   $('#repaidmat').val();
        $.ajax({
            type: 'POST',
            url: 'addzasmat',
            data: $('form#formzasmat').serialize(),
         success: function(result){
          alert('Материал бүртгэгдлээ');
          console.log(itag);
        getplanmat(itag);
         },
  error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.');
                  }
              }
        })

    });
              } );
          </script>
          <script>
         
              function getplanbaig(itag){
                        $.get('getplanbaig/'+itag,function(data){
                          $("#tableplanbaig tbody").empty();
                          $.each(data,function(i,qwe1){
                              var sHtml1 = "<tr>" +
                                  "   <td class='m1'>" + qwe1.baigshname + "</td>" +
                                  "   <td class='m2'>" + qwe1.baigtime + "</td>" +
                                  "</tr>";

                              $("#tableplanbaig tbody").append(sHtml1);

                          });
                      });
                    }
                    function getplanadd(itag){
                        $.get('getplanadd/'+itag,function(data){
                          $("#tableplanadd tbody").empty();
                          $.each(data,function(i,qwe1){
                              console.log(qwe1);
                              var sHtml = "<tr>" +
                                  "   <td class='m1'>" + qwe1.addshname + "</td>" +
                                  "   <td class='m2'>" + qwe1.addname + "</td>" +
                                  "   <td class='m3'>" + qwe1.addhour + "</td>" +
                                  "   <td class='m3'>" + qwe1.addval + "</td>"+
                                  "   <td class='m3'>" + qwe1.addsum + "</td>"+
                                  "</tr>";

                              $("#tableplanadd tbody").append(sHtml);

                          });
               
       
         
                
                  } );
                    }
                       function getplanmat(itag){
                              $.get('getplanmat/'+itag,function(data){
                          $("#tableplanmat tbody").empty();
                          $.each(data,function(i,qwe1){
                              var sHtml2 = "<tr>" +
                                  "   <td class='m1'>" + qwe1.part_name + "</td>" +
                                  "   <td class='m2'>" + qwe1.unitname + "</td>" +
                                  "   <td class='m2'>" + qwe1.mattoo + "</td>" +
                                 
                                  "</tr>";

                              $("#tableplanmat tbody").append(sHtml2);

                          });
                      });
                    }
                    function getaddname(itag){
                        $.get('getaddname/'+itag,function(data){
                          $('#addid').empty();

                          $.each(data,function(i,qwe){
                            
                              $('#addid').append($('<option>', {
                                  value: qwe.addid,
                                  id: qwe.addid,
                                  text: qwe.addname
                              })).trigger('change');
                          });
                      });
                      }
                      function getzutnumber(itag){
                        $.get('getzut/'+itag,function(data){
                          $('#zas_zutnumber').empty();

                          $.each(data,function(i,qwe){
                              $('#zas_zutnumber').append($('<option>', {
                                  value: qwe.zutnumber,
                                  id: qwe.zutnumber,
                                  text: qwe.zutnumber
                              })).trigger('change');
                          });
                      });
                      }
  
               
          </script>
          <style type="text/css">
             
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