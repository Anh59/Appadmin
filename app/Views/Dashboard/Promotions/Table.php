<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_Promotions_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success" title="Thêm Mã Giảm Giá">
        <i class="fas fa-plus">Thêm Mã Giảm Giá</i>
    </button>
</form>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Tour</th>
            <th>Mã Giảm Giá</th>
            <th>Chi Tiết Khuyến Mãi</th>
            <th>Phần Trăm Giảm Giá</th>
            <th>Ngày Bắt Đầu</th>
            <th>Ngày Kết Thúc</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($promotions as $promotion): ?>
    <tr>
        <td><?= $promotion['id'] ?></td>
        
        <!-- Hiển thị tên các tour mà mã giảm giá áp dụng -->
        <td>
            <?php 
                if (is_array($promotion['tour_names'])) {
                    echo implode(', ', array_column($promotion['tour_names'], 'name'));
                } else {
                    echo $promotion['tour_names']; // Nếu áp dụng cho tất cả tour
                }
            ?>
        </td>
        
        <td><?= $promotion['discount_code'] ?></td>
        <td><?= $promotion['promotion_details'] ?></td>
        <td><?= $promotion['discount_value'] ?>%</td>
        <td><?= $promotion['start_date'] ?></td>
        <td><?= $promotion['end_date'] ?></td>
        <td>
            <a href="<?= route_to('Table_Promotions_Edit', $promotion['id']) ?>" class="btn btn-primary" title="Sửa">
                <i class="fas fa-edit"></i>
            </a>
            <form action="<?= route_to('Table_Promotions_Delete', $promotion['id']) ?>" method="post" style="display:inline;">
                <?= csrf_field() ?>
                <button type="button" class="btn btn-danger" onclick="confirmDelete(event, '<?= route_to('Table_Promotions_Delete', $promotion['id']) ?>')" title="Xóa">
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
