<?=view("web/include/header"); ?>
<?php 
$role = 0;	
$user_id = 0;	
$user = get_user();
if(!empty($user))
{
	$role = $user->role;
	$user_id = $user->id;
	$user_role = get_role_by_id($user->role);
}
?>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url() ?>assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">		
	<link rel="stylesheet" href="<?=base_url() ?>assets/plugins/dropzone/dropzone.min.css">
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Kyc Update</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Kyc Update</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">						
							<?=view("partner/nav"); ?>							
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9">
							<form class="form_data" action="<?=($data['route'].'/update'); ?>" method="post" id="ProfileForm" novalidate >
								
								
								<!-- About Me -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">About Me</h4>
										<div class="form-group mb-0">
											<textarea class="form-control" rows="5"></textarea>
										</div>
									</div>
								</div>
								<!-- /About Me -->
								
								

								<!-- Contact Details -->
								<div class="card contact-card">
									<div class="card-body">
										<h4 class="card-title">Contact Details</h4>
										<div class="row form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address Line 1</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Address Line 2</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">City</label>
													<input type="text" class="form-control">
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">State / Province</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Country</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">Postal Code</label>
													<input type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Contact Details -->

								<!-- Services and Specialization -->
								<div class="card services-card">
									<div class="card-body">
										<h4 class="card-title">Services and Specialization</h4>
										<div class="form-group">
											<label>Services</label>
											<select class="select" name="service" required>
												<option>Select</option>
											</select>
										</div> 
										<div class="form-group mb-0">
											<label>Specialization </label>
											<select class="select" name="service" required>
												<option>Select</option>
											</select>
										</div> 
									</div>              
								</div>
								<!-- /Services and Specialization -->


								<!-- Institution Info -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Info</h4>
										<div class="row form-row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Bar Council Registration Number</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Enrollment Year</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label>Practicing Court(s)</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>License Upload</label>
													<?php
			                                             $file_data = array(
			                                                 "position"=>1,
			                                                 "columna_name"=>"images",
			                                                 "multiple"=>false,
			                                                 "accept"=>'image/*',
			                                                 "col"=>"col-md-2",
			                                                 "alt_text"=>"none",
			                                                 "row"=>$row,
			                                             );
			                                        ?>
			                                        <?=view('upload-multiple/index',compact('file_data','db'))?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Institution Info -->
								
								<!-- Pricing -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Appointment Pricing</h4>										
										<div class="form-group mb-0">
											<div id="pricing_select">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="text" class="form-control" id="custom_rating_input" name="custom_rating_count" value="" placeholder="20">
												</div>
											</div>
										</div>										
									</div>
								</div>
								<!-- /Pricing -->
								
								
							 
								<!-- Education -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Education</h4>
										<div class="education-info">
											<div class="row form-row education-cont">
												<div class="col-12 col-md-10 col-lg-11">
													<div class="row form-row">
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Degree</label>
																<input type="text" class="form-control">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>College/Institute</label>
																<input type="text" class="form-control">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Year of Completion</label>
																<input type="text" class="form-control">
															</div> 
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="add-more">
											<a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>
								<!-- /Education -->
							
								<!-- Experience -->
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Experience</h4>
										<div class="experience-info">
											<div class="row form-row experience-cont">
												<div class="col-12 col-md-10 col-lg-11">
													<div class="row form-row">
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Institution Name</label>
																<input type="text" class="form-control">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>From</label>
																<input type="text" class="form-control">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>To</label>
																<input type="text" class="form-control">
															</div> 
														</div>
														<div class="col-12 col-md-6 col-lg-4">
															<div class="form-group">
																<label>Designation</label>
																<input type="text" class="form-control">
															</div> 
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="add-more">
											<a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
										</div>
									</div>
								</div>
								<!-- /Experience -->
								
							
								
								<div class="submit-section submit-btn-bottom">
									<button type="submit" class="btn btn-primary">Save Changes</button>
								</div>
							</form>
							
						</div>


						
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
			





<script>

// Education Add More
	
    $(".education-info").on('click','.trash', function () {
		$(this).closest('.education-cont').remove();
		return false;
    });

    $(".add-education").on('click', function () {

    	console.log("Afsaf");
		
		var educationcontent = '<div class="row form-row education-cont">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>Degree</label>' +
							'<input type="text" class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>College/Institute</label>' +
							'<input type="text" class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>Year of Completion</label>' +
							'<input type="text" class="form-control">' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
		'</div>';
		
        $(".education-info").append(educationcontent);
        return false;
    });
	
	// Experience Add More
	
    $(".experience-info").on('click','.trash', function () {
		$(this).closest('.experience-cont').remove();
		return false;
    });

    $(".add-experience").on('click', function () {
		
		var experiencecontent = '<div class="row form-row experience-cont">' +
			'<div class="col-12 col-md-10 col-lg-11">' +
				'<div class="row form-row">' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>Hospital Name</label>' +
							'<input type="text" class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>From</label>' +
							'<input type="text" class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>To</label>' +
							'<input type="text" class="form-control">' +
						'</div>' +
					'</div>' +
					'<div class="col-12 col-md-6 col-lg-4">' +
						'<div class="form-group">' +
							'<label>Designation</label>' +
							'<input type="text" class="form-control">' +
						'</div>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2 col-lg-1"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
		'</div>';
		
        $(".experience-info").append(experiencecontent);
        return false;
    });	

</script>




<?=view("web/include/footer"); ?>