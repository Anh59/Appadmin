<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<!-- Thêm CSS để căn giữa carousel -->
<style>
    #imageCarousel {
      
        max-width: 40%; /* Giới hạn chiều rộng của carousel */
        margin: 0 auto; /* Căn giữa carousel */
    }

 
</style>


<h1>Chi Tiết Tour: <?= $tour['name'] ?></h1>

<!-- Tab Nav -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tour-tab" data-bs-toggle="tab" href="#tour" role="tab" aria-controls="tour" aria-selected="true">Thông Tin Tour</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="room-tab" data-bs-toggle="tab" href="#room" role="tab" aria-controls="room" aria-selected="false">Thông Tin Phòng</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="transport-tab" data-bs-toggle="tab" href="#transport" role="tab" aria-controls="transport" aria-selected="false">Phương Tiện Xe</a>
    </li>
</ul>

<!-- Tab Content -->
<div class="tab-content" id="myTabContent">
    <!-- Tab for Tour Info -->
    <div class="tab-pane fade show active" id="tour" role="tabpanel" aria-labelledby="tour-tab">
        <h3>Thông Tin Tour</h3>
        <p><strong>Tên Tour:</strong> <?= $tour['name'] ?></p>
        <p><strong>Mô Tả:</strong> <?= $tour['description'] ?></p>
        <p><strong>Giá:</strong> <?= $tour['price_per_person'] ?></p>

        <h3>Hình Ảnh</h3>
<div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php if (!empty($images)): ?>
            <?php $isActive = true; ?>
            <?php foreach ($images as $image): ?>
                <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                    <img src="<?= $image['image_url'] ?>" class="d-block w-100" alt="Tour Image" style="height: 300px; object-fit: cover;">
                </div>
                <?php $isActive = false; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Không có hình ảnh.</p>
        <?php endif; ?>
    </div>
    
    <!-- Các điều khiển slideshow -->
    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    </div>

    <!-- Tab for Room Info -->
    <div class="tab-pane fade" id="room" role="tabpanel" aria-labelledby="room-tab">
        <h3>Thông Tin Phòng</h3>
        <?php if (!empty($rooms)): ?>
            <ul>
                <?php foreach ($rooms as $room): ?>
                    <li class="mb-4">
                        <div>
                            <strong>Loại Phòng:</strong> <?= $room['name'] ?> <br>
                            <strong>Giá:</strong> <?= $room['price'] ?> <br>
                            <strong>Mô Tả:</strong> <?= $room['extra'] ?> <br>
                            <strong>Hạn thông báo:</strong> <?= $room['cancellation'] ?> <br>
                        </div>

                        <?php if (!empty($room['image_url'])): ?>
                            <img src="<?= base_url($room['image_url']) ?>" alt="Image of <?= $room['name'] ?>" class="mt-2" style="width: 100%; max-width: 300px; height: auto;">
                        <?php else: ?>
                            <p>Không có ảnh phòng.</p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Không có thông tin phòng.</p>
        <?php endif; ?>
    </div>

    <!-- Tab for Transport Info -->
    <div class="tab-pane fade" id="transport" role="tabpanel" aria-labelledby="transport-tab">
        <h3>Phương Tiện Xe</h3>
        <?php if ($transport): ?>
            <p><strong>Loại Phương Tiện:</strong> <?= $transport['type'] ?></p>
            <p><strong>Tên Tài xế:</strong> <?= $transport['driver_name'] ?></p>
            <p><strong>Biển số xe:</strong> <?= $transport['vehicle_number'] ?></p>
        <?php else: ?>
            <p>Không có thông tin phương tiện xe.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Quay lại -->
<a href="<?= route_to('Table_Tours') ?>" class="btn btn-secondary">Quay Lại</a>

<?= $this->endSection(); ?>
