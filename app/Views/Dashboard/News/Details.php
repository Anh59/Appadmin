<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">  
        <a href="<?= route_to('Table_News') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">
        <!-- Tab Nav -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="news-tab" data-bs-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="true">Thông Tin Bài Viết</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="related-tab" data-bs-toggle="tab" href="#related" role="tab" aria-controls="related" aria-selected="false">Bình Luận</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <!-- Tab for News Info -->
            <div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="news-tab">
                <div class="form-group mt-3">
                    <label>Hình Ảnh:</label><br>
                    <img src="<?= base_url($news['image']) ?>" alt="Image" style="max-width: 300px; border: 1px solid #ddd;">
                </div>
                <div class="form-group">
                    <label>Tiêu Đề:</label>
                    <p><?= esc($news['title']) ?></p>
                </div>
                <div class="form-group">
                    <label>Nội Dung:</label>
                    <p><?= nl2br(esc($news['content'])) ?></p>
                </div>
                <div class="form-group">
                    <label>Thể Loại:</label>
                    <p><?= esc($news['category']) ?></p>
                </div>
                <div class="form-group">
                    <label>Tác Giả:</label>
                    <p><?= esc($news['author_id']) ?></p>
                </div>
            </div>

            <!-- Tab for Comments -->

                <div class="tab-pane fade" id="related" role="tabpanel" aria-labelledby="related-tab">
                    <h3 class="mt-3">Bình Luận</h3>
                    <?php if (!empty($comments)): ?>
                        <ul class="list-group">
                            <?php foreach ($comments as $comment): ?>
                                <li class="list-group-item">
                                    <strong><?= esc($comment['user_name']) ?>:</strong>
                                    <h5><?= esc($comment['title']) ?></h5> <!-- Hiển thị tiêu đề -->
                                    <p><?= nl2br(esc($comment['content'])) ?></p>
                                    <small class="text-muted">Ngày: <?= esc($comment['created_at']) ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Chưa có bình luận nào cho bài viết này.</p>
                    <?php endif; ?>
                </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>
