<script>
// Hàm để mở popup SweetAlert2 khi bấm "Book"
function openBookingForm(roomId, roomName, roomPrice) {
    // Hiển thị popup SweetAlert2
    Swal.fire({
        title: 'Đặt phòng',
        html: `
            <div style="text-align: left; font-family: Arial, sans-serif; line-height: 1.6;">
                <strong style="font-size: 20px;">${roomName}</strong><br>
                <strong>Giá: <span style="color: #e74c3c; font-size: 18px;">$${roomPrice}/đêm</span></strong><br><br>

                <!-- Chỉnh số lượng -->
                <div style="margin-bottom: 20px;">
                    <label for="quantity" style="font-size: 16px; font-weight: bold;">Số lượng: </label><br>
                    <button type="button" id="decrease" onclick="changeQuantity(-1)" style="background-color: #3498db; color: #fff; border: none; padding: 5px 10px; cursor: pointer; font-size: 18px;">-</button>
                    <span id="quantity" style="font-size: 18px; margin: 0 10px;">1</span>
                    <button type="button" id="increase" onclick="changeQuantity(1)" style="background-color: #3498db; color: #fff; border: none; padding: 5px 10px; cursor: pointer; font-size: 18px;">+</button>
                </div>

                <!-- Thêm yêu cầu -->
                <label for="additionalRequest" style="font-size: 16px; font-weight: bold;">Yêu cầu thêm:</label>
                <textarea id="additionalRequest" rows="3" style="width: 100%; padding: 10px; margin-top: 10px; font-size: 14px; border-radius: 5px; border: 1px solid #ccc;" placeholder="Điền yêu cầu của bạn..."></textarea>
            </div>
        `,
        showCancelButton: true,
        confirmButtonText: 'Đặt ngay',
        cancelButtonText: 'Đăng ký tư vấn',
        confirmButtonColor: '#27ae60',
        cancelButtonColor: '#3498db',
        cancelButtonAriaLabel: 'Đăng ký tư vấn',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            const quantity = document.getElementById('quantity').innerText;
            const additionalRequest = document.getElementById('additionalRequest').value;
            // Gửi dữ liệu đặt phòng
            createBooking(roomId, quantity, additionalRequest);
        },
        cancelButtonClass: 'swal2-cancel',
        showCloseButton: true,
        closeButtonAriaLabel: 'Đóng'
    });
}

// Hàm để thay đổi số lượng
function changeQuantity(change) {
    let quantityElement = document.getElementById('quantity');
    let currentQuantity = parseInt(quantityElement.innerText);
    let newQuantity = currentQuantity + change;

    // Đảm bảo số lượng không nhỏ hơn 1
    if (newQuantity >= 1) {
        quantityElement.innerText = newQuantity;
    }
}

// Hàm xử lý đăng ký đặt phòng
function createBooking(roomId, quantity, additionalRequest) {
    // Lấy thông tin tour, người dùng, v.v.
    let customerName = 'Tên khách hàng'; // Cần thay thế với thông tin thực tế
    let bookingDate = new Date().toISOString().slice(0, 10); // Ngày hiện tại (có thể thay đổi)
    
    // Gửi yêu cầu AJAX đến controller để xử lý tạo booking
    fetch('/Tour_booking', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            roomId: roomId,
            customerName: customerName,
            participants: quantity,
            bookingDate: bookingDate,
            additionalRequest: additionalRequest,
            totalPrice: quantity * roomPrice // Tính tổng giá
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire('Thành công!', 'Đặt phòng thành công!', 'success');
        } else {
            Swal.fire('Lỗi!', 'Có lỗi xảy ra khi đặt phòng.', 'error');
        }
    })
    .catch(error => {
        Swal.fire('Lỗi!', 'Không thể kết nối đến máy chủ.', 'error');
    });
}
</script>
