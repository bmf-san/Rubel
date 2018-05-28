<?php $__env->startSection('canonical', url()->current()); ?>

<?php $__env->startSection('title', 'Post - Category'); ?>

<?php $__env->startSection('additional-stylesheet'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('/dist/css/home.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div>
    <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Post
          </h1>
          <h2 class="subtitle is-5">
            <?php echo e(request()->route()->category->name); ?>

          </h2>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-7 is-offset-2 posts-column">
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="column">
                <?php if(is_date_within_a_week($post->published_at)): ?>
                  <p>
                    <span class="tag is-danger">New!</span>
                  </p>
                <?php endif; ?>
                <p>
                  <span><?php echo e($post->published_at); ?></span>
                </p>
                <h1 class="title">
                  <a href="<?php echo e(route('web.posts.show', $post->title)); ?>">
                    <?php echo e(mb_str_limit($post->title, 20, '...')); ?>

                  </a>
                </h1>
                <h2 class="blog-summary">
                  <?php echo e(mb_str_limit(strip_tags($post->html_content), 300, '...')); ?>

                </h2>
                <p class="has-text-right has-text-muted">
                  <a href="<?php echo e(route('web.posts.categories.getPosts', $post->category->name)); ?>">
                    <?php echo e($post->category->name); ?>

                  </a>
                </p>
                <p class="has-text-right">
                  <?php $__empty_2 = true; $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <a href="<?php echo e(route('web.posts.tags.getPosts', $tag->name)); ?>">
                      <span class="tag is-primary">
                        <?php echo e($tag->name); ?>

                      </span>
                    </a>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    No Tags.
                  <?php endif; ?>
                </p>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <div class="column">
                <p class="has-text-centered">Nothing Found.</p>
              </div>
            <?php endif; ?>
          </div>
          <div class="column is-3">
            <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column is-7 is-offset-2">
          <?php echo $__env->make('partials.links', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
      </div>
    </section>
  </div>
  <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional-script'); ?>
  <script type="text/javascript" src=<?php echo e(asset('/dist/js/post.bundle.js')); ?>></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>