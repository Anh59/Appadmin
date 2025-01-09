<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
About
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/about_styles.css')?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/about_responsive.css')?>"><!DOCTYPE html>
<?= $this->endSection() ?>


<?= $this->section('Home-content'); ?>

	<!-- Home -->

	<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/about_background.jpg'); ?>"></div>

		<div class="home_content">
			<div class="home_title">about us</div>
		</div>
	</div>

	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="intro_image"><img src="<?= base_url('Home-css/images/intro.png'); ?>" alt=""></div>
				</div>
				<div class="col-lg-5">
					<div class="intro_content">
						<div class="intro_title">chúng tôi có những chuyến đi tốt nhất</div>
						<p class="intro_text">Chúng tôi tự hào mang đến cho bạn những chuyến đi tuyệt vời nhất, nơi mỗi hành trình không chỉ là một chuyến du lịch mà còn là một trải nghiệm đáng nhớ. Với dịch vụ chuyên nghiệp, điểm đến độc đáo, và đội ngũ hướng dẫn viên tận tâm, chúng tôi cam kết mang đến sự hài lòng và niềm vui trên từng chặng đường. Hãy cùng chúng tôi khám phá những điểm đến mơ ước và tạo nên những kỷ niệm không thể quên!</p>
						<div class="button intro_button"><div class="button_bcg"></div><a href="<?= route_to('Tour_offers') ?>">xem ngay bây giờ<span></span><span></span><span></span></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Stats -->

	<div class="stats">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title">số liệu thống kê hàng năm</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<p class="stats_text">Số liệu thống kê năm nay phản ánh rõ nét sự tăng trưởng và đổi mới trong ngành. Chúng tôi không ngừng nỗ lực mang đến những giải pháp hiệu quả, tập trung vào cải thiện chất lượng dịch vụ và nâng cao trải nghiệm khách hàng. Với những bước tiến quan trọng trong các lĩnh vực cốt lõi, số liệu cho thấy sự tăng trưởng vượt bậc, minh chứng cho cam kết phát triển bền vững và thành công lâu dài. Hãy cùng chúng tôi khám phá chi tiết những kết quả nổi bật trong năm qua và định hướng phát triển trong tương lai! </p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="stats_years">
						<div class="stats_years_last">2016</div>
						<div class="stats_years_new float-right">2017</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
				<div class="stats_contents">

						<!-- Stats Item -->
						<div class="stats_item d-flex flex-md-row flex-column clearfix">
							<div class="stats_last order-md-1 order-3">
								<div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
									<img src="<?= base_url('Home-css/images/stats_1.png'); ?>" alt="">
								</div>
								<div class="stats_last_content">
									<div class="stats_number">16,420,000₫</div>
									<div class="stats_type">Khách Hàng Thân Thiết</div>
								</div>
							</div>
							<div class="stats_bar order-md-2 order-2" data-x="16420" data-y="35270" data-color="#31124b">
								<div class="stats_bar_perc">
									<div>
										<div class="stats_bar_value"></div>
									</div>
								</div>
							</div>
							<div class="stats_new order-md-3 order-1 text-right">
								<div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
									<img src="<?= base_url('Home-css/images/stats_1.png'); ?>" alt="">
								</div>
								<div class="stats_new_content">
									<div class="stats_number">35,270,000₫</div>
									<div class="stats_type">Doanh Thu</div>
								</div>
							</div>
						</div>

						<!-- Stats Item -->
						<div class="stats_item d-flex flex-md-row flex-column clearfix">
							<div class="stats_last order-md-1 order-3">
								<div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
									<img src="<?= base_url('Home-css/images/stats_2.png'); ?>" alt="">
								</div>
								<div class="stats_last_content">
									<div class="stats_number">768</div>
									<div class="stats_type">Khách Hàng Quay Lại</div>
								</div>
							</div>
							<div class="stats_bar order-md-2 order-2" data-x="768" data-y="1450" data-color="#a95ce4">
								<div class="stats_bar_perc">
									<div>
										<div class="stats_bar_value"></div>
									</div>
								</div>
							</div>
							<div class="stats_new order-md-3 order-1 text-right">
								<div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
									<img src="<?= base_url('Home-css/images/stats_2.png'); ?>" alt="">
								</div>
								<div class="stats_new_content">
									<div class="stats_number">1,450</div>
									<div class="stats_type">Khách Hàng Mới</div>
								</div>
							</div>
						</div>

						<!-- Stats Item -->
						<div class="stats_item d-flex flex-md-row flex-column clearfix">
							<div class="stats_last order-md-1 order-3">
								<div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
									<img src="<?= base_url('Home-css/images/stats_3.png'); ?>" alt="">
								</div>
								<div class="stats_last_content">
									<div class="stats_number">11,546</div>
									<div class="stats_type">Lượt Truy Cập</div>
								</div>
							</div>
							<div class="stats_bar order-md-2 order-2" data-x="11546" data-y="9321" data-color="#fa6f1b">
								<div class="stats_bar_perc">
									<div>
										<div class="stats_bar_value"></div>
									</div>
								</div>
							</div>
							<div class="stats_new order-md-3 order-1 text-right">
								<div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
									<img src="<?= base_url('Home-css/images/stats_3.png'); ?>" alt="">
								</div>
								<div class="stats_new_content">
									<div class="stats_number">9,321</div>
									<div class="stats_type">Đánh Giá</div>
								</div>
							</div>
						</div>

						<!-- Stats Item -->
						<div class="stats_item d-flex flex-md-row flex-column clearfix">
							<div class="stats_last order-md-1 order-3">
								<div class="stats_last_icon d-flex flex-column align-items-center justify-content-end">
									<img src="<?= base_url('Home-css/images/stats_4.png'); ?>" alt="">
								</div>
								<div class="stats_last_content">
									<div class="stats_number">3,729</div>
									<div class="stats_type">Dịch Vụ</div>
								</div>
							</div>
							<div class="stats_bar order-md-2 order-2" data-x="3729" data-y="17429" data-color="#fa9e1b">
								<div class="stats_bar_perc">
									<div>
										<div class="stats_bar_value"></div>
									</div>
								</div>
							</div>
							<div class="stats_new order-md-3 order-1 text-right">
								<div class="stats_new_icon d-flex flex-column align-items-center justify-content-end">
									<img src="<?= base_url('Home-css/images/stats_4.png'); ?>" alt="">
								</div>
								<div class="stats_new_content">
									<div class="stats_number">17,429</div>
									<div class="stats_type">Tổng Hợp</div>
								</div>
							</div>
						</div>

						</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Add -->

	<div class="add">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="add_container">
					<div class="add_background" style="background-image:url('<?= base_url('Home-css/images/add.jpg'); ?>')"></div>

						<div class="add_content">
							<h1 class="add_title">Việt Nam</h1>
							<div class="add_subtitle">Đia điểm<span>Hạ long</span></div>
							<div class="button add_button"><div class="button_bcg"></div><a href="#">Khám phá bây giờ<span></span><span></span><span></span></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Milestones -->

	<div class="milestones">
		<div class="container">
		<div class="row">
				
				<!-- Cột Thành Tích -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url('Home-css/images/milestone_1.png'); ?>" alt=""></div>
						<div class="milestone_counter" data-end-value="255">0</div>
						<div class="milestone_text">Khách Hàng</div>
					</div>
				</div>

				<!-- Cột Thành Tích -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url('Home-css/images/milestone_2.png'); ?>" alt=""></div>
						<div class="milestone_counter" data-end-value="1176">0</div>
						<div class="milestone_text">Dự Án</div>
					</div>
				</div>

				<!-- Cột Thành Tích -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url('Home-css/images/milestone_3.png'); ?>" alt=""></div>
						<div class="milestone_counter" data-end-value="39">0</div>
						<div class="milestone_text">Thành phố</div>
					</div>
				</div>

				<!-- Cột Thành Tích -->
				<div class="col-lg-3 milestone_col">
					<div class="milestone text-center">
						<div class="milestone_icon"><img src="<?= base_url('Home-css/images/milestone_4.png'); ?>" alt=""></div>
						<div class="milestone_counter" data-end-value="127">0</div>
						<div class="milestone_text">Chuyến đi</div>
					</div>
				</div>

			</div>

		</div>
	</div>

	<!-- Footer -->

	<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	
	

		<script src="<?= base_url('Home-css/js/jquery-3.2.1.min.js'); ?>"></script>
		<script src="<?= base_url('Home-css/styles/bootstrap4/popper.js'); ?>"></script>
		<script src="<?= base_url('Home-css/styles/bootstrap4/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('Home-css/plugins/greensock/TweenMax.min.js'); ?>"></script>
		<script src="<?= base_url('Home-css/plugins/greensock/TimelineMax.min.js'); ?>"></script>
		<script src="<?= base_url('Home-css/plugins/scrollmagic/ScrollMagic.min.js'); ?>"></script>
		<script src="<?= base_url('Home-css/plugins/greensock/animation.gsap.min.js'); ?>"></script>
		<script src="<?= base_url('Home-css/plugins/greensock/ScrollToPlugin.min.js'); ?>"></script>
		<script src="<?= base_url('Home-css/plugins/OwlCarousel2-2.2.1/owl.carousel.js'); ?>"></script>
		<script src="<?= base_url('Home-css/plugins/easing/easing.js'); ?>"></script>
		<script src="<?= base_url('Home-css/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
		<script src="<?= base_url('Home-css/js/about_custom.js'); ?>"></script>
<?= $this->endSection(); ?>
