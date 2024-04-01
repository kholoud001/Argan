

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add user</h4>

                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('users.store') }}" method="post">
                            @csrf
                            <!-- Form Fields -->
                            <!-- Username Field -->
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="name">Username <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-username" name="name" placeholder="Enter a username..">
                                </div>
                            </div>
                            <!-- Email Field -->
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="val-email" name="email" placeholder="Your valid email..">
                                </div>
                            </div>
                            <!-- Password Field -->
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="password">Password <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one..">
                                </div>
                            </div>
                            <!-- Confirm Password Field -->
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="val-confirm-password" name="password_confirmation" placeholder="..and confirm it!">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

