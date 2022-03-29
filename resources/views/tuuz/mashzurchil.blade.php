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
                            Дутагдал хийсэн машинчийн судалгаа
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
                                                     <form method="post" action="searchmachinistzurchil">
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
                           <div class="form-group">
                      <label for="name">Дутагдал</label>
                    <select class="select2 form-control" id="zurch_type" name="zurch_type">
                    <option value="0">Бүгд</option>
                                                                          @foreach($zurch as $zurchs) 
                                                                               <option value= "{{$zurchs->fault_detail_id}}">{{$zurchs->fault_detail_name}}</option>
                                                                           @endforeach
                   </select>
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
                        <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                        <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>           
                   <div class="table-container">
                     <p><center><b> {{$startdate}} -аас {{$enddate}} -ны  дутагдал хийсэн машинчийн судалгаа</b></center> </p>
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
                                                           <th>Галт тэрэг  №</th>
                                                            <th>Жин</th>
                                                            <th>Гол</th>
                                                        <th>Чиглэл</th>
                                                        <th></th>
                                                           <th> Гаргасан дутагдал</th>
                                                           <th> Тайлбар</th>
                                                      </tr>
                                                </thead>
                                                  <tbody>
                                                     <?php $no = 1; ?>
                              @foreach($zurchil as $achaas)
                                                    <tr class="tuuzzurchil" data-toggle="modal" data-target="#achaamodal" data-id="{{$achaas->route_id}}" tag="{{$achaas->route_id}}">
                                <td>{{$no}}</td>
                                <td>{{date('Y-m-d', strtotime($achaas->arrtime))}}</td>
                                <td>{{$achaas->route_id}}</td>
                                                        <td>{{$achaas->brigcode}}</td>
                                <td>{{$achaas->mashname}}</td>
                                <td>{{$achaas->seriname}}-{{$achaas->zutnumber}}</td>
                                  <td>{{$achaas->train_no}}</td>
                               
                                  <td>{{$achaas->train_dirtyweight}}</td>
                                 <td>{{$achaas->train_gol}}</td>
                                                        <td>{{$achaas->fromstat}}</td>
                                                        <td>{{$achaas->tostat}}</td>

                            <td>   @if($achaas->broketype_name == NULL)
                                    {{$achaas->fault_detail_name}}
                                @else
                                    {{$achaas->fault_detail_name}} {{$achaas->broketype_name}}
                                @endif</td>
                          <td>{{$achaas->reason}}</td>
                          </tr>
                             <?php $no++; ?>
                         @endforeach    
            
                        
            
          </tbody>
                                            </table>
  </div>
</div>
                        <div id="printarea" style="display: none" >
   <p><center><b> {{$startdate}} -аас {{$enddate}} -ны  дутагдал хийсэн машинчийн судалгаа</b></center> </p>
   <h5>Тайлан хэвлэсэн огноо: {{Carbon\Carbon::now()->format('Y-m-d H:i')}}</h5>
     <table class="table table-bordered "  id="testTable"  border="1" cellspacing="0">
         <thead style="background-color: #81b5d5; color: #fff">
         <tr>

             <th> # </th>
             <th>Огноо</th>
             <th> Марш</th>
             <th> Цуваа </th>
             <th> Машинч </th>
             <th>И/т №</th>
             <th>Галт тэрэг  №</th>
             <th>Жин</th>
             <th>Гол</th>
             <th>Чиглэл</th>
             <th></th>
             <th> Гаргасан дутагдал</th>
             <th> Тайлбар</th>
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

                 <td>{{$achaas->train_dirtyweight}}</td>
                 <td>{{$achaas->train_gol}}</td>
                 <td>{{$achaas->fromstat}}</td>
                 <td>{{$achaas->tostat}}</td>
                 <td>
                     @if($achaas->broketype_name == NULL)
                         {{$achaas->fault_detail_name}}
                     @else
                         {{$achaas->fault_detail_name}} {{$achaas->broketype_name}}
                     @endif

                     </td>
                 <td>{{$achaas->reason}}</td>
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
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body> {{$startdate}} -аас {{$enddate}} -ны  дутагдал гаргасан машинчийн судалгаа<table border="1">{table}</table><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
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
        dom: 'lfrtpi',
        buttons: [
        
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