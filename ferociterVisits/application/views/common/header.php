 <header class="header">

     <!-- Top Header Section -->
     <div class="top-header-section">
         <div class="container-fluid">
             <div class="row align-items-center">
                 <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                     <div class="logo my-3 my-sm-0">
                         <a href="<?php echo base_url("dashboard"); ?>">

                             <img src="<?php echo $logo; ?>" alt="logo image" class="img-fluid" width="100">
                         </a>
                     </div>
                 </div>
                 <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                     <div class="user-block d-none d-lg-block">
                         <div class="row align-items-center">
                             <div class="col-lg-12 col-md-12 col-sm-12">
                                 <!-- user info-->
                                 <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                     <a href="javascript:void(0)" data-toggle="dropdown" class=" menu-style dropdown-toggle">
                                         <div class="user-avatar d-inline-block">
                                             <img src="<?php echo base_url('assets/img/profiles/download.png'); ?>" alt="user avatar" class="rounded-circle img-fluid" height="10" width="55">
                                         </div>
                                     </a>

                                     <!-- Notifications -->
                                     <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">

                                         <a class="dropdown-item p-2" href="<?php echo base_url("booklog"); ?>">
                                             <span class="media align-items-center">
                                                 <span class="lnr lnr-power-switch mr-3"></span>
                                                 <span class="media-body text-truncate">
                                                     <span class="text-truncate">To Visitors Log Book</span>
                                                 </span>
                                             </span>
                                         </a>
                                         <a class="dropdown-item p-2" href="<?php echo base_url("logout"); ?>">
                                             <span class="media align-items-center">
                                                 <span class="lnr lnr-power-switch mr-3"></span>
                                                 <span class="media-body text-truncate">
                                                     <span class="text-truncate">Logout</span>
                                                 </span>
                                             </span>
                                         </a>
                                     </div>
                                     <!-- Notifications -->

                                 </div>
                                 <!-- /User info-->

                             </div>
                         </div>
                     </div>
                     <div class="d-block d-lg-none">
                         <a href="javascript:void(0)">
                             <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                         </a>

                         <!-- Offcanvas menu -->
                         <div class="offcanvas-menu" id="offcanvas_menu">
                             <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>
                             <!-- <div class="user-info align-center bg-theme text-center">
                                 <a href="javascript:void(0)" class="d-block menu-style text-white">
                                     <div class="user-avatar d-inline-block mr-3">
                                         <img src=" <?php echo base_url('assets/img/profiles/Sample_User_Icon.png'); ?>" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                     </div>
                                 </a>
                             </div> -->

                             <hr>
                             <div class="user-menu-items px-3 m-0">
                                 <a class="px-0 pb-2 pt-0" href="<?php echo base_url("dashboard"); ?>">
                                     <span class="media align-items-center">
                                         <span class="lnr lnr-home mr-3"></span>
                                         <span class="media-body text-truncate text-left">
                                             <span class="text-truncate text-left">Dashboard</span>
                                         </span>
                                     </span>
                                 </a>
                                 <a class="p-2" href="<?php echo base_url("visitors"); ?>">
                                     <span class="media align-items-center">
                                         <span class="lnr lnr-users mr-3"></span>
                                         <span class="media-body text-truncate text-left">
                                             <span class="text-truncate text-left">Visitors</span>
                                         </span>
                                     </span>
                                 </a>


                                 <a class="p-2" href="<?php echo base_url("reports"); ?>">
                                     <span class="media align-items-center">
                                         <span class="lnr lnr-rocket mr-3"></span>
                                         <span class="media-body text-truncate text-left">
                                             <span class="text-truncate text-left">Reports</span>
                                         </span>
                                     </span>
                                 </a>
                                 <a class="p-2" href="<?php echo base_url("users"); ?>">
                                     <span class="media align-items-center">
                                         <span class="lnr lnr-users mr-3"></span>
                                         <span class="media-body text-truncate text-left">
                                             <span class="text-truncate text-left">Users</span>
                                         </span>
                                     </span>
                                 </a>



                                 <a class="p-2" href="<?php echo base_url("settings"); ?>">
                                     <span class="media align-items-center">
                                         <span class="lnr lnr-cog mr-3"></span>
                                         <span class="media-body text-truncate text-left">
                                             <span class="text-truncate text-left">Settings</span>
                                         </span>
                                     </span>
                                 </a>
                                 <a class="p-2" href="<?php echo base_url("logout"); ?>">
                                     <span class="media align-items-center">
                                         <span class="lnr lnr-power-switch mr-3"></span>
                                         <span class="media-body text-truncate text-left">
                                             <span class="text-truncate text-left">Logout</span>
                                         </span>
                                     </span>
                                 </a>
                             </div>
                         </div>
                         <!-- /Offcanvas menu -->

                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- /Top Header Section -->

 </header>