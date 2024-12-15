<?php 
$this->extend('layout/index');
?>

<?= $this->section('content'); ?>

<h1>Danh sách User</h1>
<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Email</th>
            <th>User name</th>
            <th>Group id</th>
            <th>create at</th>
        </tr>
    </thead>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        // Khởi tạo DataTable
        let table = $('#table').DataTable({
            ajax: {
                url: '<?= route_to('Table_User_List') ?>',
                type: 'GET',
                dataSrc: 'data',
                error: function (xhr, error, thrown) {
                    alert('Lỗi khi tải dữ liệu: ' + xhr.responseText);
                }
            },
            processing: true,
            serverSide: true,
            columns: [
                { data: 'id' },
                { data: 'email' },
                { data: 'username' },
                { data: 'group_id' },
                { data: 'created_at' }
            ],
            searching: true,
            ordering: true,
            paging: true,
        });

        // Hàm cập nhật dữ liệu tự động
        function fetchTableUpdates() {
            $.ajax({
                url: '<?= route_to('Fetch_Table_Updates') ?>',
                type: 'GET',
                success: function (response) {
                    if (response.success) {
                        table.clear().rows.add(response.data).draw();
                    } else {
                        console.error('Không thể tải dữ liệu mới:', response.error);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Lỗi khi tải dữ liệu:', error);
                }
            });
        }

        // Tự động cập nhật mỗi 5 giây
        setInterval(fetchTableUpdates, 5000);
    });
</script>

<?= $this->endsection(); ?>
