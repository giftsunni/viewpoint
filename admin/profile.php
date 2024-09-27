<?php require './head.php' ?>

<body>
    <?php require './sidebar.php' ?>

    <main class="dashboard-main">
        <?php require './header.php' ?>

        <div class="dashboard-main-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">View Profile</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">View Profile</li>
                </ul>
            </div>
            <?php


            $query = "SELECT * FROM admin";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $admin = $result->fetch_assoc();
            } else {
                echo "No user found.";
                exit();
            }
            ?>

            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                        <img src="assets/images/user-grid/user-grid-bg1.png" alt="" class="w-100 object-fit-cover">
                        <div class="pb-24 ms-16 mb-24 me-16 mt--100">
                            <div class="text-center border border-top-0 border-start-0 border-end-0">
                                <img src="./uploads//1720815634Sample_User_Icon.png" alt="" class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                                <h6 class="mb-0 mt-16"><?php echo $admin['username']; ?></h6>
                                <span class="text-secondary-light mb-16"><?php echo $admin['email']; ?></span>
                            </div>
                            <div class="mt-24">
                                <h6 class="text-xl mb-16">Personal Info</h6>
                                <ul>
                                    <li class="d-flex align-items-center gap-1 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Full Name</span>
                                        <span class="w-70 text-secondary-light fw-medium">: <?php echo $admin['username']; ?></span>
                                    </li>
                                    <li class="d-flex align-items-center gap-1 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Email</span>
                                        <span class="w-70 text-secondary-light fw-medium">: <?php echo $admin['email']; ?></span>
                                    </li>
                                    <li class="d-flex align-items-center gap-1 mb-12">
                                        <span class="w-30 text-md fw-semibold text-primary-light">Number</span>
                                        <span class="w-70 text-secondary-light fw-medium">: <?php echo $admin['phone']; ?></span>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card h-100">
                        <div class="card-body p-24">
                            <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">

                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Edit Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-change-password-tab" data-toggle="pill" href="#pills-change-password" role="tab" aria-controls="pills-change-password" aria-selected="false">Change Password</a>
                                    </li>
                                </ul>
                             
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                    <h6 class="text-md text-primary-light mb-16">Profile Image</h6>
                                    <!-- Upload Image Start -->
                                    <div class="mb-24 mt-16">
                                        <div class="avatar-upload">
                                            <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                                <label for="imageUpload" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                    <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                                </label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php require './successerror.php' ?>
                                    <!-- Upload Image End -->
                                    <?php
                                    // Example: Fetch the user data from the database (assuming the user ID is known)
                                    $admin = $_SESSION['admin']; // You can get the user ID from the session or other source
                                    $query = "SELECT * FROM admin WHERE id = '$admin'";
                                    $result = mysqli_query($conn, $query);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $user = mysqli_fetch_assoc($result);
                                    } else {
                                        echo "User not found.";
                                        exit;
                                    }
                                    ?>
                                </div>
                                <form action="profiledit" method="post" id="editForm" enctype="multipart/form-data">
                                    <!-- Profile Update Section -->
                                    <div class="container mt-5">
                                        <!-- Nav tabs -->


                                        <!-- Tab panes -->
                                        <div class="tab-content" id="pills-tabContent">
                                            <!-- Edit Profile Tab -->
                                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <form action="profiledit" method="post" id="editForm" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-20">
                                                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name <span class="text-danger-600">*</span></label>
                                                                <input type="text" class="form-control radius-8" name="username" id="name" value="<?= htmlspecialchars($user['username']); ?>" placeholder="Enter Full Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-20">
                                                                <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                                                                <input type="email" name="email" class="form-control radius-8" id="email" value="<?= htmlspecialchars($user['email']); ?>" placeholder="Enter email address">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="mb-20">
                                                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone Number</label>
                                                                <input type="tel" name="phone" class="form-control radius-8" id="number" value="<?= htmlspecialchars($user['phone']); ?>" placeholder="Enter phone number">
                                                            </div>
                                                        </div>
                                                     
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                                        <input type="hidden" name="action" value="update_profile">
                                                        <button type="button" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8" id="cancelBtn">Cancel</button>
                                                        <button type="submit" name="submit" id="saveBtn" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">Save</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Change Password Tab -->
                                            <div class="tab-pane fade" id="pills-change-password" role="tabpanel" aria-labelledby="pills-change-password-tab">
                                                <form action="profiledit" method="post" id="changePasswordForm">
                                                    <div class="mb-20">
                                                        <label for="your-password" class="form-label fw-semibold text-primary-light text-sm mb-8">New Password <span class="text-danger-600">*</span></label>
                                                        <div class="position-relative">
                                                            <input type="password" name="newpass" class="form-control radius-8" id="your-password" placeholder="Enter New Password*">
                                                            <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-20">
                                                        <label for="confirm-password" class="form-label fw-semibold text-primary-light text-sm mb-8">Confirm Password <span class="text-danger-600">*</span></label>
                                                        <div class="position-relative">
                                                            <input type="password" name="compass" class="form-control radius-8" id="confirm-password" placeholder="Confirm Password*">
                                                            <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#confirm-password"></span>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="action" value="change_password">
                                                    <button type="submit" name="submit" id="changePasswordBtn" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">Change Password</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bootstrap JS and dependencies -->
                                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const saveBtn = document.getElementById('saveBtn');
                                            const changePasswordBtn = document.getElementById('changePasswordBtn');
                                            const profileInputs = document.querySelectorAll('#pills-profile input');
                                            const passwordInputs = document.querySelectorAll('#pills-change-password input');

                                            function toggleButtonState() {
                                                // Check profile inputs
                                                const isProfileValid = Array.from(profileInputs).every(input => input.value.trim() !== '');
                                                saveBtn.disabled = !isProfileValid;

                                                // Check password inputs
                                                const newPassword = document.querySelector('#your-password').value.trim();
                                                const confirmPassword = document.querySelector('#confirm-password').value.trim();
                                                const isPasswordValid = newPassword && confirmPassword;
                                                changePasswordBtn.disabled = !isPasswordValid;
                                            }

                                            // Add event listeners to all inputs
                                            profileInputs.forEach(input => input.addEventListener('input', toggleButtonState));
                                            passwordInputs.forEach(input => input.addEventListener('input', toggleButtonState));

                                            // Initial check
                                            toggleButtonState();
                                        });
                                    </script>



                                    <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab" tabindex="0">
                                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                            <label for="companzNew" class="position-absolute w-100 h-100 start-0 top-0"></label>
                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Company News</span>
                                                <input class="form-check-input" type="checkbox" role="switch" id="companzNew">
                                            </div>
                                        </div>
                                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                            <label for="pushNotifcation" class="position-absolute w-100 h-100 start-0 top-0"></label>
                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Push Notification</span>
                                                <input class="form-check-input" type="checkbox" role="switch" id="pushNotifcation" checked>
                                            </div>
                                        </div>
                                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                            <label for="weeklyLetters" class="position-absolute w-100 h-100 start-0 top-0"></label>
                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Weekly News Letters</span>
                                                <input class="form-check-input" type="checkbox" role="switch" id="weeklyLetters" checked>
                                            </div>
                                        </div>
                                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                            <label for="meetUp" class="position-absolute w-100 h-100 start-0 top-0"></label>
                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Meetups Near you</span>
                                                <input class="form-check-input" type="checkbox" role="switch" id="meetUp">
                                            </div>
                                        </div>
                                        <div class="form-switch switch-primary py-12 px-16 border radius-8 position-relative mb-16">
                                            <label for="orderNotification" class="position-absolute w-100 h-100 start-0 top-0"></label>
                                            <div class="d-flex align-items-center gap-3 justify-content-between">
                                                <span class="form-check-label line-height-1 fw-medium text-secondary-light">Orders Notifications</span>
                                                <input class="form-check-input" type="checkbox" role="switch" id="orderNotification" checked>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <?php require '../admin/footer.php' ?>
    </main>

    <?php require '../admin/scripts.php' ?>

    <script>
        // ======================== Upload Image Start =====================
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
        // ======================== Upload Image End =====================

        // ================== Password Show Hide Js Start ==========
        function initializePasswordToggle(toggleSelector) {
            $(toggleSelector).on('click', function() {
                $(this).toggleClass("ri-eye-off-line");
                var input = $($(this).attr("data-toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }
        // Call the function
        initializePasswordToggle('.toggle-password');
        // ========================= Password Show Hide Js End ===========================
        document.addEventListener('DOMContentLoaded', function() {
            const newPasswordInput = document.getElementById('new-password');
            const confirmPasswordInput = document.getElementById('confirm-password');
            const submitButton = document.getElementById('changePasswordBtn');

            // Function to check if the input fields are empty
            function checkInputs() {
                if (newPasswordInput.value.trim() !== '' && confirmPasswordInput.value.trim() !== '') {
                    submitButton.disabled = false; // Enable the button
                } else {
                    submitButton.disabled = true; // Disable the button
                }
            }

            // Add event listeners to check inputs on change
            newPasswordInput.addEventListener('input', checkInputs);
            confirmPasswordInput.addEventListener('input', checkInputs);
        });
    </script>

</body>

</html>