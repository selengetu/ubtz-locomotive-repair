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
                            Анхаарамжаар явсан
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
                                                     <form method="post" action="attention">
                                        <div class="col-md-12">
                                                         <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control datepicker" id="attention_start" name="attention_start" type="text"  value="{{$startdate}}" /> 
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
                                                                  <input class="form-control datepicker" id="attention_end" name="attention_end" type="text"value="{{$enddate}}"/> 
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
                         <button class="btn btn-info" id="btnExport" onclick="tablesToExcel(array1, array2, 'myfile.xls')" value="Export to Excel"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                   <div class="table-container">
                      <p><center><b> {{$startdate}} -аас {{$enddate}} -ны анхаарамжаар явсан судалгаа</b></center> </p>
          <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                                 <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Огноо </th>
                                                        <th> Машинч </th>
                                                        <th> И/т № </th>
                                                          <th>Галт тэрэг  №</th>
                                                           <th>Цэвэр жин</th>
                                                            <th>Бохир жин</th>
                                                            <th>Гол</th>
                                                        <th> Х/х №</th>
                                                         <th> Чиглэл</th>
                                                         <th> </th>
                                                         <th> Хаанаас </th>
                                                         <th> Хаана</th>
                                                        <th> Анхаарамж км/цаг</th>
                                                        <th> Олгосон минут</th>
                                                      </tr>
                                                </thead>
    
                                              <tbody>
                                                     <?php $no = 1; ?>
                              @foreach($zurchil as $achaas)
                                                    <tr>
                                <td>{{$no}}</td>
                                <td>{{date('Y-m-d', strtotime($achaas->starttime))}}</td>
                                <td>{{$achaas->mashname}}</td>
                                <td>{{$achaas->locserial}} {{$achaas->zutnumber}}</td>
                                <td>{{$achaas->train_no}}</td>
                  <td>{{$achaas->train_cleanweight}}</td>
                  <td>{{$achaas->train_dirtyweight}}</td>
                  <td>{{$achaas->train_gol}}</td>
                                <td>{{$achaas->speedcontrollerno}}</td>
                                <td>{{$achaas->fromstat}}</td>
                                <td>{{$achaas->tostat}}</td>

                                <td>   @if($achaas->fromstationname == NULL)
                                        {{$achaas->fromst}}
                                    @else
                                        {{$achaas->fromstationname}}
                                    @endif
                                </td>
                                <td>   @if($achaas->tostationname == NULL)
                                        {{$achaas->tost}}
                                    @else
                                        {{$achaas->tostationname}}
                                    @endif</td>
                                <td>{{$achaas->speedname}} км/цаг </td>
                             
                                <td>   @if($achaas->time) {{$achaas->time}} минут @endif</td>
                          </tr>
                             <?php $no++; ?>
                         @endforeach    
            
                        
            
          </tbody>
                                            </table>

  </div>
  <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <table class="table table-striped table-bordered table-hover"  id="example" style="width: 20%">
                                                <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>
                                                       <?php $sum_count = 0 ?>
                                                      <?php $sum_sum = 0 ?>
                                                      <?php $sum_time = 0 ?>
                                                        <th> # </th>
                                                        <th> Анхаарамж </th>
                                                        <th> Удаа </th>
                                                        <th> Минут</th>
                                                    
                                                      </tr>
                                                </thead>
    
                                              <tbody>
                                                <?php $no = 1; ?>
                               @foreach($z as $too)
                                                    <tr>
                                <td>{{$no}}</td>
                                <td>{{$too->speedname}}</td>
                                <td>{{$too->count}}</td>
                                 <?php $sum_count += ($too->count) ?>
                                 <td>{{$too->time}}</td>
                                 <?php $sum_time += ($too->time) ?>
                          </tr>
                        
                             <?php $no++; ?>
                         @endforeach    
              <tr>
                            <td colspan="2"><center>Нийт</center></td>
                            <td>{{($sum_count)}}</td>
                          </tr>
            
          </tbody>
                                            </table>
      <table class="table table-striped table-bordered table-hover"  id="example" style="width: 20%">
          <thead style="background-color: #81b5d5; color: #fff">
          <tr>
              <?php $sum_count = 0 ?>
              <?php $sum_sum = 0 ?>
              <?php $sum_time = 0 ?>
              <th> # </th>
              <th> Чиглэл</th>
              <th> Удаа </th>
              <th> Минут</th>

          </tr>
          </thead>

          <tbody>
          <?php $no = 1; ?>
          @foreach($z1 as $too)
              <tr>
                  <td>{{$no}}</td>
                  <td>{{$too->fromstat}} - {{$too->tostat}}</td>
                  <td>{{$too->count}}</td>
                  <?php $sum_count += ($too->count) ?>
                  <td>{{$too->time}}</td>
                  <?php $sum_time += ($too->time) ?>
              </tr>

              <?php $no++; ?>
          @endforeach
          <tr>
              <td colspan="2"><center>Нийт</center></td>
              <td>{{($sum_count)}}</td>
              <td>{{($sum_time)}}</td>
          </tr>

          </tbody>
      </table>
  </div>
</div>
                                 <div id="printarea"  style=" display:none;" >
       <p><center><b> {{$startdate}} -аас {{$enddate}} -ны анхаарамжаар явсан судалгаа</b></center> </p>
   <h5>Тайлан хэвлэсэн огноо: {{Carbon\Carbon::now()->format('Y-m-d H:i')}}</h5>
     <table class="table table-bordered "  id="1"  border="1" cellspacing="0">
         <thead style="background-color: #81b5d5; color: #fff">
         <tr>
             <th> # </th>
             <th> Огноо </th>
             <th> Машинч </th>
             <th> И/т № </th>
             <th>Галт тэрэг  №</th>
             <th>Цэвэр жин</th>
             <th>Бохир жин</th>
             <th>Гол</th>
             <th> Х/х №</th>
             <th> Чиглэл</th>
             <th> </th>
             <th> Хаанаас </th>
             <th> Хаана</th>
             <th> Анхаарамж км/цаг</th>
             <th> Олгосон минут</th>
         </tr>
         </thead>

         <tbody>
         <?php $no = 1; ?>
         @foreach($zurchil as $achaas)
             <tr>
                 <td>{{$no}}</td>
                 <td>{{date('Y-m-d', strtotime($achaas->starttime))}}</td>
                 <td>{{$achaas->mashname}}</td>
                 <td>{{$achaas->locserial}} {{$achaas->zutnumber}}</td>
                 <td>{{$achaas->train_no}}</td>
                 <td>{{$achaas->train_cleanweight}}</td>
                 <td>{{$achaas->train_dirtyweight}}</td>
                 <td>{{$achaas->train_gol}}</td>
                 <td>{{$achaas->speedcontrollerno}}</td>
                 <td>{{$achaas->fromstat}}</td>
                 <td>{{$achaas->tostat}}</td>

                 <td>   @if($achaas->fromstationname == NULL)
                         {{$achaas->fromst}}
                     @else
                         {{$achaas->fromstationname}}
                     @endif
                 </td>
                 <td>   @if($achaas->tostationname == NULL)
                         {{$achaas->tost}}
                     @else
                         {{$achaas->tostationname}}
                     @endif</td>
                 <td>{{$achaas->speedname}} км/цаг </td>
                 <td>   @if($achaas->time) {{$achaas->time}} минут @endif</td>
             </tr>
             <?php $no++; ?>
         @endforeach



         </tbody>
                                            </table>
                                                  <table class="table table-striped table-bordered table-hover" id="2" border="1" cellspacing="0" style="width: 60%;">
                                                  <thead style="background-color: #4BD3C2; color: #fff">
                                                    <tr>
                                                       <?php $sum_count1 = 0 ?>
                                                      <?php $sum_sum1 = 0 ?>
                                                      <?php $sum_time1 = 0 ?>
                                                        <th> # </th>
                                                        <th> Анхаарамж </th>
                                                        <th> Удаа </th>
                                                        <th> Минут </th>
                                                    
                                                      </tr>
                                                </thead>
    
                   <tbody>
                                                <?php $no = 1; ?>
                               @foreach($z as $too)
                                                    <tr>
                                <td>{{$no}}</td>
                                <td>{{$too->speedname}}</td>
                                <td>{{$too->count}}</td>
                                 <?php $sum_count1 += ($too->count) ?>
                                 <td>{{$too->time}}</td>
                                 <?php $sum_time1 += ($too->time) ?>
                          </tr>
                        
                             <?php $no++; ?>
                         @endforeach    
              <tr>
                            <td colspan="2"><center>Нийт</center></td>
                            <td>{{($sum_count1)}}</td>
                            <td>{{($sum_time1)}}</td>
                          </tr>
            
          </tbody>
                                            </table>
                                     <table class="table table-striped table-bordered table-hover" id="3" border="1" cellspacing="0" style="width: 60%;">
                                         <thead style="background-color: #81b5d5; color: #fff">
                                         <tr>
                                             <?php $sum_count = 0 ?>
                                             <?php $sum_sum = 0 ?>
                                             <?php $sum_time = 0 ?>
                                             <th> # </th>
                                             <th> Чиглэл</th>
                                             <th> Удаа </th>


                                         </tr>
                                         </thead>

                                         <tbody>
                                         <?php $no = 1; ?>
                                         @foreach($z1 as $too)
                                             <tr>
                                                 <td>{{$no}}</td>
                                                 <td>{{$too->fromstat}} - {{$too->tostat}}</td>
                                                 <td>{{$too->count}}</td>
                                                 <?php $sum_count += ($too->count) ?>
                                                 <td>{{$too->time}}</td>
                                                 <?php $sum_time += ($too->time) ?>
                                             </tr>

                                             <?php $no++; ?>
                                         @endforeach
                                         <tr>
                                             <td colspan="2"><center>Нийт</center></td>
                                             <td>{{($sum_count)}}</td>
                                             <td>{{($sum_time)}}</td>
                                         </tr>

                                         </tbody>
                                     </table>
     <br>
     <br>
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
          $("#attention_start").datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#attention_end').datepicker('setStartDate', minDate);
    });
    
    $("#attention_end").datepicker({
        format: 'yyyy-mm-dd',
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#attention_start').datepicker('setEndDate', minDate);
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
      var array1 = new Array();
      var array2 = new Array();
      var array3 = new Array();
      var n = 3; //Total table
    for ( var x=1; x<=n; x++ ) {
        array1[x-1] = x;
        array2[x-1] = x + 'th';
        array3[x-1] = x + 'th'+ 'th';
    }

    var tablesToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>'
        , templateend = '</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head>'
        , body = '<body>  <p><center><b> {{$startdate}} -аас {{$enddate}} -ны анхаарамжаар явсан судалгаа</b></center> </p>'
        , tablevar = '<table border="1">{table'
        , tablevarend = '}</table><br><br>'
        , bodyend = '<span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
        , worksheet = '<x:ExcelWorksheet><x:Name>'
        , worksheetend = '</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>'
        , worksheetvar = '{worksheet'
        , worksheetvarend = '}'
        , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
        , wstemplate = ''
        , tabletemplate = '';

        return function (table, name, filename) {
            var tables = table;

            for (var i = 0; i < tables.length; ++i) {
                wstemplate += worksheet + worksheetvar + i + worksheetvarend + worksheetend;
                tabletemplate += tablevar + i + tablevarend;
            }

            var allTemplate = template + wstemplate + templateend;
            var allWorksheet = body + tabletemplate + bodyend;
            var allOfIt = allTemplate + allWorksheet;

            var ctx = {};
            for (var j = 0; j < tables.length; ++j) {
                ctx['worksheet' + j] = name[j];
            }

            for (var k = 0; k < tables.length; ++k) {
                var exceltable;
                if (!tables[k].nodeType) exceltable = document.getElementById(tables[k]);
                ctx['table' + k] = exceltable.innerHTML;
            }

            //document.getElementById("dlink").href = uri + base64(format(template, ctx));
            //document.getElementById("dlink").download = filename;
            //document.getElementById("dlink").click();

            window.location.href = uri + base64(format(allOfIt, ctx));

        }
    })();
    </script>
@endsection