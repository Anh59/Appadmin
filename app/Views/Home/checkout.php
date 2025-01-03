<!DOCTYPE html>
<html lang="en">

<head>
</head>

<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
Checkout
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/checkout.css'); ?>">

<?= $this->endSection() ?>

<?= $this->section('Home-content'); ?>
<div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/about_background.jpg'); ?>"></div>
    <div class="home_content">
        <div class="home_title">Thanh Toán chuyến đi</div>
    </div>
</div>
<section class="container">
    <h1 class="text-center checkout-header">
        Tổng Quan Về Chuyến Đi
    </h1>
    <form action="javascript:void(0);" class="checkout-container" method="post">
        <!-- Contact Information -->
        <div class="checkout-info">
            <h2 class="checkout-header">
                Thông Tin Liên Lạc
            </h2>
            <div class="checkout__infor">
                <div class="form-group">
                    <label for="username">
                        Họ và tên*
                    </label>
                    <input id="username" name="username" value="<?= $customer['name'] ?? ''; ?>" placeholder="Nhập Họ và tên" required="" type="text"/>
                </div>
                <div class="form-group">
                    <label for="email">
                        Email*
                    </label>
                    <input id="email" name="email" value="<?= $customer['email'] ?? ''; ?>" placeholder="sample@gmail.com" required="" type="email"/>
                </div>
                <div class="form-group">
                    <label for="tel">
                        Số điện thoại*
                    </label>
                    <input id="tel" name="tel" value="<?= $customer['phone'] ?? ''; ?>" placeholder="Nhập số điện thoại liên hệ" required="" type="tel"/>
                </div>
                <div class="form-group">
                    <label for="address">
                        Địa chỉ*
                    </label>
                    <input id="address" name="dia_chi" value="<?= $customer['address'] ?? ''; ?>" placeholder="Nhập địa chỉ liên hệ" required="" type="text"/>
                </div>
            </div>
            <!-- Passenger Details -->
            <h2 class="checkout-header">
                Hành Khách
            </h2>
            <div class="checkout__quantity">
                <div class="form-group quantity-selector">
                    <label>
                        Số người tham gia 
                    </label>
                    <div class="input__quanlity">
                        <button class="quantity-btn" type="button" onclick="changeAdults('decrease')">-</button>
                        <input class="quantity-input" id="total-adults-input" readonly type="number" value="0" />
                        <button class="quantity-btn" type="button" onclick="changeAdults('increase')">+</button>
                    </div>
                </div>
            </div>
            <!-- Room Selection -->
            <h2 class="checkout-header">Chọn Phòng</h2>
            <div class="room-selector-container">
                <?php foreach ($rooms as $room): ?>
                    <div class="room-selector">
                        <img 
                            alt="Image of <?= htmlspecialchars($room['name']); ?> with a bed and a window view" 
                            class="room-image" 
                            height="80" 
                            src="<?= base_url($room['image_url']); ?>"
                            width="80"
                        />
                        <div class="room-details">
                            <h5><?= htmlspecialchars($room['name']); ?></h5>
                            <p>Giá: <?= number_format($room['price'], 0, ',', '.'); ?> đ</p>
                        </div>
                        <div class="room-quantity">
                            <button class="quantity-btn" type="button" onclick="changeRoomQuantity(<?= $room['id']; ?>, 'decrease')">-</button>
                            <input class="quantity-input" id="quantity-<?= $room['id']; ?>" min="0" readonly type="number" value="0" />
                            <button class="quantity-btn" type="button" onclick="changeRoomQuantity(<?= $room['id']; ?>, 'increase')">+</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Privacy Agreement Section -->
            <div class="privacy-section">
                <p>
                    Bằng cách nhấp chuột vào nút "ĐỒNG Ý" dưới đây, Khách hàng đồng ý rằng các điều kiện điều khoản này sẽ được áp dụng. Vui lòng đọc kỹ điều kiện điều khoản trước khi lựa chọn sử dụng dịch vụ của Lửa Việt Tours.
                </p>
                <div class="privacy-checkbox">
                    <input id="agree" name="agree" required="" type="checkbox"/>
                    <label for="agree">
                        Tôi đã đọc và đồng ý với
                        <a href="#" target="_blank">
                            Điều khoản thanh toán
                        </a>
                    </label>
                </div>
            </div>
            <!-- Payment Method -->
            <h2 class="checkout-header">    
                Phương Thức Thanh Toán
            </h2>
            <label class="payment-option">
                <input name="payment_method" value="COD" required type="radio"/>
                <img alt="Icon representing office payment" height="40" src="https://storage.googleapis.com/a1aa/image/f7Fk3infuBiclk0rnewLAQA9GfBoH31Pp7qujvd9rjG9R0kPB.jpg" width="40"/>
                Thanh toán tại văn phòng
            </label>
            <label class="payment-option">
                <input name="payment_method" value="paypal" required type="radio"/>
                <img alt="Icon representing PayPal payment" height="40" src="https://storage.googleapis.com/a1aa/image/NJdodZeBwB0nFiwGjfvtlWCWkPI87NXx9oC8MZNP14JgEN5TA.jpg" width="40"/>
                Thanh toán bằng PayPal
            </label>
            <label class="payment-option">
                <input name="payment_method" value="momo" required type="radio"/>
                <img alt="Icon representing MoMo payment" height="40" src="https://storage.googleapis.com/a1aa/image/eueIOs5YIwlMWUwXJYqDAYCPrfdgEFx8T85UTpZhmfaES0kPB.jpg" width="40"/>
                Thanh toán bằng Momo
            </label>
        </div>
        <!-- Order Summary -->
        <div class="checkout-summary">
            <div class="summary-section">
                <div>
                    <p>Mã tour: <?= $tour['id']; ?></p>
                    <h4>Tên Tour: <?= $tour['name']; ?></h4>
                    <p>Ngày khởi hành: <?= $tour['start_date']; ?></p>
                    <p>Ngày kết thúc: <?= $tour['end_date']; ?></p>
                </div>
            </div>
            <div class="order-summary">
                <div class="summary-item">
                    <span>Người lớn:</span>
                    <span class="total-price" id="total-adults">0 đ</span>
                </div>
                <div class="summary-item">
                    <span>Giá phòng:</span>
                    <span class="total-price" id="total-rooms">0 đ</span>
                </div>
                <div class="summary-item">
                    <span>Giảm giá:</span>
                    <span id="discount">0 VND</span>
                </div>
                <div class="summary-item">
                    <span>Tổng tiền:</span>
                    <span id="total-amount">0 VND</span>
                </div>
            </div>

            <div class="form-group">
                <label for="discount-code">Mã giảm giá</label>
                <div class="d-flex">
                    <input class="form-control" id="discount-code" name="discount-code" placeholder="Nhập mã giảm giá" type="text" />
                    <button class="btn btn-primary ms-2" type="button" onclick="applyDiscount()">Kiểm tra</button>
                </div>
            </div>

            <button class="checkout-btn mt-3" type="submit">Xác Nhận và Thanh Toán</button>
        </div>
    </form>
</section>

<?= $this->endSection(); ?>

<?= $this->section('Home-scripts') ?>
<script>
let totalPrice = <?= $totalPrice ?>;
let totalAdults = 0;
let totalRooms = {};
// Hàm cập nhật nút thanh toán
function updatePaymentButton() {
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');

    // Kiểm tra nếu phương thức thanh toán tồn tại
    if (paymentMethod) {
        const paymentButton = document.querySelector('.checkout-btn');
        if (paymentMethod.value === 'momo') {
            paymentButton.textContent = 'Thanh Toán qua Momo';
            paymentButton.classList.add('btn-momo');
            paymentButton.classList.remove('btn-paypal', 'btn-cod');
        } else if (paymentMethod.value === 'paypal') {
            paymentButton.textContent = 'Thanh Toán qua PayPal';
            paymentButton.classList.add('btn-paypal');
            paymentButton.classList.remove('btn-momo', 'btn-cod');
        } else {
            paymentButton.textContent = 'Xác Nhận và Thanh Toán';
            paymentButton.classList.add('btn-cod');
            paymentButton.classList.remove('btn-momo', 'btn-paypal');
        }
    } 
    
}

// Lắng nghe sự kiện thay đổi phương thức thanh toán
document.querySelectorAll('input[name="payment_method"]').forEach((radio) => {
    radio.addEventListener('change', updatePaymentButton);
});

// Gọi hàm để cập nhật trạng thái ban đầu
document.addEventListener('DOMContentLoaded', updatePaymentButton);



// Update room prices
function updateRoomPrice() {
    let roomPrice = 0;
    let roomSummary = '';

    <?php foreach ($rooms as $room): ?>
        let roomQuantity_<?= $room['id']; ?> = parseInt(document.getElementById('quantity-<?= $room['id']; ?>').value);
        roomPrice += roomQuantity_<?= $room['id']; ?> * <?= $room['price']; ?>;

        if (roomQuantity_<?= $room['id']; ?> > 0) {
            roomSummary += `Loại <?= htmlspecialchars($room['name']); ?>: ${roomQuantity_<?= $room['id']; ?>} x <?= number_format($room['price'], 0, ',', '.'); ?> đ<br>`;
        }

        totalRooms[<?= $room['id']; ?>] = roomQuantity_<?= $room['id']; ?>;
    <?php endforeach; ?>

    document.getElementById('total-rooms').innerHTML = roomSummary;
    updateTotalPrice();
}

const pricePerPerson = <?= $tour['price_per_person']; ?>;

function changeAdults(action) {
    if (action === 'increase') {
        totalAdults++;
    } else if (action === 'decrease' && totalAdults > 0) {
        totalAdults--;
    }

    document.getElementById('total-adults-input').value = totalAdults;

    const totalPrice = totalAdults * pricePerPerson;
    
    const totalAdultsElement = document.getElementById('total-adults');
    if (totalAdultsElement) {
        totalAdultsElement.innerText = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalPrice);
    }

    updateTotalPrice();
}

function changeRoomQuantity(roomId, action) {
    let quantityInput = document.getElementById('quantity-' + roomId);
    let currentQuantity = parseInt(quantityInput.value);

    if (action === 'increase') {
        currentQuantity++;
    } else if (action === 'decrease' && currentQuantity > 0) {
        currentQuantity--;
    }

    quantityInput.value = currentQuantity;

    updateRoomPrice();
}

function applyDiscount() {
    const discountCode = document.getElementById('discount-code').value;

    $.ajax({
        url: '<?= site_url("checkout/apply_discount"); ?>',
        type: 'POST',
        data: {
            discount_code: discountCode,
            tour_id: <?= $tour['id']; ?>,
            total_price: totalPrice
        },
        success: function(response) {
            if (response.success) {
                const discountValue = response.discount_value;
                document.getElementById('discount').innerText = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(discountValue);
                totalPrice -= discountValue;
                updateTotalPrice();
            } else {
                Swal.fire('Lỗi', response.message, 'error');
            }
        }
    });
}

function updateTotalPrice() {
    let totalAdultsPrice = totalAdults * pricePerPerson;
    let roomPrice = 0;

    const roomPrices = <?= json_encode(array_column($rooms, 'price', 'id')); ?>;

    for (const roomId in totalRooms) {
        const roomQuantity = totalRooms[roomId] || 0;
        const roomPricePerUnit = roomPrices[roomId];
        roomPrice += roomQuantity * roomPricePerUnit;
    }

    let totalAmount = totalAdultsPrice + roomPrice;

    const discountElement = document.getElementById('discount');
    let discountValue = discountElement ? parseInt(discountElement.innerText.replace(/\D/g, '')) || 0 : 0;

    totalAmount -= discountValue;
    if (totalAmount < 0) totalAmount = 0;

    document.getElementById('total-amount').innerText = 
        new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalAmount);
}
// Hàm lấy số lượng phòng
function getRoomQuantities() {
    var roomQuantities = {};
    <?php foreach ($rooms as $room): ?>
        roomQuantities[<?= $room['id']; ?>] = parseInt($('#quantity-<?= $room['id']; ?>').val()) || 0;
    <?php endforeach; ?>
    return roomQuantities;
}

$(document).ready(function() {
    // Hàm xử lý khi nhấn nút "Xác Nhận và Thanh Toán"
    $('form.checkout-container').submit(function(event) {
        event.preventDefault();

        var data = {
            payment_method: $('input[name="payment_method"]:checked').val(),
            total_price: $('#total-amount').text().replace(/\D/g, ''),
            rooms: getRoomQuantities(),
            participants: $('#total-adults-input').val(),
            tour_id: '<?= $tour['id']; ?>'
        };

        $.ajax({
            url: '<?= site_url("checkout/process_payment"); ?>',
            type: 'POST',
            data: data,
            dataType: 'json',  // Đảm bảo dữ liệu trả về là JSON
            success: function(response) {
                console.log(response); 
                if (response.success) {
                    // Kiểm tra xem có redirect_url hay không
                    if (response.redirect_url) {
                        // Chuyển hướng về URL
                        window.location.href = response.redirect_url;
                    } else {
                        alert('Có lỗi xảy ra, không tìm thấy URL để chuyển hướng.');
                    }
                } else {
                    // Hiển thị thông báo lỗi nếu không thành công
                    alert('Có lỗi xảy ra: ' + response.message);
                }
            },
            error: function() {
                alert('Không thể xử lý yêu cầu. Vui lòng thử lại.');
            }
        });
    });
});


</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?= $this->endSection(); ?>
