
<?php $__env->startSection('site-title'); ?>
<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
<?php echo e($service_item->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
<meta name="description" content="<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_meta_description')); ?>">
<meta name="tags" content="<?php echo e(get_static_option('service_page_'.$user_select_lang_slug.'_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .breadcrumb-area {
        display: none;
    }

    #service_tab::after {
        content: "/";
        position: absolute;
        right: 11px;
        top: 50%;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        opacity: .33;
    }

    .ul {
        list-style: none;
    }

    .ul li:before {
        background-color: #0085ca;
        content: "";
        height: 2px;
        left: -42px;
        position: absolute;
        top: 15px;
        width: 22px;
    }
</style>
<section class="service-breadcrumb-area">
    <div class="container-fluid">
        <div class="row">
            <?php
                $banner = get_attachment_image_by_id($service_item->banner, 'full')['img_url'];
               // echo $banner;
            ?>
            <div class="service-banner" style="background-image: url(<?php echo e($banner); ?>)">
                <div class="banner-inner">
                    <h1 class="page-title"><?php echo e($service_item->excerpt); ?></h1>
                    <div class="page-desc"><?php echo $service_item->description; ?></div>
                </div>
            </div>
            <div class="breadcrumb-inner">
                <p><span><a href="<?php echo e(url('/')); ?>">Techstudio</a></span><span><a id="service_tab" href="<?php echo e(url('/service')); ?>">Services</a></span><span><strong><?php echo $__env->yieldContent('page-title'); ?></strong></span></p>

            </div>
        </div>
    </div>
</section>
<section class="service-area1">
    <div class="container-fluid">
        <div class="row">
            <div class="sect-connt">
                <h2><?php echo e($service_item->excerpt2); ?></h2>
                <?php echo $service_item->description2; ?>


            </div>
        </div>
    </div>
</section>
<section class="service-area2">
    <div class="container-fluid">
        <div class="row">
            <div class="sect-connt">
                <h3><?php echo e($service_item->text2); ?></h3>
            </div>
        </div>
    </div>
</section>
<?php
$count = count($service_details);
?>
<?php for($i=0;$i<$count;$i+=2): ?> <?php
                            // print_r(get_attachment_image_by_id($service_details[$i]->img, 'full')['img_url']);
                            // die();
                            ?> <section class="service-area3">
    <div class="container-fluid">

        <div class="row">
            <div class="sect-connt">
                <div class="sect-count-img">
                    <?php echo render_image_markup_by_attachment_id($service_details[$i]->img); ?>


                </div>
                <div class="sect-count-inner">
                    <h3><?php echo e($service_details[$i]->title); ?></h3>
                    <p><?php echo $service_details[$i]->description; ?></p>
                    <?php
                    $all_points = json_decode($service_details[$i]->content);

                    ?>
                    <?php if($all_points!=[] && $all_points[0]!=''): ?>
                    <ul class="ul">
                        <?php $__currentLoopData = $all_points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li><i class="fas fa-minus" style="color: #0085ca;"></i> <?php echo e($point); ?></li>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    </section>
    <?php if(isset($service_details[$i+1]->title)): ?>

    <section class="service-area4">
        <div class="container-fluid">
            <div class="row">

                <div class="sect-connt">
                    <div class="sect-count-img">
                        <?php echo render_image_markup_by_attachment_id($service_details[$i+1]->img); ?>


                    </div>
                    <div class="sect-count-inner">
                        <h3><?php echo e($service_details[$i+1]->title); ?></h3>
                        <p><?php echo $service_details[$i+1]->description; ?></p>
                        <?php
                        $all_points = json_decode($service_details[$i+1]->content);

                        ?>
                        <?php if($all_points[0]!=''): ?>
                        <ul class="ul">
                            <?php $__currentLoopData = $all_points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li><i class="fas fa-minus" style="color: #0085ca;"></i> <?php echo e($point); ?></li>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php endfor; ?>

    <section class="service-area11">
        <div class="container-fluid">
            <div class="row">
                <div class="sect-connt">
                    <h2><?php echo e($service_item->text1); ?></h2>
                    <?php
                    $more_title = (array)json_decode($service_item->more_service_title);
                    $more_img = (array)json_decode($service_item->more_service_img);
                    $count = count($more_title);
                    ?>
                    <?php for($i=0;$i<$count;$i+=4): ?> <div class="ser-cat">
                        <?php for($j=0;$j<4;$j++): ?> <?php if(isset($more_title[$i+$j])): ?> <div class="cat1">
                            <?php echo render_image_markup_by_attachment_id($more_img[$i+$j]); ?>

                            <h3><?php echo e($more_title[$i+$j]); ?></h3>
                </div>
                <?php endif; ?>
                <?php endfor; ?>
            </div>
            <?php endfor; ?>

        </div>
        </div>
        </div>
    </section>
    <div class="page-content service-details padding-top-120 padding-bottom-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-details-item">


                        <?php if(!empty($price_plan)): ?>
                        <div class="price-plan-wrapper margin-top-40">
                            <div class="row">
                                <?php $__currentLoopData = $price_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6">
                                    <div class="single-price-plan-01 margin-bottom-20">
                                        <div class="price-header">
                                            <div class="name-box">
                                                <h4 class="name"><?php echo e($data->title); ?></h4>
                                            </div>
                                            <div class="price-wrap">
                                                <span class="price"><?php echo e(amount_with_currency_symbol($data->price)); ?></span><span class="month"><?php echo e($data->type); ?></span>
                                            </div>
                                        </div>
                                        <div class="price-body">
                                            <ul>
                                                <?php
                                                $features = explode("\n",$data->features);
                                                ?>
                                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($item); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <div class="btn-wrapper">
                                            <?php
                                            $url = !empty($data->url_status) ? route('frontend.plan.order',['id' => $data->id]) : $data->btn_url;
                                            ?>
                                            <a href="<?php echo e($url); ?>" class="boxed-btn"><?php echo e($data->btn_text); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <?php echo App\WidgetsBuilder\WidgetBuilderSetup::render_frontend_sidebar('service',['column' => false]); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="service-area7">
        <div class="container-fluid">
            <div class="row">
                <div class="sect-connt">
                    <h3>SPEAK WITH AN EXPERT</h3>
                    <a class="cont-btn" href="<?php echo e(url('/contact')); ?>">CONTACT US »</a>
                </div>
            </div>
        </div>
    </section>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sites/19b/5/5cebb17d2b/public_html/@core/resources/views/frontend/pages/service/service-single.blade.php ENDPATH**/ ?>