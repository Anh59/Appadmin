<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <a href="<?= route_to('Table_News') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= route_to('Table_News_Update', $news['id']) ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="image">Hình Ảnh</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="form-group">
                <label for="imagePreview">Xem trước Hình Ảnh</label><br>
                <img id="imagePreview" src="<?= !empty($news['image']) ? base_url($news['image']) : '' ?>" 
                     alt="Image Preview" style="max-width: 200px; <?= !empty($news['image']) ? 'display: block;' : 'display: none;' ?>">
            </div>

            <div class="form-group">
                <label for="title">Tiêu Đề</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= esc($news['title']) ?>" required>
            </div>

            <div class="form-group">
                <label for="content">Nội Dung</label>
                <textarea class="form-control" id="content" name="content" rows="5" required><?= esc($news['content']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="category">Thể Loại</label>
                <input type="text" class="form-control" id="category" name="category" value="<?= esc($news['category']) ?>" required>
            </div>

            <div class="form-group">
                <label for="author_id">Tác Giả</label>
                <input type="text" class="form-control" id="author_id" name="author_id" value="<?= esc($news['author_id']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="<?= route_to('Table_News') ?>" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const output = document.getElementById('imagePreview');
        output.style.display = 'block';
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<?= $this->endSection(); ?>
