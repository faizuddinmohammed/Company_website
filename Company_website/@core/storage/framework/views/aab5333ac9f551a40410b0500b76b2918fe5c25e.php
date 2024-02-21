
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
<?php echo e(__('Edit Services')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .curriculmn-repeater-wrap1 > .action-wrap {
    /* position: absolute; */
    right: 10px;
    top: 10px;
    text-align: right;
}
    .curriculmn-repeater-wrap1 > .action-wrap span {
    display: inline-block;
    width: 25px;
    height: 25px;
    line-height: 25px;
    text-align: center;
    background-color: #ddd;
    font-size: 14px;
    cursor: pointer;
}
.curriculmn-repeater-wrap1 > .action-wrap span.add {
    background-color: #339e4a;
    color: #fff;
}
.curriculmn-repeater-wrap1 > .action-wrap span.remove {
    background-color: #bb4b4c;
    color: #fff;
}
</style>
<div class="col-lg-12 col-ml-12 padding-bottom-30">
    <div class="row">
        <div class="col-lg-12">
            <div class="margin-top-40"></div>
             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.error-msg','data' => []]); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.flash-msg','data' => []]); ?>
<?php $component->withName('flash-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        </div>
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="header-wrap d-flex justify-content-between">
                        <h4 class="header-title"><?php echo e(__('Edit Service')); ?></h4>
                        <a href="<?php echo e(route('admin.services')); ?>" class="btn btn-primary"><?php echo e(__('All Services')); ?></a>
                    </div>
                    <form action="<?php echo e(route('admin.services.update')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($service->id); ?>">
                        <div class="form-group">
                            <label for="language"><?php echo e(__('Language')); ?></label>
                            <select name="lang" id="language" class="form-control">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($language->slug == $service->lang): ?> selected <?php endif; ?> value="<?php echo e($language->slug); ?>"><?php echo e($language->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title"><?php echo e(__('Title')); ?></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo e($service->title); ?>">
                        </div>
                        <div class="form-group">
                            <label for="title"><?php echo e(__('Slug')); ?></label>
                            <input type="text" class="form-control" id="slug" name="slug" value="<?php echo e($service->slug); ?>">
                        </div>
                        <div class="form-group">
                            <label for="edit_icon_type"><?php echo e(__('Icon Type')); ?></label>
                            <select name="icon_type" class="form-control" id="edit_icon_type">
                                <option <?php if($service->icon_type == 'icon'): ?> selected <?php endif; ?> value="icon"><?php echo e(__("Font Icon")); ?></option>
                                <option <?php if($service->icon_type == 'image'): ?> selected <?php endif; ?> value="image"><?php echo e(__("Image Icon")); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="icon" class="d-block"><?php echo e(__('Icon')); ?></label>
                            <div class="btn-group ">
                                <button type="button" class="btn btn-primary iconpicker-component">
                                    <i class="<?php echo e($service->icon); ?>"></i>
                                </button>
                                <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle" data-selected="<?php echo e($service->icon); ?>" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>
                            <input type="hidden" class="form-control" id="icon" value="<?php echo e($service->icon); ?>" name="icon">
                        </div>
                        <div class="form-group">
                            <label for="img_icon"><?php echo e(__('Image Icon')); ?></label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap">
                                    <?php
                                    $service_section_img = get_attachment_image_by_id($service->img_icon,null,true);
                                    $image_btn_label = __('Upload Image Icon');
                                    ?>
                                    <?php if(!empty($service_section_img)): ?>
                                    <div class="attachment-preview">
                                        <div class="thumbnail">
                                            <div class="centered">
                                                <img class="avatar user-thumb" src="<?php echo e($service_section_img['img_url']); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $image_btn_label = __('Update Image Icon');
                                    ?>
                                    <?php endif; ?>
                                </div>
                                <input type="hidden" id="img_icon" name="img_icon" value="<?php echo e($service->img_icon); ?>">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                    <?php echo e($image_btn_label); ?>

                                </button>
                            </div>
                            <small><?php echo e(__('Recommended image size 60x60')); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="excerpt"><?php echo e(__('Excerpt 1')); ?></label>
                            <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30" rows="10"><?php echo e($service->excerpt); ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="description"><?php echo e(__('Description')); ?></label>
                            <input type="hidden" name="description" id="description" value="<?php echo e($service->description); ?>">
                            <div class="summernote"><?php echo $service->description; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="excerpt2"><?php echo e(__('Excerpt 2')); ?></label>
                            <textarea name="excerpt2" id="excerpt2" class="form-control max-height-150" cols="30" rows="10"><?php echo e($service->excerpt2); ?></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="description2"><?php echo e(__('Description 2')); ?></label>
                            <input type="hidden" name="description2" id="description2" value="<?php echo e($service->description2); ?>">
                            <div class="summernote"><?php echo $service->description2; ?></div>
                        </div>
                        <div class="form-group">
                            <label for="text2"><?php echo e(__('Heading Middle')); ?></label>
                            <textarea name="text2" id="text2" class="form-control max-height-150" placeholder="<?php echo e(__('Heading Middle')); ?>" cols="30" rows="10"><?php echo e($service->text2); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="text1"><?php echo e(__('Text Bottom')); ?></label>
                            <textarea name="text1" id="text1" class="form-control max-height-150" placeholder="<?php echo e(__('Text Bottom')); ?>" cols="30" rows="10"><?php echo e($service->text1); ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                            <input type="text" name="meta_tags" class="form-control" value="<?php echo e($service->meta_tag); ?>" data-role="tagsinput" id="meta_tags">
                        </div>
                        <div class="form-group">
                            <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                            <textarea name="meta_description" class="form-control" rows="5" id="meta_description"><?php echo e($service->meta_description); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category"><?php echo e(__('Category')); ?></label>
                            <select name="categories_id" id="category" class="form-control">
                                <option value=""><?php echo e(__('Select Category')); ?></option>
                                <?php $__currentLoopData = $service_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($service->categories_id == $data->id): ?> selected <?php endif; ?> value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price_plan"><?php echo e(__('Price Plans')); ?></label>
                            <select name="price_plan[]" multiple class="form-control nice-select wide" id="price_plan_select">
                                <?php
                                $select_plan = !empty($service->price_plan) ? unserialize($service->price_plan) : [];
                                ?>
                                <?php $__currentLoopData = $price_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" <?php if(is_array($select_plan) && in_array($data->id,$select_plan)): ?> selected <?php endif; ?>><?php echo e($data->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status"><?php echo e(__('Status')); ?></label>
                            <select name="status" id="status" class="form-control">
                                <option <?php if($service->status == 'publish'): ?> selected <?php endif; ?> value="publish"><?php echo e(__('Publish')); ?></option>
                                <option <?php if($service->status == 'draft'): ?> selected <?php endif; ?> value="draft"><?php echo e(__('Draft')); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sr_order"><?php echo e(__('Order')); ?></label>
                            <input type="text" class="form-control" id="sr_order" name="sr_order" value="<?php echo e($service->sr_order); ?>">
                            <span class="info-text"><?php echo e(__('if you set order for it, all service will show in frontend as a per this order')); ?></span>
                        </div>
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['id' => $service->image,'name' => 'image','dimentions' => '1920x1280','title' => __('Image')]]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($service->image),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('image'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('1920x1280'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Image'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                         <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['id' => $service->banner,'name' => 'banner','dimentions' => '3000x1680','title' => __('Banner')]]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($service->banner),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('banner'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('3000x1680'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Banner'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        <div class="iconbox-repeater-wrapper dynamic-repeater">
                            <label for="additional_info" class="d-block"><?php echo e(__('Details')); ?> <span class="d-none"><i class="fas fa-spinner fa-spin"></i></span></label>
                            <?php $__empty_1 = true; $__currentLoopData = $service_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd_id => $service_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <input type="hidden" name="service_detail_id[]" value="<?php echo e($service_detail->id); ?>">
                               <div class="curriculmn-outer-wrap">
                                   <div class="curriculmn-repeater-wrap">
                                       <div class="action-wrap">
                                           <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                           <span class="add"><i class="ti-plus"></i></span>
                                           <span class="remove"><i class="ti-trash"></i></span>
                                       </div>
                                       
                                       
                                       <div class="tab-content" >
                                            <div class="tab-pane fade  show active" id="repeater_tab" role="tabpanel">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="detail_title[<?php echo e($sd_id); ?>]" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($service_detail['title'] ?? ''); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control max-height-120" name="detail_description[<?php echo e($sd_id); ?>]" cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"><?php echo e($service_detail['description'] ?? ''); ?></textarea>
                                                </div>
                                                 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['id' => $service_detail->img,'name' => 'detail_img['.$sd_id.']','dimentions' => '1920x1280','title' => __('Image')]]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($service_detail->img),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('detail_img['.$sd_id.']'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('1920x1280'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Image'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                            </div>
                                       </div>
                                   </div>
                                   <?php $all_points =  json_decode($service_detail['content']) ?? [];  ?>
                                   <?php $__empty_2 = true; $__currentLoopData = $all_points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point_id => $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                  
                                   <div class="all-field-wrap lesson">
                                       <div class="form-group">
                                           
                                           <input type="text" class="form-control" name="detail_points[<?php echo e($sd_id); ?>][]" placeholder="<?php echo e(__('add new point')); ?>" value="<?php echo e($point ?? ''); ?>">
                                       </div>
                                       <div class="action-wrap">
                                           
                                           <span class="add"><i class="ti-plus"></i></span>
                                           <span class="remove"><i class="ti-trash"></i></span>
                                       </div>
                                   </div>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                       <div class="all-field-wrap lesson">
                                           <div class="form-group">
                                               
                                               <input type="text" class="form-control" name="detail_points[<?php echo e($sd_id); ?>][]" placeholder="<?php echo e(__('add new point')); ?>">
                                           </div>

                                           <div class="action-wrap">
                                               <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                               <span class="add"><i class="ti-plus"></i></span>
                                               <span class="remove"><i class="ti-trash"></i></span>
                                           </div>
                                       </div>
                                   <?php endif; ?>

                               </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="curriculmn-outer-wrap">
                                <div class="curriculmn-repeater-wrap">
                                    <div class="action-wrap" style="">
                                        <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>


                                    <div class="tab-content">

                                        <div class="tab-pane fade  show active" id="repeater_tab" role="tabpanel">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="detail_title[1]" placeholder="<?php echo e(__('Title')); ?>">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control max-height-120" name="detail_description[1]" cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="detail_img[1]"><?php echo e(__('Image')); ?></label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input  type="hidden"  name="detail_img[1]">
                                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                        <?php echo e(__('Upload Image')); ?>

                                                    </button>
                                                </div>
                                                <small><?php echo e(__('Recommended image size 533x590')); ?></small>
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <div class="all-field-wrap lesson">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="detail_points[1][]" placeholder="<?php echo e(__('add new point')); ?>">
                                    </div>
                                    <div class="action-wrap">
                                        <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                                <?php endif; ?>
                            
                        </div>
                        <div class="iconbox-repeater-wrapper dynamic-repeater">
                            <label for="additional_info" class="d-block"><?php echo e(__('More Services')); ?> <span class="d-none"><i class="fas fa-spinner fa-spin"></i></span></label>
                            <?php
                            $more_service_img = (array)json_decode($service->more_service_img)??[];
                            //print_r($more_service_img);
                            $more_service_title = (array)json_decode($service->more_service_title)??[];
                            //die();
                            $count = 0;
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $more_service_title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mst => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="curriculmn-outer-wrap1">
                                <div class="curriculmn-repeater-wrap1">
                                    <div class="action-wrap" style="">
                                        <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>


                                    <div class="tab-content">

                                        <div class="tab-pane fade  show active" id="repeater_tab" role="tabpanel">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="more_service_title[<?php echo e($count); ?>]" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($title ?? ''); ?>"  >
                                            </div>
                                            
                                            <?php
                                            $img = $more_service_img[$mst];
                                            ?>
                                            
                                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['id' => $img,'name' => 'more_service_img['.$count.']','dimentions' => '1920x1280','title' => __('Image')]]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($img),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('more_service_img['.$count.']'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('1920x1280'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Image'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  
                                        </div>

                                    </div>
                                </div>
                                
                            </div>
                            <?php
                            $count++;
                            ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="curriculmn-outer-wrap1">
                                <div class="curriculmn-repeater-wrap1">
                                    <div class="action-wrap" style="">
                                        <span class="edit d-none"><a href="#"><i class="ti-pencil"></i></a></span>
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>


                                    <div class="tab-content">

                                        <div class="tab-pane fade  show active" id="repeater_tab" role="tabpanel">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="more_service_title[1]" placeholder="<?php echo e(__('Title')); ?>">
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="more_service_img[1]"><?php echo e(__('Icon')); ?></label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input class="form-control" type="hidden"  name="more_service_img[1]">
                                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                                        <?php echo e(__('Upload Image')); ?>

                                                    </button>
                                                </div>
                                                <small><?php echo e(__('Recommended image size 533x590')); ?></small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>  
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Service')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/jquery.nice-select.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
        if ($('.nice-select').length > 0) {
            $('.nice-select').niceSelect();
        }

        $(document).on('change', 'select[name="icon_type"]', function(e) {
            e.preventDefault();
            var iconType = $(this).val();
            iconTypeFieldVal(iconType);
        });
        defaultIconType();

        function defaultIconType() {
            var iconType = $('select[name="icon_type"]').val();
            iconTypeFieldVal(iconType);
        }

        function iconTypeFieldVal(iconType) {
            if (iconType == 'icon') {
                $('input[name="img_icon"]').parent().parent().hide();
                $('input[name="icon"]').parent().show();
            } else if (iconType == 'image') {
                $('input[name="icon"]').parent().hide();
                $('input[name="img_icon"]').parent().parent().show();
            }
        }

        $('.summernote').summernote({
            height: 250, //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            },
            callbacks: {
                onChange: function(contents, $editable) {
                    $(this).prev('input').val(contents);
                }
            }
        });

        $(document).on('change', '#language', function(e) {
            e.preventDefault();
            var selectedLang = $(this).val();
            $.ajax({
                url: "<?php echo e(route('admin.service.category.by.slug')); ?>",
                type: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    lang: selectedLang
                },
                success: function(data) {
                    $('#category').html('');
                    $.each(data, function(index, value) {
                        $('#category').append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.service.price.plan.by.slug')); ?>",
                type: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    lang: selectedLang
                },
                success: function(data) {
                    $('#price_plan_select').html('');
                    $.each(data, function(index, value) {
                        $('#price_plan_select').append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                    $('#price_plan_select').niceSelect('update');
                }
            });
        });

        $('.icp-dd').iconpicker();
        $('.icp-dd').on('iconpickerSelected', function(e) {
            var selectedIcon = e.iconpickerValue;
            $(this).parent().parent().children('input').val(selectedIcon);
        });

    });
</script>
<script>
    (function() {
        "use strict";



        $(document).ready(function() {
            $('input[type="hidden"]').addClass("form-control");

            $(document).on('click', '.curriculmn-repeater-wrap .action-wrap .remove', function(e) {
                e.preventDefault();
                var el = $(this);
                var parent = el.parent().parent();
                var container = $('.curriculmn-outer-wrap');

                if (container.length > 1) {
                    el.show(300);
                    parent.parent().hide(300).remove();
                } else {
                    el.hide(300);
                }
            });

            $(document).on('click', '.curriculmn-repeater-wrap .action-wrap .add', function(e) {
                e.preventDefault();
                var el = $(this);
                var parent = el.parent().parent();
                var container = $('.curriculmn-repeater-wrap');
                var clonedDiv = $(this).parent().parent().parent().clone();
                var containerLength = container.length;
                var allFields = clonedDiv.find('.form-control');
                allFields.val('');
                allFields.each(function(item, index) {
                    var name = $(this).attr('name');
                    var number = name.replace(/\d+/g, containerLength + 1);
                    $(this).attr('name', number);
                });
                clonedDiv.find('.curriculmn-repeater-wrap > .action-wrap .remove').css({
                    'display': 'inline-block'
                });
                clonedDiv.find('.all-field-wrap.lesson').not(':first').remove();

                var allTab = clonedDiv.find('.tab-pane');
                allTab.each(function(index, value) {
                    var el = $(this);
                    var oldId = el.attr('id');
                    el.attr('id', oldId + containerLength);
                });
                var allTabNav = clonedDiv.find('.nav-link');
                allTabNav.each(function(index, value) {
                    var el = $(this);
                    var oldId = el.attr('href');
                    el.attr('href', oldId + containerLength);
                });
                container.parent().parent().append(clonedDiv);
                if (container.length > 0) {
                    parent.parent().find('.remove').show(300);
                }
            });

        });

        $(document).on('click', '.all-field-wrap .action-wrap .add', function(e) {
            e.preventDefault();
            var el = $(this);
            var parent = el.parent().parent();
            var container = $('.all-field-wrap');
            var clonedData = parent.clone();
            var containerLength = container.length;
            clonedData.find('#myTab').attr('id', 'mytab_' + containerLength);
            clonedData.find('#myTabContent').attr('id', 'myTabContent_' + containerLength);
            clonedData.find('.action-wrap .edit').remove();


            var allFields = clonedData.find('.form-control');
            allFields.val('');


            var allTab = clonedData.find('.tab-pane');
            allTab.each(function(index, value) {
                var el = $(this);
                var oldId = el.attr('id');
                el.attr('id', oldId + containerLength);
            });
            var allTabNav = clonedData.find('.nav-link');
            allTabNav.each(function(index, value) {
                var el = $(this);
                var oldId = el.attr('href');
                el.attr('href', oldId + containerLength);
            });

            parent.parent().append(clonedData);

            if (containerLength > 0) {
                parent.parent().find('.remove').show(300);
            }
            parent.parent().find('.iconpicker-popover').remove();
            parent.parent().find('.icp-dd').iconpicker();

        });

        $(document).on('click', '.all-field-wrap .action-wrap .remove', function(e) {
            e.preventDefault();
            var el = $(this);
            var parent = el.parent().parent();
            var container = $(this).parent().parent().parent().find('.all-field-wrap');

            if (container.length > 1) {
                el.show(300);
                parent.hide(300).remove();
            } else {
                el.hide(300);
            }
        });        
        
        $(document).ready(function() {

$(document).on('click', '.curriculmn-repeater-wrap1 .action-wrap .remove', function(e) {
    e.preventDefault();
    var el = $(this);
    var parent = el.parent().parent();
    var container = $('.curriculmn-outer-wrap1');

    if (container.length > 1) {
        el.show(300);
        parent.parent().hide(300).remove();
    } else {
        el.hide(300);
    }
});

$(document).on('click', '.curriculmn-repeater-wrap1 .action-wrap .add', function(e) {
    e.preventDefault();
    var el = $(this);
    var parent = el.parent().parent();
    var container = $('.curriculmn-repeater-wrap1');
    var clonedDiv = $(this).parent().parent().parent().clone();
    var containerLength = container.length;
    var allFields = clonedDiv.find('.form-control');
    allFields.val('');
    allFields.each(function(item, index) {
        var name = $(this).attr('name');
        var number = name.replace(/\d+/g, containerLength + 1);
        $(this).attr('name', number);
    });
    clonedDiv.find('.curriculmn-repeater-wrap1 > .action-wrap .remove').css({
        'display': 'inline-block'
    });
    clonedDiv.find('.all-field-wrap.lesson').not(':first').remove();

    var allTab = clonedDiv.find('.tab-pane');
    allTab.each(function(index, value) {
        var el = $(this);
        var oldId = el.attr('id');
        el.attr('id', oldId + containerLength);
    });
    var allTabNav = clonedDiv.find('.nav-link');
    allTabNav.each(function(index, value) {
        var el = $(this);
        var oldId = el.attr('href');
        el.attr('href', oldId + containerLength);
    });
    container.parent().parent().append(clonedDiv);
    if (container.length > 0) {
        parent.parent().find('.remove').show(300);
    }
});

});

    })(jQuery);
</script>
<script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
<?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/19b/5/5cebb17d2b/public_html/@core/resources/views/backend/pages/service/edit-service.blade.php ENDPATH**/ ?>