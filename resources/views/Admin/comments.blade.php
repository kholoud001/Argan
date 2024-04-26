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
                                        <th scope="col">Comments on Blog</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Comment content</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td>
                                                @foreach($blogs as $blog)
                                                    @if($blog->id == $comment->blog_post_id)
                                                        {{$blog->title}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td> @foreach($users as $user)
                                                     @if($user->id== $comment->user_id)
                                                         {{$user->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td> {{$comment->content}}</td>


                                            <td>
                                                <span>

{{--                                                    Delete comment--}}
                                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-placement="top" title="Delete" class="btn btn-link">
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
                                {{ $comments->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- form--}}
                <div class="col-lg-6">
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

