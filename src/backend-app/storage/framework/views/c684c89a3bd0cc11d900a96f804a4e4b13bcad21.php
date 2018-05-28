<?php $__env->startSection('canonical', url()->current()); ?>

<?php $__env->startSection('title', 'home'); ?>

<?php $__env->startSection('additional-stylesheet'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('/dist/css/home.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <section class="hero is-primary is-medium header-image">
      <div class="hero-head">
        <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            <?php echo e(get_the_blog_info('title')); ?>

          </h1>
          <h2 class="subtitle is-5">
            <?php echo e(get_the_blog_info('sub_title')); ?>

          </h2>
        </div>
      </div>
    </section>
    <div class="tabs is-centered">
      <ul>
        <li id="recent-btn"><a>Recent</a></li>
        <li id="random-btn"><a>Random</a></li>
      </ul>
    </div>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div id="recent-tab" class="column is-7 is-offset-2 posts-column">
            <?php $__empty_1 = true; $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                    <?php echo e(mb_str_limit($post->title, 40, '...')); ?>

                  </a>
                </h1>
                <h2 class="blog-summary">
                  <?php echo e(mb_str_limit(strip_tags($post->html_content), 80, '...')); ?>

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
          <div id="random-tab" class="column is-7 is-offset-2 posts-column">
            <?php $__empty_1 = true; $__currentLoopData = $randomPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                  <?php echo e(mb_str_limit($post->title, 40, '...')); ?>

                </a>
              </h1>
              <h2 class="blog-summary">
                <?php echo e(mb_str_limit(strip_tags($post->html_content), 80, '...')); ?>

              </h2>
              <p class="has-text-right has-text-muted">
                <a href="<?php echo e(route('web.posts.categories.getPosts', $post->category->name)); ?>">
                  <?php echo e($post->category->name); ?>

                </a>
              </p>
              <p class="has-text-right">
                <?php $__empty_2 = true; $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                  <a href=<?php echo e(route('web.posts.tags.getPosts',$tag->name)); ?>>
                    <span class="tag is-primary">
                      <?php echo e($tag->name); ?>

                    </span>
                  </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                  No Tags.
                <?php endif; ?>
              </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <p class="has-text-centered">Nothing Found.</p>
            <?php endif; ?>
          </div>
          <div class="column is-3">
            <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="tabs is-centered">
          <ul>
            <li><a href=<?php echo e(route('web.posts.index')); ?>>View more posts</a></li>
          </ul>
        </div>
      </div>
    </section>
    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('additional-script'); ?>
  <script type="text/javascript" src=<?php echo e(asset('/dist/js/home.bundle.js')); ?>></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>