@extends('backend.layouts.parents')

@section('css')

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!-- Related styles of various javascript plugins -->
<link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

<!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

<!-- Load a specific file here from css/themes/ folder to alter the default theme of the template -->

<!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
<link rel="stylesheet" href="{{ asset('css/themes.css') }}">
<!-- END Stylesheets -->

<!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
<script src="{{ asset('js/vendor/modernizr-respond.min.js') }}"></script>

@endsection

@section('breadcum')


                <!-- Navigation info -->
                <ul id="nav-info" class="clearfix">
                    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="">Dashboard</a></li>
                </ul>

@section('content')
<div class="dash-tiles row">
    <!-- Column 1 of Row 1 -->
    <div class="col-sm-3">
        <!-- Total Users Tile -->
        <div class="dash-tile dash-tile-ocean clearfix animation-pullDown">
            <div class="dash-tile-header">
                <div class="dash-tile-options">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Manage Users"><i class="fa fa-cog"></i></a>
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Statistics"><i class="fa fa-bar-chart-o"></i></a>
                    </div>
                </div>
                Total Users
            </div>
            <div class="dash-tile-icon"><i class="fa fa-users"></i></div>
            <div class="dash-tile-text">265k</div>
        </div>
        <!-- END Total Users Tile -->

        <!-- Total Profit Tile -->
        <div class="dash-tile dash-tile-leaf clearfix animation-pullDown">
            <div class="dash-tile-header">
                <span class="dash-tile-options">
                    <a href="javascript:void(0)" class="btn btn-default" data-toggle="popover" data-placement="top" data-content="$500 (230 Sales)" title="Today's profit"><i class="fa fa-credit-card"></i></a>
                </span>
                Total Profit
            </div>
            <div class="dash-tile-icon"><i class="fa fa-money"></i></div>
            <div class="dash-tile-text">$5M</div>
        </div>
        <!-- END Total Profit Tile -->
    </div>
    <!-- END Column 1 of Row 1 -->

    <!-- Column 2 of Row 1 -->
    <div class="col-sm-3">
        <!-- Total Sales Tile -->
        <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
            <div class="dash-tile-header">
                <div class="dash-tile-options">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="View new orders"><i class="fa fa-shopping-cart"></i></a>
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Statistics"><i class="fa fa-bar-chart-o"></i></a>
                    </div>
                </div>
                Total Sales
            </div>
            <div class="dash-tile-icon"><i class="fa fa-tags"></i></div>
            <div class="dash-tile-text">300k</div>
        </div>
        <!-- END Total Sales Tile -->

        <!-- Total Downloads Tile -->
        <div class="dash-tile dash-tile-fruit clearfix animation-pullDown">
            <div class="dash-tile-header">
                <div class="dash-tile-options">
                    <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="View popular downloads"><i class="fa fa-asterisk"></i></a>
                </div>
                Total Downloads
            </div>
            <div class="dash-tile-icon"><i class="fa fa-cloud-download"></i></div>
            <div class="dash-tile-text">360k</div>
        </div>
        <!-- END Total Downloads Tile -->
    </div>
    <!-- END Column 2 of Row 1 -->

    <!-- Column 3 of Row 1 -->
    <div class="col-sm-3">
        <!-- Popularity Tile -->
        <div class="dash-tile dash-tile-oil clearfix animation-pullDown">
            <div class="dash-tile-header">
                <div class="dash-tile-options">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="What's changed?"><i class="fa fa-fire"></i></a>
                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Share"><i class="fa fa-share-square-o"></i></a>
                    </div>
                </div>
                Popularity
            </div>
            <div class="dash-tile-icon"><i class="fa fa-globe"></i></div>
            <div class="dash-tile-text">+90%</div>
        </div>
        <!-- END Popularity Tile -->

        <!-- Server Downtime Tile -->
        <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
            <div class="dash-tile-header">
                <div class="dash-tile-options">
                    <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Monthly report"><i class="fa fa-bar-chart-o"></i></a>
                </div>
                Server Downtime
            </div>
            <div class="dash-tile-icon"><i class="fa fa-hdd-o"></i></div>
            <div class="dash-tile-text">0.1%</div>
        </div>
        <!-- END Server Downtime Tile -->
    </div>
    <!-- END Column 3 of Row 1 -->

    <!-- Column 4 of Row 1 -->
    <div class="col-sm-3">
        <!-- RSS Subscribers Tile -->
        <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
            <div class="dash-tile-header">
                <div class="dash-tile-options">
                    <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Manage subscribers"><i class="fa fa-cog"></i></a>
                </div>
                RSS Subscribers
            </div>
            <div class="dash-tile-icon"><i class="fa fa-rss"></i></div>
            <div class="dash-tile-text">160k</div>
        </div>
        <!-- END RSS Subscribers Tile -->

        <!-- Total Tickets Tile -->
        <div class="dash-tile dash-tile-doll clearfix animation-pullDown">
            <div class="dash-tile-header">
                <div class="dash-tile-options">
                    <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Open tickets"><i class="fa fa-file-o"></i></a>
                </div>
                Total Tickets
            </div>
            <div class="dash-tile-icon"><i class="fa fa-wrench"></i></div>
            <div class="dash-tile-text">1.5k</div>
        </div>
        <!-- END Total Tickets Tile -->
    </div>
    <!-- END Column 4 of Row 1 -->

    <!-- <div class="card-body">
                        <img src="{{asset('images/Mountain.jpg')}}" style="width: 100%">
                    </div> -->
</div>

@endsection

@endsection




@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    !window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));
</script>

<!-- Bootstrap.js -->
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>

<!-- Jquery plugins and custom javascript code -->
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@endsection


@section('javascript')

<script>
    $(function() {
        // Initialize dash Datatables
        $('#dash-example-orders').dataTable({
            columnDefs: [{
                orderable: false,
                targets: [0]
            }],
            pageLength: 6,
            lengthMenu: [
                [6, 10, 30, -1],
                [6, 10, 30, "All"]
            ]
        });
        $('.dataTables_filter input').attr('placeholder', 'Search');

        // Dash example stats
        var dashChart = $('#dash-example-stats');

        var dashChartData1 = [
            [0, 200],
            [1, 250],
            [2, 360],
            [3, 584],
            [4, 1250],
            [5, 1100],
            [6, 1500],
            [7, 1521],
            [8, 1600],
            [9, 1658],
            [10, 1623],
            [11, 1900],
            [12, 2100],
            [13, 1700],
            [14, 1620],
            [15, 1820],
            [16, 1950],
            [17, 2220],
            [18, 1951],
            [19, 2152],
            [20, 2300],
            [21, 2325],
            [22, 2200],
            [23, 2156],
            [24, 2350],
            [25, 2420],
            [26, 2480],
            [27, 2320],
            [28, 2380],
            [29, 2520],
            [30, 2590]
        ];
        var dashChartData2 = [
            [0, 50],
            [1, 180],
            [2, 200],
            [3, 350],
            [4, 700],
            [5, 650],
            [6, 700],
            [7, 780],
            [8, 820],
            [9, 880],
            [10, 1200],
            [11, 1250],
            [12, 1500],
            [13, 1195],
            [14, 1300],
            [15, 1350],
            [16, 1460],
            [17, 1680],
            [18, 1368],
            [19, 1589],
            [20, 1780],
            [21, 2100],
            [22, 1962],
            [23, 1952],
            [24, 2110],
            [25, 2260],
            [26, 2298],
            [27, 1985],
            [28, 2252],
            [29, 2300],
            [30, 2450]
        ];

        // Initialize Chart
        $.plot(dashChart, [{
                data: dashChartData1,
                lines: {
                    show: true,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.05
                        }, {
                            opacity: 0.05
                        }]
                    }
                },
                points: {
                    show: true
                },
                label: 'All Visits'
            },
            {
                data: dashChartData2,
                lines: {
                    show: true,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.05
                        }, {
                            opacity: 0.05
                        }]
                    }
                },
                points: {
                    show: true
                },
                label: 'Unique Visits'
            }
        ], {
            legend: {
                position: 'nw',
                backgroundColor: '#f6f6f6',
                backgroundOpacity: 0.8
            },
            colors: ['#555555', '#db4a39'],
            grid: {
                borderColor: '#cccccc',
                color: '#999999',
                labelMargin: 5,
                hoverable: true,
                clickable: true
            },
            yaxis: {
                ticks: 5
            },
            xaxis: {
                tickSize: 2
            }
        });

        // Create and bind tooltip
        var previousPoint = null;
        dashChart.bind("plothover", function(event, pos, item) {

            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0],
                        y = item.datapoint[1];

                    $('<div id="tooltip" class="chart-tooltip"><strong>' + y + '</strong> visits</div>')
                        .css({
                            top: item.pageY - 30,
                            left: item.pageX + 5
                        })
                        .appendTo("body")
                        .show();
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    });
</script>

@endsection