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
									<li class="breadcrumb-item active" aria-current="page"> Legal Research</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title"> Legal Research</h2>
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

								

								

								<div class="card">
									<div class="card-body">
										<div class="live_comment">
											<div class="row">
												<div class="col-12">
													<textarea class="form-control" id="comment" rows="5" placeholder="e.g., What constitutes 'anticipatory bail' under the BNSS and what are the landmark Supreme Court judgments governing its grant?"></textarea>
												</div>

												<div class="col-4 mt-2">
													<label>Jurisdiction</label>
													<select class="form-control select" id="Jurisdiction">
													   <option value="All India">All India</option>
													   <option value="Supreme Court of India">Supreme Court of India</option>
													   <option value="Delhi High Court">Delhi High Court</option>
													   <option value="Bombay High Court">Bombay High Court</option>
													   <option value="Madras High Court">Madras High Court</option>
													   <option value="Calcutta High Court">Calcutta High Court</option>
													   <option value="Allahabad High Court">Allahabad High Court</option>
													   <option value="Karnataka High Court">Karnataka High Court</option>
													</select>
												</div>
												<div class="col-4 mt-2">
													<label>Research Type</label>
													<select class="form-control select" id="ResearchType">
														<option value="All">All</option>
														<option value="Case Law">Case Law</option>
														<option value="Statutes">Statutes</option>
													</select>
												</div>
												<div class="col-4 mt-2">
													<label style="color: white;">sd</label>
													<button class="btn btn-primary btn_live w-100" id="submit-comment">Research</button>
												</div>
											</div>
										</div>
										<div class="hide" style="display:none;" id="output"></div>
									</div>
								</div>

								<div class="card resaponse-area-card">
									<div class="card-body">
										<div class="fcrse_3">													
											<div class="live_chat" id="live_chat">
												<div class="chat1 resaponse-area" id="chat1">
													
												</div>
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
	
   $(document).on("click", "#submit-comment",(function(e) {
      event.preventDefault();
      submit_comment();
   }));

    const myInput = document.getElementById("comment");
	myInput.addEventListener("keydown", function (event) {
	    if (event.key === "Enter") {
	      submit_comment(); // call your custom function
	    }
	});

   function submit_comment()
   {
   		var comment = $("#comment").val();
   		if(comment.trim()=='')
   			return false;

   		$("#submit-comment").attr("disabled", true)
   		data_loader("#chat1",1);
   		$(".resaponse-area-card").show();


        // $(".chat1").append(`<div class="me">${(comment)}</div>`);
        $(".chat1").append(`<div class="boat wait"><span class="dot-loader"><span></span><span></span><span></span></span></div>`);
        // $("#comment").val('');
        var div = document.getElementById("live_chat");
  			div.scrollTop = div.scrollHeight;
      
        var form = new FormData();
        form.append("comment",comment);
        form.append("Jurisdiction",$("#Jurisdiction").val());
        form.append("ResearchType",$("#ResearchType").val());
        var settings = {
          "url": "<?=$data['actionUrl'] ?>",
          "method": "POST",
          "timeout": 0,
          "processData": false,
          "headers": {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           },
          "mimeType": "multipart/form-data",
          "contentType": false,
          "dataType": "json",
          "data": form
        };
        $.ajax(settings).always(function (response) {
            
   		$("#submit-comment").attr("disabled", false);

            response = admin_response_data_check(response);
            if(response.status==200)
            {
              	$(".chat1").html(`<div class="boat">${(response.message)}</div>`);
              	$(".wait.boat").remove();
              	var div = document.getElementById("live_chat");
  				div.scrollTop = div.scrollHeight;
            }
        });
   }






</script>




<?=view("web/include/footer"); ?>