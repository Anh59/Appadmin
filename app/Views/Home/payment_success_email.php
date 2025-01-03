<!DOCTYPE html>
<html>
<head>
    <title>Đơn hàng đã được thanh toán thành công</title>
</head>
<body>
    <h2>Chúc mừng, đơn hàng của bạn đã được thanh toán thành công!</h2>
    <p>Thông tin đơn hàng:</p>
    <ul>
        <li>Mã đơn hàng: <?= $booking['id'] ?></li>
        <li>Tên khách hàng: <?= $customer['name'] ?></li>
        <li>Tour đã đặt: <?= $booking['tour_id'] ?></li>
        <li>Số lượng tham gia: <?= $booking['participants'] ?></li>
        <li>Tổng giá trị thanh toán: <?= $booking['total_price'] ?></li>
    </ul>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
</body>
</html>
