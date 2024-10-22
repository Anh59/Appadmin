<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Danh Sách Khách Hàng</h1>
<form action="<?= route_to('Table_Customers_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success">+ Thêm</button>
</form>

<form action="<?= route_to('Table_Customers') ?>" method="post">
    <?= csrf_field() ?>
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Địa Chỉ</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $index => $customer): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $customer['name'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['phone'] ?></td>
                <td><?= $customer['address'] ?></td>
                <td>
                    <a href="<?= route_to('Table_Customers_Edit', $customer['id']) ?>" class="badge badge-pill badge-primary">Sửa</a>
                    <form action="<?= route_to('Table_Customers_Delete', $customer['id']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa khách hàng này?')">Xóa</button>
                    </form>
                    <!-- Nút Khóa tài khoản -->
                    <form action="<?= route_to('Table_Customers_Lock', $customer['id']) ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản khách hàng này?')">Khóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script src="<?= base_url('js/datatable.js') ?>"></script>

<?= $this->endSection(); ?>
