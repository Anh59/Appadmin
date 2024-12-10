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
      <!-- <div class="form-group quantity-selector">
       <label>
        Trẻ em
       </label>
       <div class="input__quanlity">
        <button class="quantity-btn" type="button">
         -
        </button>
        <input class="quantity-input" min="1" readonly="" type="number" value="1"/>
        <button class="quantity-btn" type="button">
         +
        </button>
       </div>
      </div> -->
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
     <input name="payment_method" value="office" required type="radio"/>
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
        <span class="total-price" id="total-rooms">0 đ</span> <!-- This will now display the detailed room selection -->
    </div>
    <div class="summary-item">
        <span>Giảm giá:</span>
        <span class="total-price" id="discount">0 đ</span>
    </div>
    <div class="summary-item total-price">
        <span>Tổng cộng:</span>
        <span id="total-amount">0 đ</span>
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
let totalPrice = <?= $totalPrice ?>; // Initial price from the controller
let totalAdults = 0; // Default number of adults
let totalRooms = {}; // To store the room quantities

// Update room prices
function updateRoomPrice() {
    let roomPrice = 0;
    let roomSummary = ''; // Để hiển thị thông tin phòng đã chọn

    <?php foreach ($rooms as $room): ?>
        let roomQuantity_<?= $room['id']; ?> = parseInt(document.getElementById('quantity-<?= $room['id']; ?>').value);
        roomPrice += roomQuantity_<?= $room['id']; ?> * <?= $room['price']; ?>;

        // Hiển thị thông tin phòng nếu số lượng > 0
        if (roomQuantity_<?= $room['id']; ?> > 0) {
            roomSummary += `Loại <?= htmlspecialchars($room['name']); ?>: ${roomQuantity_<?= $room['id']; ?>} x <?= number_format($room['price'], 0, ',', '.'); ?> đ<br>`;
        }

        // Cập nhật số lượng từng loại phòng trong đối tượng `totalRooms`
        totalRooms[<?= $room['id']; ?>] = roomQuantity_<?= $room['id']; ?>;
    <?php endforeach; ?>

    // Cập nhật giao diện
    document.getElementById('total-rooms').innerHTML = roomSummary;
    updateTotalPrice(); // Cập nhật tổng tiền
}


// Giá mỗi người tham gia được truyền từ server
const pricePerPerson = <?= $tour['price_per_person']; ?>;


function changeAdults(action) {
    if (action === 'increase') {
        totalAdults++;
    } else if (action === 'decrease' && totalAdults > 0) { // Không cho giảm xuống dưới 1
        totalAdults--;
    }

    // Cập nhật giao diện số lượng người tham gia
    document.getElementById('total-adults-input').value = totalAdults;

    // Tính và cập nhật tổng tiền
    const totalPrice = totalAdults * pricePerPerson;
    
    // Sửa ID thành "total-adults"
    const totalAdultsElement = document.getElementById('total-adults');
    if (totalAdultsElement) {
        totalAdultsElement.innerText = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalPrice);
    }

    // Gọi hàm cập nhật tổng tiền nếu cần thêm logic cho các thành phần khác
    updateTotalPrice();
}





// Change the quantity of a specific room
function changeRoomQuantity(roomId, action) {
    let quantityInput = document.getElementById('quantity-' + roomId);
    let currentQuantity = parseInt(quantityInput.value);

    // Cho phép giảm về 0
    if (action === 'increase') {
        currentQuantity++;
    } else if (action === 'decrease' && currentQuantity > 0) {
        currentQuantity--;
    }

    // Cập nhật giá trị vào input
    quantityInput.value = currentQuantity;

    // Cập nhật tổng giá phòng
    updateRoomPrice();
}


// Apply discount logic (example)
function applyDiscount() {  
    let discountCode = document.getElementById('discount-code').value;
    if (discountCode === "DISCOUNT10") { // Example discount code
        let discount = totalPrice * 0.1; // 10% discount
        document.getElementById('discount').innerText = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(discount);
        totalPrice -= discount;
        updateTotalPrice();
}

// Attach event listeners to the buttons for increasing and decreasing room quantities
document.querySelectorAll('.quantity-btn').forEach(button => {
    button.addEventListener('click', function () {
        const action = this.textContent === '+' ? 'increase' : 'decrease';
        const roomId = this.closest('.room-selector').querySelector('.quantity-input').id.split('-')[1];
        changeRoomQuantity(roomId, action);
    });
});
}

// Increase room quantity
function increaseQuantity(roomId) {
    let quantityInput = document.getElementById('quantity-' + roomId);
    let currentQuantity = parseInt(quantityInput.value);
    currentQuantity++;
    quantityInput.value = currentQuantity;
    updateRoomPrice();
}

// Decrease room quantity
function decreaseQuantity(roomId) {
    let quantityInput = document.getElementById('quantity-' + roomId);
    let currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
        currentQuantity--;
        quantityInput.value = currentQuantity;
        updateRoomPrice();
    }
}
function updateTotalPrice() {
    // Giá mỗi người lớn (có thể truyền từ server)
    const pricePerPerson = <?= $tour['price_per_person']; ?>;
    
    // Tính tiền cho người lớn
    let totalAdultsPrice = totalAdults * pricePerPerson;

    // Tính tổng giá phòng
    let roomPrice = 0;
    const roomPrices = <?= json_encode(array_column($rooms, 'price', 'id')); ?>;

    for (const roomId in totalRooms) {
        const roomQuantity = totalRooms[roomId] || 0; // Nếu không có số lượng, gán giá trị là 0
        const roomPricePerUnit = roomPrices[roomId]; // Giá phòng từ server
        roomPrice += roomQuantity * roomPricePerUnit;
    }

    // Tổng cộng
    let totalAmount = totalAdultsPrice + roomPrice;

    // Hiển thị tổng tiền
    const totalAmountElement = document.getElementById('total-amount');
    if (totalAmountElement) {
        totalAmountElement.innerText = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalAmount);
    }
}


</script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="<?= base_url('Home-css/js/single_listing_custom.js'); ?>"></script> -->
    
    <?= $this->endSection(); ?>