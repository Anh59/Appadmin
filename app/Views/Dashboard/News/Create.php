<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_News_Store') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="image">Hình Ảnh</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)" required>
    </div>

    <div class="form-group">
        <label for="imagePreview">Xem trước Hình Ảnh</label><br>
        <img id="imagePreview" src="" alt="Image Preview" style="max-width: 200px; display: none;">
    </div>

    <div class="form-group">
        <label for="title">Tiêu Đề</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="content">Nội Dung</label>
        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
    </div>

    <div class="form-group">
        <label for="category">Thể Loại</label>
        <input type="text" name="category" id="category" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="author_id">Tác Giả</label>
        <input type="text" name="author_id" id="author_id" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="<?= route_to('Table_News') ?>" class="btn btn-secondary">Hủy</a>
</form>

<script>
    function previewImage(event) {
        const output = document.getElementById('imagePreview');
        output.style.display = 'block';  // Show the image preview
        output.src = URL.createObjectURL(event.target.files[0]);  // Set the image source to the selected file
    }
</script>

<?= $this->endSection(); ?>
