<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Danh Sách Tour</h1>
<form action="<?= route_to('Table_Tours_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success">+ Thêm Tour</button>
</form>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Tour</th>
            <th>Mô Tả</th>
            <th>Giá</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tours as $tour): ?>
        <tr>
            <td><?= $tour['id'] ?></td>
            <td><?= $tour['name'] ?></td>
            <td><?= $tour['description'] ?></td>
            <td><?= $tour['price_per_person'] ?></td>
            <td>
                <a href="<?= route_to('Table_Tours_Edit', $tour['id']) ?>" class="btn btn-primary">Sửa</a>
                <form action="<?= route_to('Table_Tours_Delete', $tour['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa tour này?')">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

<?= $this->endSection(); ?>
