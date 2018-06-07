<!-- OVERVIEW STYLE -->
<link rel="stylesheet" href="<?php echo site_url('assets/public/sass/') ?>admin/overview.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blogs
            <small>Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Blogs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Blog's View</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <canvas id="areaChart" style="height:300px"></canvas>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Most Interested Blogs </h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <canvas id="pieChart" style="height:300px"></canvas>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.col -->

            <div class="col-md-12">
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Blogs</h3>

                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Blog 1</td>
                                    <td>
                                        <p>Vivamus aliquam laoreet urna, sodales imperdiet magna maximus et. Ut sed consequat odio. Quisque pharetra, justo blandit feugiat maximus, metus tellus luctus orci, vehicula vestibulum leo ex vel leo. Sed eleifend molestie cursus. Praesent vel nibh lobortis, pellentesque mauris sit amet, viverra velit. Pellentesque semper maximus enim, vitae volutpat nisl facilisis pulvinar. Praesent vitae ultricies est, non vestibulum lorem. Mauris ut pellentesque sem, eu bibendum quam.</p>
                                    </td>
                                    <td>Category I.I</td>
                                    <td><p class="currentDate"></p></td>
                                    <td>Adminstrator</td>
                                    <td>
                                        <span class="label label-success">Available</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Blog 2</td>
                                    <td>
                                        <p>Vivamus aliquam laoreet urna, sodales imperdiet magna maximus et. Ut sed consequat odio. Quisque pharetra, justo blandit feugiat maximus, metus tellus luctus orci, vehicula vestibulum leo ex vel leo. Sed eleifend molestie cursus. Praesent vel nibh lobortis, pellentesque mauris sit amet, viverra velit. Pellentesque semper maximus enim, vitae volutpat nisl facilisis pulvinar. Praesent vitae ultricies est, non vestibulum lorem. Mauris ut pellentesque sem, eu bibendum quam.</p>
                                    </td>
                                    <td>Category I.II</td>
                                    <td><p class="currentDate"></p></td>
                                    <td>Adminstrator</td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Blog 3</td>
                                    <td>
                                        <p>Vivamus aliquam laoreet urna, sodales imperdiet magna maximus et. Ut sed consequat odio. Quisque pharetra, justo blandit feugiat maximus, metus tellus luctus orci, vehicula vestibulum leo ex vel leo. Sed eleifend molestie cursus. Praesent vel nibh lobortis, pellentesque mauris sit amet, viverra velit. Pellentesque semper maximus enim, vitae volutpat nisl facilisis pulvinar. Praesent vitae ultricies est, non vestibulum lorem. Mauris ut pellentesque sem, eu bibendum quam.</p>
                                    </td>
                                    <td>Category I.I</td>
                                    <td><p class="currentDate"></p></td>
                                    <td>Adminstrator</td>
                                    <td>
                                        <span class="label label-warning">Pending</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a class="btn btn-primary" href="<?php echo base_url('admin/blogs/blogs') ?>" role="button">See Detail</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>

<script src="<?php echo site_url('assets/public/lib/') ?>chartJs/js/Chart.js"></script>

<!-- REMOVE WHEN USING REAL DATEBASE -->
<script>
    var now = new Date();
    var date = now.getDate() + "/" + now.getMonth() + "/" + now.getFullYear() + " | " + now.getHours() + ":" + now.getMinutes();

    $(function currentDate () {
        $('.currentDate').html(date);
    });
</script>
<script>
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        // This will get the first returned node in the jQuery collection.
        var areaChart       = new Chart(areaChartCanvas)

        var areaChartData = {
            labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label               : 'Average Viewer',
                    fillColor           : 'rgba(210, 214, 222, 1)',
                    strokeColor         : 'rgba(210, 214, 222, 1)',
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [65, 59, 80, 81, 56, 55, 40, 54, 43, 32, 54, 65]
                },
                {
                    label               : 'Blog 1',
                    fillColor           : '#f56954',
                    strokeColor         : '#f56954',
                    pointColor          : '#f56954',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [28, 48, 40, 19, 86, 27, 90, 86, 54, 45, 23, 23]
                },
                {
                    label               : 'Blog 2',
                    fillColor           : '#00a65a',
                    strokeColor         : '#00a65a',
                    pointColor          : '#00a65a',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [34, 23, 54, 12, 53, 34, 23, 21, 12, 56, 21, 23]
                },
                {
                    label               : 'Blog 3',
                    fillColor           : '#f39c12',
                    strokeColor         : '#f39c12',
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [65, 54, 32, 12, 12, 43, 32, 12, 43, 53, 12, 65]
                }
            ]
        }

        var areaChartOptions = {
            //Boolean - If we should show the scale at all
            showScale               : true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines      : false,
            //String - Colour of the grid lines
            scaleGridLineColor      : 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth      : 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines  : true,
            //Boolean - Whether the line is curved between points
            bezierCurve             : true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension      : 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot                : false,
            //Number - Radius of each point dot in pixels
            pointDotRadius          : 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth     : 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius : 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke           : true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth      : 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill             : true,
            //String - A legend template
            legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio     : true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive              : true
        }

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions)


        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieChart       = new Chart(pieChartCanvas)
        var PieData        = [
            {
                value    : 700,
                color    : '#f56954',
                highlight: '#f56954',
                label    : 'Blog 1'
            },
            {
                value    : 500,
                color    : '#00a65a',
                highlight: '#00a65a',
                label    : 'Blog 2'
            },
            {
                value    : 400,
                color    : '#f39c12',
                highlight: '#f39c12',
                label    : 'Blog 2'
            },
            {
                value    : 100,
                color    : '#00c0ef',
                highlight: '#00c0ef',
                label    : 'Another Blogs'
            }
        ]
        var pieOptions     = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke    : true,
            //String - The colour of each segment stroke
            segmentStrokeColor   : '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth   : 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps       : 50,
            //String - Animation easing effect
            animationEasing      : 'ease',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate        : true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale         : false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive           : true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio  : true,
            //String - A legend template
            legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions)

    })
</script>