<!-- ==================================head==================================== -->
<?php include(APPPATH . 'views/common/head.php'); ?>
<!-- ====================================end================================== -->

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

    <?php include(APPPATH . 'views/common/foot.php'); ?>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script>
        $(document).ready(function() {
            var imageurl = '<?php echo $logo; ?>';
            $('#imagePreview').css('background-image', 'url(' + imageurl + ')');

            $('#myimaging').val(imageurl);



        });


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                    $('#myimaging').val(e.target.result);




                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>


</body>

</html>