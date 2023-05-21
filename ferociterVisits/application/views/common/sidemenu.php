<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
    <aside class="sidebar sidebar-user">

        <div class="row">
            <div class="col-12">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-body py-4">
                        <div class="row">
                            <div class="col-md-12 mr-auto text-left">
                                <div class="custom-search input-group">
                                    <div class="custom-breadcrumb">
                                        <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                            <li class="breadcrumb-item d-inline-block"><a href="<?php echo base_url("index"); ?>" class="text-dark"><?php echo $name ?></a></li>
                                            <!-- <li class="breadcrumb-item d-inline-block active">Dashboard 1</li> -->
                                        </ol>
                                        <h4 class="text-dark">Admin Dashboard</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
            <div class="user-info card-body">
                <!-- <div class="user-avatar mb-4">
                    <img src=" <?php echo base_url('assets/img/profiles/img-13.jpg'); ?>" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                </div> -->
                <div class="user-details">
                    <h4><b><?php echo $fullname ?></b></h4>
                    <span class="ctm-text-sm"><?php echo $email ?></span>
                    <p><?php echo date("l, d M  Y") ?></p>


                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div class="sidebar-wrapper d-lg-block d-md-none d-none">
            <div class="card ctm-border-radius shadow-sm border-none grow">
                <div class="card-body">
                    <div class="row no-gutters">

                        <?php if ($page == 'dashboard') { ?>
                            <div class="col-6 align-items-center text-center">

                                <a href="<?php echo base_url("dashboard"); ?>" class="text-white active p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                            </div>

                        <?php } else { ?>
                            <div class="col-6 align-items-center text-center">

                                <a href="<?php echo base_url("dashboard"); ?>" class="text-dark p-4 first-slider-btn ctm-border-right ctm-border-left ctm-border-top"><span class="lnr lnr-home pr-0 pb-lg-2 font-23"></span><span class="">Dashboard</span></a>
                            </div>
                        <?php } ?>

                        <?php if ($page == 'visitors') { ?>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="<?php echo base_url("visitors"); ?>" class="text-white active p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Visitors</span></a>
                            </div>

                        <?php } else { ?>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="<?php echo base_url("visitors"); ?>" class="text-dark p-4 second-slider-btn ctm-border-right ctm-border-top"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Visitors</span></a>
                            </div>
                        <?php } ?>

                        <?php if ($page == 'users') { ?>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="<?php echo base_url("users"); ?>" class="text-white active p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Users</span></a>

                            </div>

                        <?php } else { ?>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="<?php echo base_url("users"); ?>" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-users pr-0 pb-lg-2 font-23"></span><span class="">Users</span></a>

                            </div>
                        <?php } ?>


                        <?php if ($page == 'reports') { ?>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="<?php echo base_url("reports"); ?>" class="text-white p-4 active ctm-border-right ctm-border-left"><span class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span class="">Reports</span></a>
                            </div>

                        <?php } else { ?>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="<?php echo base_url("reports"); ?>" class="text-dark p-4 ctm-border-right ctm-border-left"><span class="lnr lnr-rocket pr-0 pb-lg-2 font-23"></span><span class="">Reports</span></a>
                            </div>
                        <?php } ?>

                        <?php if ($page == 'settings') { ?>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="<?php echo base_url("settings"); ?>" class="text-white p-4 active last-slider-btn1 ctm-border-right ctm-border-left"><span class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span class="">Settings</span></a>
                            </div>
                        <?php } else { ?>
                            <div class="col-6 align-items-center shadow-none text-center">
                                <a href="<?php echo base_url("settings"); ?>" class="text-dark p-4 last-slider-btn1 ctm-border-right ctm-border-left"><span class="lnr lnr-cog pr-0 pb-lg-2 font-23"></span><span class="">Settings</span></a>
                            </div>
                        <?php } ?>










                    </div>
                </div>
            </div>
        </div>

        <!-- /Sidebar -->

    </aside>
</div>