<!-- ==================================head==================================== -->
<?php include(APPPATH . 'views/common/head.php'); ?>
<!-- ====================================end================================== -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 100%;
        width: 100%;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>
<!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'> -->
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
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


    <script>
        Highcharts.chart('container', {
            title: {
                text: 'Visit Summary'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
            },
            labels: {
                items: [{
                    html: '',
                    style: {
                        left: '50px',
                        top: '18px',
                        color: ( // themefeb_private
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || 'black'
                    }
                }]
            },
            series: [{
                    type: 'column',
                    name: 'Official Visits',
                    data: [
                        <?php echo $record->jan_officail; ?>,
                        <?php echo $record->feb_officail; ?>,
                        <?php echo $record->mar_officail; ?>,
                        <?php echo $record->apr_officail; ?>,
                        <?php echo $record->may_officail; ?>,
                        <?php echo $record->jun_officail; ?>,
                        <?php echo $record->jly_officail; ?>,
                        <?php echo $record->aug_officail; ?>,
                        <?php echo $record->sep_officail; ?>,
                        <?php echo $record->oct_officail; ?>,
                        <?php echo $record->nov_officail; ?>,
                        <?php echo $record->decc_officail; ?>
                    ]
                }, {
                    type: 'column',
                    name: 'Personal Visits',
                    data: [<?php echo $record->jan_private; ?>,
                        <?php echo $record->feb_private; ?>,
                        <?php echo $record->mar_private; ?>,
                        <?php echo $record->apr_private; ?>,
                        <?php echo $record->may_private; ?>,
                        <?php echo $record->jun_private; ?>,
                        <?php echo $record->jly_private; ?>,
                        <?php echo $record->aug_private; ?>,
                        <?php echo $record->sep_private; ?>,
                        <?php echo $record->oct_private; ?>,
                        <?php echo $record->nov_private; ?>,
                        <?php echo $record->decc_private; ?>
                    ]
                },
                //  {
                //     type: 'column',
                //     name: 'Visit Type',
                //     data: [4, 3, 3, 9, 0, 1, 3, 4, 2, 1, 3, 4] janvisiting
                // },
                {
                    type: 'spline',
                    name: 'Total Visits',
                    data: [<?php echo $record->janvisiting; ?>,
                        <?php echo $record->febvisiting; ?>,
                        <?php echo $record->marvisiting; ?>,
                        <?php echo $record->aprvisiting; ?>,
                        <?php echo $record->mayvisiting; ?>,
                        <?php echo $record->junvisiting; ?>,
                        <?php echo $record->jlyvisiting; ?>,
                        <?php echo $record->augvisiting; ?>,
                        <?php echo $record->sepvisiting; ?>,
                        <?php echo $record->octvisiting; ?>,
                        <?php echo $record->novvisiting; ?>,
                        <?php echo $record->deccvisiting; ?>
                    ],
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }
                // , {
                //     type: 'pie',
                //     name: 'Total',
                //     data: [{
                //         name: 'Male',
                //         y: <?php echo ($record->males); ?>,
                //         color: Highcharts.getOptions().colors[0] // Jane's color
                //     }, {
                //         name: 'Female',
                //         y: <?php echo ($record->Female); ?>,
                //         color: Highcharts.getOptions().colors[1] // John's color
                //     }],
                //     center: [85, 1],
                //     size: 100,
                //     showInLegend: true,
                //     dataLabels: {
                //         enabled: false
                //     }
                // }
            ]
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
            case 'info':
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

    <script>
        $(document).on('click', '#loggoutVisitor', function(e) {
            var contact = $(this).data('contact');




            $('#error_exist').html("");
            if (contact == "") {
                $('#error_exist').html("Enter Your Contact Information");

            } else {

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    data: {
                        contact: contact
                    },
                    url: '<?php echo site_url('admin_controller/AdminloggoutVisitor'); ?>',
                    success: function(result) {

                        // alert(result);

                        if (JSON.parse(result) == true) {


                            window.location.reload();

                        } else {
                            // window
                            $('#error_exist').html("Try Again");


                        }

                    }
                });
            }

        });
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