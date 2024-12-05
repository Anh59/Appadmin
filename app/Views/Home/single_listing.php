
<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
single_listing
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/plugins/colorbox/colorbox.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/single_listing_styles.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/single_listing_responsive.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('Home-content'); ?>


	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/single_background.jpg'); ?>"></div>
		<div class="home_content">
			<div class="home_title">the offers</div>
		</div>
	</div>

	<!-- Offers -->

	<div class="listing">

		<!-- Search -->

		<div class="search">
			<div class="search_inner">

				<!-- Search Contents -->
				
				<div class="container fill_height no-padding">
					<div class="row fill_height no-margin">
						<div class="col fill_height no-padding">

							<!-- Search Tabs -->

							<div class="search_tabs_container">
								<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_tab active d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="<?= base_url('Home-css/images/suitcase.png'); ?>" alt=""><span>hotels</span></div>
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="<?= base_url('Home-css/images/bus.png'); ?>" alt="">car rentals</div>
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="<?= base_url('Home-css/images/departure.png'); ?>" alt="">flights</div>
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="<?= base_url('Home-css/images/island.png'); ?>" alt="">trips</div>
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="<?= base_url('Home-css/images/cruise.png'); ?>" alt="">cruises</div>
									<div class="search_tab d-flex flex-row align-items-center justify-content-lg-center justify-content-start"><img src="<?= base_url('Home-css/images/diving.png'); ?>" alt="">activities</div>
								</div>		
							</div>

							<!-- Search Panel -->

							<div class="search_panel active">
								<form action="#" id="search_form_1" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>destination</div>
										<input type="text" class="destination search_input" required="required">
									</div>
									<div class="search_item">
										<div>check in</div>
										<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>check out</div>
										<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>adults</div>
										<select name="adults" id="adults_1" class="dropdown_item_select search_input">
											<option>01</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="search_item">
										<div>children</div>
										<select name="children" id="children_1" class="dropdown_item_select search_input">
											<option>0</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="extras">
										<ul class="search_extras clearfix">
											<li class="search_extras_item">
												<div class="clearfix">
													<input type="checkbox" id="search_extras_1" class="search_extras_cb">
													<label for="search_extras_1">Pet Friendly</label>
												</div>	
											</li>
											<li class="search_extras_item">
												<div class="clearfix">
													<input type="checkbox" id="search_extras_2" class="search_extras_cb">
													<label for="search_extras_2">Car Parking</label>
												</div>
											</li>
											<li class="search_extras_item">
												<div class="clearfix">
													<input type="checkbox" id="search_extras_3" class="search_extras_cb">
													<label for="search_extras_3">Wireless Internet</label>
												</div>
											</li>
											<li class="search_extras_item">
												<div class="clearfix">
													<input type="checkbox" id="search_extras_4" class="search_extras_cb">
													<label for="search_extras_4">Reservations</label>
												</div>
											</li>
											<li class="search_extras_item">
												<div class="clearfix">
													<input type="checkbox" id="search_extras_5" class="search_extras_cb">
													<label for="search_extras_5">Private Parking</label>
												</div>
											</li>
											<li class="search_extras_item">
												<div class="clearfix">
													<input type="checkbox" id="search_extras_6" class="search_extras_cb">
													<label for="search_extras_6">Smoking Area</label>
												</div>
											</li>
											<li class="search_extras_item">
												<div class="clearfix">
													<input type="checkbox" id="search_extras_7" class="search_extras_cb">
													<label for="search_extras_7">Wheelchair Accessible</label>
												</div>
											</li>
											<li class="search_extras_item">
												<div class="clearfix">
													<input type="checkbox" id="search_extras_8" class="search_extras_cb">
													<label for="search_extras_8">Pool</label>
												</div>
											</li>
										</ul>
									</div>
									<div class="more_options">
										<div class="more_options_trigger">
											<a href="#">load more options</a>
										</div>
										<ul class="more_options_list clearfix">
											<li class="more_options_item">
												<div class="clearfix">
													<input type="checkbox" id="more_options_1" class="search_extras_cb">
													<label for="more_options_1">Pet Friendly</label>
												</div>	
											</li>
											<li class="more_options_item">
												<div class="clearfix">
													<input type="checkbox" id="more_options_2" class="search_extras_cb">
													<label for="more_options_2">Car Parking</label>
												</div>
											</li>
										</ul>
									</div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</form>
							</div>

							<!-- Search Panel -->

							<div class="search_panel">
								<form action="#" id="search_form_2" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>destination</div>
										<input type="text" class="destination search_input" required="required">
									</div>
									<div class="search_item">
										<div>check in</div>
										<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>check out</div>
										<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>adults</div>
										<select name="adults" id="adults_2" class="dropdown_item_select search_input">
											<option>01</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="search_item">
										<div>children</div>
										<select name="children" id="children_2" class="dropdown_item_select search_input">
											<option>0</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</form>
							</div>

							<!-- Search Panel -->

							<div class="search_panel">
								<form action="#" id="search_form_3" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>destination</div>
										<input type="text" class="destination search_input" required="required">
									</div>
									<div class="search_item">
										<div>check in</div>
										<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>check out</div>
										<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>adults</div>
										<select name="adults" id="adults_3" class="dropdown_item_select search_input">
											<option>01</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="search_item">
										<div>children</div>
										<select name="children" id="children_3" class="dropdown_item_select search_input">
											<option>0</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</form>
							</div>

							<!-- Search Panel -->

							<div class="search_panel">
								<form action="#" id="search_form_4" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>destination</div>
										<input type="text" class="destination search_input" required="required">
									</div>
									<div class="search_item">
										<div>check in</div>
										<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>check out</div>
										<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>adults</div>
										<select name="adults" id="adults_4" class="dropdown_item_select search_input">
											<option>01</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="search_item">
										<div>children</div>
										<select name="children" id="children_4" class="dropdown_item_select search_input">
											<option>0</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</form>
							</div>

							<!-- Search Panel -->

							<div class="search_panel">
								<form action="#" id="search_form_5" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>destination</div>
										<input type="text" class="destination search_input" required="required">
									</div>
									<div class="search_item">
										<div>check in</div>
										<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>check out</div>
										<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>adults</div>
										<select name="adults" id="adults_5" class="dropdown_item_select search_input">
											<option>01</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="search_item">
										<div>children</div>
										<select name="children" id="children_5" class="dropdown_item_select search_input">
											<option>0</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</form>
							</div>

							<!-- Search Panel -->

							<div class="search_panel">
								<form action="#" id="search_form_6" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<div class="search_item">
										<div>destination</div>
										<input type="text" class="destination search_input" required="required">
									</div>
									<div class="search_item">
										<div>check in</div>
										<input type="text" class="check_in search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>check out</div>
										<input type="text" class="check_out search_input" placeholder="YYYY-MM-DD">
									</div>
									<div class="search_item">
										<div>adults</div>
										<select name="adults" id="adults_6" class="dropdown_item_select search_input">
											<option>01</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<div class="search_item">
										<div>children</div>
										<select name="children" id="children_6" class="dropdown_item_select search_input">
											<option>0</option>
											<option>02</option>
											<option>03</option>
										</select>
									</div>
									<button class="button search_button">search<span></span><span></span><span></span></button>
								</form>
							</div>
						</div>
					</div>
				</div>	
			</div>	
		</div>

		<!-- Single Listing -->

		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single_listing">
						
						<!-- Hotel Info -->

						<div class="hotel_info">


							<!-- Title -->
							<div class="hotel_title_container d-flex flex-lg-row flex-column">
								<div class="hotel_title_content">
									<h1 class="hotel_title"><?= $tour['name']; ?></h1>
									<div class="rating_r rating_r_<?= round($tour['rating']); ?> hotel_rating">
										<?php for ($i = 0; $i < 5; $i++): ?>
											<i class="fa <?= $i < round($tour['rating']) ? 'fa-star' : 'fa-star-o'; ?>"></i>
										<?php endfor; ?>
									</div>
									<div class="hotel_location"><?= isset($tour['location']) ? $tour['location'] : 'Unknown location'; ?></div>
								</div>
								<div class="hotel_title_button ml-lg-auto text-lg-right">
									<div class="button book_button trans_200">
										<a href="#">book<span></span><span></span><span></span></a>
									</div>
									<div class="hotel_map_link_container">
										<div class="hotel_map_link">See Location on Map</div>
									</div>
								</div>
							</div>

<!-- Listing Image (Ảnh chính của tour) -->
			<div class="hotel_image">
				<!-- Kiểm tra nếu có ảnh, nếu không có dùng ảnh mặc định -->
				<?php if (!empty($tour['image_url'])): ?>
					<img src="<?= $tour['image_url']; ?>" alt="Image of <?= $tour['name']; ?>">
				<?php else: ?>
					<img src="<?= base_url('default-image.jpg'); ?>" alt="No image available">
				<?php endif; ?>
				<div class="hotel_review_container d-flex flex-column align-items-center justify-content-center">
					<div class="hotel_review">
						<div class="hotel_review_content">
							<div class="hotel_review_title"><?= $tour['review_title']; ?></div>
							<div class="hotel_review_subtitle"><?= $tour['review_count']; ?> reviews</div>
						</div>
						<div class="hotel_review_rating text-center"><?= number_format($tour['rating'], 1); ?></div>
					</div>
				</div>
			</div>

<!-- Gallery (Các ảnh phụ của tour) -->
				<div class="hotel_gallery">
					<div class="hotel_slider_container">
						<div class="owl-carousel owl-theme hotel_slider">
							<?php if (!empty($tour['gallery_images'])): ?>
								<?php foreach ($tour['gallery_images'] as $image): ?>
									<div class="owl-item">
										<a class="colorbox cboxElement" href="<?= base_url($image['image_url']); ?>">
											<img src="<?= base_url($image['image_url']); ?>" alt="Image of <?= $tour['name']; ?>">
										</a>
									</div>
								<?php endforeach; ?>
							<?php else: ?>
								<p>No images available for this tour.</p>
							<?php endif; ?>
						</div>

						<!-- Slider Navs -->
						<div class="hotel_slider_nav hotel_slider_prev">
										<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='hotel_grad_prev'>
													<stop offset='0%' stop-color='#fa9e1b'/>
													<stop offset='100%' stop-color='#8d4fff'/>
												</linearGradient>
											</defs>
											<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
											M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
											C22.545,2,26,5.541,26,9.909V23.091z"/>
											<polygon class="nav_arrow" fill="#F3F6F9" points="15.044,22.222 16.377,20.888 12.374,16.885 16.377,12.882 15.044,11.55 9.708,16.885 11.04,18.219 
											11.042,18.219 "/>
										</svg>
									</div>
									
									<!-- Hotel Slider Nav - Next -->
									<div class="hotel_slider_nav hotel_slider_next">
										<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
											<defs>
												<linearGradient id='hotel_grad_next'>
													<stop offset='0%' stop-color='#fa9e1b'/>
													<stop offset='100%' stop-color='#8d4fff'/>
												</linearGradient>
											</defs>
										<path class="nav_path" fill="#F3F6F9" d="M19,0H9C4.029,0,0,4.029,0,9v15c0,4.971,4.029,9,9,9h10c4.97,0,9-4.029,9-9V9C28,4.029,23.97,0,19,0z
										M26,23.091C26,27.459,22.545,31,18.285,31H9.714C5.454,31,2,27.459,2,23.091V9.909C2,5.541,5.454,2,9.714,2h8.571
										C22.545,2,26,5.541,26,9.909V23.091z"/>
										<polygon class="nav_arrow" fill="#F3F6F9" points="13.044,11.551 11.71,12.885 15.714,16.888 11.71,20.891 13.044,22.224 18.379,16.888 17.048,15.554 
										17.046,15.554 "/>
										</svg>
									</div>
					</div>
				</div>

<!-- Hotel Info Text -->
<div class="hotel_info_text">
    <p><?= $tour['description']; ?></p>
</div>


<!-- Hotel Info Tags -->
<div class="hotel_info_tags">
	<ul class="hotel_icons_list">
		<li class="hotel_icons_item"><img src="<?= base_url('Home-css/images/post.png'); ?>" alt=""></li>
		<li class="hotel_icons_item"><img src="<?= base_url('Home-css/images/compass.png'); ?>" alt=""></li>
		<li class="hotel_icons_item"><img src="<?= base_url('Home-css/images/bicycle.png'); ?>" alt=""></li>
		<li class="hotel_icons_item"><img src="<?= base_url('Home-css/images/sailboat.png'); ?>" alt=""></li>
	</ul>
</div>
</div>




						
						<!-- Rooms -->

<<div class="rooms">
    <?php if (!empty($tour['rooms'])): ?>
        <?php foreach ($tour['rooms'] as $room): ?>
            <div class="room">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="room_image">
                            <?php if (!empty($room['image_url'])): ?>
                                <img src="<?= base_url($room['image_url']); ?>" alt="Room Image">
                            <?php else: ?>
                                <span>Không có ảnh</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="room_content">
                            <div class="room_title"><?= esc($room['name']); ?></div>
                            <div class="room_price"><?= $room['price'].'đ'.'/night'; ?></div>
                            <div class="room_text"><?= esc($room['cancellation']); ?></div>
                            <div class="room_extra"><?= esc($room['extra']); ?></div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-lg-right">
                        <div class="room_button">
                            <div class="button book_button trans_200">
                                <a href="#" onclick="openBookingForm(
                                    '<?= esc($tour['name']); ?>', 
                                    '<?= esc($room['name']); ?>', 
                                    '<?= esc($room['price']); ?>', 
                                    '<?= esc($tour['id']); ?>', 
                                    '<?= esc($room['id']); ?>'
                                )">book<span></span><span></span><span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không có phòng cho tour này.</p>
    <?php endif; ?>
</div>



<!-- Reviews Section -->
<div class="reviews">
    <div class="reviews_title">Reviews</div>
    <div class="reviews_container">
        <!-- Hiển thị đánh giá -->
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="review">
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="review_image">
                                <!-- Kiểm tra và hiển thị đúng đường dẫn ảnh của khách hàng -->
                                <img src="<?= base_url(esc($review['reviewer_image'])); ?>" alt="Reviewer Image" style="max-width: 100px; height: auto;">
                            </div>
                        </div>
                        <div class="col-lg-11">
                            <div class="review_content">
                                <div class="review_title_container">
                                    <div class="review_title"><?= esc($review['title']); ?></div>
                                    <div class="review_rating"><?= esc($review['rating']); ?></div>
                                </div>
                                <div class="review_text">
                                    <p><?= esc($review['content']); ?></p>
                                </div>
                                <div class="review_name"><?= esc($review['reviewer_name']); ?></div>
                                <div class="review_date"><?= esc($review['created_at']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No reviews yet.</p>
        <?php endif; ?>
    </div>
</div>






						<!-- Location on Map -->

						<div class="location_on_map">
							<div class="location_on_map_title">location on map</div>

							<!-- Google Map -->
		
							<div class="travelix_map">
								<div id="google_map" class="google_map">
									<div class="map_container">
										<div id="map"></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Footer -->
	


	<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
// Hàm để mở popup SweetAlert2 khi bấm "Book"
function openBookingForm(roomId, roomName, roomPrice) {
    Swal.fire({
        title: 'Đặt phòng',
        html: `
            <div style="text-align: left; font-family: Arial, sans-serif; line-height: 1.6;">
                <strong style="font-size: 20px;">${roomName}</strong><br>
                <strong>Giá: <span style="color: #e74c3c; font-size: 18px;">${roomPrice}đ/đêm</span></strong><br><br>

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
        showCloseButton: true,
        closeButtonAriaLabel: 'Đóng',
    }).then((result) => {
        if (result.isDismissed) {
            if (result.dismiss === Swal.DismissReason.cancel) {
                // Chuyển hướng khi bấm "Đăng ký tư vấn"
                window.location.href = '/contact'; 
            }
        }
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


	<script src="<?= base_url('Home-css/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/plugins/colorbox/jquery.colorbox-min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/plugins/OwlCarousel2-2.2.1/owl.carousel.js'); ?>"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="<?= base_url('Home-css/js/single_listing_custom.js'); ?>"></script>
	
	<?= $this->endSection(); ?>


