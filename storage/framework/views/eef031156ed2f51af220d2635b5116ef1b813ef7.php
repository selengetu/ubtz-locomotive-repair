 
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
                           Цахим дэвтэр                           
                        </span>
                    </div>
                        <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <a class="joshview1 " id="add" data-toggle="modal" data-target="#myModal1">
                                <label class="btn btn-transparent green btn-circle btn-sm active">
                                    <i class="icon icon-plus">
                                    </i>
                                     Эд анги нэмэх
                                </label>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
                 
                                        
                               <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Үндсэн</a></li>
      <li><a data-toggle="tab" href="#marshrut" id="tabmarshrut">Эд анги</a></li>
   
  </ul>
  <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="panel" >
                                            <div class="panel-heading" style="background-color: #81b5d5; color: #fff">
                                                <h4 class="panel-title">
                                                    <a  style="font-weight: bold;"> <i class="fa fa-search"></i>  Хайлт 
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="sear" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                   <form method="post" action="searchtuuz">
                                                      <input type="text" class="form-control inputtext hidden" id="val" name="val" value="<?php echo e($val); ?>">
                                        <div class="col-md-12">
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
                                                    
                                                         <div class="col-md-2">
                                                            <div class="form-group form-md-line-input has-success">
                                       <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
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
            
                            <p><center><b> 2ТЭ116УМ 025 Илчит тэрэгний эд ангийн дэвтэр</b></center> </p>
                    
                    <button class="btn btn-info" id="buttonprint" onclick="printDiv()"><i class="fa fa-print" aria-hidden="true"></i>Хэвлэх</button>
                        <button class="btn btn-info" id="btnExport" onclick="tableToExcel('testTable', 'Export HTML Table to Excel')"><i class="fa fa-table" aria-hidden="true"></i> Excel </button>     
          <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      <table class="table table-striped table-bordered table-hover"  id="example">
                                              <thead style="background-color: #81b5d5; color: #fff">
                                                    <tr >

                                                        <th> # </th>
                                                        <th> Эд ангийн сери</th>
                                                        <th> Эд ангийн марк </th>
                                                        <th> Эд ангийн дугаар</th>
                                                        <th> Үйлдвэрлэсэн огноо</th>
                                                        <th> Тавьсан огноо</th>
                                                        <th> Насжилт</th>
                                                        <th> Гүйлт</th>
                                                       
                                                           
                                                      </tr>
                                                </thead>
                                                  <tbody>
                                                   
                        <tr onclick="$('#tabmarshrut').trigger('click')">
                          <td>1</td>
                          <td>Хос дугуй</td>
                          <td>2ТЭ116.30.50.011</td>
                          <td>123</td>
                          <td>2015/07/23</td>
                          <td>2016/02/01</td>
                          <td>3 жил</td>
                          <td>11679</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Татах цахилгаан хөдөлгүүр</td>
                            <td>ЭД-133УХЛ</td>
                            <td>123</td>
                            <td>2011/07/23</td>
                            <td>2012/02/01</td>
                            <td>6 жил</td>
                            <td>11679</td>
                        </tr>
            
          </tbody>
                                            </table>
  </div>
</div>
  
      </div>
  <div id="marshrut" class="tab-pane fade">
     <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                   <a style="font-weight: bold;"> <i class="fa fa-edit"> </i> Эд анги бүртгэл
                                                   </a>
                                        
                                                </h4>
                                            </div>
                                          
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                     <form method="post" action="addribbon" id="formribbon">
                           
                                              <div class="col-md-12">
                         <input type="text" class="form-control inputtext hidden" id="val1" name="val1" value="<?php echo e($val); ?>">
                           <div class="col-md-3">
                <div class="form-group">
                <label for="name">Илчит тэрэгний сери</label>
                  <input type="text" class="form-control inputtext" id="tuuzmarsh" name="tuuzmarsh" readonly="true" value="2ТЭ116УМ">
                </div>

                  </div>
                <div class="col-md-3">
                <div class="form-group">
                <label for="name">Илчит тэрэгний №</label>
                  <input type="text" class="form-control inputtext" id="tuuzmarsh" name="tuuzmarsh" readonly="true" value="025">
                </div>

                  </div>

                    <div class="col-md-3">
                <div class="form-group">
                <label for="name">Эд ангийн марк</label>
                  <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true" value="2ТЭ116.30.50.011">
                </div>
               
                  </div>

                    <div class="col-md-3">
                <div class="form-group">
                <label for="name">Эд ангийн дугаар</label>
                  <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true" value="123">
                </div>
               
                  </div>
                       <div class="col-md-3">
                <div class="form-group">
                <label for="name">Үйлдвэрлэсэн огноо</label>
                  <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true" value="2015/07/23">
                </div>
               
                  </div>
                     <div class="col-md-3">
                <div class="form-group">
                <label for="name">Насжилт</label>
                  <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true" value="3 жил">
                </div>
              
                  </div>
                                              </div>
                                          </form>
                                        </fieldset>
                                                </div>
                                          
                                        </div>
       

                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a style="font-weight: bold;"> <i class="fa fa-flag"> </i> Эд ангийн түүх
                                                   </a>
                                                </h4>
                                            </div>
                                            <div id="marshbureldehuun" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <fieldset class="scheduler-border">
                                                   
                                        <div class="col-md-12">
                                                 <table id="marshburel" class="table table-striped table-bordered table-hover">
                                                     <thead>
                                                     <th>Тавьсан огноо</th>
                                                     <th>Авсан огноо</th>
                                                     <th>Татах хэсэг</th>
                                                     <th>Гал тэрэгний сери</th>
                                                     <th>Гал тэрэгний №</th>
                                                     <th>Секц</th>
                                                     <th>Хэддүгээр</th>
                                                     <th>Засвар</th>
                                                     <th>Гүйлт</th>
                                                     <th>Тайлбар</th>


                                                     </thead>
                                                     <tbody></tbody>
                                                 </table>        
                                                                
                                        </div>
                                        
                                       
                                        </fieldset>
                                                </div>
                                            </div>
                                        </div>
                        
     
  </div>
</div>
        
                </div>
                <!-- END CONTENT BODY -->
            </div>
           <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Эд анги бүртгэх</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Илчит тэрэгний сери</label>
                    <input type="text" class="form-control inputtext" id="tuuzmarsh" name="tuuzmarsh" readonly="true" value="2ТЭ116УМ">
                </div>

            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Илчит тэрэгний №</label>
                    <input type="text" class="form-control inputtext" id="tuuzmarsh" name="tuuzmarsh" readonly="true" value="025">
                </div>

            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Эд ангийн марк</label>
                    <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true" value="2ТЭ116.30.50.011">
                </div>

            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Эд ангийн дугаар</label>
                    <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true" value="123">
                </div>

            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Үйлдвэрлэсэн огноо</label>
                    <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true" value="2015/07/23">
                </div>

            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="name">Насжилт</label>
                    <input type="text" class="form-control inputtext" id="ilchit" name="ilchit" readonly="true" value="3 жил">
                </div>

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
        <button type="button" class="btn btn-primary">Хадгалах</button>
      </div>
    </div>
  </div>
</div>




  <?php echo $__env->make('layouts.partials.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <style type="text/css">
              .disabledTab {
    pointer-events: none;
}
 @page  { size: landscape; }
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
            <?php $__env->stopSection(); ?>
          
            <?php $__env->startSection('cscript'); ?>
<?php echo $__env->make('layouts.partials.devterscript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.partials.function', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>