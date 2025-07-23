<div class="<?=$col ?>">
	<div class="course-section">
		<div class="course-top">
			<div class="course-img">
				<img src="<?=image_check_front($value->image) ?>" alt="" class="img-fluid">
			</div>
		</div>
		<div class="course-content service-content">
			<h5>Personal Injury</h5>
			<h2><a href="<?=base_url($value->slug) ?>"><?=$value->name ?></a></h2>
			<p><?=$value->sort_description ?></p>
			<div class="text-center">
				<a href="<?=base_url($value->slug) ?>" class="btn course-btn">Book Now</a>
			</div>
		</div>
	</div>
</div>