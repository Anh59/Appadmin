<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <!-- Tiêu đề trang -->
    <h1 class="text-center mb-4"><?= $pageTitle ?></h1>

    <!-- Card thông tin khách hàng -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Thông Tin Khách Hàng</h4>
        </div>
        <div class="card-body">
            <p><strong>Tên:</strong> <?= esc($consultation['name']) ?></p>
            <p><strong>Email:</strong> <?= esc($consultation['email']) ?></p>
            <p><strong>Nội dung tư vấn:</strong> <?= nl2br(esc($consultation['message'])) ?></p>
        </div>
    </div>

    <!-- Bố cục 2 cột -->
    <div class="row">
        <!-- Cột trái: Danh sách phản hồi -->
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h4 class="mb-0">Các Phản Hồi Trước</h4>
                </div>
                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                    <?php if (!empty($replies)): ?>
                        <?php foreach ($replies as $reply): ?>
                            <div class="reply mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong>Nhân viên: <?= esc($reply['username']) ?></strong>
                                    <small class="text-muted">Ngày: <?= date('d-m-Y H:i', strtotime($reply['created_at'])) ?></small>
                                </div>
                                <p class="mt-2"><?= nl2br(esc($reply['reply_message'])) ?></p>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info">Chưa có phản hồi nào.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Cột phải: Form trả lời -->
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Phản Hồi Tư Vấn</h4>
                </div>
                <div class="card-body">
                    <form action="<?= route_to('Table_Consultations_Send_Reply', $consultation['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group mb-3">
                            <label for="subject" class="form-label">Tiêu đề</label>
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Nhập tiêu đề" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="reply_message" class="form-label">Phản hồi</label>
                            <textarea name="reply_message" class="form-control" id="reply_message" rows="5" placeholder="Nhập nội dung phản hồi" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Gửi Phản Hồi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
