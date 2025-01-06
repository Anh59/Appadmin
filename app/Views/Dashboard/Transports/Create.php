<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <a href="<?= route_to('Table_Transports') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= route_to('Table_Transports_Store') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="name">Tên Phương Tiện</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="driver_name">Tên Tài Xế</label>
                <input type="text" name="driver_name" id="driver_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="vehicle_number">Biển Số Xe</label>
                <input type="text" name="vehicle_number" id="vehicle_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="type">Loại</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="">Chọn loại phương tiện</option>
                    <option value="xe khách">Xe Khách</option>
                    <option value="ô tô">Xe Ô Tô</option>
                    <option value="máy bay">Máy Bay</option>
                    <option value="tàu thủy">Tàu Thủy</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="<?= route_to('Table_Transports') ?>" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
