<div class="col-xl-12 col-lg-12 col-md-12">

    <div class="row">

        <div class="col-md-12 d-flex">
            <div class="card ctm-border-radius shadow-sm company-logo flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0">Company Information</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="admin_controller/systemSettings">
                        <div class="row">
                            <div class="col-12">
                                <label>Company Logo</label>


                                <!-- <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for=" imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview">
                                        </div>
                                    </div>
                                </div> -->

                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <input type="hidden" value="<?php echo $id; ?>" name="id">

                            <textarea id="myimaging" name="myimaging" hidden rows="100"></textarea>
                            <label>Company Name</label>
                            <input type="text" name="company_name" value="<?php echo $company_name; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Address</label>
                            <input type="text" value="<?php echo $company_address; ?>" name="company_address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Company Address</label>
                            <input type="text" value="<?php echo $company_website; ?>" name="company_website" class="form-control">
                        </div>


                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex">
            <div class="card ctm-border-radius shadow-sm flex-fill grow">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        Your System Administrator
                    </h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-6 form-group">

                            <input name="admin_id" value="<?php echo $companyAdminInfo['id']; ?>" type="hidden">
                            <input name="admin_last_name" value="<?php echo $companyAdminInfo['last_name']; ?>" type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-6 form-group">
                            <input type="text" name="admin_first_name" value="<?php echo $companyAdminInfo['other_names']; ?>" class="form-control" placeholder="Other Name">
                        </div>
                        <div class="col-6 form-group">
                            <input type="email" name="admin_email" value="<?php echo $companyAdminInfo['email']; ?>" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-6 form-group">
                            <input type="text" name="admin_contact" value="<?php echo $companyAdminInfo['contact']; ?>" class="form-control" placeholder="Contact">
                        </div>

                        <div class="col-12 form-group">
                            <input type="text" name="admin_Position" value="<?php echo $companyAdminInfo['position']; ?>" disabled class="form-control" placeholder="Position">

                        </div>


                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white">Save Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>