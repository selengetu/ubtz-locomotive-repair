@extends('layouts.app3')
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
                        Аялалын судалгаа
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
                                                     <form method="post" action="dooshorson">
                                        <div class="col-md-12">
                                                         <div class="col-md-3">
                                                            <div class="form-group form-md-line-input has-success">
                                                                <div class="input-icon">
                                                                <input class="form-control" id="start" name="start" type="number"  value="{{$startdate}}" /> 
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Эхлэх сар
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
                                                                  <input class="form-control" id="end" name="end" type="number"  value="{{$enddate}}" /> 
                                                                    <label for="form_control_1" style="font-size:12px;">
                                                                     Дуусах сар
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
                      <p><center><b> {{$startdate}} -аас {{$enddate}} дугаар аялалын судалгаа</b></center> </p>
          <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                                  <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>
                                                        <th> # </th>
                                                        <th> Табель </th>
                                                        <th> Машинчийн нэр </th>
                                                        <th> Албан тушаал  </th>
                                                        <th> Цувааны дугаар </th>
                                                        <th> Нийт аялал </th>
                                                        <th> Техникийн аялал </th>
                                                        <th> Тооцогдоогүй </th>
                                                        <th> Хувь</th>
                                                        <th> Хурд + </th>
                                                        <th> Хурд - </th>
                                                        <th> Түлш + </th>
                                                        <th> Түлш - </th>
                                                        <th> ТО-1 + </th>
                                                        <th> ТО-1 - </th>
                                                        <th> Цикл + </th>
                                                        <th> Цикл - </th>
                                                        <th> Ломбо + </th>
                                                        <th> Ломбо - </th>
                                                        <th> Маршрут + </th>
                                                        <th> Маршрут - </th>
                                                        <th> ТУ-152 + </th>
                                                        <th> ТУ-152 - </th>
                                                        <th> ИТ БҮРЭН + </th>
                                                        <th> ИТ БҮРЭН - </th>
                                                      </tr>
                                                </thead>
    
                                              <tbody>
                                              <?php $no = 1; ?>
                              @foreach($report as $item)
                                                    <tr>
                                <td>{{$no}}</td>
                                <td>{{$item->mashcode}}</td>
                                <td>{{$item->mashname}}</td>
                                <td>{{$item->tushcode}}</td>
                                <td>{{$item->tsuvcode}}</td>
                                <td>{{$item->sumtravel}}</td>
                                <td>{{$item->sumtech}}</td>
                                <td>{{$item->sumtravel - $item->sumtech}}</td>
                                <td> <?php
                                if($item->sumtech > 0 && $item->sumtravel){
                                echo number_format((($item->sumtech)/($item->sumtravel)*100), 2, '.', ' ');}?>
                               </td>
                                <td>{{$item->sumspeed}}</td>
                                <td>{{$item->sumtravel - $item->sumspeed}}</td>
                                <td>{{$item->sumoil}}</td>
                                <td>{{$item->sumtravel - $item->sumoil}}</td>
                                <td>{{$item->sumto1}}</td>
                                <td>{{$item->sumtravel - $item->sumto1}}</td>
                                <td>{{$item->sumcycle}}</td>
                                <td>{{$item->sumtravel - $item->sumcycle}}</td>
                                <td>{{$item->sumlombo}}</td>
                                <td>{{$item->sumtravel - $item->sumlombo}}</td>
                                <td>{{$item->summarsh}}</td>
                                <td>{{$item->sumtravel - $item->summarsh}}</td>
                                <td>{{$item->sumressiv}}</td>
                                <td>{{$item->sumtravel - $item->sumressiv}}</td>
                                <td>{{$item->sumsel}}</td>
                                <td>{{$item->sumtravel - $item->sumsel}}</td>

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
        , body = '<body> <p><center><b> {{$startdate}} -аас {{$enddate}} дугаар аялалын судалгаа</b></center> </p>'
        , tablevar = '<table border="1">{table'
        , tablevarend = '}</table><br><br>'
        , bodyend = '<span> ТАЙЛАН ГАРГАСАН:</span><span style="margin-left: 180px"> {{ Auth::user()->name }}</span></body></html>'
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