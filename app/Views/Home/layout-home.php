<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $this->renderSection('title') ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Travelix Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?=base_url('Home-css/styles/bootstrap4/bootstrap.min.css')?>">
<link href="<?=base_url('Home-css/plugins/font-awesome-4.7.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=base_url('Home-css/plugins/OwlCarousel2-2.2.1/owl.carousel.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('Home-css/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('Home-css/plugins/OwlCarousel2-2.2.1/animate.css')?>">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Thêm jQuery từ CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?= $this->renderSection('Home-css') ?>

</head>
<body>

<div class="super_container">
	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="phone">+45 345 3324 56789</div>
						<div class="social">
							<ul class="social_list">
								<li class="social_list_item"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								<li class="social_list_item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div class="user_box ml-auto">
    <?php if (session()->has('customer_id')): ?>
        <!-- Hiển thị avatar và tên người dùng -->
        <!-- <div class="user_box_avatar">
            <img src="<?= session()->get('customer_avatar') ?>" alt="Avatar" class="avatar_img" id="avatarDropdown" style="cursor:pointer;">
        </div> -->
        <div class="user_box_name" id="userDropdown" style="cursor:pointer;">
            <span><?= session()->get('customer_name') ?></span>
        </div>
        <!-- Menu thả xuống -->
        <ul class="dropdown-menu" id="dropdownMenu" style="display:none;">
            <li><a href="<?= route_to('profile') ?>">Thông tin cá nhân</a></li>
            <li><a href="<?= route_to('logout') ?>">Đăng xuất</a></li>
        </ul>
    <?php else: ?>
        <!-- Nếu chưa đăng nhập -->
        <div class="user_box_login user_box_link"><a href="<?= route_to('Customers_sign') ?>">Đăng Nhập</a></div>
        <div class="user_box_register user_box_link"><a href="<?= route_to('Customers_Register') ?>">Đăng Ký</a></div>
    <?php endif; ?>
</div>



					</div>
				</div>
			</div>		
		</div>

		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
						<div class="logo_container">
							<div class="logo"><a href="#"><img src="<?= base_url('Home-css/images/logo.png'); ?>" alt="">travelix</a></div>
						</div>
						<div class="main_nav_container ml-auto">
							<ul class="main_nav_list">
								<li class="main_nav_item"><a href="<?= route_to('Tour_index') ?>">home</a></li>
								<li class="main_nav_item"><a href="<?= route_to('Tour_about') ?>">about us</a></li>
								<li class="main_nav_item"><a href="<?= route_to('Tour_offers') ?>">offers</a></li>
								<li class="main_nav_item"><a href="<?= route_to('Tour_blog') ?>">news</a></li>
								<li class="main_nav_item"><a href="<?= route_to('Tour_contact') ?>">contact</a></li>
							</ul>
						</div>
						<div class="content_search ml-lg-0 ml-auto">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="17px" height="17px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
								<g>
									<g>
										<g>
											<path class="mag_glass" fill="#FFFFFF" d="M78.438,216.78c0,57.906,22.55,112.343,63.493,153.287c40.945,40.944,95.383,63.494,153.287,63.494
											s112.344-22.55,153.287-63.494C489.451,329.123,512,274.686,512,216.78c0-57.904-22.549-112.342-63.494-153.286
											C407.563,22.549,353.124,0,295.219,0c-57.904,0-112.342,22.549-153.287,63.494C100.988,104.438,78.439,158.876,78.438,216.78z
											M119.804,216.78c0-96.725,78.69-175.416,175.415-175.416s175.418,78.691,175.418,175.416
											c0,96.725-78.691,175.416-175.416,175.416C198.495,392.195,119.804,313.505,119.804,216.78z"/>
										</g>
									</g>
									<g>
										<g>
											<path class="mag_glass" fill="#FFFFFF" d="M6.057,505.942c4.038,4.039,9.332,6.058,14.625,6.058s10.587-2.019,14.625-6.058L171.268,369.98
											c8.076-8.076,8.076-21.172,0-29.248c-8.076-8.078-21.172-8.078-29.249,0L6.057,476.693
											C-2.019,484.77-2.019,497.865,6.057,505.942z"/>
										</g>
									</g>
								</g>
							</svg>
						</div>

						<form id="search_form" class="search_form bez_1">
							<input type="search" class="search_content_input bez_1">
						</form>
						
						<div class="hamburger">
							<i class="fa fa-bars trans_200"></i>
						</div>
					</div>
				</div>
			</div>	
		</nav>

	</header>

    <div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo"><a href="#"><img src="<?= base_url('Home-css/images/logo.png'); ?>" alt=""></a></div>
			<ul>
				<li class="menu_item"><a href="index.html">home</a></li>
				<li class="menu_item"><a href="#">about us</a></li>
				<li class="menu_item"><a href="offers.html">offers</a></li>
				<li class="menu_item"><a href="blog.html">news</a></li>
				<li class="menu_item"><a href="contact.html">contact</a></li>
			</ul>
		</div>
	</div>
	<!-- home -->
	

    <?= $this->renderSection('Home-content') ?>

    <footer class="footer">
		<div class="container">
			<div class="row">

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_content footer_about">
							<div class="logo_container footer_logo">
								<div class="logo"><a href="#"><img src="<?= base_url('Home-css/images/logo.png'); ?>" alt="">travelix</a></div>
							</div>
							<p class="footer_about_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis vu lputate eros, iaculis consequat nisl. Nunc et suscipit urna. Integer eleme ntum orci eu vehicula pretium.</p>
							<ul class="footer_social_list">
								<li class="footer_social_item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li class="footer_social_item"><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">blog posts</div>
						<div class="footer_content footer_blog">
							
							<!-- Footer blog item -->
							<div class="footer_blog_item clearfix">
								<div class="footer_blog_image"><img src="<?= base_url('Home-css/images/footer_blog_1.jpg'); ?>" alt="https://unsplash.com/@avidenov">
								</div>
								<div class="footer_blog_content">
									<div class="footer_blog_title"><a href="blog.html">Travel with us this year</a></div>
									<div class="footer_blog_date">Nov 29, 2017</div>
								</div>
							</div>
							
							<!-- Footer blog item -->
							<div class="footer_blog_item clearfix">
								<div class="footer_blog_image"><img src="<?= base_url('Home-css/images/footer_blog_2.jpg');?>" alt="https://unsplash.com/@deannaritchie'); ?>"></div>
								<div class="footer_blog_content">
									<div class="footer_blog_title"><a href="blog.html">New destinations for you</a></div>
									<div class="footer_blog_date">Nov 29, 2017</div>
								</div>
							</div>

							<!-- Footer blog item -->
							<div class="footer_blog_item clearfix">
								<div class="footer_blog_image"><img src="<?= base_url('Home-css/images/footer_blog_3.jpg')?>" alt="https://unsplash.com/@bergeryap87'); ?>"></div>
								<div class="footer_blog_content">
									<div class="footer_blog_title"><a href="blog.html">Travel with us this year</a></div>
									<div class="footer_blog_date">Nov 29, 2017</div>
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">tags</div>
						<div class="footer_content footer_tags">
							<ul class="tags_list clearfix">
								<li class="tag_item"><a href="#">design</a></li>
								<li class="tag_item"><a href="#">fashion</a></li>
								<li class="tag_item"><a href="#">music</a></li>
								<li class="tag_item"><a href="#">video</a></li>
								<li class="tag_item"><a href="#">party</a></li>
								<li class="tag_item"><a href="#">photography</a></li>
								<li class="tag_item"><a href="#">adventure</a></li>
								<li class="tag_item"><a href="#">travel</a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Footer Column -->
				<div class="col-lg-3 footer_column">
					<div class="footer_col">
						<div class="footer_title">contact info</div>
						<div class="footer_content footer_contact">
							<ul class="contact_info_list">
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="<?= base_url('Home-css/images/placeholder.svg'); ?>" alt=""></div></div>
									<div class="contact_info_text">4127 Raoul Wallenber 45b-c Gibraltar</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="<?= base_url('Home-css/images/phone-call.svg'); ?>" alt=""></div></div>
									<div class="contact_info_text">2556-808-8613</div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="<?= base_url('Home-css/images/message.svg'); ?>" alt=""></div></div>
									<div class="contact_info_text"><a href="mailto:contactme@gmail.com?Subject=Hello" target="_top">contactme@gmail.com</a></div>
								</li>
								<li class="contact_info_item d-flex flex-row">
									<div><div class="contact_info_icon"><img src="<?= base_url('Home-css/images/planet-earth.svg'); ?>" alt=""></div></div>
									<div class="contact_info_text"><a href="https://colorlib.com">www.colorlib.com</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-lg-1 order-2  ">
					<div class="copyright_content d-flex flex-row align-items-center">
						<div><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					</div>
				</div>
				<div class="col-lg-9 order-lg-2 order-1">
					<div class="footer_nav_container d-flex flex-row align-items-center justify-content-lg-end">
						<div class="footer_nav">
							<ul class="footer_nav_list">
								<li class="footer_nav_item"><a href="index.html">home</a></li>
								<li class="footer_nav_item"><a href="#">about us</a></li>
								<li class="footer_nav_item"><a href="offers.html">offers</a></li>
								<li class="footer_nav_item"><a href="blog.html">news</a></li>
								<li class="footer_nav_item"><a href="contact.html">contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	//thông báo thành công - thất bại
	function showSuccessMessage(title, message) {
    Swal.fire({
        icon: 'success',
        title: title,
        text: message,
        confirmButtonText: 'OK'
    });
}

function showErrorMessage(title, message) {
    Swal.fire({
        icon: 'error',
        title: title,
        text: message,
        confirmButtonText: 'OK'
    });
}
<?php if (session()->getFlashdata('success')) : ?>
<script>
    Swal.fire({
        icon: 'success',
        title: '<?= session()->getFlashdata('success') ?>',
        showConfirmButton: false,
        timer: 1500
    });
</script>
<?php endif; ?>

</script>
<script>
$(document).ready(function() {
    // Hiển thị/ẩn menu khi bấm vào tên hoặc avatar
    $('#userDropdown, #avatarDropdown').on('click', function() {
        $('#dropdownMenu').toggle(); // Toggle hiển thị/ẩn menu
    });

    // Khi bấm vào "Đăng xuất", gọi controller logout
    $('#dropdownMenu li a[href="<?= route_to('logout') ?>"]').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định
        $.ajax({
            url: '<?= route_to('logout') ?>', // Gọi API logout
            type: 'GET',
            success: function(response) {
                // Chuyển hướng sau khi đăng xuất thành công
                window.location.href = '<?= route_to('Tour_index') ?>'; // Hoặc trang khác
            },
            error: function() {
                alert('Có lỗi xảy ra khi đăng xuất!');
            }
        });
    });
});

</script>
    <script src="<?= base_url('Home-css/js/jquery-3.2.1.min.js'); ?>"></script>
    <script src="<?= base_url('Home-css/styles/bootstrap4/popper.js'); ?>"></script>
    <script src="<?= base_url('Home-css/styles/bootstrap4/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('Home-css/plugins/OwlCarousel2-2.2.1/owl.carousel.js'); ?>"></script>
    <script src="<?= base_url('Home-css/plugins/easing/easing.js'); ?>"></script>
	
	<?= $this->renderSection('Home-scripts') ?>

    
</body>
</html>