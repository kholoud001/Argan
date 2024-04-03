

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add Blog Post</h4>

        <div class="form-validation">
            <form class="form-valide" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Post Title Field -->
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label class=" col-form-label" for="name">Post Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter the post title.." required>

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
                        <label class="col-form-label" for="image">Post Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                </div>
                <!-- Content Field -->
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label class="col-form-label" for="content">Description</label>
                        <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter Post content.."></textarea>
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

