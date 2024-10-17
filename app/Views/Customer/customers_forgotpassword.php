<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/customers_register.css') ?>"> <!-- Đường dẫn đến file CSS -->
</head>
<body>
    <!-- Bao gồm các hàm SweetAlert2 -->
    <?= view('alerts') ?>

    <div class="container">
        <h2 class="title">Quên Mật Khẩu</h2>
        
        <!-- Form nhập email -->
        <form id="emailForm">
            <div class="input-box">
                <input type="email" name="email" placeholder="Nhập Email của bạn" required>
            </div>
            <div class="button">
                <button type="submit">Gửi OTP</button>
            </div>
        </form>

        <!-- Form xác nhận OTP -->
        <div id="otpSection" style="display:none;">
            <h2>Xác thực OTP</h2>
            <p>Chúng tôi đã gửi mã OTP đến email của bạn. Vui lòng nhập mã bên dưới:</p>
            <form id="otpForm">
                <div class="input-box">
                    <input type="text" name="otp" placeholder="Nhập OTP" required>
                    <input type="hidden" name="email"> <!-- Đảm bảo email được điền đúng -->
                </div>
                <div class="button">
                    <button type="submit">Xác nhận OTP</button>
                </div>
            </form>
        </div>

        <!-- Form tạo mật khẩu mới -->
        <div id="resetPasswordSection" style="display:none;">
            <h2>Tạo Mật Khẩu Mới</h2>
            <form id="resetPasswordForm">
                <div class="input-box">
                    <input type="password" name="new_password" placeholder="Mật khẩu mới" required>
                </div>
                <div class="input-box">
                    <input type="password" name="confirm_password" placeholder="Xác nhận mật khẩu mới" required>
                </div>
                <input type="hidden" name="email"> <!-- Chứa email được xác nhận từ OTP -->
                <div class="button">
                    <button type="submit">Đặt Lại Mật Khẩu</button>
                </div>
            </form>
</div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Xử lý khi form nhập email được submit
            $('#emailForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= route_to('Customers_processForgotPassword') ?>', // URL xử lý gửi OTP
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'success') {
                            showSuccessMessage("Thành công!", response.message);
                            $('#emailForm').hide();
                            $('#otpSection').show();
                            $('#otpForm [name="email"]').val(response.email);
                        } else {
                            showErrorMessage("Lỗi", response.message || 'Không thể gửi OTP');
                        }
                    },
                    error: function() {
                        showErrorMessage("Lỗi", 'Xảy ra lỗi trong quá trình xử lý');
                    }   
                });
            });

            // Xử lý khi form OTP được submit
            $('#otpForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= route_to('Customers_processPassVerifyOTP') ?>', // URL xử lý xác thực OTP
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'success') {
                            showSuccessMessage("Thành công!", 'OTP đã được xác thực.');
                            $('#otpSection').hide();
                            $('#resetPasswordSection').show();
                            $('#resetPasswordForm [name="email"]').val(response.email);
                        } else {
                            showErrorMessage("Lỗi", response.message || 'Xác thực OTP thất bại');
                        }
                    },
                    error: function() {
                        showErrorMessage("Lỗi", 'Xảy ra lỗi trong quá trình xử lý');
                    }
                });
            });

            // Xử lý khi form đặt lại mật khẩu được submit
            $('#resetPasswordForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= route_to('Customes_resetPassword') ?>', // URL xử lý đặt lại mật khẩu
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status === 'success') {
                            showSuccessMessage("Thành công!", 'Mật khẩu đã được đặt lại.');
                            // Điều hướng đến trang đăng nhập hoặc trang khác nếu cần
                            window.location.href = '<?= base_url('api_Customers/customers_sign') ?>';
                        } else {
                            showErrorMessage("Lỗi", response.message || 'Không thể đặt lại mật khẩu');
                        }
                    },
                    error: function() {
                        showErrorMessage("Lỗi", 'Xảy ra lỗi trong quá trình xử lý');
                    }
                });
            });
        });
    </script>
</body>
</html>
