<!-- ==================================head==================================== -->
<?php include(APPPATH . 'views/common/head.php'); ?>
<!-- ====================================end================================== -->
<!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'> -->
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'> -->
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .dataTables_filter {
        float: right;
    }

    .table-hover>tbody>tr:hover {
        background-color: #ccffff;
    }

    @media only screen and (min-width: 768px) {
        .table {
            table-layout: fixed;
            max-width: 100% !important;
        }
    }

    thead {
        background: #ddd;
    }

    .table td:nth-child(2) {
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .highlight {
        background: #ffff99;
    }


    /*
	Label the data
	*/
</style>
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
    <!--Delete The Modal -->
    <div class="modal fade" id="delete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal body -->
                <form method="POST" action="admin_controller/user_reset_lock_unlock">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center>
                            <h4 class="modal-title mb-4">LOCK USER</h4>


                            <input type="hidden" name="id" class="txtid">
                            <input type="hidden" name="action" value="lock">
                            <Span>ARE U SURE YOU WANT TO LOCK <span class="txtfullname" style="color: red;"></span> FROM THE SYSTEM?</Span><br><br>

                            <button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Lock User</button>

                        </center>

                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="undelete">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="admin_controller/user_reset_lock_unlock">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center>
                            <h4 class="modal-title mb-4">UNLOCK USER</h4>


                            <input type="hidden" name="id" class="txtid">
                            <input type="hidden" name="action" value="unlock">
                            <Span>ARE U SURE YOU WANT TO UNLOCK <span class="txtfullname" style="color: red;"></span> IN THE SYSTEM?</Span><br><br>

                            <button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Unlock User</button>
                        </center>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Delete The Modal -->
    <div class="modal fade" id="reset">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="admin_controller/user_reset_lock_unlock">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center>
                            <h4 class="modal-title mb-4">RESET USER PASSWORD</h4>

                            <input type="hidden" name="id" class="txtid">

                            <input type="hidden" name="action" value="reset">

                            <input type="hidden" class="txtcontact" name="contact">
                            <input type="hidden" class="txtemail" name="email">

                            <Span>ARE U SURE YOU WANT TO RESET <span class="txtfullname" style="color: red;"></span> PASSWORD?</Span><br><br>

                            <button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Reset User Password</button>

                        </center>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Inner Wrapper -->
    <div class="sidebar-overlay" id="sidebar_overlay"></div>

    <?php include(APPPATH . 'views/common/foot.php'); ?>
    <script>
        $(document).on('click', '.bnt_the_modal', function() {


            $('.txtcontact').val($(this).data('contact'));
            $('.txtemail').val($(this).data('email'));

            $('.txtid').val($(this).data('id'));

            var txtfullname = $(this).data('fullname');
            $('.txtfullname').html(txtfullname);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- <script src="assets/toastr.min.js"></script>
    <link rel="stylesheet" href="assets/toastr.min.css"> -->
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
    </script>
    <!-- partial -->
    <script src='https://code.jquery.com/jquery-1.12.3.js'></script>
    <script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
    <!-- <script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script> -->

    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                //disable sorting on last column
                "columnDefs": [{
                    "orderable": false,
                    "targets": 5
                }],
                language: {
                    //customize pagination prev and next buttons: use arrows instead of words
                    'paginate': {
                        'previous': '<span class="fa fa-chevron-left"></span>',
                        'next': '<span class="fa fa-chevron-right"></span>'
                    },
                    //customize number of elements to be displayed
                    "lengthMenu": 'Display <select class="form-control input-sm">' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        '<option value="50">50</option>' +
                        '<option value="-1">All</option>' +
                        '</select> results'
                }
            })
        });
    </script>
</body>

</html>