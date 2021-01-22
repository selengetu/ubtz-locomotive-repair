   <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo e(route('home')); ?>">
                             <img src="<?php echo e(asset('image/logo1.png')); ?>" alt="logo" class="logo-default" width="95%" /> </a>
                     
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="title">ИЛЧИТ ТЭРЭГНИЙ ЗАСВАРЫН ПРОГРАМ</div>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
         
                         
                                     <li class="dropdown dropdown-user dropdown-dark">
                                <a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile">  Депо:
                                    <?php if( Auth::user()->depo_id  == 1): ?>
                                        Сүхбаатар
                                    <?php elseif( Auth::user()->depo_id == 2): ?>
                                        Улаанбаатар
                                    <?php elseif( Auth::user()->depo_id == 3): ?>
                                        Сайншанд
                                        <?php elseif( Auth::user()->depo_id == 5): ?>
                                            Дархан
                                        <?php elseif( Auth::user()->depo_id == 13): ?>
                                            Замын-Үүд
                                    <?php endif; ?> </span></a>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                    
                            </li>
                       
                                     <li class="dropdown dropdown-user dropdown-dark">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> <?php echo e(Auth::user()->name); ?> </span>
                                    <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                    <img alt="" class="img-circle" src="<?php echo e(asset('assets/layouts/layout4/img/avatar9.jpg')); ?>" /> </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="">
                                            <i class="icon-user"></i> Миний мэдээлэл </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="icon-calendar"></i> Миний төлөвлөгөө</a>
                                    </li>
                               
                                 
                                    <li class="divider"> </li>
                                 
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>">
                                            <i class="icon-key"></i>Гарах </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                         
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>