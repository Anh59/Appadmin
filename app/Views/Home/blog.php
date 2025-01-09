
<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
Blog
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/plugins/colorbox/colorbox.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/blog_styles.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/blog_responsive.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('Home-content'); ?>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/blog_background.jpg'); ?>"></div>
		<div class="home_content">
			<div class="home_title">bản tin</div>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">

				<!-- Blog Content -->

				<div class="col-lg-8">
					
				<div class="blog_posts_container">
					<?php foreach ($newsList as $news): ?>
						<div class="blog_post">
							<div class="blog_post_image">
								<img src="<?= base_url($news['image'] ?? 'Home-css/images/default.jpg'); ?>" alt="Bản Tin">
								<div class="blog_post_date d-flex flex-column align-items-center justify-content-center">
									<?php 
										$date = date_create($news['created_at']); 
										$day = date_format($date, 'd');
										$month = date_format($date, 'M, Y');
									?>
									<div class="blog_post_day"><?= $day ?></div>
									<div class="blog_post_month"><?= $month ?></div>
								</div>
							</div>
							<div class="blog_post_meta">
								<ul>
									<li class="blog_post_meta_item"><a href="#">Tác giả:  <?= $news['author_id'] ?></a></li>
									<li class="blog_post_meta_item"><a href="#"><?= $news['category'] ?></a></li>
									<li class="blog_post_meta_item"><a href="#"><?= $news['comments_count'] ?> Bình Luận</a></li>
								</ul>
							</div>
							<div class="blog_post_title"><a href="<?= route_to('News_Detail', $news['id']) ?>"><?= $news['title'] ?></a></div>
							<div class="blog_post_text">
								<p>
									<?php 
										$summary = strlen($news['content']) > 200 ? substr($news['content'], 0, 200) . '...' : $news['content'];
										echo $summary; 
									?>
								</p>
							</div>
							<div class="blog_post_link"><a href="<?= route_to('Tour_blogdetail', $news['id']) ?>">Đọc Thêm</a></div>
						</div>
					<?php endforeach; ?>
				</div>	

						<!-- phân trang  -->
						<div class="blog_navigation">
							<ul>
								<!-- Previous Button -->
								<li class="blog_dot <?= ($pager->getCurrentPage() == 1) ? 'disabled' : '' ?>">
									<a href="<?= ($pager->getCurrentPage() > 1) ? site_url('blog?page=' . ($pager->getCurrentPage() - 1)) : '#' ?>">
										<div></div><<
									</a>
								</li>

								<!-- Page Numbers -->
								<?php for ($i = 1; $i <= $totalPages; $i++): ?>
									<li class="blog_dot <?= ($i == $pager->getCurrentPage()) ? 'active' : '' ?>">
										<a href="<?= site_url('blog?page=' . $i) ?>">
											<div></div><?= sprintf('%02d', $i) ?>.
										</a>
									</li>
								<?php endfor; ?>

								<!-- Next Button -->
								<li class="blog_dot <?= ($pager->getCurrentPage() == $totalPages) ? 'disabled' : '' ?>">
									<a href="<?= ($pager->getCurrentPage() < $totalPages) ? site_url('blog?page=' . ($pager->getCurrentPage() + 1)) : '#' ?>">
										<div></div>>>
									</a>
								</li>
							</ul>
						</div>


				</div>

				<!-- Blog Sidebar -->

				<div class="col-lg-4 sidebar_col">

					<!-- Sidebar Search -->
					<div class="sidebar_search">
						<form action="<?= route_to('Tour_blog') ?>" method="get">
							<input id="sidebar_search_input" name="q" type="search" class="sidebar_search_input" placeholder="" required="required">
							<button id="sidebar_search_button" type="submit" class="sidebar_search_button trans_300" value="Submit">
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
							</button>
						</form>
					</div>
					
					<!-- Sidebar Archives -->
					<div class="sidebar_archives">
						<div class="sidebar_title">Lưu Trữ</div>
						<div class="sidebar_list">
							<ul>
								<li><a href="#">Tháng 3 2017</a></li>
								<li><a href="#">Tháng 4 2017</a></li>
								<li><a href="#">Tháng 5 2017</a></li>
							</ul>
						</div>
					</div>

					
					<!-- Sidebar Archives -->
					<div class="sidebar_categories">
						<div class="sidebar_title">Thể loại</div>
						<div class="sidebar_list">
							<ul>
							<li><a href="#">Du Lịch</a></li>
							<li><a href="#">Điểm Đến Huyền Bí</a></li>
							<li><a href="#">Chuyến Đi Ngắn Ngày</a></li>
							<li><a href="#">Mẹo Du Lịch</a></li>
							<li><a href="#">Phong Cách Sống & Du Lịch</a></li>
							<li><a href="#">Chuyến Đi Ngắn Ngày</a></li>
							<li><a href="#">Chưa Phân Loại</a></li>

							</ul>
						</div>
					</div>

					<!-- Sidebar Latest Posts -->

					<div class="sidebar_latest_posts">
								<div class="sidebar_title">Bài viết mới nhất</div>
								<div class="latest_posts_container">
									<ul>
										<?php if (!empty($latestPosts)): ?>
											<?php foreach ($latestPosts as $post): ?>
												<li class="latest_post clearfix">
													<div class="latest_post_image">
														<a href="<?= base_url('blog/' . $post['id']); ?>">
															<img src="<?= base_url( $post['image']); ?>" alt="<?= esc($post['title']); ?>"width="80" height="70">
														</a>
													</div>
													<div class="latest_post_content">
														<div class="latest_post_title trans_200">
															<a href="<?= base_url('blog/' . $post['id']); ?>"><?= esc($post['title']); ?></a>
														</div>
														<div class="latest_post_meta">
															<div class="latest_post_author trans_200">
																<a href="#">Tác giả :<?= esc($post['author_id']); ?></a>
															</div>
															<div class="latest_post_date trans_200">
																<a href="#"><?= date('M d, Y', strtotime($post['created_at'])); ?></a>
															</div>
														</div>
													</div>
												</li>
											<?php endforeach; ?>
										<?php else: ?>
											<li class="latest_post clearfix">
												<p>No latest posts available.</p>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>


					<!-- Sidebar Gallery -->
					<div class="sidebar_gallery">
						<div class="sidebar_title">Instagram</div>
						<div class="gallery_container">
							<ul class="gallery_items d-flex flex-row align-items-start justify-content-between flex-wrap">
								<li class="gallery_item">
									<a class="colorbox" href="https://images.unsplash.com/photo-1473625247510-8ceb1760943f?ixlib=rb-0.3.5&s=c0996cd16eda8c6f54c398de02d03cd3&auto=format&fit=crop&w=720&q=80">
										<img src="<?= base_url('Home-css/images/gallery_1.jpg'); ?>" alt="https://unsplash.com/@mantashesthaven">
									</a>
								</li>
								<li class="gallery_item">
									<a class="colorbox" href="https://images.unsplash.com/photo-1495162048225-6b3b37b8a69e?ixlib=rb-0.3.5&s=861dd3c7b9d3e735d7fd7cbb1eefed64&auto=format&fit=crop&w=720&q=80">
										<img src="<?= base_url('Home-css/images/gallery_2.jpg'); ?>" alt="https://unsplash.com/@kensuarez">
									</a>
								</li>
								<li class="gallery_item">
									<a class="colorbox" href="https://images.unsplash.com/photo-1502646275263-04be86afa386?ixlib=rb-0.3.5&s=682a41d7d9bf6e3feabc73a5fdd61dd2&auto=format&fit=crop&w=720&q=80">
										<img src="<?= base_url('Home-css/images/gallery_3.jpg'); ?>" alt="https://unsplash.com/@jakobowens1">
									</a>
								</li>
								<li class="gallery_item">
									<a class="colorbox" href="https://images.unsplash.com/photo-1484820301304-0b43512779dc?ixlib=rb-0.3.5&s=7a3393e9f507fb4718c36337a8014c52&auto=format&fit=crop&w=720&q=80">
										<img src="<?= base_url('Home-css/images/gallery_4.jpg'); ?>" alt="https://unsplash.com/@seefromthesky">
									</a>
								</li>
								<li class="gallery_item">
									<a class="colorbox" href="https://images.unsplash.com/photo-1490380169520-0a4b88d52565?ixlib=rb-0.3.5&s=7e6b68b1911fb4ffeea4c0750b8a5269&auto=format&fit=crop&w=720&q=80">
										<img src="<?= base_url('Home-css/images/gallery_5.jpg'); ?>" alt="https://unsplash.com/@deannaritchie">
									</a>
								</li>
								<li class="gallery_item">
									<a class="colorbox" href="https://images.unsplash.com/photo-1504434026032-a7e440a30b68?ixlib=rb-0.3.5&s=2cc35bf903b78ba4f7f7ed69bc2abe3f&auto=format&fit=crop&w=720&q=80">
										<img src="<?= base_url('Home-css/images/gallery_6.jpg'); ?>" alt="https://unsplash.com/@benobro">
									</a>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	
	<script src="<?= base_url('Home-css/plugins/colorbox/jquery.colorbox-min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/js/blog_custom.js'); ?>"></script>
	<?= $this->endSection(); ?>



