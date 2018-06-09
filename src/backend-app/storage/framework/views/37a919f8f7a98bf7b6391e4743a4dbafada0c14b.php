<?php $__env->startSection('canonical', url()->current()); ?>

<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('additional-stylesheet'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('/dist/css/post.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div>
    <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            <?php echo e($post->title); ?>

          </h1>
          <p class="has-text-centered">
            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo e(route('web.posts.tags.getPosts', $tag->name)); ?>">
                <span class="tag is-primary">
                  <?php echo e($tag->name); ?>

                </span>
              </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </p>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-7 is-offset-2">
            <div class="content">
              <p class="has-text-right has-text-muted">
                <a href="<?php echo e(route('web.posts.categories.getPosts', $post->category->name)); ?>">
                  <?php echo e($post->category->name); ?>

                </a>
              </p>
              <p class="has-text-right has-text-muted"><?php echo e($post->published_at); ?></p>
            </div>
            <div id="post-content" class="content">
              <?php echo $post->html_content; ?>

            </div>
            <div class="column is-paddingless">
              <?php echo get_the_google_adsense_ad_code(config('google.adsense.ad_name'), config('google.adsense.data_ad_client'), config('google.adsense.data_ad_slot')); ?>

            </div>
          </div>
          <div class="column is-3">
            <?php if(!isMobile()): ?>
              <?php echo $__env->make('partials.sidebar.toc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
            <?php echo $__env->make('partials.sidebar.related_post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          </div>
        </div>
        <div class="columns">
          <div class="column is-7 is-offset-2">
            <div class="card is-fullwidth">
              <header class="card-header">
                <p class="card-header-title">
                  About the author
                </p>
                <a class="card-header-icon" href="#top">
                  <i class="fa fa-angle-up"></i>
                </a>
              </header>
              <div class="card-content">
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img src="https://pbs.twimg.com/profile_images/746059944118476800/DZCoTKfy.jpg" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>bmf san</strong> <a href="https://twitter.com/bmf_san" target="_blank"><small>@bmf_san</small></a>
                        <br>
                        A web developer in Japan.
                      </p>
                    </div>
                  </div>
                </article>
              </div>
              <footer class="card-footer">
                <a href="javascript:void(0);" onclick="window.open('https://twitter.com/share?url=<?php echo e(url()->current()); ?>&text=<?php echo e($post->title); ?>&hashtags=bmf-tech&related=bmf_san', 'mywindow4', 'width=400, height=300, menubar=no, toolbar=no, scrollbars=yes');" class="card-footer-item">Share on Twitter</a>
                <a href="javascript:void(0);" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>')" class="card-footer-item">Share on Facebook</a>
              </footer>
            </div>
            <div class="mt-one-and-a-half">
              <nav class="pagination is-centered">
                <?php if($previousPost): ?>
                  <a class="pagination-previous" href="<?php echo e(route('web.posts.show', $previousPost->title)); ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;<?php echo e(mb_str_limit($previousPost->title, 15, '...')); ?></a>
                <?php else: ?>
                  <span></span>
                <?php endif; ?>
                <?php if($nextPost): ?>
                  <a class="pagination-next" href="<?php echo e(route('web.posts.show', $nextPost->title)); ?>"><?php echo e(mb_str_limit($nextPost->title, 15, '...')); ?>&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                <?php endif; ?>
              </nav>
            </div>
          </div>
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