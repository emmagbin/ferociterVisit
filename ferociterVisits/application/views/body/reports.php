                    <div class="col-xl-12 col-lg-12  col-md-12">
                        <div class="card shadow-sm grow ctm-border-radius">
                            <div class="card-body align-center">
                                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item mr-2">
                                        <a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Visitors Report</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">User Logs Report</a>
                                    </li> -->

                                </ul>
                            </div>
                        </div>
                        <?php if ($reportSubmit == "reports") { ?>
                            <div class="card shadow-sm ctm-border-radius grow">
                                <div class="card-body align-center">



                                    <h3>Select The Report Type To Generate</h3>
                                    <input type="radio" value="1" name="answer">
                                    <label class="container1">Report By Visitor

                                        <span class="checkmark"></span>
                                    </label><br>
                                    <input type="radio" value="2" name="answer">
                                    <label class="container1">Report By Visited

                                        <span class="checkmark"></span>
                                    </label><br>
                                    <!-- <input type="radio" value="3" name="answer">
                                <label class="container1">Report by Company From

                                    <span class="checkmark"></span>
                                </label><br> -->
                                    <input type="radio" value="4" name="answer">
                                    <label class="container1">Report By Visitation Purpose

                                        <span class="checkmark"></span>
                                    </label>
                                    <?php echo form_open('admin_controller/reporting'); ?>
                                    <!-- / <form action="admin_controller/reporting" method="POST"> -->
                                    <div class="row filter-row" style="display:none;" id="1">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
                                                <input class="form-control" name="visitor" placeholder="Enter Visitors Contact" list=text_editors required>
                                                <!-- <button>▼</button> -->
                                                <datalist id="text_editors">
                                                    <select class="form-control">
                                                        <?php foreach ($select_visitors as $records) : ?>
                                                            <option value="<?php echo $records->contact ?>"><?php echo $records->last_name . " " . $records->other_names; ?>

                                                            <?php endforeach ?>
                                                    </select>
                                                </datalist>



                                            </div>
                                        </div>

                                        <input type="hidden" name="report" value="1">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
                                                <input type="text" name="from" class="form-control datetimepicker" placeholder="From" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
                                                <input type="text" name="to" class="form-control datetimepicker" placeholder="To" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Search</button>
                                        </div>
                                    </div>

                                    </form>
                                    <form action="admin_controller/reporting" method="POST">
                                        <div class="row filter-row" style="display:none;" id="2">
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
                                                    <input class="form-control" name="visitor" placeholder="Enter Visited Name" list=text_editors required>
                                                    <!-- <button>▼</button> -->
                                                    <datalist id="text_editors">
                                                        <select class="form-control">
                                                            <?php foreach ($select_visited_stuff as $records) : ?>
                                                                <option value="<?php echo $records->visiting_who ?>"><?php echo $records->visiting_who ?>

                                                                <?php endforeach ?>
                                                        </select>
                                                    </datalist>

                                                </div>
                                            </div>
                                            <input type="hidden" name="report" value="2">
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
                                                    <input type="text" name="from" class="form-control datetimepicker" placeholder="From" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
                                                    <input type="text" name="to" class="form-control datetimepicker" placeholder="To" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Search </button>
                                            </div>
                                        </div>

                                    </form>

                                    <form action="admin_controller/reporting" method="POST">

                                        <div class="row filter-row" style="display:none;" id="4">
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
                                                    <select class="form-control" name="visitor" required>
                                                        <option selected disabled>Visitation Purpose</option return>
                                                        <option value="2">Private</option>
                                                        <option value="1">Official</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
                                                    <input type="text" name="from" class="form-control datetimepicker" placeholder="From" required>
                                                </div>
                                            </div>
                                            <input type="hidden" name="report" value="4">

                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
                                                    <input type="text" name="to" class="form-control datetimepicker" placeholder="To" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                                <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($reportSubmit == "reportSubmit") { ?>
                            <div class="card shadow-sm grow ctm-border-radius">
                                <div class="card-body align-center">
                                    <div class="tab-content" id="pills-tabContent">

                                        <!--Tab 1-->
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                                            <div class="employee-office-table">
                                                <div class="table-responsive">
                                                    <div class="text-left mt-3">
                                                        <avalue="Create PDF" id="btPrint" onclick="createPDF()" class="btn btn-theme button-1 ctm-border-radius text-white">Download Report Pdf </a>
                                                            <!-- <a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius text-white">Download Report Exel</a> -->
                                                            <!-- <p>
                                                                <input type="button" value="Create PDF" id="btPrint" onclick="createPDF()" />
                                                            </p> -->
                                                    </div>


                                                    <table style="width:100%;border: 0px">
                                                        <tr style="border: 0px;">
                                                            <th colspan="6" style="border: 0px;">
                                                                <center>
                                                                    <h3><?php echo $company_name; ?></h3><br>
                                                                    <img src="<?php echo $logo; ?>" class="img-fluid" width="80">

                                                                </center>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="3" style="text-align:left;max-width:100px;border: 0px;background-color: white;">Address:<?php echo $company_address; ?></th>
                                                            <!-- <th rowspan="2" colspan="3" style="background-color: white;border: 0px;">
                                                                <center><img src="<?php echo base_url('assets/img/logo2.png'); ?>" alt="logo image" class="img-fluid" width="100"></center>
                                                            </th> -->
                                                            <th colspan="3" style="text-align:right;max-width:60px;border: 0px;background-color: white;">Report Period</th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="3" style="text-align:left;max-width:100px;border: 0px;background-color: white;">Report Type:<?php echo $reportType; ?></th>
                                                            <th colspan="3" style="text-align:right;max-width:60px;border: 0px;background-color: white;"><?php echo $reportperiod ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6"></td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="text-align:left;max-width:30px;border: 0px;background-color: white;"></td>


                                                        </tr>
                                                    </table>


                                                    <!-- <div class="container wrapper"> -->
                                                    <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr style="background-color: #6f42c1; color:white;">
                                                                <th style="max-width:50px">No</th>
                                                                <?php if ($reportingType == "1") { ?>
                                                                    <th>Visited</th>
                                                                    <th>Purpose</th>
                                                                <?php } ?>
                                                                <?php if ($reportingType == "2") { ?>
                                                                    <th>Visitor</th>
                                                                    <th>Purpose</th>
                                                                <?php } ?>
                                                                <?php if ($reportingType == "4") { ?>
                                                                    <th>Visitor</th>
                                                                    <th>Visited</th>
                                                                <?php } ?>

                                                                <th>Time In</th>
                                                                <th>Time Out</th>
                                                                <th>Receptionist</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>

                                                            <?php $x = 1; ?>
                                                            <?php foreach ($reports as $record) : ?>

                                                                <tr>
                                                                    <td>
                                                                        <?php $x++; ?>
                                                                    </td>


                                                                    <?php if ($reportingType == "1") { ?>
                                                                        <td> <?php echo ucwords($record->visiting_who); ?></td>
                                                                        <?php if ($record->visit_purpose == 1) { ?>
                                                                            <td>
                                                                                Official
                                                                            </td>
                                                                        <?php } ?>
                                                                        <?php if ($record->visit_purpose == 2) { ?>
                                                                            <td>
                                                                                Private
                                                                            </td>
                                                                        <?php } ?>


                                                                    <?php } ?>
                                                                    <?php if ($reportingType == "2") { ?>

                                                                        <td> <?php echo ucwords($record->last_name . ' ' . $record->other_names . "<br>(" . $record->contact . ")"); ?></td>
                                                                        <?php if ($record->visit_purpose == 1) { ?>
                                                                            <td>
                                                                                Official
                                                                            </td>
                                                                        <?php } ?>
                                                                        <?php if ($record->visit_purpose == 2) { ?>
                                                                            <td>
                                                                                Private
                                                                            </td>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php if ($reportingType == "4") { ?>

                                                                        <td> <?php echo ucwords($record->last_name . ' ' . $record->other_names . "<br>(" . $record->contact . ")"); ?></td>
                                                                        <td> <?php echo ucwords($record->visiting_who); ?></td>
                                                                    <?php } ?>







                                                                    <td> <?php echo ucwords($record->datetime); ?></td>
                                                                    <td> <?php echo ucwords($record->datetimeLogout); ?></td>
                                                                    <td> <?php echo ucwords($record->receptionist); ?></td>
                                                                </tr>
                                                            <?php endforeach ?>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>


                                        </div>
                                        <!--/Tab 1-->

                                        <!-- Tab 2-->
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                        </div>
                                        <!-- /Tab 2-->

                                    </div>

                                </div>

                                <br><br>
                                <div class="card-body align-center" style="display:none ;">
                                    <div class="tab-content" id="pills-tabContent">

                                        <!--Tab 1-->
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                                            <div class="employee-office-table">
                                                <div class="table-responsive">

                                                    <div id="tab">

                                                        <table style="width:100%;border: 0px">
                                                            <tr style="border: 0px;">
                                                                <th colspan="6" style="border: 0px;">
                                                                    <center>
                                                                        <h3><?php echo $company_name; ?></h3><br>
                                                                        <img src="<?php echo $logo; ?>" class="img-fluid" width="80">

                                                                    </center>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3" style="text-align:left;max-width:100px;border: 0px;background-color: white;font-size:10px!important;">Address:<?php echo $company_address; ?></th>
                                                                <!-- <th rowspan="2" colspan="3" style="background-color: white;border: 0px;">
                                                                <center><img src="<?php echo base_url('assets/img/logo2.png'); ?>" alt="logo image" class="img-fluid" width="100"></center>
                                                            </th> -->
                                                                <th colspan="3" style="text-align:right;max-width:60px;border: 0px;background-color: white;font-size:10px!important;">Report Period</th>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="3" style="text-align:left;max-width:100px;border: 0px;background-color: white;font-size:10px!important;">Report Type:<?php echo $reportType; ?></th>
                                                                <th colspan="3" style="text-align:right;max-width:60px;border: 0px;background-color: white;font-size:10px!important;  "><?php echo $reportperiod ?></th>
                                                            </tr>

                                                        </table>

                                                        <!-- <div class="container wrapper"> -->
                                                        <!-- <div class="container wrapper"> -->
                                                        <table class="table-bordered table-hover" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr style="background-color: #6f42c1; color:black;font-size:12px!important;">
                                                                    <th style="max-width:50px">No</th>
                                                                    <?php if ($reportingType == "1") { ?>
                                                                        <th>Visited</th>
                                                                        <th>Purpose</th>
                                                                    <?php } ?>
                                                                    <?php if ($reportingType == "2") { ?>
                                                                        <th>Visitor</th>
                                                                        <th>Purpose</th>
                                                                    <?php } ?>
                                                                    <?php if ($reportingType == "4") { ?>
                                                                        <th>Visitor</th>
                                                                        <th>Visited</th>
                                                                    <?php } ?>

                                                                    <th>Time In</th>
                                                                    <th>Time Out</th>
                                                                    <th>Receptionist</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                <?php $x = 1; ?>
                                                                <?php foreach ($reports as $record) : ?>

                                                                    <tr style=" color:black;font-size:12px!important;">
                                                                        <td>
                                                                            <?php $x++; ?>
                                                                        </td>


                                                                        <?php if ($reportingType == "1") { ?>
                                                                            <td> <?php echo ucwords($record->visiting_who); ?></td>
                                                                            <?php if ($record->visit_purpose == 1) { ?>
                                                                                <td>
                                                                                    Official
                                                                                </td>
                                                                            <?php } ?>
                                                                            <?php if ($record->visit_purpose == 2) { ?>
                                                                                <td>
                                                                                    Private
                                                                                </td>
                                                                            <?php } ?>


                                                                        <?php } ?>
                                                                        <?php if ($reportingType == "2") { ?>

                                                                            <td> <?php echo ucwords($record->last_name . ' ' . $record->other_names . "<br>(" . $record->contact . ")"); ?></td>
                                                                            <?php if ($record->visit_purpose == 1) { ?>
                                                                                <td>
                                                                                    Official
                                                                                </td>
                                                                            <?php } ?>
                                                                            <?php if ($record->visit_purpose == 2) { ?>
                                                                                <td>
                                                                                    Private
                                                                                </td>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                        <?php if ($reportingType == "4") { ?>

                                                                            <td> <?php echo ucwords($record->last_name . ' ' . $record->other_names . "<br>(" . $record->contact . ")"); ?></td>
                                                                            <td> <?php echo ucwords($record->visiting_who); ?></td>
                                                                        <?php } ?>







                                                                        <td> <?php echo ucwords($record->datetime); ?></td>
                                                                        <td> <?php echo ucwords($record->datetimeLogout); ?></td>
                                                                        <td> <?php echo ucwords($record->receptionist); ?></td>
                                                                    </tr>
                                                                <?php endforeach ?>

                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        <!--/Tab 1-->



                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>