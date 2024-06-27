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
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
    </table>

    <!-- jQuery --><!-- Thêm thư viện jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
    <script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
    
    <script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>
    <!-- <script src="Editor-PHP-2.3.2/js/dataTables.editor.js"></script> -->
    <script>
        $(document).ready(function() {
          
            
            $('#table').DataTable({
                ajax: {
                    url: '<?= base_url('Dashborad/tableuser_list') ?>',
                    type: 'GET',
                    dataSrc: function (json) {
                        return json;
                    },
                    error: function (xhr, error, thrown) {
                        console.error('Error: ' + error);
                        console.error('Response: ' + xhr.responseText);
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
                paging: true
            });


            


           


        });



    </script>


<?= $this->endsection(''); ?>