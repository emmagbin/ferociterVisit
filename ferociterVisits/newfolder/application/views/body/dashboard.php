 <?php foreach ($dashboardData as $record) : ?>
     <!-- Widget -->
     <div class="row">
         <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
             <div class="card dash-widget ctm-border-radius shadow-sm grow">
                 <div class="card-body">
                     <div class="card-icon bg-primary">
                         <i class="fa fa-users" aria-hidden="true"></i>
                     </div>
                     <div class="card-right">
                         <h4 class="card-title">Total Vistors</h4>
                         <p class="card-text"><?php echo $record->visitors; ?></p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
             <div class="card dash-widget ctm-border-radius shadow-sm grow">
                 <div class="card-body">
                     <div class="card-icon bg-warning">
                         <i class="fa fa-building-o"></i>
                     </div>
                     <div class="card-right">
                         <h4 class="card-title">Total Visits</h4>
                         <p class="card-text"><?php echo $record->visiting; ?></p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
             <div class="card dash-widget ctm-border-radius shadow-sm grow">
                 <div class="card-body">
                     <div class="card-icon bg-danger">
                         <i class="fa fa-users" aria-hidden="true"></i>
                     </div>
                     <div class="card-right">
                         <h4 class="card-title">System Users</h4>
                         <p class="card-text"><?php echo $record->users; ?></p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
             <div class="card dash-widget ctm-border-radius shadow-sm grow">
                 <div class="card-body">
                     <div class="card-icon bg-success">
                         <i class="fa fa-money" aria-hidden="true"></i>
                     </div>
                     <div class="card-right">
                         <h4 class="card-title">Visitors Today</h4>
                         <p class="card-text"><?php echo $record->today_visits; ?></p>
                     </div>
                 </div>
             </div>
         </div>




     </div>
     <!-- / Widget -->

     <!-- Chart -->
     <div class="row">
         <div class="col-md-12 d-flex">
             <div class="card ctm-border-radius shadow-sm flex-fill grow">
                 <!-- <div class="card-header">
                                        <h4 class="card-title mb-0">Visits Summary</h4>
                                    </div> -->
                 <div class="card-body">
                     <div id="container"></div>
                     <!-- <canvas id="lineChart"></canvas> -->
                 </div>
             </div>
         </div>
         <!-- <div class="col-md-6 d-flex">
                                <div class="card ctm-border-radius shadow-sm flex-fill grow">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">Visitors Gender</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="pieChart"></canvas>
                                    </div>
                                </div>
                            </div> -->

     </div>
     <!-- / Chart -->
 <?php endforeach ?>
 <div class="row">
     <div class="col-lg-6">
         <div class="card ctm-border-radius shadow-sm grow">
             <div class="card-header">
                 <h4 class="card-title mb-0 d-inline-block">Visits Today</h4>
                 <a href="javascript:void(0)" class="d-inline-block float-right text-primary"><i class="lnr lnr-sync"></i></a>
             </div>
             <div class="card-body recent-activ">
                 <div class="recent-comment">
                     <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                         <thead>
                             <tr style="background-color: #6f42c1; color:white;">

                                 <!-- <th>Purpose</th> -->
                             </tr>
                         </thead>

                         <tbody>

                             <?php foreach ($todays_visitors as $records) : ?>
                                 <tr>
                                     <td>
                                         <div class="media mb-3">
                                             <div class="e-avatar avatar-online mr-3"><img src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" class="img-fluid"></div>
                                             <div class="media-body">
                                                 <h6 class="m-0"><?php echo $records->last_name . " " . $records->other_names ?> <h6 style="float: right;;">Visiting:<?php echo $records->visiting_who ?></h6>
                                                 </h6>
                                                 <p class="mb-0 ctm-text-sm"><?php echo $records->contact ?><br><?php echo $records->datetime ?></p>

                                             </div>
                                         </div>
                                     </td>

                                 </tr>


                             <?php endforeach ?>
                         </tbody>
                     </table>



                 </div>
             </div>
         </div>
     </div>
     <div class="col-lg-6 col-md-12 d-flex">

         <!-- Team Leads List -->
         <div class="card flex-fill team-lead shadow-sm grow">
             <div class="card-header">
                 <h4 class="card-title mb-0 d-inline-block">Back Logs </h4>
                 <a href="employees.html" class="dash-card float-right mb-0 text-primary"> </a>
             </div>
             <div class="card-body">

                 <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                     <thead>
                         <tr style="background-color: #6f42c1; color:white;">

                             <!-- <th>Purpose</th> -->
                         </tr>
                     </thead>

                     <tbody>
                         <?php foreach ($all_visitors_not_logged_out as $records) : ?>
                             <tr>

                                 <td>
                                     <div class="media mb-3">
                                         <div class="e-avatar avatar-online mr-3"><img src="assets/img/profiles/img-6.jpg" alt="Maria Cotton" class="img-fluid"></div>
                                         <div class="media-body">
                                             <h6 class="m-0"><?php echo $records->last_name . " " . $records->other_names ?> <h6 class="m-0" style="float: right;;">Visiting:<?php echo $records->visiting_who ?></h6>
                                             </h6>
                                             <p class="mb-0 ctm-text-sm"><?php echo $records->contact ?></p>

                                             <a id="loggoutVisitor" class="btn btn-outline-success btn-sm" data-contact="<?php echo ($records->contact); ?>">Log Out </a>
                                             <!-- <a class="btn btn-outline-success btn-sm">Log Out </a> -->
                                         </div>
                                     </div>
                                 </td>
                             </tr>
                         <?php endforeach ?>

                     </tbody>
                 </table>



             </div>
         </div>
     </div>
 </div>