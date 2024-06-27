<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Danh sách Group</h1>
<a href="<?= route_to('Table_Create') ?>">Create New Group</a>
<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($groups as $group): ?>
        <tr>
            <td><?= $group['id'] ?></td>
            <td><?= $group['name'] ?></td>
            <td><?= $group['description'] ?></td>
            <td>
                <a href="<?= site_url('Dashborad/group-edit/' . $group['id']) ?>">Edit</a>
                <form action="<?= route_to('Group_delete' . $group['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm này?')">Lỗi </button>
                </form>

                <form action="<?= site_url('Dashborad/group-delete/' . $group['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm này?')">Delete</button>
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
