$(function() {

    // Pie Chart

    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['MALE', 'FEMALE'],
            datasets: [{
                label: '# of Votes',
                data: [8, 19],
                backgroundColor: [
                    // 'rgba(255, 99, 132, 1)',
                    // '#3E007C',
                    // 'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            }
        }
    });

    // Line Chart

    var ctx = document.getElementById("lineChart").getContext('2d');
    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                    label: 'Developer',
                    data: [20, 10, 5, 5, 20],
                    fill: false,
                    borderColor: '#373651',
                    backgroundColor: '#373651',
                    borderWidth: 1
                },
                {
                    label: 'Marketing',
                    data: [2, 2, 3, 4, 1],
                    fill: false,
                    borderColor: '#E65A26',
                    backgroundColor: '#E65A26',
                    borderWidth: 1
                },
                {
                    label: 'Marketing',
                    data: [1, 3, 6, 8, 10],
                    fill: false,
                    borderColor: '#a1a1a1',
                    backgroundColor: '#a1a1a1',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            }
        }
    });

});


// my dashboard chart
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
                '<?php echo $record->jan_officail; ?>',
                '<?php echo $record->feb_officail; ?>',
                '<?php echo $record->mar_officail; ?>',
                '<?php echo $record->apr_officail; ?>',
                '<?php echo $record->may_officail; ?>',
                '<?php echo $record->jun_officail; ?>',
                '<?php echo $record->jly_officail; ?>',
                '<?php echo $record->aug_officail; ?>',
                '<?php echo $record->sep_officail; ?>',
                '<?php echo $record->oct_officail; ?>',
                '<?php echo $record->nov_officail; ?>',
                '<?php echo $record->decc_officail; ?>'
            ]
        }, {
            type: 'column',
            name: 'Personal Visits',
            data: ['<?php echo $record->jan_private; ?>',
                '<?php echo $record->feb_private; ?>',
                '<?php echo $record->mar_private; ?>',
                '<?php echo $record->apr_private; ?>',
                '<?php echo $record->may_private; ?>',
                '<?php echo $record->jun_private; ?>',
                '<?php echo $record->jly_private; ?>',
                '<?php echo $record->aug_private; ?>',
                '<?php echo $record->sep_private; ?>',
                '<?php echo $record->oct_private; ?>',
                '<?php echo $record->nov_private; ?>',
                '<?php echo $record->decc_private; ?>'
            ]
        },
        //  {
        //     type: 'column',
        //     name: 'Visit Type',
        //     data: [4, 3, 3, 9, 0, 1, 3, 4, 2, 1, 3, 4]
        // },
        {
            type: 'spline',
            name: 'Total Visits',
            data: ['<?php echo $record->decc_private; ?>', 3, 6.33, 3.33, 2, 1, 3, 4, 2, 1, 3, 4],
            marker: {
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[3],
                fillColor: 'white'
            }
        }, {
            type: 'pie',
            name: 'Total',
            data: [{
                name: 'Male',
                y: 13,
                color: Highcharts.getOptions().colors[0] // Jane's color
            }, {
                name: 'Female',
                y: 23,
                color: Highcharts.getOptions().colors[1] // John's color
            }],
            center: [85, 1],
            size: 100,
            showInLegend: true,
            dataLabels: {
                enabled: false
            }
        }
    ]
});