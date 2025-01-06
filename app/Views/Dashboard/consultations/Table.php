<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h2 class="text-center">Quản Lý Tư Vấn Khách Hàng</h2>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Khách Hàng</th>
            <th>Email</th>
            <th>Chủ Đề</th>
            <th>Tin Nhắn</th>
            <th>Thời Gian</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($consultations as $consultation): ?>
        <tr>
            <td><?= $consultation['id'] ?></td>
            <td><?= $consultation['name'] ?></td>
            <td><?= $consultation['email'] ?></td>
            <td><?= $consultation['subject'] ?></td>
            <td><?= $consultation['message'] ?></td>
            <td><?= $consultation['created_at'] ?></td>
            <td>
                <form action="<?= route_to('Table_Consultations_Reply', $consultation['id']) ?>" method="get" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-success">Phản Hồi</button>
                </form>

         


                <form action="<?= route_to('Table_Consultations_Delete', $consultation['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(event, '<?= route_to('Table_Consultations_Delete', $consultation['id']) ?>')" title="Xóa">
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
