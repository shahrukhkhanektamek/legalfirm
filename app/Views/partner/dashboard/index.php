<?php $user = $user = get_user();$user_role = get_role_by_id($user->role); ?>
<?=view("web/include/header"); ?>
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
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

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">

												<div class="col-md-12">
													  <?php if($user->kyc_step==1){?>
										              <div class="alert alert-success show" role="alert"><strong>Success</strong> - Your Kyc Is Approved. You can change your kyc.
										              </div>
										              <?php }else if($user->kyc_step==0){ ?>										              
										              <div class="alert alert-info show" role="alert"><strong>Information</strong> - Update Your Kyc <a href="<?=base_url($user_role->nav).'/kyc' ?>" style="text-decoration: underline;">Click Here</a> 
										              </div>

										              <?php }else if($user->kyc_step==2){ ?>
										              <div class="alert alert-info show" role="alert"><strong>Information</strong> - Your Kyc Is Under Review
										              </div>
										              <?php }else if($user->kyc_step==3){ ?>
										              <div class="alert alert-danger show" role="alert"><strong>Warning</strong> - Your Kyc Rejected!
										              </div>
										              <?php } ?>
												</div>

												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar">
																<img src="<?=base_url() ?>assets/img/icon-03.png" class="img-fluid" alt="student">
														</div>
														<div class="dash-widget-info">
															<h6>Total Lead</h6>
															<h3>1500</h3>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar">
																<img src="<?=base_url() ?>assets/img/icon-03.png" class="img-fluid" alt="student">
														</div>
														<div class="dash-widget-info">
															<h6>Today Lead</h6>
															<h3>160</h3>
														</div>
													</div>
												</div>
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">student Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#upcoming-appointments" data-bs-toggle="tab">Today Lead</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#today-appointments" data-bs-toggle="tab">Today Appointment</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Phone</th>
																		<th>Email</th>
																		<th>State</th>
																		<th>Requirment</th>
																		<th>Date Time</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="<?=base_url() ?>assets/img/student/student-01.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Richard Wilson <span>#PT0016</span></a>
																			</h2>
																		</td>
																		<td>General</td>
																		<td>General</td>
																		<td>General</td>
																		<td>General</td>
																		<td>11 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane" id="today-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Name</th>
																		<th>Phone</th>
																		<th>Email</th>
																		<th>State</th>
																		<th>Requirment</th>
																		<th>Date Time</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="student-profile.php" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="<?=base_url() ?>assets/img/student/student-01.jpg" alt="User Image"></a>
																				<a href="student-profile.php">Richard Wilson <span>#PT0016</span></a>
																			</h2>
																		</td>
																		<td>General</td>
																		<td>General</td>
																		<td>General</td>
																		<td>General</td>
																		<td>11 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
																		<td class="text-end">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	
																</tbody>
															</table>		
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->
											
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->



<script>
	
</script>

   
<?=view("web/include/footer"); ?>

