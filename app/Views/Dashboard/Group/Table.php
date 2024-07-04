<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Danh sách Chức vụ</h1>
<form action="<?= route_to('Table_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success">+ Thêm</button>
</form>
<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>CHỨC VỤ</th>
            <th>MÔ TẢ CHỨC VỤ</th>
            <th>CHỨC NĂNG</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($groups as $group): ?>
        <tr>
            <td><?= $group['id'] ?></td>
            <td><?= $group['name'] ?></td>
            <td><?= $group['description'] ?></td>
            <td>
                <a href="<?= route_to('Group_edit' , $group['id']) ?>"><span class="badge badge-pill badge-primary">Sửa</span></a>
                

                <form action="<?= route_to('Group_delete' , $group['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm này?')">Xóa</button>
                </form>

            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script src="<?= base_url('js/datatable.js') ?>">

</script>

<?= $this->endSection(); ?>
