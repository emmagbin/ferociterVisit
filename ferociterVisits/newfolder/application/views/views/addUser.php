<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Linearicon Font -->
<link rel="stylesheet" href="assets/css/lnr-icon.css">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<!-- Select2 CSS -->
<link rel="stylesheet" href="assets/plugins/select2/select2.min.css">

<!-- Datetimepicker CSS -->
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<!-- Tagsinput CSS -->
<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- Inner wrapper -->
    <div class="inner-wrapper">

        <!-- ==================================loader==================================== -->
        <?php include(APPPATH . 'views/common/loader.php'); ?>
        <!-- ====================================end================================== -->

        <!-- ==================================header==================================== -->
        <?php include(APPPATH . 'views/common/header.php'); ?>
        <!-- ====================================end================================== -->
        <!-- Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!-- =====================side menu================================================= -->
                    <?php include(APPPATH . 'views/common/sidemenu.php'); ?>
                    <!-- =================================================================== -->
                    <div class="col-xl-9 col-lg-8  col-md-12">
                        <!-- ==================================body=================================== -->
                        <?php include(APPPATH . 'views/body/' . $page . '.php'); ?>
                        <!-- ====================================end================================== -->
                    </div>
                </div>
            </div>
        </div>
        <!--/Content-->
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

    <!-- Tagsinput JS -->
    <script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Sticky sidebar JS -->
    <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/script.js"></script>

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

        });
    </script>


</body>

</html>