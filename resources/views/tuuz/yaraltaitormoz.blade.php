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
                            Яаралтай тормоз хийсэн
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
                                                     <form method="post" action="yaraltaitormoz">
                                        <div class="col-md-12">
                                                         <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control datepicker" id="yaraltai_start" name="yaraltai_start" type="text"value="{{$startdate}}" /> 
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
                                                                  <input class="form-control datepicker" id="yaraltai_end" name="yaraltai_end" type="text" value="{{$enddate}}"/> 
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
                        <button class="btn btn-info" id="btnExport" onclick="tablesToExcel(array1, array2, 'myfile.xls')" value="Export to Excel"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>
                      <p><center><b> {{$startdate}} -аас {{$enddate}} -ны яаралтай тормозын судалгаа</b></center> </p>
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Огноо </th>

                                                        <th> Машинч </th>
                                                        <th> И/т № </th>
                                                         <th>Галт тэрэг  №</th>
                                                        <th>Жин</th>
                                                        <th>Гол</th>
                                                        <th> Х/х №</th>
                                                        <th>Чиглэл</th>
                                                        <th></th>


                                                        <th> Км</th>
                                                        <th> Цагт</th>
                                                        <th> Зогссон минут</th>
                                                        <th>Дайрсан</th>
                                                        <th> Шалтгааны төрөл</th>
                                                        <th> Тайлбар</th>
                                                      </tr>
                                                </thead>
    
                                              <tbody>
                                                     <?php $no = 1; ?>
                              @foreach($zurchil as $achaas)
                                                    <tr>
                                <td>{{$no}}</td>
                                                        <td>{{date('Y-m-d', strtotime($achaas->arrtime))}}</td>

                                <td>{{$achaas->mashname}}</td>
                                <td>{{$achaas->seriname}}{{$achaas->zutnumber}}</td>
                                 <td>{{$achaas->train_no}}</td>
                                <td>{{$achaas->train_dirtyweight}}</td>
                                <td>{{$achaas->train_gol}}</td>
                                <td>{{$achaas->speedcontrollerno}}</td>
                                <td>{{$achaas->fromstat}}</td>
                                <td>{{$achaas->tostat}}</td>


                                <td>{{$achaas->fault_from}}</td>
                                <td>{{$achaas->fault_time}}</td>
                                <td>{{$achaas->stoptime}}</td>
                                @if($achaas->is_stop == 5)
                                                            <td>Дайрагдсан</td>
                                @elseif($achaas->is_stop == 6)
                                                            <td>Дайрагдахаас сэргийлсэн</td>
                                @elseif($achaas->is_stop == 7)
                                 <td>Шүргэсэн</td>
                                                        @elseif($achaas->is_stop == 12)
                                                            <td>Өнгөрсөн</td>
                                                        @elseif($achaas->is_stop == 13)
                                                            <td>Өнгөрөөгүй</td>
                                 @else
                                 <td></td>
                                @endif
                                                        <td>{{$achaas->broketype_name}}</td>
                                                        <td>{{$achaas->reason}}</td>
                          </tr>
                             <?php $no++; ?>
                         @endforeach    
            
                        
            
          </tbody>
                                            </table>
                                                

  </div>
</div>
                              <div class="table-container" style="width: 60%">
          <div class="table-responsive">
       <table class="table table-striped table-bordered table-hover">
                                                       <thead style="background-color: #81b5d5; color: #fff">
                                                   <tr>
                                                     <?php $sum_count = 0 ?>
                                                      <?php $sum_sum = 0 ?>
                                                      <th>Шалтгаан</th>
                                                      <th>Төлөв</th>
                                                      <th>Удаа</th>
                                                      <th>Зогссон минут</th>
                                                   </tr>
                                                 
                                                    </thead>
                                              <tbody>
                                               <?php $no = 1; ?>
                              @foreach($z as $too)
                                                    <tr>
                      
                                            <td>{{$too->broketype_name}}</td>
                                            @if($too->is_stop == 5)
                                                            <td>Дайрагдсан</td>
                                                        @elseif($too->is_stop == 6)
                                                            <td>Дайрагдахаас сэргийлсэн</td>
                                            @elseif($too->is_stop == 7)
                                            <td>Шүргэсэн</td>
                                                        @elseif($too->is_stop == 12)
                                                            <td>Өнгөрсөн</td>
                                                        @elseif($too->is_stop == 13)
                                                            <td>Өнгөрөөгүй</td>
                                            @else
                                            <td></td>
                                             @endif
                                            <td>{{$too->count}}</td>
                                            <td>{{$too->sum}}</td>
 <?php $sum_count += ($too->count) ?>
                              <?php $sum_sum += (substr($too->sum ,3, 2))+(substr($too->sum , 0, 2)*60) ?>
                                                         
                                                         </tr>
                             <?php $no++; ?>
                         @endforeach    
 <tr>
              <td colspan="2"><center>Нийт</center> </td>
              <td>{{($sum_count)}} </td>

              <td>
                <?php $i5 = str_pad(floor($sum_sum/60), 2, "0", STR_PAD_LEFT). ':'.str_pad(($sum_sum - floor($sum_sum/60)*60), 2, "0", STR_PAD_LEFT). ':00'  ?>
                    {{$sum_sum}} мин
                </td>
            </tr>
                                              </tbody>
                                            </table>
  </div>
</div>
                               <div id="printarea"  style=" display:none;" >
        <p><center><b> {{$startdate}} -аас {{$enddate}} -ны яаралтай тормозын судалгаа</b></center> </p>
   <h5>Тайлан хэвлэсэн огноо: {{Carbon\Carbon::now()->format('Y-m-d H:i')}}</h5>
     <table class="table table-bordered "  id="1"  border="1" cellspacing="0">
                                                       <thead style="background-color: #4BD3C2; color: #fff">
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Огноо </th>

                                                        <th> Машинч </th>
                                                        <th> И/т № </th>
                                                         <th>Галт тэрэг  №</th>
                                                        <th>Жин</th>
                                                        <th>Гол</th>
                                                        <th> Х/х №</th>
                                                        <th>Чиглэл</th>
                                                        <th></th>


                                                        <th> Км</th>
                                                        <th> Цагт</th>
                                                        <th> Зогссон минут</th>
                                                        <th>Дайрсан</th>
                                                        <th> Шалтгааны төрөл</th>
                                                        <th> Тайлбар</th>
                                                      </tr>
                                                </thead>
    
                                              <tbody>
                                                     <?php $no = 1; ?>
                              @foreach($zurchil as $achaas)
                                                    <tr>
                                <td>{{$no}}</td>
                                                        <td>{{date('Y-m-d', strtotime($achaas->arrtime))}}</td>

                                <td>{{$achaas->mashname}}</td>
                                <td>{{$achaas->seriname}}{{$achaas->zutnumber}}</td>
                                 <td>{{$achaas->train_no}}</td>
                                <td>{{$achaas->train_dirtyweight}}</td>
                                <td>{{$achaas->train_gol}}</td>
                                <td>{{$achaas->speedcontrollerno}}</td>
                                                        <td>{{$achaas->fromstat}}</td>
                                                        <td>{{$achaas->tostat}}</td>


                                <td>{{$achaas->fault_from}}</td>
                                <td>{{$achaas->fault_time}}</td>
                                <td>{{$achaas->stoptime}}</td>
                                @if($achaas->is_stop == 5)
                                <td>Дайрагдсан</td>
                                @elseif($achaas->is_stop == 6)
                                 <td>Дайрагдахаас сэргийлсэн</td>
                                @elseif($achaas->is_stop == 7)
                                 <td>Шүргэсэн</td>
                                                        @elseif($achaas->is_stop == 12)
                                                            <td>Өнгөрсөн</td>
                                                        @elseif($achaas->is_stop == 13)
                                                            <td>Өнгөрөөгүй</td>
                                 @else
                                 <td></td>

                                @endif
                                                        <td>{{$achaas->broketype_name}}</td>
                                                        <td>{{$achaas->reason}}</td>
                          </tr>
                             <?php $no++; ?>
                         @endforeach    
            
                        
            
          </tbody>
                                            </table>
                                                  <table class="table table-striped table-bordered table-hover" id="2" border="1" cellspacing="0" style="width: 60%;">
                                                      <thead style="background-color: #4BD3C2; color: #fff">
                                                   <tr>
                                                      <?php $sum_count = 0 ?>
                                                      <?php $sum_sum = 0 ?>
                                                      <th>Шалтгаан</th>
                                                      <th>Төлөв</th>
                                                      <th>Удаа</th>
                                                      <th>Зогссон минут</th>
                                                   </tr>
                                                 
                                                    </thead>
                                              <tbody>
                                               <?php $no = 1; ?>
                              @foreach($z as $too)
                                                    <tr>
                      
                                            <td>{{$too->broketype_name}}</td>
                                            @if($too->is_stop == 5)
                                            <td>Дайрагдсан</td>
                                            @elseif($too->is_stop == 6)
                                            <td>Дайрагдахаас сэргийлсэн</td>
                                            @elseif($too->is_stop == 7)
                                            <td>Шүргэсэн</td>
                                                        @elseif($too->is_stop == 12)
                                                            <td>Өнгөрсөн</td>
                                                        @elseif($too->is_stop == 13)
                                                            <td>Өнгөрөөгүй</td>
                                            @else
                                            <td></td>
                                             @endif
                                            <td>{{$too->count}}</td>
                                            <td>{{$too->sum}}</td>
 <?php $sum_count += ($too->count) ?>
                              <?php $sum_sum += (substr($too->sum ,3, 2))+(substr($too->sum , 0, 2)*60) ?>
                                                         
                                                         </tr>
                             <?php $no++; ?>
                         @endforeach    
 <tr>
              <td colspan="2"><center>Нийт</center> </td>
              <td>{{($sum_count)}} </td>

              <td>
                <?php $i5 = str_pad(floor($sum_sum/60), 2, "0", STR_PAD_LEFT). ':'.str_pad(($sum_sum - floor($sum_sum/60)*60), 2, "0", STR_PAD_LEFT). ':00'  ?>
                  {{$sum_sum}} мин
                </td>
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
          $("#yaraltai_start").datepicker({
        format: 'yyyy-mm-dd',
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#yaraltai_end').datepicker('setStartDate', minDate);
    });
    
    $("#yaraltai_end").datepicker({
        format: 'yyyy-mm-dd',
    })
        .on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#yaraltai_start').datepicker('setEndDate', minDate);
        });
      $('#example').DataTable( {
          "scrollX": true,
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
    var n = 2; //Total table
    for ( var x=1; x<=n; x++ ) {
        array1[x-1] = x;
        array2[x-1] = x + 'th';
    }
var tablesToExcel=null;
     tablesToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>'
        , templateend = '</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head>'
        , body = '<body>     <p><center><b> {{$startdate}} -аас {{$enddate}} -ны яаралтай тормозын судалгаа</b></center> </p>'
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

            window.location.href = uri + base64(format(allOfIt, ctx));

        }
    })();
    </script>
@endsection