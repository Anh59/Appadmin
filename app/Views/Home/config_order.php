<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
Thành công
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/head.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/head_responsive.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<?= $this->endSection() ?>

<?= $this->section('Home-content') ?>
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/about_background.jpg'); ?>"></div>
    <div class="home_content">
        <div class="home_title">Thanh Toán chuyến đi</div>
    </div>
</div>
<div class="container text-center mt-5">
    <!-- Success Message with Icon -->
    <div class="alert alert-success" role="alert">
        <div>
            <i class="fas fa-check-circle fa-5x text-success mb-3"></i>
        </div>
        <h4 class="alert-heading">Đặt chuyến thành công!</h4>
        <p>Chúc mừng bạn đã đặt chuyến thành công. Đơn của bạn đang chờ thanh toán. Vui lòng kiểm tra thông tin chi tiết hoặc quay lại trang danh sách chuyến du lịch.</p>
    </div>

    <!-- Action Buttons -->
    <div>
        <a href="<?= route_to('Tour_offers')?>" class="btn btn-primary btn-lg me-2" role="button">
          Danh sách chuyến du lịch
        </a>
        <a href="<?= route_to('detail_order')?>" class="btn btn-secondary btn-lg" role="button">
            Xem chi tiết đơn hàng
        </a>
    </div>
</div>
<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="<?= base_url('Home-css/js/head.js'); ?>"></script>
	<?= $this->endSection(); ?>
