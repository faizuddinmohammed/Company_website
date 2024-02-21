<?php if(!empty(get_static_option('preloader_status'))): ?>
    <?php
        $preloader = 'preloader-default';
        if (!empty(get_static_option('preloader_custom'))){
            $preloader = 'preloader-custom';
        }elseif(empty(get_static_option('preloader_custom')) && !empty(get_static_option('preloader_default'))){
            $preloader = 'preloader-dynamic';
        }
    ?>
    <?php echo $__env->make('frontend.partials.preloader.'.$preloader, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/sites/19b/5/5cebb17d2b/public_html/@core/resources/views/frontend/partials/preloader.blade.php ENDPATH**/ ?>