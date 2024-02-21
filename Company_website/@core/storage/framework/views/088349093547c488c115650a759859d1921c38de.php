<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('service_page_' . $user_select_lang_slug . '_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('service_page_' . $user_select_lang_slug . '_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description"
        content="<?php echo e(get_static_option('service_page_' . $user_select_lang_slug . '_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('service_page_' . $user_select_lang_slug . '_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="service-breadcrumb-area">
        <div class="container-fluid">
            <div class="row">
                <div class="service-banner">
                    <div class="banner-inner">
                        <h1 class="page-title">LEADING MANAGED SERVICES PROVIDER</h1>
                        <div class="page-desc"><p>Techstudio provides customized, flexible, reliable managed service solutions. With Wachter as your managed services provider, you’ll stop worrying about your technology and start focusing on your business.</p></div>
                    </div>
                </div>
                <div class="breadcrumb-inner">
                    <p><span><a href="<?php echo e(url('/')); ?>">Techstudio</a></span><span><strong><?php echo $__env->yieldContent('page-title'); ?></strong></span></p>
                    
                </div>
            </div>
        </div>
    </section>
    <div class="contact-section padding-bottom-120 padding-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-studies-masonry-wrapper">
                        <ul class="case-studies-menu style-01">
                            <li class="active" data-filter="*"><?php echo e(__('All')); ?></li>
                            <?php $__currentLoopData = $all_service_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-filter=".<?php echo e(Str::slug($data->name)); ?>"><?php echo e($data->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="case-studies-masonry">
                            <?php $__currentLoopData = $all_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 masonry-item <?php echo e(Str::slug(get_service_category_name_by_id($data->categories_id))); ?>">
                                    <div class="single-case-studies-item">
                                        <div class="thumb">

                                            <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                        </div>
                                        <div class="cart-icon">
                                            <h4 class="title"><a href="<?php echo e(route('frontend.services.single',$data->slug)); ?>"> <?php echo e($data->title); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    
                    
                    <div class="blog-pagination">
                        <?php echo $all_services->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/19b/5/5cebb17d2b/public_html/@core/resources/views/frontend/pages/service/services.blade.php ENDPATH**/ ?>