<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Danh Sách Quyền Hiện Hành</h1>
<form action="<?= route_to('Table_Role_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success">+ Thêm</button>
</form>
<form action="<?= route_to('Table_roles') ?>" method="post">
    <?= csrf_field() ?>
    <table id="table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
               
                <th>ĐƯỜNG DẪN</th>
                <th>MÔ TẢ</th>
                <th>CHỨC NĂNG</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $role['id'] ?></td>
                <td><?= $role['url'] ?></td>
                <td><?= $role['description']?></td> 
                <td>
                <a href="<?= route_to('Table_Role_Edit' , $role['id']) ?>"><span class="badge badge-pill badge-primary">Sửa</span></a>
                

                <form action="<?= route_to('Table_Role_Delete' , $role['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm này?')">Xóa</button>
                </form>
                </td> 
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- <button type="submit">Save Roles</button> -->
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script src="<?= base_url('js/datatable.js') ?>">

</script>

<?= $this->endSection(); ?>
