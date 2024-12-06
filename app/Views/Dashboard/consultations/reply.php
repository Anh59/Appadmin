<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1><?= $pageTitle ?></h1>

<div class="card">
    <div class="card-body">
        <h4>Thông Tin Khách Hàng</h4>
        <p><strong>Tên:</strong> <?= esc($consultation['name']) ?></p>
        <p><strong>Email:</strong> <?= esc($consultation['email']) ?></p>
        <p><strong>Nội dung tư vấn:</strong> <?= esc($consultation['message']) ?></p>
    </div>
</div>

<!-- Form trả lời -->
<form action="<?= route_to('Table_Consultations_Send_Reply', $consultation['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="subject">Tiêu đề</label>
        <input type="text" name="subject" class="form-control" id="subject" required>
    </div>
    <div class="form-group">
        <label for="reply_message">Phản hồi</label>
        <textarea name="reply_message" class="form-control" id="reply_message" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Gửi Phản Hồi</button>
</form>

<!-- Hiển thị các phản hồi trước đó -->
<h3>Các phản hồi trước:</h3>
<?php foreach ($replies as $reply): ?>
    <div class="reply">
        <strong>Nhân viên <?= $reply['username'] ?>:</strong>
        <p><?= $reply['reply_message'] ?></p>
        <small>Ngày: <?= $reply['created_at'] ?></small>
        <hr>
    </div>
<?php endforeach; ?>


<?= $this->endSection(); ?>
