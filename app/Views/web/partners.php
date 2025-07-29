<?php include"include/header.php";

$table_nameOld = $table_name;


$builder = $db->table('service_category');
$builder->select('service_category.*, COUNT(service.id) as services_count');
$builder->join('service', 'service.category = service_category.id', 'left');
$builder->where('service_category.status', 1);
$builder->groupBy('service_category.id');
$builder->orderBy('service_category.id', 'desc');

$service_category = $builder->get()->getResult();




$uri = $request->getUri()->getSegment(1);
$limit = 12;
$status = 1;
$order_by = $request->getVar('order_by') ?:'1';
$filter_search_value = $request->getVar('filter_search_value');
$page = $request->getVar('page') ?: 1;
$offset = ($page - 1) * $limit;




$table_name = "users";
$data['route'] = base_url('services');   


$query = $db->table($table_name)
    ->where([
        $table_name . '.status' => $status,
    ]);
    // ->join('service_category', 'service_category.id = '.$table_name.'.category', 'left')
    // ->select("{$table_name}.*,service_category.name as category_name");


$page_title = '';
if($uri=='advocates')
{
	$query->where('role', 3);
	$page_title = 'Advocates';
}
if($uri=='ca')
{	
	$query->where('role', 4);
	$page_title = 'Chartered Accountant (CA)';
}
if($uri=='advisers')
{	
	$query->where('role', 5);
	$page_title = 'Advisers';
}





$countries = $request->getVar('country') ?:[];
if (!empty($countries)) {
    if (!empty($countries) && is_array($countries)) {

        // // Fetch matching location IDs from DB
        // $locationQuery = $db->table('property_location')
        //     ->select('id')
        //     ->where('status', 1)
        //     ->whereIn('slug', $countries)
        //     ->get();
        // $locationDB = $locationQuery->getResult();
        // foreach ($locationDB as $loc) {
        //     $query->orWhere($table_name.".location", $loc->id);
        // }

        $query->orWhere($table_name.".country", $countries);
        
    }
}

$states = $request->getVar('state') ?:[];
if (!empty($states)) {
    if (!empty($states) && is_array($states)) {
        $query->orWhere($table_name.".state", $states);        
    }
}






$query->orderBy($table_name . '.id', 'desc'); 


if(!empty($filter_search_value))
{
    $query->groupStart()
        ->like($table_name . '.name', $filter_search_value)
    ->groupEnd();
}

$total = $query->countAllResults(false);
$data_list = $query->limit($limit, $offset)->get()->getResult();
$data['pager'] = $pager->makeLinks($page, $limit, $total);
$data['totalData'] = $total;
$data['startData'] = $offset + 1;
$data['endData'] = ($offset + $limit > $total) ? $total : ($offset + $limit);
$data['data_list'] = $data_list;

?>




			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?=base_url() ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page"><?=$page_title ?></li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title"><?=$page_title ?></h2>
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
							<!-- Search Filter -->
							<form class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								<!-- <div class="filter-widget">
									<div class="cal-icon">
										<input type="text" class="form-control datetimepicker" placeholder="Select Date">
									</div>			
								</div> -->

								<div class="filter-widget">
									<h4>Country</h4>
									<select class="form-control" id="country" name="country[]" multiple>
										<option value="">Select Country</option>
										<?php
										if(!empty($countries)){
										$country = $db->table("countries")->where(["id"=>$countries,])->get()->getResultObject();
										foreach ($country as $key => $value) {
										?>
											<option selected value="<?=$value->id ?>"><?=$value->name ?></option>
										<?php }} ?>
									</select>
								</div>
								<div class="filter-widget">
									<h4>State</h4>
									<select class="form-control" id="state" name="state[]" multiple>
										<option value="">Select State</option>
										<?php 
										if(!empty($states)){
										$state = $db->table("states")->where(["id"=>$states,])->get()->getResultObject();
										foreach ($state as $key => $value) {
										?>
											<option selected value="<?=$value->id ?>"><?=$value->name ?></option>
										<?php }} ?>
									</select>
								</div>


								<!-- advocate -->
								<div class="filter-widget">
									<h4>Specialization</h4>
									<select class="form-control select" name="specialization[]" multiple>
										<option value="">Select Specialization</option>
										<?php
										$list = $db->table("specializations")->where(["status"=>1,])->get()->getResultObject();
										foreach ($list as $key => $value) {
										$selected = '';
										
										?>
											<option value="<?=$value->id ?>" <?=$selected ?> ><?=$value->name ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="filter-widget">
									<h4>Services</h4>
									<select class="form-control select" name="services[]" multiple>
										<option value="">Select Services</option>
										<?php
										$list = $db->table("service")->where(["status"=>1,])->get()->getResultObject();
										foreach ($list as $key => $value) {
										$selected = '';
										?>
											<option value="<?=$value->id ?>" <?=$selected ?> ><?=$value->name ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="filter-widget">
									<h4>Education</h4>
									<select class="form-control select" name="education[]" multiple>
										<option value="">Select Education</option>
										<?php
										$list = $db->table("education")->where(["status"=>1,])->get()->getResultObject();
										foreach ($list as $key => $value) {
										?>
											<option value="<?=$value->id ?>" ><?=$value->name ?></option>
										<?php } ?>
									</select>
								</div>
								<!-- advocate end -->


								<!-- adviser -->

								<div class="filter-widget">
									<h4>Expertise</h4>
									<select class="select" name="expertise[]" multiple >
										<option value="">Select Expertise</option>
										<?php
										$list = $db->table("expertise")->where(["status"=>1,])->get()->getResultObject();
										foreach ($list as $key => $value) {
										$selected = '';
										if(!empty($partner_expertises))
										{
											if(in_array($value->id, $partner_expertises)) $selected = 'selected';
										}
										?>
											<option value="<?=$value->id ?>" <?=$selected ?> ><?=$value->name ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="filter-widget">
									<h4>Certification</h4>
									<select class="select" name="certification[]" multiple >
										<option value="">Select Certification</option>
										<?php
										$list = $db->table("certification")->where(["status"=>1,])->get()->getResultObject();
										foreach ($list as $key => $value) {
										$selected = '';
										if(!empty($partner_certifications))
										{
											if(in_array($value->id, $partner_certifications)) $selected = 'selected';
										}
										?>
											<option value="<?=$value->id ?>" <?=$selected ?> ><?=$value->name ?></option>
										<?php } ?>
									</select>
								</div>

								<!-- adviser end -->



								<div class="filter-widget">
									<h4>Gender</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender[]" value="1">
											<span class="checkmark"></span> Male
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender[]" value="2">
											<span class="checkmark"></span> Female
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender[]" value="3">
											<span class="checkmark"></span> Transgender
										</label>
									</div>
								</div>
							
									<div class="btn-search">
										<button type="submit" class="btn btn-block w-100">Search</button>
									</div>	
								</div>
							</form>
							<!-- /Search Filter -->							
						</div>
						<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="col-md-12">
								<form class="mb-3">
									<div class="input-group">
										<input type="text" placeholder="Search Keyword..." class="form-control">
										<button type="submit" class="btn btn-primary">search</button>
									</div>
								</form>
							</div>


						
							<div class="row row-grid">
								
								<?php foreach ($data_list as $key => $value) { 
									if($value->role==3)
	                              	echo view("web/card/advocate-grid",["col"=>"col-md-6 col-lg-4","value"=>$value,]);

	                              	if($value->role==4)
	                              	echo view("web/card/ca-grid",["col"=>"col-md-6 col-lg-4","value"=>$value,]);

	                              	if($value->role==5)
	                              	echo view("web/card/adviser-grid",["col"=>"col-md-6 col-lg-4","value"=>$value,]);
	                            } ?>								
															
							</div>
							<div class="pagination d-flex align-items-center justify-content-center">        
			                    <?=$data['pager']?>
			                </div>


						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
 <?php include"include/footer.php"; ?>