<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/<?php echo e($post->image); ?>" alt="">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img class="rounded-circle w-100"
                             src="/storage/<?php echo e($post->user->profile->image); ?>">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/<?php echo e($post->user->id); ?>">
                                <?php echo e($post->user->username); ?>

                            </a>
                            <a href="#" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/<?php echo e($post->user->id); ?>">
                        <?php echo e($post->user->username); ?>

                    </a>
                </span>
                <?php echo e($post->caption); ?>

            </p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel/resources/views/posts/show.blade.php ENDPATH**/ ?>