<?php $__env->startSection('title', 'Error' . $errorMessages['status']); ?>

<?php $__env->startSection('content'); ?>
  <div>
    <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-half is-offset-one-quarter has-text-centered">
            <p class="title is-2"><?php echo e($errorMessages['status']); ?>&nbsp;<?php echo e($errorMessages['message']); ?></p>
            <a href="<?php echo e(route('web.root.index')); ?>">Top</a>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>