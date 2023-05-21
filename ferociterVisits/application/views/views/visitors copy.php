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
    <!-- Inner Wrapper -->
    <div class="sidebar-overlay" id="sidebar_overlay"></div>

    <?php include(APPPATH . 'views/common/foot.php'); ?>


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