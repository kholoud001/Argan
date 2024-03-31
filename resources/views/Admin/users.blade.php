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

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('dashboard')}}">Home</a></li>
                </ol>
            </div>
        </div>
{{--        users table--}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Users Table</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">User name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Joining Date</th>
                                        <th scope="col">Order Rate</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Air Conditioner</td>
                                        <td>
                                            <div class="progress" style="height: 10px">
                                                <div class="progress-bar gradient-1" style="width: 70%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Apr 20,2018</td>
                                        <td><span class="label gradient-1 btn-rounded">70%</span>
                                        </td>
                                        <td><span><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a><a href="#" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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

<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>
<script src="js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="./plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="./plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="./plugins/d3v3/index.js"></script>
<script src="./plugins/topojson/topojson.min.js"></script>
<script src="./plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="./plugins/raphael/raphael.min.js"></script>
<script src="./plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="./plugins/chartist/js/chartist.min.js"></script>
<script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>

