<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/dleohr/template-1/dleohr-vertical/create-review.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 May 2020 03:46:46 GMT -->

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Linearicon Font -->
    <link rel="stylesheet" href="assets/css/lnr-icon.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title><?php echo $title; ?></title>



    <style>
        /*form styles*/

        .msform {
            width: 100%;
        }

        .msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;
            /*stacking fieldsets above each other*/
            position: relative;
        }

        /*Hide all except first fieldset*/

        .msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/

        #msform input,
        #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }

        /*buttons*/

        .msform .action-button {
            width: 45%;
            background: #27AE60;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        .msform .action-button:hover,
        .msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
        }

        .msform .action-button1 {
            width: 100%;
            background: #27AE60;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        .msform .action-button1:hover,
        .msform .action-button1:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
        }

        /*headings*/

        .fs-title {
            font-size: 15px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        /*progressbar*/

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: uppercase;
            font-size: 9px;
            width: 33.33%;
            float: left;
            position: relative;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 10px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }

        /*progressbar connectors*/

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: white;
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: -1;
            /*put it behind the numbers*/
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #27AE60;
            color: white;
        }
    </style>


    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/ie9.css">
  <![endif]-->

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-39365077-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>

</head>

<body>

    <!-- Inner wrapper -->
    <div class="inner-wrapper">

        <!-- Loader -->
        <div id="loader-wrapper">

            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>

        <!-- Header -->
        <header class="header">

            <!-- Top Header Section -->
            <div class="top-header-section">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="logo my-3 my-sm-0">
                                <a>

                                    <img src="<?php echo $logo; ?>" alt="logo image" class="img-fluid" width="100">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                            <div class="user-block d-none d-lg-block">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12">


                                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class=" menu-style dropdown-toggle">
                                                <div class="user-avatar d-inline-block">
                                                    <img src="assets/img/profiles/download.png" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                                </div>
                                            </a>

                                            <!-- Notifications -->
                                            <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                                <a class="dropdown-item p-2" href="<?php echo base_url("dashboard"); ?>">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-user mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Profile</span>
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
                                    <div class="user-info align-center bg-theme text-center">
                                        <a href="javascript:void(0)" class="d-block menu-style text-white">
                                            <div class="user-avatar d-inline-block mr-3">
                                                <img src="assets/img/profiles/download.png" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-notification-block align-center">

                                    </div>
                                    <hr>
                                    <div class="user-menu-items px-3 m-0">

                                        <a class="p-2" href="<?php echo base_url("dashboard"); ?>">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-user mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Profile</span>
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
        <!-- /Header -->

        <!-- Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                        <aside class="sidebar sidebar-user">
                            <div class="card ctm-border-radius shadow-sm grow">
                                <div class="card-body py-4">
                                    <div class="row">
                                        <div class="col-md-12 mr-auto text-left">
                                            <div class="custom-search input-group">
                                                <div class="custom-breadcrumb">
                                                    <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                        <li class=" d-inline-block">Receptionist Name:</li>
                                                        <li class="breadcrumb-item d-inline-block active"><?php echo $fullname; ?></li>
                                                    </ol>
                                                    <h4 class="text-dark">Visitors Log Page</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </aside>
                    </div>
                    <div class="col-xl-9 col-lg-8  col-md-12">
                        <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
                            <div class="card-body">
                                <div class="flex-row list-group list-group-horizontal-lg" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <!-- <li class="active"><a href="#parent1">Parent 1</a></li>
                                    <li><a href="#parent2">Parent 2</a></li> -->



                                    <a style="min-width: 50%;" class="list-group-item tabbbs" id="v-pills-home-tab" data-toggle="pill" href="#parent1" role="tab" aria-controls="v-pills-home" aria-selected="true">Visitors Sign In</a>
                                    <a style="min-width: 50%;" class="list-group-item" id="v-pills-profile-tab" data-toggle="pill" href="#parent2" role="tab" aria-controls="v-pills-profile" aria-selected="false"> Visitors Sign Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12  col-md-12">
                        <div class=" ctm-border-radius grow">

                            <div class="card-body align-center">

                                <div class="oem-panel">

                                    <div class="tab-content oem-panel-body">

                                        <!--    Parent 1 content    -->
                                        <div class="tab-pane " id="parent1">

                                            <div class="col-xl-12 col-lg-12  col-md-12">
                                                <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
                                                    <div class="card-body">
                                                        <div class="flex-row list-group list-group-horizontal-lg" id="myTab" role="tablist" aria-orientation="vertical">

                                                            <a style="min-width: 50%;" class="active list-group-item " id="v-pills-home-tab1" data-toggle="pill" href="#child1" role="tab" aria-controls="v-pills-home" aria-selected="true">New Visitor</a>
                                                            <a style="min-width: 50%;" class="list-group-item " id="v-pills-profile-tab1" data-toggle="pill" href="#child2" role="tab" aria-controls="v-pills-profile" aria-selected="false"> Regular Visitor</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form method="POST" action="admin_controller/newvisitor">

                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="child1">
                                                        <div class="msform">
                                                            <!-- progressbar -->
                                                            <!-- fieldsets -->
                                                            <fieldset>
                                                                <!-- <h2 class="fs-title">Create your account</h2>
                                                <h3 class="fs-subtitle">This is step 1</h3> -->
                                                                <div class="card ctm-border-radius shadow-sm grow">
                                                                    <div class="card-header">
                                                                        <center>
                                                                            <h1 class="fs-title">PERSONAL INFORMATION</h1>
                                                                        </center>

                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">

                                                                            <div class="col-md-5 form-group">
                                                                                <!-- <label>Full Name</label> -->
                                                                                <input name="last_name" type="text" class="form-control" placeholder="Enter Last Name" required>
                                                                            </div>

                                                                            <div class="col-md-7 form-group">
                                                                                <!-- <label>Full Name</label> -->
                                                                                <input name="other_names" type="text" class="form-control" placeholder="Enter Other Names" required>
                                                                            </div>

                                                                            <div class="col-md-12 form-group">
                                                                                <!-- <label>Contact</label> -->
                                                                                <!-- <input type="text" class="form-control" placeholder="Please Enter Contact"> -->
                                                                                <input name="contact" type="text" maxlength="10" name="myValue" class="only-numeric form-control" placeholder="Please Enter Contact" required>
                                                                            </div>
                                                                            <div class="col-md-12 form-group">
                                                                                <!-- <label>Emial</label> -->
                                                                                <input name="email" type="text" class="form-control" placeholder=" Please Enter Email (optional)">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <input type="button" class="next form-control" value="Next" /> -->
                                                                <input type="button" name="next" class="next action-button1" value="Next" />
                                                            </fieldset>
                                                            <fieldset>
                                                                <!-- <h2 class="fs-title">Social Profiles</h2>
                                                <h3 class="fs-subtitle">Your presence on the social network</h3> -->
                                                                <div class="card ctm-border-radius shadow-sm grow">
                                                                    <div class="card-header">
                                                                        <center>
                                                                            <h1 class="fs-title">Visiting Information</h1>
                                                                        </center>

                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 form-group">


                                                                                <!-- <div class="form-group mb-xl-0 mb-md-2 mb-sm-2"> -->
                                                                                <input name="visitingwho" class="form-control" placeholder="Who are your here to see Please" list=text_editors required>
                                                                                <!-- <button>▼</button> -->
                                                                                <datalist id="text_editors">
                                                                                    <!-- <select>

                                                                                        <option value="Atom">Atom
                                                                                        <option value="Brackets">Brackets
                                                                                        <option value="Notepad ++">Notepad ++
                                                                                        <option value="Notepad">Notepad
                                                                                        <option value="Sublime Text">Sublime Text
                                                                                        <option value="TextEdit">TextEdit
                                                                                        <option value="TextMate">TextMate
                                                                                        <option value="Wordpad">Wordpad
                                                                                    </select> -->

                                                                                    <select>
                                                                                        <?php foreach ($all_active_stuff as $records) : ?>
                                                                                            <option value="<?php echo $records->last_name . " " . $records->other_names; ?>"><?php echo $records->last_name . " " . $records->other_names; ?>

                                                                                            <?php endforeach ?>
                                                                                    </select>
                                                                                </datalist>

                                                                                <!-- </div> -->
                                                                            </div>
                                                                            <div class="col-md-12 form-group mb-0">
                                                                                <select name="visit_purpose" class="form-control select" required>
                                                                                    <option selected>Visit Purpose </option>
                                                                                    <option value="1">Officail</option>
                                                                                    <option value="2">Personal</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-12 form-group">
                                                                                <label></label>
                                                                                <input type="text" name="from_where" class="form-control" placeholder="Please Where are you coming from(company name)" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                                                <input type="button" name="next" class="next action-button" value="Next" />



                                                                <!-- <input type="button" name="previous" class="previous form-control" value="Previous" /><br>
                                                <input type="button" class="next form-control" value="Next" /> -->

                                                            </fieldset>
                                                            <fieldset>
                                                                <!-- <h2 class="fs-title">Social Profiles</h2>
                                                <h3 class="fs-subtitle">Your presence on the social network</h3> -->
                                                                <div class="card ctm-border-radius shadow-sm grow">
                                                                    <div class="card-header">
                                                                        <center>
                                                                            <h1 class="fs-title">Picture</h1>
                                                                        </center>

                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">

                                                                            <div class="col-md-12 form-group mb-0">

                                                                                <center>
                                                                                    <!-- <h2 align=center>Taking Pictures for Apple Device</h2> -->
                                                                                    <label class="btn btn-primary">
                                                                                        <i class="fa fa-camera"></i> Take A picture<input type="file" style="display: none;" name="image" onchange="readURL(this);">
                                                                                    </label>
                                                                                </center>
                                                                                <br>
                                                                                <center>
                                                                                    <img id="iphoneImage" required />

                                                                                </center>

                                                                                <textarea ty name="picture" style="display: none;" id="takenPixture" rows="500000"></textarea>


                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <input type="button" name="previous" class="previous action-button" value="Previous" />
                                                                <input type="button" name="next" class="next action-button" value="Next" /> -->
                                                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                                                <input type="submit" name="submit" class="action-button" value="Submit" />


                                                                <!-- <input type="button" name="previous" class="previous form-control" value="Previous" /><br>
                                                <input type="button" class="next form-control" value="Next" /> -->

                                                            </fieldset>
                                                            <fieldset>
                                                                <!-- <h2 class="fs-title">Personal Details</h2>
                                                <h3 class="fs-subtitle">We will never sell it</h3> -->

                                                                <div class="card ctm-border-radius shadow-sm grow">
                                                                    <div class="card-header">
                                                                        <center>
                                                                            <h1 class="fs-title">Visitors Signature</h1>



                                                                        </center>
                                                                        <!-- <h4 class="card-title mb-0 d-inline-block">Visitors Signature</h4> -->
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-1">

                                                                        </div>

                                                                        <div class="col-md-4">

                                                                            <section class="signature-component">
                                                                                <div class="col-md-12">
                                                                                    <center>
                                                                                        <canvas name="signature" class="form-control" id="signature-pad" style="width:100%!important; height:100%; "></canvas>
                                                                                    </center>
                                                                                </div>
                                                                                <div>
                                                                                    <center>
                                                                                        <button id="save" style="display: none;">Save</button>
                                                                                        <button id="clear" style="align-items: center;">Clear</button>
                                                                                        <button id="showPointsToggle" style="display: none;">Show points?</button>
                                                                                    </center>
                                                                                </div>


                                                                            </section>



                                                                        </div>
                                                                        <div class="col-md-1">

                                                                        </div>
                                                                    </div>




                                                                </div>



                                                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                                                <input type="submit" name="submit" class="action-button" value="Submit" />

                                                                <!-- <button type="submit">submit</button> -->
                                                            </fieldset>
                                            </form>



                                            <!--/Content-->

                                        </div>

                                    </div>
                                    <div class="tab-pane" id="child2">
                                        <div class="msform">
                                            <form method="POST" action="admin_controller/regularVisitor">
                                                <!-- progressbar -->
                                                <!-- fieldsets -->
                                                <fieldset>

                                                    <div class="card ctm-border-radius shadow-sm grow">
                                                        <div class="card-header">
                                                            <Center>
                                                                <h2 class="fs-title">Regular Visitor</h2>
                                                                <!-- <h3 class="fs-subtitle">Regular Visitor</h3> -->

                                                            </Center>

                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">

                                                                <div class="col-md-8 form-group">
                                                                    <input type="text" maxlength="10" name="contact" class="only-numeric form-control searchnumber" placeholder="Please Enter Phone Number">
                                                                    <!-- <input type="number" class="form-control" placeholder="Please Enter Phone Number"> -->
                                                                </div>
                                                                <div class="col-md-4 form-group">
                                                                    <button class="form-control regular_search " style="background: #27AE60;color: white;" type="button">Search</button>
                                                                    <br>
                                                                    <center> <span id="error_exist" style="color:red; "></span> </center>
                                                                </div>
                                                                <!-- <div class="row" id="aftersearch"> -->

                                                                <div class="col-md-12 form-group">
                                                                    <input style="display: none;" id="visiting" name="visitingwho" class="form-control" placeholder="Who are your here to see Please" list=text_editorsRegular>
                                                                    <!-- <button>▼</button> -->
                                                                    <datalist id="text_editorsRegular">
                                                                        <select>
                                                                            <?php foreach ($all_active_stuff as $records) : ?>
                                                                                <option value="<?php echo $records->last_name . " " . $records->other_names; ?>"><?php echo $records->last_name . " " . $records->other_names; ?>

                                                                                <?php endforeach ?>
                                                                        </select>
                                                                    </datalist>
                                                                </div><br>
                                                                <div class="col-md-12 form-group mb-0">
                                                                    <select id="Rereason" name="visit_purpose" class="form-control" style="display: none;">
                                                                        <option selected>Visit Purpose </option>
                                                                        <option value="1">Officail</option>
                                                                        <option value="2">Personal</option>

                                                                    </select>
                                                                </div>

                                                            </div><br>
                                                            <!-- </div> -->

                                                            <div class="row">

                                                                <div class="col-md-12 form-group">
                                                                    <!-- <input type="submit" name="submit" id="regularsubmint" class="action-button1" value="Submit" /> -->
                                                                    <input type="submit" style="display: none;" class="action-button1" id="regularsubmint" value="Submit" />
                                                                    <!-- <button type="button" class="action-button1" disabled>Click Me!</button> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </fieldset>

                                            </form>



                                            <!--/Content-->

                                        </div>
                                    </div>

                                </div>


                            </div> <!--    end of Parent 1 content    -->

                            <!--    Parent 2 content    -->
                            <div class="tab-pane" id="parent2">
                                <div class="msform">
                                    <!-- progressbar -->
                                    <!-- fieldsets -->
                                    <fieldset>

                                        <div class="card ctm-border-radius shadow-sm grow">
                                            <div class="card-header">
                                                <Center>
                                                    <h1 class="fs-title">Visitors Logout Panel</h1>
                                                    <!-- <h3 class="fs-subtitle">Regular Visitor</h3> -->

                                                </Center>

                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-8 form-group">
                                                        <input type="text" maxlength="10" name="logoutContact" class="logoutsearch  only-numeric form-control" placeholder="Please Enter Phone Number">
                                                        <!-- <input type="number" class="form-control" placeholder="Please Enter Phone Number"> -->
                                                    </div>
                                                    <div class="col-4 form-group">
                                                        <button class="form-control logout_search" style="background: #27AE60;color: white;" type="button">Search</button>
                                                        <br>
                                                        <center> <span id="logout_error_exist" style="color:red; "></span> </center>
                                                    </div>



                                                </div><br>
                                                <form action="admin_controller/visitor_logout" method="POST">
                                                    <div class="row">

                                                        <div class="col-12 form-group">
                                                            <input type="hidden" name="visit_ID" id="visit_ID" />
                                                            <input type="submit" style="display: none;" class="action-button1" id="btn_logout" value="Logout" />
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                    </fieldset>

                                    </form>



                                    <!--/Content-->

                                </div>
                            </div>
                        </div>

                        <script>
                            $(function() {
                                $('#myTab a:first').tab('show');
                            })
                        </script>

                    </div>

                </div>
            </div>
        </div>


        <!-- Add Basic Information The Modal -->
        <div class="modal fade" id="add_basicInformation">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="content">

                            <h1><em style="text-transform:none; font-weight:700; font-size:1.3em; letter-spacing:-.025em;">
                                    Signature to</em>
                                <strong class="url" style="letter-spacing:-.05em;">PNG <span style="text-transform:none;">data</span></strong></h1>

                            <p style="text-align:center;">Use your mouse cursor or the tip of your finger to sign below</p>
                            <div id="signature"></div>
                            <div>
                                <p style="text-align:center; margin-top:0em">
                                    <button id="reset" type="button">Reset</button>
                                </p>
                                <p>
                                    <label for="signature_capture">The data URI scheme</label>
                                    <textarea id="signature_capture" name="contractdata"></textarea>
                                </p>


                            </div>
                        </div>
                        <!--#content-->

                        <button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-theme text-white ctm-border-radius float-right button-1">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Basic Information The Modal -->
        <div class="col-xl-12 col-lg-12 col-md-12">

            <center>
                <style>
                    .output {
                        text-align: center;
                        font-family: 'Source Code Pro', Arial;
                        color: black;
                    }

                    .output h1 {
                        font-size: 40px;
                    }

                    /* Cursor Styling */
                    .cursor::after {
                        content: '';
                        display: inline-block;
                        margin-left: 3px;
                        background-color: white;
                        animation-name: blink;
                        animation-duration: 0.5s;
                        animation-iteration-count: infinite;
                    }

                    h1.cursor::after {
                        height: 24px;
                        width: 13px;
                    }

                    p.cursor::after {
                        height: 13px;
                        width: 6px;
                    }

                    @keyframes blink {
                        0% {
                            opacity: 1;
                        }

                        49% {
                            opacity: 1;
                        }

                        50% {
                            opacity: 0;
                        }

                        100% {
                            opacity: 0;
                        }
                    }
                </style>



                <div id="mywelcomeMesage" class="container py-5">
                    <div class="output" id="output">
                        <h1 class="cursor"></h1>
                        <p></p>
                    </div>
                </div>
                <!-- <a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm" data-toggle="modal" data-target="#add_basicInformation"><i class="fa fa-plus" aria-hidden="true"></i></a> -->

            </center>


        </div>
    </div>
    </div>
    </div>

    <!-- Inner Wrapper -->

    <div class="sidebar-overlay" id="sidebar_overlay"></div>


    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Datetimepicker JS -->
    <script src="assets/plugins/select2/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Select2 JS -->
    <script src="assets/plugins/select2/select2.min.js"></script>

    <!-- Sticky sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <!-- Custom Js -->

    <script src="assets/js/script.js"></script>

    <script src="assets/js/signature_pad.umd.js"></script>
    <script src="assets/js/app.js"></script>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="assets/script.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js'></script>
    <script src="assets/js/signature.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".only-numeric").bind("keypress", function(e) {

                var keyCode = e.which ? e.which : e.keyCode



                if (!(keyCode >= 48 && keyCode <= 57)) {

                    $(".error").css("display", "inline");

                    return false;

                } else {

                    $(".error").css("display", "none");

                }

            });


            // function myhiddingbutton() {
            //     alert("hii");
            // }
        });
    </script>




    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap-tab.js'></script>
    <script>
        $('#myTab a[href="#parent1"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $('#myTab a[href="#parent2"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $('#myTab a[href="#parent3"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $('#myTab a[href="#parent4"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })

        $('#myTab a[href="#child1"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $('#myTab a[href="#child2"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $('#myTab a[href="#child3"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })
        $('#myTab a[href="#child4"]').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })


        // $('.regular_search').click(function(e) {
        //     alert("regular_search");
        // })
        // $('#parent2').click(function(e) {
        //     alert("Lo");
        // })
    </script>

    <script>
        $(document).on('click', '.regular_search', function(e) {
            var contact = $('.searchnumber').val();


            $('#error_exist').html("");
            if (contact == "") {
                $('#error_exist').html("Enter Your Contact Information");

            } else {
                // alert(contact);
                // $.preloader.start({
                //     modal: true,
                //     src: 'assets/Loading-Spinner/img/ajax-loader.gif'
                // });
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    data: {
                        contact: contact
                    },
                    url: '<?php echo site_url('admin_controller/check_contact'); ?>',
                    success: function(result) {

                        //alert(result);
                        var x = document.getElementById("visiting");
                        var y = document.getElementById("Rereason");
                        var z = document.getElementById("regularsubmint");

                        if (JSON.parse(result) == true) {
                            $('#error_exist').html("Contact Exist");

                            x.style.display = "block";
                            y.style.display = "block";
                            z.style.display = "block";
                            // document.getElementById("visiting").style.visibility = "visible";
                            // document.getElementById("Rereason").style.visibility = "visible";

                            // location.reload();
                        } else if (JSON.parse(result) == "loggedIn") {
                            // window
                            $('#error_exist').html("Please Contact The Receptionist To Logg You Out First From The Last Visit");

                            //location.reload();
                            x.style.display = "none";
                            y.style.display = "none";
                            z.style.display = "none";
                        } else {
                            // window
                            $('#error_exist').html("Contact dont Exist");

                            //location.reload();
                            x.style.display = "none";
                            y.style.display = "none";
                            z.style.display = "none";
                        }

                    }
                });
            }

        });




        $(document).on('click', '.logout_search', function(e) {
            var contact = $('.logoutsearch').val();
            $('#logout_error_exist').html("");
            if (contact == "") {
                $('#logout_error_exist').html("Enter Your Contact Information");

            } else {
                // alert(contact);
                // $.preloader.start({
                //     modal: true,
                //     src: 'assets/Loading-Spinner/img/ajax-loader.gif'
                // });
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    data: {
                        contact: contact
                    },
                    url: '<?php echo site_url('admin_controller/check_contact_logout'); ?>',
                    success: function(result) {
                        var x = document.getElementById("btn_logout");

                        // alert(result);


                        if (JSON.parse(result) == "adminRole") {
                            $('#visit_ID').val("");
                            $('#logout_error_exist').html("Contact System Administrator");
                            x.style.display = "none";

                        } else if (JSON.parse(result) == false) {
                            $('#visit_ID').val("");
                            // window
                            $('#logout_error_exist').html("Visitors Contact dont exist");
                            x.style.display = "none";

                        } else {
                            $('#visit_ID').val(JSON.parse(result));
                            $('#logout_error_exist').html("Visitor Logged In");
                            x.style.display = "block";
                        }

                    }
                });
            }

        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> -->
    <!-- < !-- < script src="assets/toastr.min.js"> -->
    </script>
    <link rel="stylesheet" href="assets/toastr.min.css">
    <script>
        var type = "<?php echo $this->session->flashdata('alert-type'); ?>";
        switch (type) {
            case 'success':
                toastr.success('<?php echo $this->session->flashdata('message'); ?>', 'success', {
                    timeOut: 3000
                });
                break
            case 'info':
                toastr.info('<?php echo $this->session->flashdata('message'); ?>', 'info', {
                    timeOut: 5000
                });
                break;
            case 'warning':
                toastr.warning('<?php echo $this->session->flashdata('message'); ?>', 'warning', {
                    timeOut: 5000
                });
                break;
            case 'error':
                toastr.error('<?php echo $this->session->flashdata('message'); ?>', 'error', {
                    timeOut: 5000
                });
                break;
        }


        // values to keep track of the number of letters typed, which quote to use. etc. Don't change these values.
        var i = 0,
            a = 0,
            isBackspacing = false,
            isParagraph = false;

        // Typerwrite text content. Use a pipe to indicate the start of the second line "|".  
        var textArray = [
            "Welcome To <?php echo $company_name; ?>|AKWABA",
            "Welcome To <?php echo $company_name; ?>|WOEZOR",
            "<?php echo $company_name; ?>|ALWAYS AT YOUR SERVICE",

        ];

        // Speed (in milliseconds) of typing.
        var speedForward = 100, //Typing Speed
            speedWait = 1000, // Wait between typing and backspacing
            speedBetweenLines = 1000, //Wait between first and second lines
            speedBackspace = 25; //Backspace Speed

        //Run the loop
        typeWriter("output", textArray);

        function typeWriter(id, ar) {
            var element = $("#" + id),
                aString = ar[a],
                eHeader = element.children("h1"), //Header element
                eParagraph = element.children("p"); //Subheader element

            // Determine if animation should be typing or backspacing
            if (!isBackspacing) {

                // If full string hasn't yet been typed out, continue typing
                if (i < aString.length) {

                    // If character about to be typed is a pipe, switch to second line and continue.
                    if (aString.charAt(i) == "|") {
                        isParagraph = true;
                        eHeader.removeClass("cursor");
                        eParagraph.addClass("cursor");
                        i++;
                        setTimeout(function() {
                            typeWriter(id, ar);
                        }, speedBetweenLines);

                        // If character isn't a pipe, continue typing.
                    } else {
                        // Type header or subheader depending on whether pipe has been detected
                        if (!isParagraph) {
                            eHeader.text(eHeader.text() + aString.charAt(i));
                        } else {
                            eParagraph.text(eParagraph.text() + aString.charAt(i));
                        }
                        i++;
                        setTimeout(function() {
                            typeWriter(id, ar);
                        }, speedForward);
                    }

                    // If full string has been typed, switch to backspace mode.
                } else if (i == aString.length) {

                    isBackspacing = true;
                    setTimeout(function() {
                        typeWriter(id, ar);
                    }, speedWait);

                }

                // If backspacing is enabled
            } else {

                // If either the header or the paragraph still has text, continue backspacing
                if (eHeader.text().length > 0 || eParagraph.text().length > 0) {

                    // If paragraph still has text, continue erasing, otherwise switch to the header.
                    if (eParagraph.text().length > 0) {
                        eParagraph.text(eParagraph.text().substring(0, eParagraph.text().length - 1));
                    } else if (eHeader.text().length > 0) {
                        eParagraph.removeClass("cursor");
                        eHeader.addClass("cursor");
                        eHeader.text(eHeader.text().substring(0, eHeader.text().length - 1));
                    }
                    setTimeout(function() {
                        typeWriter(id, ar);
                    }, speedBackspace);

                    // If neither head or paragraph still has text, switch to next quote in array and start typing.
                } else {

                    isBackspacing = false;
                    i = 0;
                    isParagraph = false;
                    a = (a + 1) % ar.length; //Moves to next position in array, always looping back to 0
                    setTimeout(function() {
                        typeWriter(id, ar);
                    }, 50);

                }
            }
        }
    </script>


    <script>
        document.getElementById("v-pills-home-tab").addEventListener("click", hiddingWelcomeMessages);
        document.getElementById("v-pills-profile-tab").addEventListener("click", hiddingWelcomeMessages);

        function hiddingWelcomeMessages() {

            var x = document.getElementById("mywelcomeMesage");
            x.style.display = "none";
        }
    </script>


    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#iphoneImage')
                        .attr('src', e.target.result);
                    $('#takenPixture').val(e.target.result);
                    //  alert(e.target.result);
                };



                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script src='https://cdn.rawgit.com/willowsystems/jSignature/master/libs/jSignature.min.js'></script>
    <script>
        $('#signature').jSignature();
        var $sigdiv = $('#signature');
        var datapair = $sigdiv.jSignature('getData', 'svgbase64');

        $('#signature').bind('change', function(e) {
            var data = $('#signature').jSignature('getData');
            $("#signature_capture").val(data);
            $("#help").slideDown(300);
        });

        $('#reset').click(function(e) {
            $('#signature').jSignature('clear');
            $("#signature_capture").val('');
            //$("#help").slideUp(300);
            e.preventDefault();
        });
    </script>
</body>


</html>