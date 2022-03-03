         
<?php $__env->startSection('content'); ?>

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
                                                     <form method="post" action="tuuzorchuulsan">
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input class="form-control datepicker" id="mach_start" name="mach_start" type="text">
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
                                                        <input class="form-control datepicker" id="mach_end" name="mach_end" type="text">
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
                                       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
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
              <p><center><b> <?php echo e($startdate); ?> -аас <?php echo e($enddate); ?> -ны төлөвлөгөөт бус засвар</b></center> </p>
              <table class="table table-striped table-bordered table-hover"  id="example">
                  <thead style="background-color: #81b5d5; color: #fff">
                  <tr>

                      <th> # </th>
                      <th>Депо</th>
                      <th>И/т сери </th>
                      <th>И/т №</th>
                      <th>ТО-2-т орсон депо</th>
                      <th>Орсон огноо</th>
                      <th>Гарсан огноо</th>
                      <th>Засварын цаг</th>
                      <th>Засварын код</th>
                      <th>Засварын томьёолол</th>
                      <th>Засварын төрөл</th>
                      <th>Сүүлд засварт орсон огноо хугацаа</th>
                      <th>Засварын депо</th>
                      <th>Эвдрэл</th>
                      <th>Эвдрэлийн шалтгаан</th>
                      <th>Тооцох газар</th>
                      <th>Групп</th>
                      <th>Авсан арга хэмжээ</th>
                      <th>Хийх ажил</th>
                      <th>Ажлын хэмжээ</th>
                      <th>Ажлын эд анги</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                  <?php $__currentLoopData = $zasunplan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zasunplans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($no); ?></td>
                      <td><?php echo e($zasunplans->repairid); ?></td>
                      <td><?php echo e($zasunplans->seriname); ?></td>
                      <td><?php echo e($zasunplans->zutnumber); ?></td>
                      <td><?php echo e($zasunplans->to2depo); ?></td>
                      <td><?php echo e($zasunplans->repindate); ?></td>
                      <td><?php echo e($zasunplans->repoutdate); ?></td>
                      <td><?php echo e($zasunplans->stopsum); ?></td>
                      <td><?php echo e($zasunplans->repid); ?></td>
                      <td><?php echo e($zasunplans->repshname); ?></td>
                      <td><?php echo e($zasunplans->repshname); ?></td>
                      <td><?php echo e($zasunplans->replasdate); ?></td>
                      <td><?php echo e($zasunplans->repdepo); ?></td>
                      <td><?php echo e($zasunplans->damage); ?></td>
                      <td><?php echo e($zasunplans->damcause); ?></td>
                      <td><?php echo e($zasunplans->calcdepo); ?></td>
                      <td><?php echo e($zasunplans->locgroup); ?></td>
                      <td><?php echo e($zasunplans->decision); ?></td>
                      <td><?php echo e($zasunplans->workdo); ?></td>
                      <td><?php echo e($zasunplans->worktoo); ?></td>
                      <td><?php echo e($zasunplans->workitem); ?></td>
                  </tr>
                  <?php $no++; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>
  </div>
</div>
           
                
               
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <?php $__env->stopSection(); ?>
            <?php $__env->startSection('cscript'); ?>
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
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><p><center><b>  УБТЗ-ын Улаанбаатар Зүтгүүрийн депогийн 2018 оны 7-р сарын тууз бүртгэлийн тайлан</b> </center> </p><table border="1">{table}</table><span> ТАЙЛАН ГАРГАСАН: Тууз орчуулагч:</span><span style="margin-left: 180px"> <?php echo e(Auth::user()->name); ?></span></body></html>'
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
                      "scrollX": true,
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>