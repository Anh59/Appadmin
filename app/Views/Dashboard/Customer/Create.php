<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Thêm Khách Hàng</h1>

<form action="<?= route_to('Table_Customers_Store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Tên</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="phone">Số Điện Thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>

    <div class="form-group">
        <label for="address">Địa Chỉ</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>

    <button type="submit" class="btn btn-primary">Tạo</button>
</form>

<?= $this->endSection(); ?>
