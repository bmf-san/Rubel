<?php $__env->startSection('canonical', url()->current()); ?>

<?php $__env->startSection('title', 'Tag'); ?>

<?php $__env->startSection('additional-stylesheet'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('/dist/css/tag.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div>
    <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Tag
          </h1>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="column is-8 is-offset-2">
          <ul class="tag-list">
            <?php $__empty_1 = true; $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <a href="<?php echo e(route('web.posts.tags.getPosts', $tag->name)); ?>">
                <span class="tag is-primary">
                  <?php echo e($tag->name); ?>

                </span>
              </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              No Tags.
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </section>
  </div>
  <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>