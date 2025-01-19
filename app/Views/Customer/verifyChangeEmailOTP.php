<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h2>Xác nhận OTP</h2>
    <p>Chúng tôi đã gửi mã OTP đến email: <strong><?= session()->get('pending_email') ?></strong>.</p>

    <form action="<?= route_to('handleVerifyChangeEmailOTP') ?>" method="post">
        <div class="form-group">
            <label for="otp">Nhập mã OTP</label>
            <input type="text" class="form-control" id="otp" name="otp" required>
        </div>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>


</div>

<?= $this->endSection(); ?>
