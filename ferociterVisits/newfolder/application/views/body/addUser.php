<div class="col-xl-12 col-lg-12  col-md-12">
    <form method="POST" action="admin_controller/AddSystemUser">
        <div class="accordion add-employee" id="accordion-details">
            <div class="card shadow-sm grow ctm-border-radius">
                <div class="card-header" id="basic1">
                    <h4 class="cursor-pointer mb-0">
                        <a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
                            New System User Information

                        </a>
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">

                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control" name="other_names" placeholder="Other Name" required>
                            </div>
                            <div class="col-12 form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="col-12 form-group">
                                <!-- <input type="text" class="form-control" name="contact" placeholder="Contact" required> -->
                                <input type="text" maxlength="10" name="contact" class="logoutsearch  only-numeric form-control" placeholder="Contact" required>
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
                    <div id="employee-det" class="collapse show ctm-padding" aria-labelledby="headingTwo" data-parent="#accordion-details">

                        <div class="row">

                            <div class="col-12 form-group">
                                <input type="text" name="position" class="form-control" placeholder="Job Title" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <select class="form-control select" name="role" required>
                                    <option selected>User System Role </option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Management">Management</option>
                                    <option value="Stuff">Stuff</option>
                                </select>
                            </div>

                            <input type="hidden" name="createdBy" value="<?php echo $email ?>">
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="submit-section text-center btn-add">
                    <!-- <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white">Save Data</button> -->
                    <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Add System User</button>
                </div>
            </div>
        </div>
    </form>
</div>