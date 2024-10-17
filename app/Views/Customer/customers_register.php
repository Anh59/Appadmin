<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/customers_register.css') ?>"> <!-- Link to CSS file -->
    <style>
        /* You can insert additional CSS here if needed */
    </style>
</head>
<body>
    <!-- Include SweetAlert2 functions -->
    <?= view('alerts') ?>

    <div class="container">
        <h2 class="title">Register</h2>
        <!-- Registration Form -->
        <form id="registerForm">
            <div class="input-box">
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="text" name="phone" placeholder="Phone Number" required>
            </div>
            <div class="input-box">
                <input type="text" name="address" placeholder="Address" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="button">
                <button type="submit">Register</button>
            </div>
        </form>

        <!-- OTP Confirmation Form -->
        <div id="otpSection" style="display:none;">
            <h2>OTP Verification</h2>
            <p>We have sent an OTP code to your email. Please enter the code below:</p>
            <form id="otpForm">
                <div class="input-box">
                    <input type="text" name="otp" placeholder="Enter OTP" required>
                    <input type="hidden" name="email"> <!-- Display email here if needed -->
                </div>
                <div class="button">
                    <button type="submit">Confirm OTP</button>
                </div>
            </form>
        </div>

        <!-- Link to Login -->
        <div class="option">
            <p>Already have an account? <a href="<?= route_to('Customers_sign') ?>">Login here</a></p>
        </div>

        <!-- Social Sign-in Options -->
        <div class="google">
            <a href="#"><i class="fab fa-google"></i> Sign in With Google</a>
        </div>
        <div class="facebook">
            <a href="#"><i class="fab fa-facebook-f"></i> Sign in With Facebook</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission for registration
            $('#registerForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('api_Customers/customers_register') ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'success') {
                            showSuccessMessage("Success!", response.message);
                            $('#registerForm').hide();
                            $('#otpSection').show();
                            $('#otpForm [name="email"]').val(response.email);
                        } else {
                            var errors = response.errors;
                            var errorMessages = "";
                            for (var key in errors) {
                                errorMessages += errors[key];
                            }
                            showErrorMessage("Error", errorMessages);
                        }
                    },
                    error: function() {
                        showErrorMessage("Error", 'An error occurred during processing');
                    }
                });
            });

            // Handle form submission for OTP verification
            $('#otpForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('api_Customers/customers_verify_otp') ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'success') {
                            showSuccessMessage("Success!", 'Your account has been verified.');
                            window.location.href = '<?= base_url('api_Customers/customers_sign') ?>';
                        } else {
                            showErrorMessage("Error", response.message || 'OTP verification failed');
                        }
                    },
                    error: function() {
                        showErrorMessage("Error", 'An error occurred during processing');
                    }
                });
            });
        });
    </script>
</body>
</html>
