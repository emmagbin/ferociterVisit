<div class="row">
    <div class="col-md-6 col-sm-12 d-flex">
        <div class="card flex-fill ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <h4 class="card-title mb-0">Visitors Information</h4>
            </div>
            <div class="card-body">
                <div class="media mb-4">

                    <?php foreach ($visitor as $visitor) : ?>
                        <img class="rounded mr-3 img-fluid" src="<?php echo base_url('assets/img/profiles/img-10.jpg'); ?>" alt="avatar image" width="100" height="100">
                        <div class="media-body">
                            <a href="employment.html" class="text-dark text-ellipsis"> Name: <?php echo ucwords($visitor->last_name . ' ' . $visitor->other_names); ?></a>
                            <p class="ctm-text-sm mb-0 text-ellipsis">From: <?php echo ucwords($visitor->from_where); ?></p>
                            <p class="ctm-text-sm mb-0 text-ellipsis">Contact: <?php echo ucwords($visitor->contact); ?></p>
                            <p class="ctm-text-sm mb-0 text-ellipsis">Email: <?php echo $visitor->email; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 d-flex">
        <div class="card add-team flex-fill ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <h4 class="card-title mb-0">Visits</h4>
            </div>
            <div class="card-body">

                <div id="visit" class="collapse show">
                    <div class="table-back mt-4 employee-office-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>

                                    <tr>
                                        <th>Visited</th>
                                        <th>Visit Purpose</th>
                                        <th>Login Date & Time</th>
                                        <th>Logged Out Date & Time</th>

                                        <th>Receptionist</th>

                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($visits as $record) : ?>
                                        <tr>

                                            <td><?php echo ucwords($record->visiting_who); ?></td>
                                            <td>
                                                <?php if ($record->visit_purpose == 1) { ?>
                                                    <span class="label label-lg label-light-primary label-inline">Officail</span>
                                                <?php } ?>

                                                <?php if ($record->visit_purpose == 2) { ?>
                                                    <span class="label label-lg label-light-danger label-inline">Private</span>
                                                <?php } ?>
                                            </td>

                                            <td><?php echo ucwords($record->datetime); ?></td>
                                            <td><?php echo ucwords($record->datetimeLogout); ?></td>
                                            <td><?php echo ucwords($record->receptionist); ?></td>
                                            <td>

                                                <?php if ($record->visit_status == 0) { ?>
                                                    <a class="btn btn-outline-success btn-sm"> Out </a>

                                                <?php } ?>

                                                <?php if ($record->visit_status == 1) { ?>
                                                    <a id="loggoutVisitor" class="btn btn-outline-success btn-sm" data-contact="<?php echo ($record->contact); ?>"> In </a>

                                                <?php } ?>





                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>