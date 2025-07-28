<?php include"include/header.php"; ?>




		<!-- Home Banner -->
		<section class="section home-banner row-middle">
				<div class="container">
					<div class="row">
						<div class="col-lg-7 col-md-7">
							<div class="banner-content">
								<p>All Legal Services</p> 
								<h1>Achieve Your Dreams.</h1>
								<h1>Book your Course.</h1>
								<div class="btn-item">
									<a class="btn get-btn" href="contact">Contact now</a>
									<a class="btn courses-btn" href="services">All Services</a>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>
		<!-- /Home Banner -->



		<!-- Our Services -->
		<section class="section college">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-7 mx-auto">
						<div class="section-header text-center">
							<h5>Top Services</h5>
							<h2 class="header-title">DISCOVER OUR Services</h2>
						</div>
					</div>
					
					<div class="row blog-grid-row">
						

<?php
$services = $db->table("service")->limit(10)->where(["status"=>1,"service_type"=>2,])->orderBy('id','desc')->get()->getResult();
foreach ($services as $key => $value) {
?>						<div class="col-md-4 col-sm-12">
							<div class="blog grid-blog grid-service">
								<div class="blog-image">
									<a href="<?=base_url().$value->slug ?>"><img class="img-fluid" src="<?=image_check($value->image) ?>" alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<h3 class="blog-title"><a href="<?=base_url().$value->slug ?>"><?=$value->name ?></a></h3>
									<p class="mb-0"><?=$value->sort_description ?></p>
								</div>
								<div class="text-center">
									<a href="<?=base_url().$value->slug ?>" class="btn course-btn mt-3">Learn More</a>
								</div>
							</div>							
						</div>
<?php } ?>

					</div>



				</div>
						
				<div class="row">
					<div class="col-12">
						<div class="clg see-all text-center"> 
							<a href="services
						" class="btn all-btn">View all <i class="fas fa-caret-right right-arrow"></i></a>
						</div>
					</div>
				</div>
				<!--- End Services  -->
				
				
			</div>
		</section>
		<!-- END courses -->


	
		<!-- Clients Courses -->
		<section class="section student">
			<div class="container">
					<div class="row">
					<div class="col-md-10 mx-auto"> 
						<h5>We Are Best</h5>
						<h3>5500+ Clients TRUSTED US</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt ut laboreet dolore magna aliqua. Ut enim ad minim veniam, quised nostrud exercitation. Duis aute irure dolor in reprehen derit in voluptate </p>
						<div class="button"><a href="courses.html" class="btn all-btn">View all <i class="fas fa-caret-right right-arrow"></i></a></div>
					</div>
					</div>
				</div>
		</section>
		<!-- End Clients Courses -->	
	
		<!-- Top Advocates -->
		<section class="section instructor">
			<div class="container">
					<div class="row">
						<div class="col-md-7 col-sm-12 col-12 mx-auto">
								<div class="section-header text-center">
									<h5>EXPERT Advocates</h5>
									<h2 class="header-title">MEET OUR EXPERT Advocates</h2>
								</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-12">
							<div class="instructor-slider slider">
							
									<?php
										$advocates = $db->table("users")->limit(10)->where(["status"=>1,"role"=>3,])->orderBy('id','desc')->get()->getResult();
										foreach ($advocates as $key => $value) {
											echo view("web/card/advocate-grid",["col"=>"","value"=>$value,]);
									} ?>				
							
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-12">
							<div class="see-all  text-center"> 
								<a href="advocates
							" class="btn all-btn">View all <i class="fas fa-caret-right right-arrow"></i></a>
							</div>
						</div>
					</div>
			</div>
		</section>
		<!-- End Advocates -->



	
		<!-- Register -->
		<section class="section register">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-5 col-md-7 mx-auto text-center position-relative">
						<h5>Register Now</h5>
						<h2 class="header-title">Get Our Expertise Now!</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt ut laboreet dolore magna</p>
					</div>
					<div class="col-12 col-lg-12 mx-auto text-center position-relative mt-4">
						<a href="register.html" class="btn all-btn">Register Now <i class="fas fa-caret-right right-arrow"></i></a>
					</div>
				</div>
			</div>
		</section>
		<!-- End Register -->



		<!-- Top Legal Advisers -->
		<section class="section instructor">
			<div class="container">
					<div class="row">
						<div class="col-md-7 col-sm-12 col-12 mx-auto">
								<div class="section-header text-center">
									<h5>EXPERT Legal Advisers</h5>
									<h2 class="header-title">MEET OUR EXPERT Legal Advisers</h2>
								</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-12">
							<div class="instructor-slider slider">

								<?php
									$adviser = $db->table("users")->limit(10)->where(["status"=>1,"role"=>5,])->orderBy('id','desc')->get()->getResult();
									foreach ($adviser as $key => $value) {
										echo view("web/card/adviser-grid",["col"=>"","value"=>$value,]);
								} ?>
							
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-12">
							<div class="see-all  text-center"> 
								<a href="advisers
							" class="btn all-btn">View all <i class="fas fa-caret-right right-arrow"></i></a>
							</div>
						</div>
					</div>
			</div>
		</section>
		<!-- End Legal Advisers -->



		<!-- Register -->
		<section class="section register">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-12 mx-auto text-center position-relative">
						<div class="reg-count d-flex justify-content-center">
							<div class="count">
								<span>
									<span>3,600+</span>
									<p>Trusted Clients</p>
								</span>
							</div>
							<div class="count">
								<span>
									<span>18.489</span>
									<p>Case Studies</p>
								</span>
							</div>
							<div class="count">
								<span>
									<span>16.840+</span>
									<p>Total Cases Won</p>
								</span>
							</div>
							<div class="count">
								<span>
									<span>99.5%</span>
									<p>Success Rate</p>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Register -->





		<!-- Top  CA -->
		<section class="section instructor">
			<div class="container">
					<div class="row">
						<div class="col-md-7 col-sm-12 col-12 mx-auto">
								<div class="section-header text-center">
									<h5>EXPERT  CA</h5>
									<h2 class="header-title">MEET OUR EXPERT  CA</h2>
								</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-12">
							<div class="instructor-slider slider">
								
								<?php
									$ca = $db->table("users")->limit(10)->where(["status"=>1,"role"=>4,])->orderBy('id','desc')->get()->getResult();
									foreach ($ca as $key => $value) {
										echo view("web/card/ca-grid",["col"=>"","value"=>$value,]);
								} ?>						
							
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-12">
							<div class="see-all  text-center"> 
								<a href="ca
							" class="btn all-btn">View all <i class="fas fa-caret-right right-arrow"></i></a>
							</div>
						</div>
					</div>
			</div>
		</section>
		<!-- End  CA -->








	
	
		<!-- Review -->
		<section class="section review indexone">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-header text-center">
							<h5>OUR REVIEWS</h5>
							<h2 class="header-title">CHECK OUR Clients REVIEWS</h2>
						</div>
					</div>
				</div>
				<div class="row">
					
					<div class="col-md-12">
						<div class="review-slider slider">
						
							<!-- Review Widget -->
								<div class="review-blog">
									<div class="review-top d-flex align-items-center">
										<div class="review-img">
											<a href="javascript:void(0);"><img class="img-fluid" src="assets/img/review/review-01.jpg" alt="Post Image"></a>
										</div>
										<div class="review-info">
											<h3>Davis Payerf</h3>
											<h5>Mechanical Engineering</h5>								
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="average-rating">3.2</span>
											</div>
										</div>
									</div>
									<div class="review-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat</p>
									</div>
								</div>
								<!-- / Review Widget -->
								
								<!-- Review Widget -->
								<div class="review-blog">
									<div class="review-top d-flex align-items-center">
										<div class="review-img">
											<a href="javascript:void(0);"><img class="img-fluid" src="assets/img/review/review-01.jpg" alt="Post Image"></a>
										</div>
										<div class="review-info">
											<h3>Davis Payerf</h3>
											<h5>Mechanical Engineering</h5>								
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="average-rating">3.2</span>
											</div>
										</div>
									</div>
									<div class="review-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat</p>
									</div>
								</div>
								<!-- /Review Widget -->
								
								<!-- Review Widget -->
								
								<div class="review-blog">
									<div class="review-top d-flex align-items-center">
										<div class="review-img">
											<a href="javascript:void(0);"><img class="img-fluid" src="assets/img/review/review-01.jpg" alt="Post Image"></a>
										</div>
										<div class="review-info">
											<h3>Davis Payerf</h3>
											<h5>Mechanical Engineering</h5>								
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="average-rating">3.2</span>
											</div>
										</div>
									</div>
									<div class="review-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean. Eget volutpat</p>
									</div>
								</div>
								<!-- /Review Widget -->
							
						</div>
					</div>					
				</div>
			</div>
		</section>
		<!-- / Review -->
	
		<!-- News -->
		<section class="section news">
			<div class="container">
			
				<div class="row">
					<div class="col-12">
						<div class="section-header text-center">
							<h5>OUR NEWS</h5>
							<h2 class="header-title">OUR LATEST NEWS</h2>
						</div>
					</div>
				</div>
				
				<div class="row">
				
					<!-- News Widget -->
					<div class="col-md-12">
						<div class="news-blog d-flex">
							<div class="news-img">
								<img src="assets/img/news/news-01.jpg" class="img-fluid" alt="">
							</div>
							<div class="d-flex align-items-center">
								<div class="news-content">
									<span>June 21, 2020</span>
									<h2><a href="blog-details.html">While the lovely valley team work</a></h2>
									<p>Event Description. A party is a gathering of people who have been invited by a host for the purposes of… </p>
								</div>
								<div class=""><a href="blog-details.html" class="btn btn-read">READ MORE</a></div>
							</div>
						</div>
					</div>
					<!-- /News Widget -->
					
					<!-- News Widget -->
					<div class="col-md-12">
						<div class="news-blog d-flex">
							<div class="news-img">
								<img src="assets/img/news/news-02.jpg" class="img-fluid" alt="">
							</div>
							<div class="d-flex align-items-center">
								<div class="news-content">
									<span>June 21, 2020</span>
									<h2><a href="blog-details.html">While the lovely valley team work</a></h2>
									<p>Event Description. A party is a gathering of people who have been invited by a host for the purposes of… </p>
								</div>
								<div class=""><a href="blog-details.html" class="btn btn-read">READ MORE</a></div>
							</div>
						</div>
					</div>
					<!-- /News Widget -->
					
					<div class="col-md-12">
						<div class="see-all"> 
							<a href="blog-grid.html" class="btn all-btn">View all <i class="fas fa-caret-right right-arrow"></i></a>
						</div>
					</div>
					
				</div>			
			</div>
		</section>
		<!-- / News -->	
<?php include"include/footer.php"; ?>