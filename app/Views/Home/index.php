<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
Index
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/main_styles.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/responsive.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('Home-content'); ?>

	<!-- Home -->

	<div class="home">
		
		<!-- Home Slider -->

		<div class="home_slider_container">
			
			<div class="owl-carousel owl-theme home_slider">

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<!-- Image by https://unsplash.com/@anikindimitry -->
					<div class="home_slider_background" style="background-image:url(<?= base_url('Home-css/images/home_slider.jpg'); ?>)"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>khám phá</h1>
							<h1>Việt Nam</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#">khám phá ngay bây giờ<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(<?= base_url('Home-css/images/home_slider.jpg'); ?>)"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>khám phá</h1>
							<h1>Việt Nam</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#">khám phá ngay bây giờ<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(<?= base_url('Home-css/images/home_slider.jpg'); ?>)"></div>

					<div class="home_slider_content text-center">
						<div class="home_slider_content_inner" data-animation-in="flipInX" data-animation-out="animate-out fadeOut">
							<h1>khám phá</h1>
							<h1>Việt Nam</h1>
							<div class="button home_slider_button"><div class="button_bcg"></div><a href="#">khám phá ngay bây giờ<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>

			</div>
			
			<!-- Home Slider Nav - Prev -->
			<div class="home_slider_nav home_slider_prev">
				<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_prev'>
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
			
			<!-- Home Slider Nav - Next -->
			<div class="home_slider_nav home_slider_next">
				<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
					<defs>
						<linearGradient id='home_grad_next'>
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

			<!-- Home Slider Dots -->

			<div class="home_slider_dots">
				<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
					<li class="home_slider_custom_dot active"><div></div>01.</li>
					<li class="home_slider_custom_dot"><div></div>02.</li>
					<li class="home_slider_custom_dot"><div></div>03.</li>
				</ul>
			</div>
			
		</div>

	</div>

	<!-- Search -->

	<div class="search">
			

				<!-- Search Contents -->
				
				<div class="container fill_height no-padding">
					<div class="row fill_height no-margin">
						<div class="col fill_height no-padding">

							<!-- Search Tabs -->

							<div class="search_tabs_container">
								<div class="search_tabs d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
									<!-- Trips Tab (Không thay đổi) -->
									<div class="search_tab <?= empty($transportType) ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/island.png'); ?>" alt="">
										<span>Chuyến đi</span>
									</div>
									
						

									<!-- Car Rentals Tab -->
									<a href="<?= base_url('/tour/offers?transport_type=ô tô'); ?>" class="search_tab <?= ($transportType == 'ô tô') ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/bus.png'); ?>" alt="">
										<span>Ô TÔ</span>
									</a>
									
									<!-- Flights Tab -->
									<a href="<?= base_url('/tour/offers?transport_type=máy bay'); ?>" class="search_tab <?= ($transportType == 'máy bay') ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/departure.png'); ?>" alt="">
										<span>MÁY BAY</span>
									</a>

									

									<!-- Cruises Tab -->
									<a href="<?= base_url('/tour/offers?transport_type=tàu thủy'); ?>" class="search_tab <?= ($transportType == 'tàu thủy') ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/cruise.png'); ?>" alt="">
										<span>TÀU THỦY</span>
									</a>

									<!-- Activities Tab (Không thay đổi) -->
										<!-- <div class="search_tab <?= empty($transportType) ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
											<img src="<?= base_url('Home-css/images/diving.png'); ?>" alt="">
											<span>Activities</span>
										</div> -->
								</div>
							</div>


							<!-- Search Panel -->

							<div class="search_panel active">
							<form action="<?= base_url('/tour/search'); ?>" id="search_form_1" class="search_panel_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-between justify-content-start">
    <div class="search_item">
        <div>Tìm kiếm</div>
        <input type="text" class="destination search_input" name="search_term" value="<?= isset($searchTerm) ? $searchTerm : ''; ?>" placeholder="Nhập tên tour hoặc điểm đến" required="required">
    </div>
    <div class="search_item">
        <div>NGÀY BẮT ĐẦU</div>
        <input type="date" class="check_in search_input" name="start_date" value="<?= isset($startDate) ? $startDate : ''; ?>">
    </div>
    <div class="search_item">
        <div>NGÀY KẾT THÚC</div>
        <input type="date" class="check_out search_input" name="end_date" value="<?= isset($endDate) ? $endDate : ''; ?>">
    </div>
    <button class="button search_button">TÌM KIẾM<span></span><span></span><span></span></button>
</form>

							</div>

							

							
						</div>
					</div>
				</div>	
				
		</div>

	<!-- Intro -->
	
	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="intro_title text-center">Chúng tôi cung cấp những tour du lịch đáng nhớ nhất</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="intro_text text-center">
						<p>mang đến cho bạn những trải nghiệm tuyệt vời và những kỷ niệm khó quên. Mỗi chuyến đi là một cơ hội để khám phá những điểm đến mới mẻ, thưởng thức những món ăn đặc sản và tận hưởng không gian thư giãn. Hãy cùng chúng tôi bắt đầu hành trình khám phá thế giới! </p>
					</div>
				</div>
			</div>
			<div class="row intro_items">

				<!-- Intro Item -->

				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@dnevozhai -->
						<div class="intro_item_background" style="background-image:url(<?= base_url('Home-css/images/intro_1.jpg'); ?>)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="intro_date">Ngày 25 tháng 5 - Ngày 01 tháng 6</div>
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">Xem thêm<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>Miền Bắc</h1>
								<div class="intro_price"></div>
								<div class="rating rating_4">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item -->

				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@hellolightbulb -->
						<div class="intro_item_background" style="background-image:url(<?= base_url('Home-css/images/intro_2.jpg'); ?>)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="intro_date">Ngày 25 tháng 5 - Ngày 01 tháng 6</div>
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">Xem thêm<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>Miền Trung</h1>
								<div class="intro_price"></div>
								<div class="rating rating_4">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Intro Item -->

				<div class="col-lg-4 intro_col">
					<div class="intro_item">
						<div class="intro_item_overlay"></div>
						<!-- Image by https://unsplash.com/@willianjusten -->
						<div class="intro_item_background" style="background-image:url(<?= base_url('Home-css/images/intro_3.jpg'); ?>)"></div>
						<div class="intro_item_content d-flex flex-column align-items-center justify-content-center">
							<div class="intro_date">Ngày 25 tháng 5 - Ngày 01 tháng 6</div>
							<div class="button intro_button"><div class="button_bcg"></div><a href="#">Xem thêm<span></span><span></span><span></span></a></div>
							<div class="intro_center text-center">
								<h1>Miền Nam</h1>
								<div class="intro_price"></div>
								<div class="rating rating_4">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- CTA -->

	<div class="cta">
		<!-- Image by https://unsplash.com/@thanni -->
		<div class="cta_background" style="background-image:url(<?= base_url('Home-css/images/cta.jpg'); ?>)"></div>
		
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- CTA Slider -->

					<div class="cta_slider_container">
						<div class="owl-carousel owl-theme cta_slider">

							<!-- CTA Slider Item -->
							<div class="owl-item cta_item text-center">
								<div class="cta_title">Gói du lịch cao cấp</div>
								<div class="rating_r rating_r_4">
									<i></i>
									<i></i>
									<i></i>
									<i></i>
									<i></i>
								</div>
								<p class="cta_text">"Chúng tôi cung cấp những dịch vụ tuyệt vời, giúp bạn có những trải nghiệm đáng nhớ. Mọi chi tiết đều được chăm chút kỹ lưỡng, từ phong cách phục vụ đến các tiện ích hiện đại. Hãy tận hưởng một kỳ nghỉ trọn vẹn với những dịch vụ đẳng cấp, mang lại sự thoải mái và thư giãn tối đa cho bạn."</p>
								<div class="button cta_button"><div class="button_bcg"></div><a href="#">Đặt ngay<span></span><span></span><span></span></a></div>
							</div>

							<!-- CTA Slider Item -->
							<div class="owl-item cta_item text-center">
								<div class="cta_title">Gói du lịch cao cấp</div>
								<div class="rating_r rating_r_4">
									<i></i>
									<i></i>
									<i></i>
									<i></i>
									<i></i>
								</div>
								<p class="cta_text">"Chúng tôi cung cấp những dịch vụ tuyệt vời, giúp bạn có những trải nghiệm đáng nhớ. Mọi chi tiết đều được chăm chút kỹ lưỡng, từ phong cách phục vụ đến các tiện ích hiện đại. Hãy tận hưởng một kỳ nghỉ trọn vẹn với những dịch vụ đẳng cấp, mang lại sự thoải mái và thư giãn tối đa cho bạn."</p>
								<div class="button cta_button"><div class="button_bcg"></div><a href="#">Đặt ngay<span></span><span></span><span></span></a></div>
							</div>

							<!-- CTA Slider Item -->
							<div class="owl-item cta_item text-center">
								<div class="cta_title">Gói du lịch cao cấp</div>
								<div class="rating_r rating_r_4">
									<i></i>
									<i></i>
									<i></i>
									<i></i>
									<i></i>
								</div>
								<p class="cta_text">"Chúng tôi cung cấp những dịch vụ tuyệt vời, giúp bạn có những trải nghiệm đáng nhớ. Mọi chi tiết đều được chăm chút kỹ lưỡng, từ phong cách phục vụ đến các tiện ích hiện đại. Hãy tận hưởng một kỳ nghỉ trọn vẹn với những dịch vụ đẳng cấp, mang lại sự thoải mái và thư giãn tối đa cho bạn."</p>
								<div class="button cta_button"><div class="button_bcg"></div><a href="#">Đặt ngay<span></span><span></span><span></span></a></div>
							</div>
							
						</div>

						<!-- CTA Slider Nav - Prev -->
						<div class="cta_slider_nav cta_slider_prev">
							<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='cta_grad_prev'>
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
						
						<!-- CTA Slider Nav - Next -->
						<div class="cta_slider_nav cta_slider_next">
							<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='cta_grad_next'>
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
			</div>
		</div>
					
	</div>

	<!-- Offers -->

	<div class="offers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2 class="section_title">Những ưu đãi tốt nhất với phòng</h2>
				</div>	
			</div>
			<div class="row offers_items">

				<!-- Offers Item -->
				<?php foreach ($tours as $tour): ?>
						<div class="col-lg-6 offers_col">
							<div class="offers_item">
								<div class="row">
									<div class="col-lg-6">
										<div class="offers_image_container">
											<div class="offers_image_background" style="background-image:url('<?= base_url($tour['image_url']); ?>')"></div>
											<div class="offer_name"><a href="#"><?= $tour['name']; ?></a></div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="offers_content">
											<div class="offers_price"><?= $tour['price_per_person']; ?><span>/người</span></div>
											<p class="offers_text"><?= substr($tour['description'], 0, 100); ?>...</p>
											<div class="offers_link"><a href="tour_detail.php?id=<?= $tour['id']; ?>">xem thêm</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>



			</div>
		</div>
	</div>

	<!-- Testimonials -->

	<div class="testimonials">
		<div class="test_border"></div>
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2 class="section_title">khách hàng nói gì về chúng tôi</h2>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<!-- Lặp qua 3 bình luận mới nhất -->

					<div class="test_slider_container">
					<div class="owl-carousel owl-theme test_slider">

						<!-- Lặp qua 3 bình luận mới nhất -->
						<?php foreach ($commentsWithNews as $item): ?>
						<div class="owl-item">
							<div class="test_item">
								<div class="test_image">
									<!-- Hiển thị hình ảnh của bản tin -->
									<img src="<?= base_url($item['news_image']); ?>" alt="News Image">
								</div>
								<div class="test_icon"><img src="<?= base_url('Home-css/images/backpack.png'); ?>" alt=""></div>
								<div class="test_content_container">
									<div class="test_content">
										<div class="test_item_info">
											<!-- Hiển thị tên khách hàng thay vì tiêu đề bình luận -->
											<div class="test_name"><?= $item['customer_name']; ?></div> <!-- Tên khách hàng -->
											<div class="test_date"><?= $item['comment']['created_at']; ?></div> <!-- Ngày bình luận -->
										</div>
										<div class="test_quote_title"><?= $item['comment']['title']; ?></div> <!-- Tiêu đề bình luận -->
										<p class="test_quote_text"><?= $item['comment']['comment']; ?></p> <!-- Nội dung bình luận -->
									
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>

					</div>



						<!-- Testimonials Slider Nav - Prev -->
						<div class="test_slider_nav test_slider_prev">
							<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='test_grad_prev'>
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
						
						<!-- Testimonials Slider Nav - Next -->
						<div class="test_slider_nav test_slider_next">
							<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="28px" height="33px" viewBox="0 0 28 33" enable-background="new 0 0 28 33" xml:space="preserve">
								<defs>
									<linearGradient id='test_grad_next'>
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
			</div>

		</div>
	</div>

	<div class="trending">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<h2 class="section_title">Xu hướng hiện nay</h2>
				</div>
			</div>
			<div class="row trending_container">

    <!-- Trending Item -->
    <div class="col-lg-3 col-sm-6">
        <div class="trending_item clearfix">
            <div class="trending_image"><img src="<?= base_url('Home-css/images/trend_1.png'); ?>" alt="https://unsplash.com/@fransaraco"></div>
            <div class="trending_content">
                <div class="trending_title"><a href="#">Khách sạn Grand</a></div>
                <div class="trending_price">Giá từ 4.200.000 VND</div>
                <div class="trending_location">Hà Nội, Việt Nam</div>
            </div>
        </div>
    </div>

    <!-- Trending Item -->
    <div class="col-lg-3 col-sm-6">
        <div class="trending_item clearfix">
            <div class="trending_image"><img src="<?= base_url('Home-css/images/trend_2.png'); ?>" alt="https://unsplash.com/@grovemade"></div>
            <div class="trending_content">
                <div class="trending_title"><a href="#">Khách sạn Mars</a></div>
                <div class="trending_price">Giá từ 4.200.000 VND</div>
                <div class="trending_location">Đà Nẵng, Việt Nam</div>
            </div>
        </div>
    </div>

    <!-- Trending Item -->
    <div class="col-lg-3 col-sm-6">
        <div class="trending_item clearfix">
            <div class="trending_image"><img src="<?= base_url('Home-css/images/trend_3.png'); ?>" alt="https://unsplash.com/@jbriscoe"></div>
            <div class="trending_content">
                <div class="trending_title"><a href="#">Khách sạn Queen</a></div>
                <div class="trending_price">Giá từ 4.200.000 VND</div>
                <div class="trending_location">Hội An, Việt Nam</div>
            </div>
        </div>
    </div>

    <!-- Trending Item -->
    <div class="col-lg-3 col-sm-6">
        <div class="trending_item clearfix">
            <div class="trending_image"><img src="<?= base_url('Home-css/images/trend_4.png'); ?>" alt="https://unsplash.com/@oowgnuj"></div>
            <div class="trending_content">
                <div class="trending_title"><a href="#">Khách sạn Mars</a></div>
                <div class="trending_price">Giá từ 4.200.000 VND</div>
                <div class="trending_location">Nha Trang, Việt Nam</div>
            </div>
        </div>
    </div>

    <!-- Trending Item -->
    <div class="col-lg-3 col-sm-6">
        <div class="trending_item clearfix">
            <div class="trending_image"><img src="<?= base_url('Home-css/images/trend_5.png'); ?>" alt="https://unsplash.com/@mindaugas"></div>
            <div class="trending_content">
                <div class="trending_title"><a href="#">Khách sạn Grand</a></div>
                <div class="trending_price">Giá từ 4.200.000 VND</div>
                <div class="trending_location">Hạ Long, Việt Nam</div>
            </div>
        </div>
    </div>

    <!-- Trending Item -->
    <div class="col-lg-3 col-sm-6">
        <div class="trending_item clearfix">
            <div class="trending_image"><img src="<?= base_url('Home-css/images/trend_6.png'); ?>" alt="https://unsplash.com/@itsnwa"></div>
            <div class="trending_content">
                <div class="trending_title"><a href="#">Khách sạn Mars</a></div>
                <div class="trending_price">Giá từ 4.200.000 VND</div>
                <div class="trending_location">Vũng Tàu, Việt Nam</div>
            </div>
        </div>
    </div>

    <!-- Trending Item -->
    <div class="col-lg-3 col-sm-6">
        <div class="trending_item clearfix">
            <div class="trending_image"><img src="<?= base_url('Home-css/images/trend_7.png'); ?>" alt="https://unsplash.com/@rktkn"></div>
            <div class="trending_content">
                <div class="trending_title"><a href="#">Khách sạn Queen</a></div>
                <div class="trending_price">Giá từ 4.200.000 VND</div>
                <div class="trending_location">Phú Quốc, Việt Nam</div>
            </div>
        </div>
    </div>

    <!-- Trending Item -->
    <div class="col-lg-3 col-sm-6">
        <div class="trending_item clearfix">
            <div class="trending_image"><img src="<?= base_url('Home-css/images/trend_8.png'); ?>" alt="https://unsplash.com/@thoughtcatalog"></div>
            <div class="trending_content">
                <div class="trending_title"><a href="#">Khách sạn Mars</a></div>
                <div class="trending_price">Giá từ 4.200.000 VND</div>
                <div class="trending_location">Cần Thơ, Việt Nam</div>
            </div>
        </div>
    </div>

			</div>

		</div>
	</div>

	<div class="contact">
		<div class="contact_background" style="background-image:url(<?= base_url('Home-css/images/contact.png'); ?>)"></div>

		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="contact_image">
						
					</div>
				</div>
				<div class="col-lg-7">
					<div class="contact_form_container">
					<div class="contact_title text-center">Liên hệ</div>
<form action="#" id="contact_form" class="contact_form text-center">
    <input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Tên" required="required" data-error="Tên là bắt buộc.">
    <input type="email" id="contact_form_email" class="contact_form_email input_field" placeholder="E-mail" required="required" data-error="E-mail là bắt buộc.">
    <input type="text" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Chủ đề" required="required" data-error="Chủ đề là bắt buộc.">
    <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Tin nhắn" required="required" data-error="Vui lòng viết tin nhắn."></textarea>
    <button type="submit" id="form_submit_button" class="form_submit_button button">Gửi tin nhắn<span></span><span></span><span></span></button>
</form>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

   

	<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	<script src="<?= base_url('Home-css/js/custom.js'); ?>"></script>
	<?= $this->endSection(); ?>