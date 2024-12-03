?>
<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>


<form action="<?= route_to('Table_Transports_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success" title="Thêm Phương Tiện">
        <i class="fas fa-plus">Thêm Phương Tiện</i> <!-- Icon Thêm -->
    </button>
</form>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Phương Tiện</th>
            <th>Tên Tài Xế</th>
            <th>Biển Số Xe</th>
            <th>Loại</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transports as $transport): ?>
        <tr>
            <td><?= $transport['id'] ?></td>
            <td><?= $transport['name'] ?></td>
            <td><?= $transport['driver_name'] ?></td>
            <td><?= $transport['vehicle_number'] ?></td>
            <td><?= $transport['type'] ?></td>
            <td>
                <a href="<?= route_to('Table_Transports_Edit', $transport['id']) ?>" class="btn btn-primary" title="Sửa">
                    <i class="fas fa-edit"></i> <!-- Icon sửa -->
                </a>
                <form action="<?= route_to('Table_Transports_Delete', $transport['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(event, '<?= route_to('Table_Transports_Delete', $transport['id']) ?>')" title="Xóa">
                        <i class="fas fa-trash-alt"></i> <!-- Icon xóa -->
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