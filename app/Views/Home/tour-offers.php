
<?= $this->extend('Home/layout-home'); ?>

<?= $this->section('title') ?>
Offers
<?= $this->endSection() ?>

<?= $this->section('Home-css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/offers_styles.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('Home-css/styles/offers_responsive.css'); ?>">
<?= $this->endSection() ?>


<?= $this->section('Home-content'); ?>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url('Home-css/images/about_background.jpg'); ?>"></div>
		<div class="home_content">
			<div class="home_title">our offers</div>
		</div>
	</div>

	<!-- Offers -->

	<div class="offers">

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
									<!-- Trips Tab (Không thay đổi) -->
									<div class="search_tab <?= empty($transportType) ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/island.png'); ?>" alt="">
										<span>Trips</span>
									</div>
									<!-- Hotels Tab (Không thay đổi) -->
									<!-- <div class="search_tab <?= empty($transportType) ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/suitcase.png'); ?>" alt="">
										<span>hotels</span>
									</div> -->

									<!-- Car Rentals Tab -->
									<a href="<?= base_url('/tour/offers?transport_type=ô tô'); ?>" class="search_tab <?= ($transportType == 'ô tô') ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/bus.png'); ?>" alt="">
										<span>Car Rentals</span>
									</a>
									
									<!-- Flights Tab -->
									<a href="<?= base_url('/tour/offers?transport_type=máy bay'); ?>" class="search_tab <?= ($transportType == 'máy bay') ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/departure.png'); ?>" alt="">
										<span>Flights</span>
									</a>

									

									<!-- Cruises Tab -->
									<a href="<?= base_url('/tour/offers?transport_type=tàu thủy'); ?>" class="search_tab <?= ($transportType == 'tàu thủy') ? 'active' : ''; ?> d-flex flex-row align-items-center justify-content-lg-center justify-content-start">
										<img src="<?= base_url('Home-css/images/cruise.png'); ?>" alt="">
										<span>Cruises</span>
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

		<!-- Offers -->

		<div class="container">
			<div class="row">
				<div class="col-lg-1 temp_col"></div>
				<div class="col-lg-11">
					
					<!-- Offers Sorting -->
					<div class="offers_sorting_container">
						<ul class="offers_sorting">
							<li>
								<span class="sorting_text">price</span>
								<i class="fa fa-chevron-down"></i>
								<ul>
									<li class="sort_btn" data-isotope-option='{ "sortBy": "original-order" }' data-parent=".price_sorting"><span>show all</span></li>
									<li class="sort_btn" data-isotope-option='{ "sortBy": "price" }' data-parent=".price_sorting"><span>ascending</span></li>
								</ul>
							</li>
							<li>
								<span class="sorting_text">location</span>
								<i class="fa fa-chevron-down"></i>
								<ul>
									<li class="sort_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>default</span></li>
									<li class="sort_btn" data-isotope-option='{ "sortBy": "name" }'><span>alphabetical</span></li>
								</ul>
							</li>
							<li>
								<span class="sorting_text">stars</span>
								<i class="fa fa-chevron-down"></i>
								<ul>
									<li class="filter_btn" data-filter="*"><span>show all</span></li>
									<li class="sort_btn" data-isotope-option='{ "sortBy": "stars" }'><span>ascending</span></li>
									<li class="filter_btn" data-filter=".rating_3"><span>3</span></li>
									<li class="filter_btn" data-filter=".rating_4"><span>4</span></li>
									<li class="filter_btn" data-filter=".rating_5"><span>5</span></li>
								</ul>
							</li>
							<!-- <li class="distance_item">
								<span class="sorting_text">distance from center</span>
								<i class="fa fa-chevron-down"></i>
								<ul>
									<li class="num_sorting_btn"><span>distance</span></li>
									<li class="num_sorting_btn"><span>distance</span></li>
									<li class="num_sorting_btn"><span>distance</span></li>
								</ul>
							</li> -->
							<li>
								<span class="sorting_text">reviews</span>
								<i class="fa fa-chevron-down"></i>
								<ul>
									<li class="num_sorting_btn"><span>5</span></li>
									<li class="num_sorting_btn"><span>4</span></li>
									<li class="num_sorting_btn"><span>3</span></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-12">
					<!-- Offers Grid -->

					

						<!-- Offers Item -->

						<div class="offers_grid">
    <?php if (!empty($tours)): ?>
        <?php foreach ($tours as $tour): ?>
            <div class="offers_item">
                <div class="row">
                    <div class="col-lg-1 temp_col"></div>
                    <div class="col-lg-3 col-1680-4">
                        <div class="offers_image_container">
                            <?php if (!empty($tour['image_url'])): ?>
                                <div class="offers_image_background" style="background-image:url('<?= $tour['image_url']; ?>')"></div>
                            <?php else: ?>
                                <div class="offers_image_background" style="background-image:url('<?= base_url('default-image.jpg'); ?>')"></div> <!-- Hình ảnh mặc định -->
                            <?php endif; ?>
                            <div class="offer_name">
                                <a href="<?= base_url('tour/detail/' . $tour['id']); ?>"><?= $tour['name']; ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="offers_content">
                            <div class="offers_price">$<?= $tour['price_per_person']; ?><span>per person</span></div>
                            <div class="rating_r rating_r_<?= round($tour['rating']); ?> offers_rating" data-rating="<?= round($tour['rating']); ?>">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <i class="fa <?= $i < round($tour['rating']) ? 'fa-star' : 'fa-star-o'; ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="offers_text"><?= $tour['description']; ?></p>
                            <div class="button book_button">
                                <a href="<?= base_url('tour/single_listing/' . $tour['id']); ?>">Book</a>
                            </div>

                            <div class="offer_reviews">
                                <div class="offer_reviews_content">
                                    <div class="offer_reviews_title"><?= $tour['review_title']; ?></div>
                                    <div class="offer_reviews_subtitle"><?= $tour['review_count']; ?> reviews</div>
                                </div>
                                <div class="offer_reviews_rating text-center"><?= number_format($tour['rating'], 1); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tours found.</p>
    <?php endif; ?>
</div>
<!-- Hiển thị phân trang -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if ($currentPage > 1): ?>
            <li class="page-item">
                <a class="page-link" href="<?= base_url('tour/offers?page=' . ($currentPage - 1)); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= $i == $currentPage ? 'active' : ''; ?>">
                <a class="page-link" href="<?= base_url('tour/offers?page=' . $i); ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($currentPage < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="<?= base_url('tour/offers?page=' . ($currentPage + 1)); ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>




						<!-- Offers Item -->


				</div>

			</div>
		</div>		
	</div>

	<!-- Footer -->


	<?= $this->endSection(); ?>
	<?= $this->section('Home-scripts') ?>
	
	<script src="<?= base_url('Home-css/plugins/Isotope/isotope.pkgd.min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/plugins/parallax-js-master/parallax.min.js'); ?>"></script>
	<script src="<?= base_url('Home-css/js/offers_custom.js'); ?>"></script>
	<?= $this->endSection(); ?>



