
<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
Contact
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/contact_styles.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/contact_responsive.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('Home-content'); ?>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/contact_background.jpg'); ?>"></div>
		<div class="home_content">
			<div class="home_title">liên hệ</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact_form_section">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Contact Form -->
					<div class="contact_form_container">
						<div class="contact_title text-center">Liên hệ</div>
						<form action="<?= base_url('submit-consultation') ?>" method="POST" id="contact_form" class="contact_form text-center">
							<input type="text" name="name" id="contact_form_name" class="contact_form_name input_field" placeholder="Tên" required="required">
							<input type="email" name="email" id="contact_form_email" class="contact_form_email input_field" placeholder="E-mail" required="required">
							<input type="text" name="subject" id="contact_form_subject" class="contact_form_subject input_field" placeholder="Chủ đề" required="required">
							<textarea name="message" id="contact_form_message" class="text_field contact_form_message" rows="4" placeholder="Tin nhắn" required="required"></textarea>
							<button type="submit" class="form_submit_button">Gửi tin nhắn</button>
						</form>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- About -->
	<div class="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					
					<!-- About - Image -->

					<div class="about_image">
						<img src="<?= base_url('Home-css/images/man.png'); ?>" alt="">
					</div>

				</div>

				<div class="col-lg-4">
					
					<!-- About - Content -->

					<div class="about_content">
						<div class="logo_container about_logo">
							<div class="logo"><a href="#"><img src="<?= base_url('Home-css/images/logo.png'); ?>" alt="">travelix</a></div>
						</div>
						<p class="about_text">Nơi khơi nguồn cảm hứng cho những chuyến đi khám phá và trải nghiệm mới lạ. Chúng tôi cung cấp thông tin chi tiết về các địa điểm du lịch hấp dẫn, hành trình khám phá thiên nhiên kỳ thú, cùng với các gợi ý độc đáo giúp bạn tận hưởng những chuyến phượt đáng nhớ. Với đội ngũ giàu kinh nghiệm và đam mê, chúng tôi cam kết mang đến cho bạn những dịch vụ tốt nhất, từ lập kế hoạch chuyến đi đến hỗ trợ trong suốt hành trình. Hãy để chúng tôi đồng hành cùng bạn trên con đường chinh phục những miền đất mới!</p>
						<ul class="about_social_list">
							<li class="about_social_item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="about_social_item"><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>

				</div>

				<div class="col-lg-3">
					
					<!-- About Info -->

					<div class="about_info">
						<ul class="contact_info_list">
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="<?= base_url('Home-css/images/placeholder.svg'); ?>" alt=""></div></div>
								<div class="contact_info_text">Số 45B-C, Đường Quang Trung, Quận Hà Đông, Hà Nội</div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="<?= base_url('Home-css/images/phone-call.svg'); ?>" alt=""></div></div>
								<div class="contact_info_text">+84373562881</div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="<?= base_url('Home-css/images/message.svg'); ?>" alt=""></div></div>
								<div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">nicktestcake@gmail.com</a></div>
							</li>
							<li class="contact_info_item d-flex flex-row">
								<div><div class="contact_info_icon"><img src="<?= base_url('Home-css/images/planet-earth.svg'); ?>" alt=""></div></div>
								<div class="contact_info_text"><a href="https://colorlib.com">www.travelix.com</a></div>
							</li>
						</ul>
					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- Google Map -->
		
	<div class="travelix_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="<?= base_url('Home-css/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/js/contact_custom.js'); ?>"></script>
	<?= $this->endSection(); ?>
