         
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
                            Шугаман эд ангийн хөдөлгөөний дэвтэр
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
                                                                <input class="form-control datepicker" id="mach_start" name="mach_start" type="text" value="<?php echo e($startdate); ?>"> 
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
                                                                  <input class="form-control datepicker" id="mach_end" name="mach_end" type="text" value="<?php echo e($enddate); ?>"> 
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
                                                    <div class="input-icon">
                                                        <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                                            <option value="0">Бүгд</option>
                                                            <?php $__currentLoopData = $locserial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locserials): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value= "<?php echo e($locserials->sericode); ?>"><?php echo e($locserials->seriname); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Илчит тэрэгний сери
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">

                                                <div class="form-group form-md-line-input has-success">
                                                    <div class="input-icon">
                                                        <input type="text" name="locnumber" class="form-control">
                                                        <label for="form_control_1" style="font-size:12px;">
                                                            Илчит тэрэгний дугаар
                                                        </label>
                                                        <span class="help-block">
                                                                    </span>

                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-md-line-input has-success">
                                                <div class="input-icon">
                                                    <select class="form-control select2" id="achaa_seri" name="achaa_seri" >
                                                        <option value="0">Бүгд</option>
                                                        <option>Хос дугуй</option>
                                                        <option>Татах цахилгаан хөдөлгүүр</option>
                                                        <option>Якорь</option>
                                                        <option>Агаар хөргөгч</option>
                                                    </select>
                                                    <label for="form_control_1" style="font-size:12px;">
                                                        Эд анги
                                                    </label>
                                                    <span class="help-block">
                                                                    </span>

                                                </div>
                                            </div>
                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group form-md-line-input has-success">
                                       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
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
                     <p><center><b> <?php echo e($startdate); ?> -аас <?php echo e($enddate); ?> -ны шугаман эд ангийн хөдөлгөөний дэвтэр</b></center> </p>
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                           <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr>

                                                        <th> # </th>
                                                        <th>Огноо</th>
                                                        <th>Татах хэсэг</th>
                                                        <th>И/т сери </th>
                                                        <th>И/т №</th>
                                                        <th>Хэддүгээр</th>
                                                        <th>Засварын төрөл</th>
                                                        <th>Авсан №</th>
                                                        <th>Тавьсан №</th>
                                                        <th>Шалтгаан</th>
                                                        <th>Тайлбар</th>
                                                      </tr>
                                                </thead>
                                                  <tbody>


                               <tr>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                          </tr>


            
                        
            
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>