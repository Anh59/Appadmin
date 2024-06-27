<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Assign Roles to Users</h1>
<form action="<?= route_to('Table_roles') ?>" method="post">
    <?= csrf_field() ?>
    <table id="userTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Roles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td>
                    <?php foreach ($roles as $role): ?>
                     
                      <div><?=$role['url']?></div>

                       <?php dd($role)
                        ?> 
                    <div>
                        <input type="checkbox" name="roles[<?= $user['id'] ?>][]" value="<?= $role['id'] ?>" <?= in_array($role['id'], $user['roles']) ? 'checked' : '' ?>>
                        <?= $role['description'] ?>
                    </div>
                    <?php endforeach; ?>
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
        $('#userTable').DataTable();
    });
</script>

<?= $this->endSection(); ?>
