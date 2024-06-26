<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <small>Subscribe Total User:</small>
                <small class="px-1"><span id="currentUser"></span>/ <span id="totalUsers"></span></small>
                <div class="progress progress-sm ml-3 mb-1 mx-1 mt-2" style="width: 60%;">
                    <div id="progressBar" class="progress-bar bg-success" role="progressbar" aria-valuenow="0"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <div class="template-demo mb-1 mt-4">

                <div id="formDiv">

                    <!-- Additional content within the first div -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" id="form-title">Add User</h4>

                            <form method="post" id="add_user_form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="mdi mdi-account-box"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="name" id="itemName" placeholder="Enter Your Name" aria-label="Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="itemEmail" placeholder="Enter Your Email Address" aria-label="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="mdi mdi-undo-variant"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="itemPassword" placeholder="Enter Your Password" aria-label="Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="mdi mdi-phone-settings"></i></span>
                                        </div>
                                        <input type="number" class="form-control" name="phone" id="itemMobile" placeholder="Mobile Number" aria-label="Mobile Number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="itemProfilePhoto">Profile Photo</label>
                                    <input type="file" class="form-control" name="profile_pic" id="itemProfilePhoto" accept="image/*" aria-label="Profile Photo">
                                </div>
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                            </form>

                        </div>
                    </div>

                </div>

                <div id="contentDiv" style="display: none;">
                    <!-- Content to show when progress reaches 100% -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Activites</h4>
                            <ul class="bullet-line-list mt-5">
                                <li>
                                    <h6>User confirmation</h6>
                                    <p>Lorem Ipsum is simply dummy text of the
                                        printing </p>
                                    <p class="text-muted mb-4">
                                        <i class="mdi mdi-clock-outline"></i>
                                        7 months ago.
                                    </p>
                                </li>
                                <li>
                                    <h6>Continuous evaluation</h6>
                                    <p>Lorem Ipsum is simply dummy text of the
                                        printing </p>
                                    <p class="text-muted mb-4">
                                        <i class="mdi mdi-clock-outline"></i>
                                        7 months ago.
                                    </p>
                                </li>
                                <li>
                                    <h6>Promotion</h6>
                                    <p>Lorem Ipsum is simply dummy text of the
                                        printing </p>
                                    <p class="text-muted">
                                        <i class="mdi mdi-clock-outline"></i>
                                        7 months ago.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>


            <!-- HTML -->

        </div>
    </div>
</div>
