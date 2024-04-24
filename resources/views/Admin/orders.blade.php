<!DOCTYPE html>
<html lang="en">
@include('Admin/components/head')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{url('myJs/IsConected.js')}}"></script>
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
        <div class="row page-titles mx-0 align-items-center">
            <div class="col p-md-0">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Home</a></li>
                </ol>
            </div>

        </div>

        <div class="container-fluid">
            <div class="row">

                {{-- order table --}}
                <div class="col-lg-12">
                    @if(session('success'))
                        <div id="success-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div id="error-message" class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order Table</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">Order Number</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{ $order->created_at->format('d M.Y') }}</td>
                                            <td>{{ $order->items->sum('price') }} Dhs</td>
                                            <td>{{ $order->first_name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->city }}</td>
                                            <td>{{ $order->street_address }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ $order->status }}</td>

                                            <td>
                                                <span>
{{--                                                    Approve order--}}
                                                     <form action="{{ route('orders.approve', $order->id) }}" method="POST">
                                                        @csrf
                                                        <button data-placement="top" title="Approve" class="btn btn-link">
                                                          <i class="fa fa-pencil-square-o color-danger"></i>
                                                        </button>
                                                    </form>
{{--                                                    Archive order--}}
                                                    <form action="{{ route('orders.archive', $order->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-placement="top" title="Archive" class="btn btn-link">
                                                           <i class="fa fa-trash color-danger"></i>
                                                        </button>
                                                    </form>

                                                </span>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination links -->
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- form--}}
                <div class="col-lg-6">

                </div>
                {{-- Archived order table --}}
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Archived Orders Table</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">Order Number</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($archivedOrders as $archivedOrder)
                                        <tr>
                                            <td>{{$archivedOrder->id}}</td>
                                            <td>{{ $archivedOrder->created_at->format('d M.Y') }}</td>
                                            <td>{{ $archivedOrder->items->sum('price') }} Dhs</td>
                                            <td>{{ $archivedOrder->first_name }}</td>
                                            <td>{{ $archivedOrder->email }}</td>
                                            <td>{{ $archivedOrder->city }}</td>
                                            <td>{{ $archivedOrder->street_address }}</td>
                                            <td>{{ $archivedOrder->phone }}</td>
                                            <td>{{ $archivedOrder->status }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #/ container -->
            </div>
        </div>
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
{{--logout--}}
<script src="{{url('myJs/logout.js')}}"></script>
{{--Flash message--}}
<script src="{{url('myJs/Admin/flashMsg.js')}}"></script>



<!--**********************************
    Scripts
***********************************-->

<script src="{{url('plugins/common/common.min.js')}}"></script>
<script src="{{url('js/custom.min.js')}}"></script>
<script src="{{url('js/settings.js')}}"></script>
<script src="{{url('js/gleek.js')}}"></script>
<script src="{{url('js/styleSwitcher.js')}}"></script>



<script src="{{url('/js/dashboard/dashboard-1.js')}}"></script>

</body>

</html>

