<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đặt Tour</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        p {
            font-size: 14px;
            line-height: 1.6;
        }
        .highlight {
            font-weight: bold;
            color: #d9534f;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table th {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Xác Nhận Đặt Tour Thành Công!</h1>
        
        <p>Chào <?= htmlspecialchars($customer['name']); ?>,</p>
        
        <p>Chúng tôi rất vui mừng thông báo rằng bạn đã đặt tour thành công. Dưới đây là thông tin chi tiết về tour của bạn:</p>
        
        <table class="table">
            <tr>
                <th>Tên Tour</th>
                <td><?= htmlspecialchars($tour['name']); ?></td>
            </tr>
            <tr>
                <th>Thờiời gian</th>
                <td>2 ngày</td>
            </tr>
            <tr>
                <th>Số Người Tham Gia</th>
                <td><?= htmlspecialchars($participants); ?></td>
            </tr>
            <tr>
                <th>Số Phòng</th>
                <td>
                    <?php foreach ($rooms as $room): ?>
                        <?= htmlspecialchars($room['quantity']); ?> x <?= htmlspecialchars($room['name']); ?> (<?= number_format($room['price'], 0, ',', '.'); ?> đ)
                        <br>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th>Giá Một Người</th>
                <td><?= number_format($tour['price_per_person'], 0, ',', '.'); ?> đ</td>
            </tr>
            <tr>
                <th>Tổng Tiền</th>
                <td><?= number_format($total_price, 0, ',', '.'); ?> đ</td>
            </tr>
    
        </table>

        <p>Cảm ơn bạn đã chọn dịch vụ của chúng tôi. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
        <p><a href="<?= base_url(route_to('detail_order', $bookingId)) ?>">Chi tiết xem tại đây</a>
        </p>
        <p class="footer">Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email trunganhvu59@gmail.com hoặc điện thoại 0373562881.</p>
    </div>

</body>
</html>
