

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add product</h4>

        <div class="form-validation">
            <form class="form-valide" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Product name Field -->
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label class=" col-form-label" for="name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter the product name.." required>

                    </div>
                </div>
                <!-- Price and Quantity Fields -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label class="col-form-label" for="price">Price <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Product price.." required>
                    </div>
                    <div class="col-lg-6">
                        <label class="col-form-label" for="quantity">Quantity <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity.." required>
                    </div>
                </div>
                <!-- Category and Image Fields -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label class="col-form-label" for="category_id">Category <span class="text-danger">*</span></label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description.."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

