<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>

<!-- resources/views/customer/change_personal_info.php -->

<div class="container">
    <h2>Thay đổi thông tin cá nhân</h2>
    <form action="<?= route_to('updatePersonalInfo') ?>" method="post">
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= esc($customer['name']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($customer['email']) ?>" required>
            <input type="hidden" name="old_email" value="<?= esc($customer['email']) ?>">
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?= esc($customer['phone']) ?>" required>
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= esc($customer['address']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
    </form>
</div>


<?= $this->endSection(); ?>
<script>
    $(document).ready(function () {
        $('#email').on('blur', function () {
            var newEmail = $('#email').val();
            var oldEmail = $('input[name="old_email"]').val();

            if (newEmail !== oldEmail) {
                $.ajax({
                    url: '<?= route_to("updatePersonalInfo") ?>',
                    type: 'POST',
                    data: { email: newEmail, old_email: oldEmail },
                    success: function (response) {
                        if (response.status === 'error') {
                            alert(response.message); // Thông báo lỗi nếu email đã được đăng ký
                        } else if (response.status === 'success') {
                            alert(response.message); // Thông báo yêu cầu kiểm tra email
                        }
                    },
                    error: function () {
                        alert("Có lỗi xảy ra. Vui lòng thử lại.");
                    }
                });
            }
        });
    });
</script>
