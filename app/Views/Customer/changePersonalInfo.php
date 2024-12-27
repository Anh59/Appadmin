<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <h2>Thay đổi thông tin cá nhân</h2>
    <form action="<?= route_to('updatePersonalInfo') ?>" method="post" enctype="multipart/form-data">
        <!-- Ảnh người dùng -->
        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <div class="mb-2">
                <img src="<?= esc($customer['image_url'] ?: base_url('uploads/avatar/default-avatar.png')) ?>" alt="Avatar" class="rounded-circle" width="150" height="150" id="previewImage">
            </div>
            <button type="button" class="btn btn-danger btn-sm" id="resetImage">Reset ảnh</button>
            <input type="file" class="form-control d-none" id="image" name="image" accept="image/*">
        </div>

        <!-- Tên -->
        <div class="form-group">
            <label for="name">Tên <i class="fa fa-edit text-primary edit-icon" id="editName" style="cursor: pointer;"></i></label>
            <input type="text" class="form-control" id="name" name="name" value="<?= esc($customer['name']) ?>" readonly>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email <i class="fa fa-edit text-primary edit-icon" id="editEmail" style="cursor: pointer;"></i></label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($customer['email']) ?>" readonly>
            <input type="hidden" name="old_email" value="<?= esc($customer['email']) ?>">
        </div>

        <!-- Số điện thoại -->
        <div class="form-group">
            <label for="phone">Số điện thoại <i class="fa fa-edit text-primary edit-icon" id="editPhone" style="cursor: pointer;"></i></label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= esc($customer['phone']) ?>" readonly>
        </div>

        <!-- Địa chỉ -->
        <div class="form-group">
            <label for="address">Địa chỉ <i class="fa fa-edit text-primary edit-icon" id="editAddress" style="cursor: pointer;"></i></label>
            <input type="text" class="form-control" id="address" name="address" value="<?= esc($customer['address']) ?>" readonly>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Lưu thay đổi</button>
    </form>
</div>

<script>
    // Kích hoạt chỉnh sửa các trường
    document.querySelectorAll('.edit-icon').forEach(icon => {
        icon.addEventListener('click', function () {
            const input = document.getElementById(this.id.replace('edit', '').toLowerCase());
            input.removeAttribute('readonly');
            input.focus();
        });
    });

    // Reset ảnh người dùng
    const resetButton = document.getElementById('resetImage');
    resetButton.addEventListener('click', function () {
        document.getElementById('image').click();
    });

    const imageInput = document.getElementById('image');
    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('previewImage').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<?= $this->endSection(); ?>
