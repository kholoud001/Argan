<!DOCTYPE html>
<html lang="en">
@include('Admin/components/head')




<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <div class="brand-logo">
            <a href="#">
            </a>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
     @include('Admin/components/header')
    <!--**********************************
        Header end
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    @include('Admin/components/sidebar')
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <!-- Products count -->
                        <div class="card-body">
                            <h3 class="card-title text-white">Products Count</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$productsCount}}</h2>
{{--                                <p class="text-white mb-0">Jan - March 2019</p>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <!-- Orders count -->
                        <div class="card-body">
                            <h3 class="card-title text-white">Orders Count</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$ordersCount}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <!-- Users count -->
                        <div class="card-body">
                            <h3 class="card-title text-white">Users Count</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$usersCount}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <!-- Top Products sales -->
                        <div class="card-body">
                            <h3 class="card-title text-white">Top Product</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{$topProduct}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- chart js -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div>
                                    <canvas id="salesCountChart"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Order summary -->
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order Summary</h4>
                            <canvas id="ordersRateChart"></canvas>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card card-widget">
                        <div class="card-body">

                            <h4 class="card-title">Orders pending</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    @foreach($pendingOrders as $pending)
                                    <tbody>
                                        <tr>
                                            <td> {{$pending->id}}</td>
                                            <td> {{$pending->status}}</td>
                                            <td>
                                                <span>
{{--                                                    Approve order--}}
                                                     <form action="{{ route('orders.approve', $pending->id) }}" method="POST">
                                                        @csrf
                                                        <button data-placement="top" title="Approve" class="btn btn-link">
                                                          <i class="fa fa-pencil-square-o color-danger"></i>
                                                        </button>
                                                    </form>
{{--                                                    Archive order--}}
                                                    <form action="{{ route('orders.archive', $pending->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-placement="top" title="Archive" class="btn btn-link">
                                                           <i class="fa fa-trash color-danger"></i>
                                                        </button>
                                                    </form>

                                                </span>

                                            </td>
                                        </tr>

                                    </tbody>
                                    @endforeach
                                </table>


                        </div>
                    </div>

                </div>

            </div>






        </div>
        <!-- #/ container -->
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    @include('Admin/components/footer')
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    My Scripts
***********************************-->
<!-- Chart js -->
<script>
    const totalOrdersCount = <?php echo json_encode($ordersCount);?>;

    const labels = <?php echo json_encode($labels); ?>;
    const salesCounts = <?php echo json_encode($salesCounts); ?>;

</script>
    <script src="myJs/Admin/Orderchart.js"></script>

    <script src="myJs/Admin/chart.js"></script>


{{--logout--}}
<script src="myJs/logout.js"></script>

<!--**********************************
    Scripts
***********************************-->

<script src="{{url('plugins/common/common.min.js')}}"></script>
<!-- Contains Jquery functions and event handlers -->
<script src="js/custom.min.js"></script>
<!-- settings of the fonction quixSettings and its prototype methods to manage various settings
for a web application or website-->
<script src="js/settings.js"></script>
<!-- Control the settings for the theme and layout -->
<script src="js/gleek.js"></script>
{{--<script src="js/styleSwitcher.js"></script>--}}

<!-- Chartjs -->
{{--<script src="./plugins/chart.js/Chart.bundle.min.js"></script>--}}
<!-- Circle progress -->
<script src="./plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="./plugins/d3v3/index.js"></script>
<script src="./plugins/topojson/topojson.min.js"></script>
<script src="./plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->

<!-- Pignose Calender -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="./plugins/chartist/js/chartist.min.js"></script>
<script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>
