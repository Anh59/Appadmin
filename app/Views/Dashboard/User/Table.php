<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Danh sách Group</h1>
<form action="<?= route_to('Table_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success">+ Create</button>
</form>
<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Nhóm Group</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
                <select class="form-control form-control-lg" onchange="changeUserGroup(<?= $user['id'] ?>, this.value)">
                    <?php foreach ($groups as $group): ?>
                        <option value="<?= $group['id'] ?>" <?= ($group['id'] == $user['group_id']) ? 'selected' : '' ?>>
                            <?= $group['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <a href="<?= route_to('Group_edit', $user['id']) ?>"><span class="badge badge-pill badge-primary">Edit</span></a>
                <form action="<?= route_to('Group_delete', $user['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm này?')">Delete</button>
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

    function changeUserGroup(userId, groupId) {
        $.ajax({
            url: '<?= route_to('change_user_group') ?>',
            type: 'POST',
            data: {
                user_id: userId,
                group_id: groupId,
                <?= csrf_token() ?>: '<?= csrf_hash() ?>'
            },
            success: function(response) {
                if (response.status === 'success') {
                    alert('Group updated successfully');
                } else {
                    alert('An error occurred while updating the group');
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred while updating the group');
            }
        });
    }
</script>

<?= $this->endSection(); ?>
