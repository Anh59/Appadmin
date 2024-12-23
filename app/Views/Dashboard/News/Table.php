<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_News_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success" title="Thêm Bài Viết">
        <i class="fas fa-plus">Thêm Bài Viết</i>
    </button>
</form>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hình Ảnh</th>
            <th>Tiêu Đề</th>
            <th>Nội Dung</th>
            <th>Thể loại</th>
            <th>Tác Giả</th>
            <th>Số Lượng Bình Luận</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($news as $item): ?>  
    <tr>
        <td><?= $item['id'] ?></td>
        <td>
            <?php if (!empty($item['image'])): ?>
                <img src="<?= base_url($item['image']) ?>" alt="Hình Ảnh" style="width: 100px; height: auto;">
            <?php else: ?>
                Không có hình ảnh
            <?php endif; ?>
        </td>
        <td><?= $item['title'] ?></td>
        <td>
            <?php if (strlen($item['content']) > 200): ?>
                <?= substr($item['content'], 0, 200) ?>...
            <?php else: ?>
                <?= $item['content'] ?>
            <?php endif; ?>
        </td>
        <td><?= $item['category'] ?></td>
        <td><?= $item['author_id'] ?></td>
        <td><?= $item['comments_count'] ?></td> <!-- Hiển thị tổng số bình luận -->
        <td> 
            <a href="<?= route_to('Table_News_Detail', $item['id']) ?>" class="btn btn-info" title="Chi Tiết">
                <i class="fas fa-info-circle"></i>
            </a>
            <a href="<?= route_to('Table_News_Edit', $item['id']) ?>" class="btn btn-primary" title="Sửa">
                <i class="fas fa-edit"></i>
            </a>
            <form action="<?= route_to('Table_News_Delete', $item['id']) ?>" method="post" style="display:inline;">
                <?= csrf_field() ?>
                <button type="button" class="btn btn-danger" onclick="confirmDelete(event, '<?= route_to('Table_News_Delete', $item['id']) ?>')" title="Xóa">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>


</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script src="<?= base_url('js/datatable.js') ?>"></script>

<?= $this->endSection(); ?>
