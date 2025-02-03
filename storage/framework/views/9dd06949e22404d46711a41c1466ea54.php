<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img alt="" class="rounded-circle w-100" src="/storage/<?php echo e($user->profile->image); ?>"/>
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1><?php echo e($user->username); ?></h1>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile)): ?>
                    <a href="/p/create">Add new post</a>
                <?php endif; ?>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile)): ?>
                <a href="/profile/<?php echo e($user->id); ?>/edit">Edit profile</a>
            <?php endif; ?>
            <div class="d-flex">
                <div class="pr-5"><strong><?php echo e($user->posts->count()); ?></strong> posts</div>
                <div class="pr-5"><strong>250</strong> followers</div>
                <div class="pr-5"><strong>350</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold"><?php echo e($user->profile->title ?? ""); ?></div>
            <div><?php echo e($user->profile->description ?? ""); ?></div>
            <div><a href="#"><?php echo e($user->profile->url ?? "N/A"); ?></a></div>
        </div>
    </div>

    <div class="row pt-5">
        <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4 pb-4">
                <a href="/p/<?php echo e($post->id); ?>">
                    <img src="/storage/<?php echo e($post->image); ?>" class="w-100" alt="">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/laravel/resources/views/profiles/index.blade.php ENDPATH**/ ?>