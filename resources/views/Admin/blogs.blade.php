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

                {{-- Blog posts table --}}
                <div class="col-lg-6">
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
                            <h4 class="card-title">Blog Posts Table</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">Post Title</th>
                                        <th scope="col">Creating Date</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->created_at->format('M d, Y')}}</td>
                                            <td>
                                                @foreach($post->categories as $category)
                                                    {{$category->name}}
                                                    @if (!$loop->last)
                                                        ,
                                            @endif
                                            @endforeach
                                            <td>
                                                <span>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                    @csrf
                                                     @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this post?');" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-link">
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
                            </div>
                        </div>
                    </div>
                </div>
                {{-- form--}}
                <div class="col-lg-6">
                    @include('Admin/forms/add_blog')
                </div>
                {{-- Archived Posts table --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Archived Posts Table</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">Post Title</th>
                                        <th scope="col">Creating Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($archivedPosts as $archivedPost)
                                        <tr>
                                            <td>{{$archivedPost->title}}</td>
                                            <td>{{$archivedPost->created_at->format('M d, Y')}}</td>
                                            <td>
                                                @foreach($archivedPost->categories as $category)
                                                    {{$category->name}}
                                                    @if (!$loop->last)
                                                        ,
                                            @endif
                                            @endforeach
                                            <td>
                                                <span>
                                                    <form action="{{ route('posts.restore', $archivedPost->id) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Restore">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </button>
                                                    </form>

                                                </span>
                                            </td>
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

