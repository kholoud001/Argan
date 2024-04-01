

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add category</h4>

        <div class="form-validation">
            <form class="form-valide" action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Category name Field -->
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label" for="name">Category Name <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter the category.." required>
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

