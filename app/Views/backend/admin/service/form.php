<?=view('backend/include/header') ?>

<div class="page-content table_page">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0"><?=$data['page_title']?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?=base_url('/admin')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a ><?=$data['title']?></a></li>
                            <li class="breadcrumb-item active"><?=$data['page_title']?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form class="row g-3 form_data" action="<?=$data['route'].'/update'?>" method="post" enctype="multipart/form-data" id="form_data_submit" novalidate>

             <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?=encript(@$row->id)?>">
            
            <!--end col-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0 flex-grow-1"><?=$data['title']?> Details</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row g-3">
                                
                                <div class="col-md-6">
                                    <label class="form-label">Select Service Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="service_type" >
                                        <option value="">Select</option>
                                        <option value="1" <?php if(@$row->service_type==1)echo'selected'; ?> >Other</option>
                                        <option value="2" <?php if(@$row->service_type==2)echo'selected'; ?> >Legal</option>                                        
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="category" id="main-menu">
                                        <option value="">Select</option>
                                        <?php
                                            $cateList = $db->table('service_category')->get()->getResultObject();
                                            foreach ($cateList as $key => $value) {
                                                $selected = '';
                                                if(@$row->category==$value->id) $selected = 'selected';
                                        ?>
                                            <option value="<?=$value->id ?>" <?= $selected?> ><?=$value->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                

                                <div class="col-md-6">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="" value="<?=@$row->name?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" placeholder="" value="<?=@$row->slug?>" >
                                </div>

                                
                                <div class="col-lg-12">
                                    <label class="form-label">Sort Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="sort_description" rows="4" required><?=@$row->sort_description?></textarea>
                                </div>


                                <div class="col-lg-12">
                                    <label class="form-label">Service Description* <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="full_description" rows="4" required><?=@$row->full_description?></textarea>
                                    <script>CKEDITOR.replace( 'full_description' );</script>
                                </div>


                                <h1>Package Price</h1>


                                <!-- plan one start -->
                                
                                <div class="col-md-6">
                                    <label class="form-label">Basic Plan Status <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single" name="basic_status" data-minimum-results-for-search="Infinity" required>
                                        <option value="1" <?php if(!empty(@$row) && @$row->basic_status==1) echo'selected' ?> >Active</option>
                                        <option value="0" <?php if(!empty(@$row) && @$row->basic_status==0) echo'selected' ?> >Disable</option>
                                    </select>
                                    <div class="invalid-feedback">Please select any on option.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Basic Plan Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="basic_price" placeholder="" value="<?=@$row->basic_price?>" required>
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Basic Market Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="basic_market_price" placeholder="" value="<?=@$row->basic_market_price?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Basic Smartfiling Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="basic_smartfiling_price" placeholder="" value="<?=@$row->basic_smartfiling_price?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Basic You save <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="basic_you_save" placeholder="" value="<?=@$row->basic_you_save?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Basic Government Fee <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="basic_government_fee" placeholder="" value="<?=@$row->basic_government_fee?>" >
                                </div>
                                <div class="col-lg-12 hide">
                                    <label class="form-label">Basic Package Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="basic_description" rows="4" ><?=@$row->basic_description?></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Basic Plan Features* <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="basic_price_description" rows="4" required><?=@$row->basic_price_description?></textarea>
                                    <script>CKEDITOR.replace( 'basic_price_description' );</script>
                                </div>

                                <!-- plan one end -->





                                <!-- plan two start -->
                                
                                <div class="col-md-6">
                                    <label class="form-label">Standard Plan Status <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single" name="standard_status" data-minimum-results-for-search="Infinity" required>
                                        <option value="1" <?php if(!empty(@$row) && @$row->standard_status==1) echo'selected' ?> >Active</option>
                                        <option value="0" <?php if(!empty(@$row) && @$row->standard_status==0) echo'selected' ?> >Disable</option>
                                    </select>
                                    <div class="invalid-feedback">Please select any on option.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Standard Plan Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="standard_price" placeholder="" value="<?=@$row->standard_price?>" required>
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Standard Market Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="standard_market_price" placeholder="" value="<?=@$row->standard_market_price?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Standard Smartfiling Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="standard_smartfiling_price" placeholder="" value="<?=@$row->standard_smartfiling_price?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Standard You save <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="standard_you_save" placeholder="" value="<?=@$row->standard_you_save?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Standard Government Fee <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="standard_government_fee" placeholder="" value="<?=@$row->standard_government_fee?>" >
                                </div>
                                <div class="col-lg-12 hide">
                                    <label class="form-label">Standard Package Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="standard_description" rows="4" ><?=@$row->standard_description?></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Standard Plan Features* <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="standard_price_description" rows="4" required><?=@$row->standard_price_description?></textarea>
                                    <script>CKEDITOR.replace( 'standard_price_description' );</script>
                                </div>

                                <!-- plan two end -->







                                <!-- plan tree start -->
                                
                                <div class="col-md-6">
                                    <label class="form-label">Pro Plan Status <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single" name="pro_status" data-minimum-results-for-search="Infinity" required>
                                        <option value="1" <?php if(!empty(@$row) && @$row->pro_status==1) echo'selected' ?> >Active</option>
                                        <option value="0" <?php if(!empty(@$row) && @$row->pro_status==0) echo'selected' ?> >Disable</option>
                                    </select>
                                    <div class="invalid-feedback">Please select any on option.</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Pro Plan Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pro_price" placeholder="" value="<?=@$row->pro_price?>" required>
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Pro Market Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pro_market_price" placeholder="" value="<?=@$row->pro_market_price?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Pro Smartfiling Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pro_smartfiling_price" placeholder="" value="<?=@$row->pro_smartfiling_price?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Pro You save <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pro_you_save" placeholder="" value="<?=@$row->pro_you_save?>" >
                                </div>
                                <div class="col-md-6 hide">
                                    <label class="form-label">Pro Government Fee <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="pro_government_fee" placeholder="" value="<?=@$row->pro_government_fee?>" >
                                </div>
                                <div class="col-lg-12 hide">
                                    <label class="form-label">Pro Package Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="pro_description" rows="4" ><?=@$row->pro_description?></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Pro Plan Features* <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="pro_price_description" rows="4" required><?=@$row->pro_price_description?></textarea>
                                    <script>CKEDITOR.replace( 'pro_price_description' );</script>
                                </div>

                                <!-- plan tree end -->




                                <div class="col-lg-12">
                                    <label class="form-label">Documents Are Required* <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="document_area" rows="4" required><?=@$row->document_area?></textarea>
                                    <script>CKEDITOR.replace( 'document_area' );</script>
                                </div>

                                <div class="col-lg-12">
                                    <label class="form-label">Extra Description<span class="text-danger">(Optional)</span></label>
                                    <textarea class="form-control" name="extra" rows="4" required><?=@$row->extra?></textarea>
                                    <script>CKEDITOR.replace( 'extra' );</script>
                                </div>


                                


                                <div class="col-lg-12">
                                    <label class="form-label">Image <span class="text-danger">*</span> <small>If you want to covert .webp file <a href="https://cloudconvert.com/jpg-to-webp" target="_blank">Click to open link</a></small></label>
                                    <div class="col-lg-12">
                                        <input class="form-control upload-single-image" type="file" name="image" data-target="image" accept="image/*" @if(empty($row))  @endif>
                                        <img class="upload-img-view img-thumbnail mt-2 mb-2 image" id="viewer" style="width:auto;height:120px;overflow:hidden;" src="<?=image_check(@$row->image)?>" alt="banner image"/>
                                    </div>
                                </div>


                                <?=view('backend/meta') ?>

                               
                                <div class="col-md-12">
                                    <label for="planStatus" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="js-example-basic-single" id="planStatus" name="status" data-minimum-results-for-search="Infinity" required>
                                        <option value="1" <?php if(!empty(@$row) && @$row->status==1) echo'selected' ?> >Active</option>
                                        <option value="0" <?php if(!empty(@$row) && @$row->status==0) echo'selected' ?> >Disable</option>
                                    </select>
                                    <div class="invalid-feedback">Please select any on option.</div>
                                </div>
                                <div class="col-12">
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-success btn-label"><i class="ri-check-double-line label-icon align-middle fs-16 me-2"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </form>
        <!--end row-->
    </div>
    <!-- container-fluid -->
</div><!-- End Page-content -->






<?=view('backend/include/footer') ?>