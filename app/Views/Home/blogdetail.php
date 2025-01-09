
<?php print_r($news); ?>

<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
blogdetail
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/plugins/colorbox/colorbox.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/single_listing_styles.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/single_listing_responsive.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('Home-content'); ?>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/blog_background.jpg'); ?>"></div>
		<div class="home_content">
			<div class="home_title">the offers</div>
		</div>
	</div>

	<!-- Offers -->

	<div class="listing">

		<!-- Search -->

	

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
                            <h1 class="hotel_title"><?= $news['title'] ?></h1>
                            <div class="hotel_location">Tác giả: <?= $news['author_id'] ?> - Thể loại: <?= $news['category'] ?></div>

                            </div>
                            <div class="hotel_title_button ml-lg-auto text-lg-right">
                                <div class="button book_button trans_200"><a href="#">Lưu<span></span><span></span><span></span></a></div>
                            </div>
                        </div>

    <!-- Listing Image -->
                            <div class="hotel_image">
                            <img src="<?= base_url( $news['image']); ?>" alt="">

                                <div class="hotel_review_container d-flex flex-column align-items-center justify-content-center">
                                    <div class="hotel_review">
                                        <div class="hotel_review_content">
                                        <div class="hotel_review_title"><?= date('M Y', strtotime($news['created_at'])) ?></div>
                                        <div class="hotel_review_subtitle"><?= $totalComments ?> bình luận</div>
                                        </div>
                                        <div class="hotel_review_rating text-center"><?= date('d', strtotime($news['created_at'])) ?></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hotel Info Text -->
                            <div class="hotel_info_text">
                                <p><?= $news['content'] ?></p>
                            </div>



    <!-- Reviews -->
    <div class="reviews">
    <div class="reviews_title">Bình Luận</div>
    <div class="reviews_container">
        <?php if (empty($comments)): ?>
            <p>Chưa có bình luận nào.</p>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class="review">
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="review_image">
                                <img src="<?=  $comment['user_avatar'] ?? 'default_avatar.png'; ?>" alt="Avatar">
                            </div>
                        </div>
                        <div class="col-lg-11">
                            <div class="review_content">
                                <div class="review_title_container">
                                    <div class="review_title">"<?= esc($comment['title']) ?>"</div>
                                    <!-- <div class="review_rating"><?= esc($comment['rating'] ?? 'N/A') ?></div> -->
                                </div>
                                <div class="review_text">
                                    <p><?= esc($comment['comment']) ?></p>
                                </div>
                                <div class="review_name"><?= esc($comment['user_name']) ?></div>
                                <div class="review_date"><?= date('d M Y', strtotime($comment['created_at'])) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</div>

<div class="add_comment my-5">
    <!-- Button to toggle the form -->
    <div class="text-center">
        <button id="show_form_button" class="btn btn-primary px-4 py-2">Add Comment</button>
    </div>

    <!-- Comment Form (Initially Hidden) -->
    <div id="comment_form_wrapper" class="mt-4 d-none">
        <!-- Hiển thị thông báo yêu cầu đăng nhập nếu chưa đăng nhập -->
        <?php if (!session('isLoggedIn')): ?>
            <div class="alert alert-warning text-center">
                Bạn cần <a href="<?= route_to('Customers_sign'); ?>" class="alert-link">Đăng nhập</a> để gửi bình luận.
            </div>
        <?php else: ?>
            <form id="comment_form" class="comment_form" method="POST" action="<?= route_to('submit-comment'); ?>">
            <!-- Tiêu đề -->
            <div class="mb-3">
                <div class="form-floating">
                    <input type="text" id="comment_title" name="title" class="form-control" placeholder="Title" required>
                    <label for="comment_title">Title</label>
                </div>
            </div>
            <!-- Nội dung bình luận -->
            <div class="mb-3">
                <div class="form-floating">
                    <textarea id="comment_text" name="comment" class="form-control" placeholder="Write your comment here..." style="height: 150px;" required></textarea>
                    <label for="comment_text">Write your comment here...</label>
                </div>
            </div>
            <!-- ID bài viết (ẩn) -->
            <input type="hidden" name="news_id" value="<?= $news['id']; ?>">
            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-success px-4 py-2">Submit Comment</button>
            </div>
        </form>

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
    document.getElementById('show_form_button').addEventListener('click', function () {
        const formWrapper = document.getElementById('comment_form_wrapper');
        formWrapper.classList.toggle('d-none'); // Hiển thị hoặc ẩn form
    });
</script>

	<script src="<?= base_url('Home-css/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/plugins/colorbox/jquery.colorbox-min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/plugins/OwlCarousel2-2.2.1/owl.carousel.js'); ?>"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="<?= base_url('Home-css/js/single_listing_custom.js'); ?>"></script>
	
	<?= $this->endSection(); ?>