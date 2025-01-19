<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>

<h1>Hồ Sơ Của Tôi</h1>
<p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>

<div class="card-body media align-items-center profile-pic">
    <img id="profile-picture" 
         src="<?= isset($user['image_url']) ?: base_url('uploads/avatar/default-avatar.png') ?>" 
         alt="Profile Picture" 
         class="rounded-circle" 
         style="width: 100px; height: 100px;">
</div>
<hr class="border-light m-0">
<div class="card-body">
    <form id="profile-form">
    
        <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" id="name" class="form-control" value="<?= $user['name'] ?>" disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Phone</label>
            <input type="text" id="phone" class="form-control" value="<?= $user['phone'] ?>" disabled>
        </div>
        <div class="form-group">
            <label class="form-label">Address</label>
            <input type="text" id="address" class="form-control" value="<?= $user['address'] ?>" disabled>
        </div>
        <div class="form-group">
            <label class="form-label">E-mail</label>
            <input type="text" id="email" class="form-control mb-1" value="<?= $user['email'] ?>" disabled>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
