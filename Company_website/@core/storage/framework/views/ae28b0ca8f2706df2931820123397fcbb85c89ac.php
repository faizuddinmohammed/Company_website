<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Breadcrumb Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/spectrum.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
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
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Breadcrumb  Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.breadcrumb.settings')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                             <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['name' => 'site_breadcrumb_bg','dimentions' => '1920x600','title' => __('Breadcrumb Image')]]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('site_breadcrumb_bg'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('1920x600'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Breadcrumb Image'))]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            <div class="row">
                               <div class="col-lg-3">
                                   <div class="form-group">
                                       <label for="#" class="d-block"><?php echo e(__('Breadcrumb Background Overlay Color')); ?></label>
                                       <div class="color_picker" title="<?php echo e(__('Click to change color')); ?>" style="background-color: <?php echo e(get_static_option('breadcrumb_background_overlay_color')); ?> "></div>
                                       <input type="hidden" value="<?php echo e(get_static_option('breadcrumb_background_overlay_color')); ?>" name="breadcrumb_background_overlay_color"  />
                                   </div>
                               </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="#" class="d-block"><?php echo e(__('Breadcrumb Title Color')); ?></label>
                                        <div class="color_picker" title="<?php echo e(__('Click to change color')); ?>" style="background-color: <?php echo e(get_static_option('breadcrumb_title_color')); ?> "></div>
                                        <input type="hidden" value="<?php echo e(get_static_option('breadcrumb_title_color')); ?>" name="breadcrumb_title_color"  />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="#" class="d-block"><?php echo e(__('Breadcrumb Text Color')); ?></label>
                                        <div class="color_picker" title="<?php echo e(__('Click to change color')); ?>" style="background-color: <?php echo e(get_static_option('breadcrumb_text_color')); ?> "></div>
                                        <input type="hidden" value="<?php echo e(get_static_option('breadcrumb_text_color')); ?>" name="breadcrumb_text_color"  />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="#" class="d-block"><?php echo e(__('Breadcrumb Text Active Color')); ?></label>
                                        <div class="color_picker" title="<?php echo e(__('Click to change color')); ?>" style="background-color: <?php echo e(get_static_option('breadcrumb_text_active_color')); ?> "></div>
                                        <input type="hidden" value="<?php echo e(get_static_option('breadcrumb_text_active_color')); ?>" name="breadcrumb_text_active_color"  />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/backend/js/spectrum.min.js')); ?>"></script>
    <script>
        (function($){
            "use strict";
            var colorPickerNode = $('.color_picker');
            colorPickerInit(colorPickerNode);
            function colorPickerInit(selector){

                $.each(selector,function (index,value){
                    var el = $(this);
                    el.spectrum({
                        showAlpha: true,
                        showPalette: true,
                        cancelText : '',
                        chooseText : '',
                        maxSelectionSize: 2,
                        showInput: true,
                        allowEmpty:true,
                        color: el.next('input').val(),
                        change: function(color) {
                            el.next('input').val( color ? color.toRgbString() : '');
                            el.css({
                                'background-color' : color ? color.toRgbString() : ''
                            });
                        },
                        move: function(color) {
                            el.next('input').val( color ? color.toRgbString() : '');
                            el.css({
                                'background-color' : color ? color.toRgbString() : ''
                            });
                        },
                        palette: [
                            [
                                "<?php echo e(get_static_option('site_color')); ?>",
                                "<?php echo e(get_static_option('site_main_color_two')); ?>",
                                "<?php echo e(get_static_option('site_secondary_color')); ?>",
                                "<?php echo e(get_static_option('site_heading_color')); ?>",
                                "<?php echo e(get_static_option('site_paragraph_color')); ?>",
                                "<?php echo e(get_static_option('portfolio_home_color')); ?>",
                                "<?php echo e(get_static_option('logistics_home_color')); ?>",
                                "<?php echo e(get_static_option('industry_home_color')); ?>",
                                "<?php echo e(get_static_option('construction_home_color')); ?>",
                                "<?php echo e(get_static_option('lawyer_home_color')); ?>",
                                "<?php echo e(get_static_option('political_home_color')); ?>",
                                "<?php echo e(get_static_option('medical_home_color')); ?>",
                                "<?php echo e(get_static_option('medical_home_color_two')); ?>",
                                "<?php echo e(get_static_option('fruits_home_color')); ?>",
                                "<?php echo e(get_static_option('fruits_home_heading_color')); ?>",
                                "<?php echo e(get_static_option('portfolio_home_dark_color')); ?>",
                                "<?php echo e(get_static_option('portfolio_home_dark_two_color')); ?>",
                                "<?php echo e(get_static_option('charity_home_color')); ?>",
                                "<?php echo e(get_static_option('dagency_home_color')); ?>",
                                "<?php echo e(get_static_option('cleaning_home_color')); ?>",
                                "<?php echo e(get_static_option('cleaning_home_two_color')); ?>",
                                "<?php echo e(get_static_option('course_home_color')); ?>",
                                "<?php echo e(get_static_option('grocery_home_two_color')); ?>",
                                "<?php echo e(get_static_option('grocery_home_color')); ?>"
                            ]
                        ]
                    });

                    el.on("dragstop.spectrum", function(e, color) {
                        el.next('input').val( color.toRgbString());
                        el.css({
                            'background-color' : color.toHexString()
                        });
                    });
                });
            }

            $(document).ready(function () {
                var imgSelect = $('.img-select');
                var id = $('#navbar_variant').val();
                imgSelect.removeClass('selected');
                $('img[data-navid="'+id+'"]').parent().parent().addClass('selected');

                $(document).on('click','.img-select img',function (e) {
                    e.preventDefault();
                    imgSelect.removeClass('selected');
                    $(this).parent().parent().addClass('selected').siblings();
                    $('#navbar_variant').val($(this).data('navid'));
                })
            });

        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/19b/5/5cebb17d2b/public_html/@core/resources/views/backend/pages/breadcrumb-settings.blade.php ENDPATH**/ ?>