<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Assign Roles to Users</h1>
<form action="<?= route_to('Table_Role_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success">+ Create</button>
</form>
<form action="<?= route_to('Table_roles') ?>" method="post">
    <?= csrf_field() ?>
    <table id="usertable" class="display" style="width:100%">
        <thead>
            <tr>
                <th> ID</th>
               
                <th>URL</th>
                <th>description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $role['id'] ?></td>
                <td><?= $role['url'] ?></td>
                <td><?= $role['description']?></td> 
                <td>
                <a href="<?= route_to('Table_Role_Edit' , $role['id']) ?>"><span class="badge badge-pill badge-primary">Edit</span></a>
                

                <form action="<?= route_to('Table_Role_Delete' , $role['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm này?')">Delete</button>
                </form>
                </td> 
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit">Save Roles</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#usertable').DataTable();
    });
</script>

<?= $this->endSection(); ?>
