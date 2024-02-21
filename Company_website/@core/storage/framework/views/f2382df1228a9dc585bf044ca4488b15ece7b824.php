<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo session('msg'); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/sites/19b/5/5cebb17d2b/public_html/@core/resources/views/backend/partials/message.blade.php ENDPATH**/ ?>