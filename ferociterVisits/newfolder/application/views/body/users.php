                    <div class="col-xl-12 col-lg-12  col-md-12">
                        <!-- <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
                            <div class="card-body">
                                <div class="flex-row list-group list-group-horizontal-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class=" active list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Overview</a>
                                    <a class="list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Review Types</a>
                                </div>
                            </div>
                        </div> -->
                        <div class="card shadow-sm ctm-border-radius grow">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4 class="card-title mb-0 d-inline-block">System Users</h4>
                                <a href="addUser" class="btn btn-theme button-1 ctm-border-radius text-white float-right"><span></span> Create New User</a>
                            </div>
                            <div class="card-body align-center">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <!-- Tab1-->
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div class="employee-office-table">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>User Information</th>
                                                            <th>Position</th>
                                                            <th>Contact</th>
                                                            <th>Created Date</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($users as $record) : ?>
                                                            <tr>

                                                                <td>

                                                                    <?php echo ucwords($record->last_name . ' ' . $record->other_names); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo ucwords($record->position); ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo ucwords($record->email . "<br>" . $record->contact); ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo ucwords($record->datetime); ?>
                                                                </td>


                                                                <?php if ($record->status == 1) { ?>


                                                                    <td style="text-transform: capitalize; background-color: green; color: white">
                                                                        <center>Active</center>
                                                                    </td>
                                                                <?php } else { ?>
                                                                    <td style="text-transform: capitalize; background-color: red; color: white">
                                                                        <center>Locked </center>
                                                                    </td>
                                                                <?php } ?>




                                                                <td>
                                                                    <!-- class="btn btn-theme button-1 ctm-border-radius text-white float-right" -->

                                                                    <div class="btn-group dropdown">
                                                                        <button class="btn btn-theme button-1 ctm-border-radius text-white dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                                                            Actions <i class="dropdown-caret"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu  table-action">
                                                                            <?php if ($record->status == 1) { ?>
                                                                                <li><a href="<?php echo base_url("editUser/" . $record->id); ?>" class="dropdown-item" href="editUser">Edit</a></li>

                                                                                <li class="bnt_the_modal" data-email="<?php echo $record->email; ?>" data-contact="<?php echo $record->contact; ?>" data-id="<?php echo $record->id; ?>" data-fullname="<?php echo strtoupper($record->last_name . ' ' . $record->other_names); ?>" data-toggle="modal" data-target="#reset"><a class="dropdown-item">Reset Password</a></li>
                                                                            <?php } ?>
                                                                            <?php if ($record->status == 1) { ?>
                                                                                <li class="bnt_the_modal" data-id="<?php echo $record->id; ?>" data-fullname="<?php echo strtoupper($record->last_name . ' ' . $record->other_names); ?>" data-toggle="modal" data-target="#delete"><a class="dropdown-item">Lock</a></li>
                                                                            <?php } ?>
                                                                            <?php if ($record->status == 0) { ?>
                                                                                <li class="bnt_the_modal" data-id="<?php echo $record->id; ?>" data-fullname="<?php echo strtoupper($record->last_name . ' ' . $record->other_names); ?>" data-toggle="modal" data-target="#undelete"><a class="dropdown-item">Unlock</a></li>
                                                                            <?php } ?>
                                                                        </ul>



                                                                    </div>

                                                                </td>
                                                            </tr>

                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Tab 1-->



                                </div>
                            </div>
                        </div>
                    </div>