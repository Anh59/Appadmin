<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    
    <!-- Thêm CSS từ giao diện mới -->
    <link rel="stylesheet" href="<?= base_url('css/customers_sign.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <!-- Thêm jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?= view('alerts') ?>

    <div class="container">
      <form id="loginForm">
        <div class="title">Login</div>
        <div class="input-box underline">
          <input type="email" name="email" placeholder="Enter Your Email" required>
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" name="password" placeholder="Enter Your Password" required>
          <div class="underline"></div>
        </div>
        <div class="input-box button action-box">
            <a href="<?= route_to('customes_forgot_password') ?>" class="forgot-password">Forgot password?</a>
            <button type="submit">Continue</button>
        </div>
      </form>   
      <div class="option">Don't have an account? <a href="<?= route_to('Customers_Register') ?>" class="sign-up">Sign Up</a></div>
      <div class="option">or Connect With Social Media</div>

      <div class="google">
        <a href="<?=route_to('google_login')?>"><i class="fab fa-google"></i>Sign in With Google</a>
      </div>
      <div class="facebook">
        <a href="#"><i class="fab fa-facebook-f"></i>Sign in With Facebook</a>
      </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url('api_Customers/customers_sign') ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        // Lưu token vào sessionStorage
                        sessionStorage.setItem('authToken', response.token);

                        showSuccessMessage("Thành công!", response.message);
                        window.location.href = '<?= route_to('Tour_index') ?>';
                    } else {
                        showErrorMessage("Lỗi", response.message);
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
