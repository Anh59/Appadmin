<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_Tours_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success" title="Thêm Tour">
        <i class="fas fa-plus"></i> Thêm
    </button>
</form>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hình Ảnh</th>
            <th>Tên Tour</th>
            <th>Mô Tả</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Giá</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tours as $tour): ?>
        <tr>
            <td><?= $tour['id'] ?></td>
            <td>
                <?php if (!empty($tour['image_url'])): ?>
                    <img src="<?= $tour['image_url'] ?>" alt="Tour Image" style="width: 100px; height: auto;">
                <?php else: ?>
                    <span>Không có ảnh</span>
                <?php endif; ?>
            </td>
            <td><?= esc($tour['name']) ?></td>
            <td>
                <?php 
                    $words = explode(' ', $tour['description']);
                    $shortDescription = count($words) > 10 ? implode(' ', array_slice($words, 0, 10)) . '...' : $tour['description'];
                ?>
                <?= esc($shortDescription) ?>
            </td>
            <td><?=$tour['start_date']?></td>
            <td><?=$tour['end_date']?></td>
            <td><?= number_format(esc($tour['price_per_person']), 0, ',', '.') ?> đ</td>
            <td>
                <a href="<?= route_to('Table_Tours_Details', $tour['id']) ?>" class="btn btn-info" title="Chi Tiết">
                    <i class="fas fa-info-circle"></i>
                </a>
                <a href="<?= route_to('Table_Tours_Edit', $tour['id']) ?>" class="btn btn-primary" title="Sửa">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="<?= route_to('Table_Tours_Delete', $tour['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(event, '<?= route_to('Table_Tours_Delete', $tour['id']) ?>')" title="Xóa">
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
