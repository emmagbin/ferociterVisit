<div class="col-xl-12 col-lg-12  col-md-12">

    <!-- <form method="POST" action="admin_controller/updateSystemUser"> -->
    <?php echo form_open('admin_controller/updateSystemUser'); ?>
    <div class="accordion add-employee" id="accordion-details">

        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="basic1">
                <h4 class="cursor-pointer mb-0">
                    <a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
                        Edit System User Information

                    </a>
                </h4>
            </div>
            <div class="card-body p-0">
                <div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">

                    <div class="row">
                        <div class="col-6 form-group">
                            <input type="text" class="form-control" name="last_name" value=" <?php echo $user['last_name']; ?>" placeholder="Last Name">
                        </div>
                        <div class="col-6 form-group">
                            <input type="text" class="form-control" name="other_names" value=" <?php echo $user['other_names']; ?>" placeholder="Other Name">
                        </div>
                        <div class="col-12 form-group">
                            <!-- <input type="hidden" name="email" value=" <?php echo $user['email']; ?>"> -->
                            <input type="email" class="form-control" disabled value=" <?php echo $user['email']; ?>" placeholder="Email">
                        </div>
                        <div class="col-12 form-group">
                            <!-- <input type="email" class="form-control" value=" <?php echo $user['contact']; ?>" placeholder="Contact"> -->
                            <input type="text" maxlength="10" name="contact" value=" <?php echo $user['contact']; ?>" class="logoutsearch  only-numeric form-control" placeholder="Contact">
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-header" id="headingTwo">
                <h4 class="cursor-pointer mb-0">
                    <a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#employee-det">
                        Employment Details

                    </a>
                </h4>
            </div>
            <div class="card-body p-0">
                <div id="employee-det" class=" show ctm-padding" aria-labelledby="headingTwo">

                    <div class="row">

                        <div class="col-12 form-group">
                            <input type="text" class="form-control" name="position" value="<?php echo $user['position']; ?>" placeholder="Job Title">
                        </div>

                        <div class="col-md-12 form-group">
                            <select class="form-control select" name="role" value="<?php echo $user['role']; ?>">
                                <option value="Management">Management</option>
                                <option value="Stuff">Stuff</option>
                                <option value="Administrator">Administrator</option>

                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="submit-section text-center btn-add">
                <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Update System User Information</button>

            </div>
        </div>
    </div>
    </form>
</div>