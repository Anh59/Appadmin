<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
Thành công
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/head.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/head_responsive.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('css/customers_sign.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('Home-content') ?>
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/about_background.jpg'); ?>"></div>
    <div class="home_content">
        <div class="home_title">Đăng nhập</div>
    </div>
</div>
<?= view('alerts') ?>
<div class="center">
<div class="container1">
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
            <a style="color: #007bff;" href="<?= route_to('customes_forgot_password') ?>" class="forgot-password">Forgot password?</a>
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
</div>


<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	<script src="<?= base_url('Home-css/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
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
	<script src="<?= base_url('Home-css/js/head.js'); ?>"></script>
	<?= $this->endSection(); ?>
