<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_Rooms_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success" title="Thêm Phòng">
        <i class="fas fa-plus"></i> Thêm Phòng
    </button>
</form>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hình Ảnh</th>
            <th>Tên Phòng</th>
            <th>Chuyến Du Lịch</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rooms as $room): ?>
        <tr>
            <td><?= $room['id'] ?></td>
            <td>
                <?php if (!empty($room['image_url'])): ?>
                    <img src="<?= base_url($room['image_url']) ?>" alt="Room Image" style="width: 100px; height: auto;">
                <?php else: ?>
                    <span>Không có ảnh</span>
                <?php endif; ?>
            </td>
            <td><?= $room['name'] ?></td>
            <td><?= $room['tour_name'] ?? 'Trống' ?></td>
            <td><?= number_format($room['price'], 0, ',', '.') ?> vnđ</td>
            <td><?= $room['available_quantity'] ?></td>
            <td>
                <a href="<?= route_to('Table_Rooms_Edit', $room['id']) ?>" class="btn btn-primary" title="Sửa">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="<?= route_to('Table_Rooms_Delete', $room['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(event, '<?= route_to('Table_Rooms_Delete', $room['id']) ?>')" title="Xóa">
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
