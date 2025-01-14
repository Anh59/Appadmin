<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán VietQR</title>
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .qr-code {
            margin: 20px auto;
            width: 300px;
            height: 300px;
            border: 2px solid #ddd;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .message {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="qr-code">
        <!-- Đảm bảo $qr_code_url chứa dữ liệu hợp lệ -->
        <?php if (!empty($qr_code_url)) : ?>
            <img src="data:image/png;base64,<?= $qr_code_url; ?>" alt="QR Code" id="qrCodeImage">
        <?php else: ?>
            <p>Không thể hiển thị mã QR. Vui lòng thử lại sau.</p>
        <?php endif; ?>
    </div>
    <p>Vui lòng quét mã QR để thanh toán.</p>
</div>

<script>
    setInterval(async () => {
        try {
            const bookingId = '<?= $bookingId ?>'; // Lấy bookingId từ server-side
            const response = await fetch(`/api/checkPaymentStatus/${bookingId}`);
            const result = await response.json();
            if (result.status === 'success') {
                window.location.href = '/config_order';
            }
        } catch (error) {
            console.error('Lỗi kiểm tra trạng thái thanh toán:', error);
        }
    }, 5000); // Kiểm tra mỗi 5 giây
</script>
</body>
</html>
