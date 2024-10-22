<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Chỉnh Sửa Khách Hàng</h1>

<form action="<?= route_to('Table_Customers_Update', $customer['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Tên</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $customer['name'] ?>" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $customer['email'] ?>" required>
    </div>

    <div class="form-group">
        <label for="phone">Số Điện Thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?= $customer['phone'] ?>" required>
    </div>

    <div class="form-group">
        <label for="address">Địa Chỉ</label>
        <input type="text" class="form-control" id="address" name="address" value="<?= $customer['address'] ?>">
    </div>

    <button type="submit" class="btn btn-primary">Lưu Lại</button>
</form>

<?= $this->endSection(); ?>
