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
<?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" id="alert-message-error">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Thông báo thành công -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" id="alert-message-success">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container my-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
            <div class="card">
        <div class="card-body text-center">
            <!-- Hiển thị avatar người dùng -->
            <img 
                src="<?= session('customer_avatar') ?: base_url('uploads/avatar/default-avatar.png') ?>" 
                alt="User profile picture" 
                class="rounded-circle mb-3" 
                width="80" 
                height="80">
            
            <!-- Hiển thị tên người dùng -->
            <h5 class="card-title"><?= esc(session('customer_name')) ?></h5>
        </div>
        </div>

                <div class="list-group mt-3">
                    <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#personal-info">
                        <i class="fas fa-user me-2"></i>Thông tin cá nhân <i class="fas fa-chevron-down float-end"></i>
                    </a>
                    <div class="collapse" id="personal-info">
                        <a href="<?= route_to('personal') ?>" class="list-group-item list-group-item-action">Hồ Sơ Của Tôi</a>
                        <a href="<?= route_to('change_password') ?>" class="list-group-item list-group-item-action">Thay đổi mật khẩu</a>
                        <a href="<?= route_to('changePersonalInfo') ?>" class="list-group-item list-group-item-action">Thay đổi thông tin cá nhân</a>
                        
                    </div>
                    <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#orders">
                        <i class="fas fa-shopping-cart me-2"></i>Đơn hàng của bạn <i class="fas fa-chevron-down float-end"></i>
                    </a>
                    <div class="collapse" id="orders">
                        <a href="<?= route_to('order') ?>" class="list-group-item list-group-item-action">Đơn Hàng Của Bạn</a>
                        <a href="<?= route_to('history_order') ?>" class="list-group-item list-group-item-action">Lịch sử đặt hàng </a>
                        <a href="<?= route_to('profile/review') ?>" class="list-group-item list-group-item-action">Đánh giá </a>
                        <a href="<?= route_to('profile/consultation') ?>" class="list-group-item list-group-item-action">Tư vấn</a>
                    </div>
                    <a href="<?= route_to('Customers_logout') ?>" class="list-group-item list-group-item-action">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Đăng xuất
                    </a>
                </div>
            </div>
            <!-- Content -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	<script src="<?= base_url('Home-css/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
	<script>
      document.addEventListener('DOMContentLoaded', () => {
        const errorAlert = document.getElementById('alert-message-error');
        const successAlert = document.getElementById('alert-message-success');

        if (errorAlert) {
            setTimeout(() => {
                errorAlert.classList.add('fade-out');
                setTimeout(() => errorAlert.remove(), 500); // Xóa hẳn sau hiệu ứng
            }, 10000); // 10 giây
        }

        if (successAlert) {
            setTimeout(() => {
                successAlert.classList.add('fade-out');
                setTimeout(() => successAlert.remove(), 500); // Xóa hẳn sau hiệu ứng
            }, 10000); // 10 giây
        }
    });
</script>
	<script src="<?= base_url('Home-css/js/head.js'); ?>"></script>
	<?= $this->endSection(); ?>
