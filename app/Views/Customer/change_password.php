<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>

<h1>Thay đổi mật khẩu</h1>
<div>
    <!-- Thông báo lỗi -->


    <!-- Form thay đổi mật khẩu -->
    <form action="<?= route_to('changePassword') ?>" method="post" onsubmit="return validatePassword()">
        <div class="form-group">
            <label class="form-label">Mật khẩu cũ</label>
            <div class="input-group">
                <input type="password" class="form-control" name="current_password" placeholder="Mật khẩu cũ" id="current_password" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('current_password', this)">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Mật khẩu mới</label>
            <div class="input-group">
                <input type="password" class="form-control" name="new_password" placeholder="Mật khẩu mới" id="new_password" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('new_password', this)">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
            <small id="passwordHelp" class="form-text text-muted">
                Mật khẩu phải ít nhất 8 ký tự, có chữ cái, số và 1 ký tự đặc biệt.
            </small>
        </div>
        <div class="form-group">
            <label class="form-label">Nhập lại mật khẩu mới</label>
            <div class="input-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu mới" id="confirm_password" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('confirm_password', this)">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Xác nhận</button>
    </form>
</div>

<script>
    // Hiển thị hoặc ẩn mật khẩu
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Tự động ẩn thông báo sau 10 giây
    // document.addEventListener('DOMContentLoaded', () => {
    //     const errorAlert = document.getElementById('alert-message-error');
    //     const successAlert = document.getElementById('alert-message-success');

    //     if (errorAlert) {
    //         setTimeout(() => {
    //             errorAlert.classList.add('fade-out');
    //             setTimeout(() => errorAlert.remove(), 500); // Xóa hẳn sau hiệu ứng
    //         }, 10000); // 10 giây
    //     }

    //     if (successAlert) {
    //         setTimeout(() => {
    //             successAlert.classList.add('fade-out');
    //             setTimeout(() => successAlert.remove(), 500); // Xóa hẳn sau hiệu ứng
    //         }, 10000); // 10 giây
    //     }
    // });

    // Kiểm tra mật khẩu hợp lệ
    function validatePassword() {
        const password = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordPattern.test(password)) {
            alert('Mật khẩu mới không hợp lệ! Phải ít nhất 8 ký tự, bao gồm chữ cái, số và ký tự đặc biệt.');
            return false;
        }

        if (password !== confirmPassword) {
            alert('Mật khẩu mới và mật khẩu xác nhận không khớp!');
            return false;
        }

        return true;
    }
</script>

<style>
    /* Hiệu ứng mờ dần trước khi xóa */
    .fade-out {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }
</style>

<?= $this->endSection(); ?>
