<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_Bookings_Create') ?>" method="get" style="display:inline;">
    <button type="submit" class="btn btn-success" title="Thêm Booking">
        <i class="fas fa-plus">Thêm Booking</i> <!-- Icon Thêm -->
    </button>
</form>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Khách Hàng</th>
            <th>Tên Tour</th>
            <th>Số người tham gia</th>
            <!-- <th>Số lượng phòng</th> -->
            <th>Ngày đặt phòng</th>
            <th>Phương thức thanh toán</th>
            <th>Tổng giá</th>
            <th>Trạng thái thanh toán</th>
            <th>Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking): ?>
        <tr>
            <td><?= $booking['id'] ?></td>
            <td><?= esc($booking['customer_name']) ?></td> <!-- Hiển thị tên khách hàng -->
            <td><?= esc($booking['tour_name']) ?></td> <!-- Hiển thị tên tour -->
            <td><?= $booking['participants'] ?></td>
            <!-- <td><?= $booking['room_quantity'] ?></td> -->
            <td><?= $booking['booking_date'] ?></td>
            <td><?= $booking['payment_method'] ?></td>
            <td><?= $booking['total_price'] ?></td>
            <td><?= $booking['payment_status'] ?></td>
            <td>
                <a href="<?= route_to('Table_Bookings_Edit', $booking['id']) ?>" class="btn btn-primary" title="Sửa">
                    <i class="fas fa-edit"></i> <!-- Icon sửa -->
                </a>
                <form action="<?= route_to('Table_Bookings_Delete', $booking['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(event, '<?= route_to('Table_Bookings_Delete', $booking['id']) ?>')" title="Xóa">
                        <i class="fas fa-trash-alt"></i> <!-- Icon xóa -->
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script src="<?= base_url('js/datatable.js') ?>"></script>

<?= $this->endSection(); ?>