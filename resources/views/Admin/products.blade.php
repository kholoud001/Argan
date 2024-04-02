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

                {{-- Products table --}}
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
                            <h4 class="card-title">Products Table</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>
                                                @foreach($categories as $category)
                                                    @if($category->id==$product->category_id)
                                                    {{$category->name}}
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                <span>
                                                  <div class="row">
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="deleteProduct({{ $product->id }});" data-toggle="tooltip"
                                                                data-placement="top" title="Delete" class="btn btn-link">
                                                            <i class="fa fa-trash color-danger"></i>
                                                        </button>
                                                    </form>
                                            {{--    Update product--}}
                                                      <!-- Modal toggle -->
                                                        <button data-modal-target="crud-modal-{{ $product->id }}"
                                                                data-modal-toggle="crud-modal-{{ $product->id }}"
                                                                data-placement="top" title="Update" class="btn btn-link">
                                                            <i class="fa fa-pencil-square-o color-danger"></i>
                                                        </button>
                                                  </div>
                                                </span>
                                            </td>
                                    </tr>
                                        <!-- Main modal -->--}}
                                        <div id="crud-modal-{{ $product->id }}" tabindex="-1" aria-hidden="true" class=" bg-gray-300 bg-opacity-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Update Product
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-{{ $product->id }}">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <div class="col-lg-8"> 
                                                        <!-- Modal body -->
                                                        <form class="p-4 md:p-5" action="{{ route('products.update', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <!-- Product name Field -->
                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <label class=" col-form-label" for="name">Product Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>

                                                            </div>
                                                        </div>
                                                        <!-- Price and Quantity Fields -->
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label class="col-form-label" for="price">Price <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label class="col-form-label" for="quantity">Quantity <span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
                                                            </div>
                                                        </div>
                                                        <!-- Category and Image Fields -->
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label class="col-form-label" for="category_id">Category <span class="text-danger">*</span></label>
                                                                <select class="form-control" id="category_id" name="category_id" required>
                                                                    <option value="">Select Category</option>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label class="col-form-label" for="image">Product Image</label>
                                                                <input type="file" class="form-control-file" id="image" name="image">
                                                            </div>
                                                        </div>
                                                        <!-- Description Field -->
                                                        <div class="form-group row">
                                                            <div class="col-lg-12">
                                                                <label class="col-form-label" for="description">Description</label>
                                                                <textarea class="form-control" id="description" name="description" rows="3" > {{ old('description', $product->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- Submit-->
                                                        <div class="form-group row">
                                                            <div class="col-lg-9 offset-lg-3">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- form--}}
                <div class="col-lg-6">
                    @include('Admin/forms/add_product')
                </div>
                {{-- Soldout products --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Trashed Users Table</h4>
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

{{--                                    @foreach($trashedUsers as $trashedUser)--}}
                                        <tr>
{{--                                            <td>{{$trashedUser->name}}</td>--}}
{{--                                            <td>{{$trashedUser->email}}</td>--}}
{{--                                            <td>{{$trashedUser->created_at->format('M d, Y')}}</td>--}}
                                            <td><span class="label gradient-1 btn-rounded">70%</span>
                                            <td>
                                                <span>
{{--                                                    <form action="{{ route('users.restore', $trashedUser->id) }}" method="post">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('PUT')--}}
{{--                                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Restore">--}}
{{--                                                            <i class="fa fa-close color-danger"></i>--}}
{{--                                                        </button>--}}
{{--                                                    </form>--}}

                                                </span>
                                            </td>
                                        </tr>
{{--                                    @endforeach--}}
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

