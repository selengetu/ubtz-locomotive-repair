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
                            Машинчийн дэвтэр
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
                                                     <form method="post" action="searchmachinist">
                                        <div class="col-md-12">
                                                         <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control datepicker" id="mach_start" name="mach_start" type="text" value="{{$startdate}}"> 
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
                                                                  <input class="form-control datepicker" id="mach_end" name="mach_end" type="text" value="{{$enddate}}"> 
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
                                                            <div class="form-group form-md-line-input has-success">
                                                                
                                                                       <select class="select2 form-control" id="machinist" name="machinist" style="width: 100%">
                                                                          <option value= "0"> Бүгд</option>
                                                                           @foreach(\Cache::get('Machinist') as $mash) 
                                                                       <option value= "{{$mash->mashcode}}">{{$mash->mashcode}} - {{$mash->mashname}}</option>
                                                                         @endforeach
                                                                        </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Машинч
                                                                    </label>
                                                                   
                                                            </div>
                                                        </div>
                                                                 <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                
                                                                 <select class="select2 form-control" id="zurch_type" name="zurch_type">
                    <option value="0">Бүгд</option>
                                                                          @foreach($zurch as $zurchs) 
                                                                               <option value= "{{$zurchs->fault_detail_id}}">{{$zurchs->fault_detail_name}}</option>
                                                                           @endforeach
                   </select>
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                    Дутагдал
                                                                    </label>
                                                                   
                                                            </div>
                                                        </div>
                    
                                                        <div class="col-md-2">
                                                            <div class="form-group form-md-line-input has-success">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <button class="btn btn-info" style="background-color: #2EB9A8; border-color: #2EB9A8"><i class="fa fa-search"></i> Хайх</button>
                                     </div>
                                    </div>        
                                       
                                        </div>
                                        
                                          </form>
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                            
                   <div class="table-container">
                     <p><center><b> {{$startdate}} -аас {{$enddate}} -ны машинчийн дэвтэр</b></center> </p>
          <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                           <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>

                                                        <th> # </th>
                                                        <th>Огноо</th>
                                                         <th> Марш</th>
                                                        <th> Цуваа </th>
                                                        <th> Машинч </th>                                        
                                                          <th>И/т №</th>
                                                           <th>Гал тэрэг  №</th>
                                                  <th>Цэвэр жин</th>
                                                  <th>Бохир жин</th>
                                                  <th>Гол</th>
                                                        <th>Чиглэл </th>
                                                        <th></th>

                                                          <th>Хаанаас</th>
                                                          <th>Хаана</th>
                                                          <th>Хэдэн цагт</th>
                                                           <th> Гаргасан дутагдал</th>
                                                           
                                                      </tr>
                                                </thead>
                                                  <tbody>
                                                     <?php $no = 1; ?>
                              @foreach($zurchil as $achaas)
                                                    <tr class="tuuzzurchil" data-toggle="modal" data-target="#achaamodal" data-id="{{$achaas->route_id}}" tag="{{$achaas->route_id}}">
                                 <td>{{$no}}</td>
                                 <td>{{$achaas->arrtime}}</td>
                                <td>{{$achaas->route_id}}</td>
                                 <td>{{$achaas->brigcode}}</td>
                                <td>{{$achaas->mashname}}</td>
                                <td>{{$achaas->seriname}}-{{$achaas->zutnumber}}</td>
                                  <td>{{$achaas->train_no}}</td>
                  <td>{{$achaas->train_cleanweight}}</td>
                  <td>{{$achaas->train_dirtyweight}}</td>
                  <td>{{$achaas->train_gol}}</td>
                                <td>{{$achaas->fromstat}}</td>
                                <td>{{$achaas->tostat}}</td>
                                 @if($achaas->fault_no == 41)
                                <td></td>
                                <td></td>
                                @else
                                     @if($achaas->fromstationname == null)
                                      <td>{{$achaas->fault_from}}</td>
                                         @else
                                      <td>{{$achaas->fromstationname}}</td>
                                         @endif
                                       @if($achaas->tostationname == null)
                                           @if($achaas->fault_to == $achaas->fault_from)
                                               <td></td>
                                             @else
                                             <td>{{$achaas->fault_to}}</td>
                                             @endif
                                       @else
                                             @if($achaas->tostationname == $achaas->fromstationname)
                                                 <td></td>
                                             @else
                                             <td>{{$achaas->tostationname}}</td>
                                                 @endif
                                       @endif

                                @endif

                                <td>{{$achaas->fault_time}}</td>
                                <td>{{$achaas->fault_detail_name}} </td>

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
          $("#mach_start").datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#mach_end').datepicker('setStartDate', minDate);
    });
    
    $("#mach_end").datepicker({
        format: 'yyyy-mm-dd',
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#mach_start').datepicker('setEndDate', minDate);
        });
} );
</script>
@endsection