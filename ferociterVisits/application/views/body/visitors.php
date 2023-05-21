<div class="row">
    <div class="col-12">
        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <div class="d-inline-block">
                    <h4 class="card-title mb-0">Visitors</h4>
                    <!-- <p class="mb-0 ctm-text-sm">Head Office</p> -->
                </div>
                <!-- <div class="d-inline-block float-right" data-toggle="modal" data-target="#editOffice">
                                            <a href="javascript:void(0)" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i>	</a>
                                        </div> -->
            </div>
            <div class="card-body">
                <!-- <h4 class="card-title">Members</h4> -->


                <div id="visit" class="collapse show">
                    <div class="table-back mt-4 employee-office-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>From</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>First Visit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($visitors as $record) : ?>
                                        <tr>

                                            <td>
                                                <a href="<?php echo base_url("visitor/" . $record->contact); ?>" class="avatar"><img alt="avatar image" src="<?php echo $record->picture ?>" class="img-fluid" value="<?php echo $record->contact; ?>"></a>
                                            </td>
                                            <td>

                                                <?php echo ucwords($record->last_name . ' ' . $record->other_names); ?>
                                            </td>
                                            <td>
                                                <?php echo ucwords($record->from_where); ?>
                                            </td>
                                            <td>
                                                <?php echo ucwords($record->contact); ?>
                                            </td>
                                            <td>
                                                <?php echo $record->email; ?>
                                            </td>
                                            <td>
                                                <?php echo ucwords($record->datetime); ?>
                                            </td>
                                            <td>
                                                <div class="dropdown action-label drop-active">
                                                    <a href="<?php echo base_url("visitor/" . $record->contact); ?>" class="dropdown-item" href="javascript:void(0)">View</a>

                                                </div>
                                            </td>

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