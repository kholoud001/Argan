

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add product</h4>

        <div class="form-validation">
            <form class="form-valide" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Product name Field -->
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="name">Product Name <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter the product name.." required>
                    </div>
                </div>
                <!-- Description Field -->
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="description">Description</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description.."></textarea>
                    </div>
                </div>
                <!-- Price -->
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="price">Price <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Product price.." required>
                    </div>
                </div>
                <!-- Stock Field -->
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="quantity">Quantity <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity.." required>
                    </div>
                </div>
                <!-- Photo product -->
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="image">Product Image</label>
                    <div class="col-lg-9">
                        <input type="file" class="form-control-file" id="image" name="image">
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

