<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>



<form action="<?= route_to('Table_Transports_Update', $transport['id']) ?>" method="POST">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Tên Phương Tiện</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= esc($transport['name']) ?>" required>
    </div>

    <div class="form-group">
        <label for="driver_name">Tên Tài Xế</label>
        <input type="text" name="driver_name" id="driver_name" class="form-control" value="<?= esc($transport['driver_name']) ?>" required>
    </div>

    <div class="form-group">
        <label for="vehicle_number">Biển Số Xe</label>
        <input type="text" name="vehicle_number" id="vehicle_number" class="form-control" value="<?= esc($transport['vehicle_number']) ?>" required>
    </div>

    <div class="form-group">
  <label for="type">Loại</label>
  <select name="type" id="type" class="form-control" required>
    <option value="ô tô" <?= $transport['type'] == 'ô tô' ? 'selected' : '' ?>>Ô Tô</option>
    <option value="xe khách" <?= $transport['type'] == 'xe khách' ? 'selected' : '' ?>>Xe Khách</option>
    <option value="máy bay" <?= $transport['type'] == 'máy bay' ? 'selected' : '' ?>>Máy Bay</option>
    <option value="tàu thủy" <?= $transport['type'] == 'tàu thủy' ? 'selected' : '' ?>>Tàu Thủy</option>
  </select>
</div>


    <button type="submit" class="btn btn-primary">Cập Nhật</button>
    <a href="<?= route_to('Table_Transports') ?>" class="btn btn-secondary">Hủy</a>
</form>

<?= $this->endSection(); ?>
