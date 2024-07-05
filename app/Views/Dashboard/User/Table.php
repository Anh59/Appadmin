<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Danh sách tài khoản User</h1>
<form action="<?= route_to('Table_User_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success">+ Thêm</button>
</form>
<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>TÊN</th>
            <th>EMAIL</th>
            <th>CHỨC VỤ HIỆN TẠI</th>
            <th>CHỨC NĂNG</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <?php if($user['super_admin'] !=1) : ?>
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
                <a href="<?= route_to('Table_User_Edit', $user['id']) ?>"><span class="badge badge-pill badge-primary">Sửa</span></a>
                <form action="<?= route_to('Table_User_Delete', $user['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm này?')">Xóa</button>
                </form>
            </td>
        </tr>
            <?php endif; ?>
        
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script src="<?= base_url('js/datatable.js') ?>"></script>
    <script>
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
