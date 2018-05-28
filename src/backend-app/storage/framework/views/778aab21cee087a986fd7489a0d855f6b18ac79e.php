<aside class="menu">
  <p class="menu-label">
    <a href="<?php echo e(route('web.categories.index')); ?>">Categories</a>
  </p>
  <ul class="menu-list">
    <li>
      <ul>
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <li>
            <a href="<?php echo e(route('web.posts.categories.getPosts', $category->name)); ?>"><?php echo e($category->name); ?></a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          No Categories.
        <?php endif; ?>
      </ul>
    </li>
  </ul>
</aside>
<aside class="menu">
  <p class="menu-label">
    <a href="<?php echo e(route('web.tags.index')); ?>">Tags</a>
  </p>
  <ul class="menu-list">
    <li>
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
    </li>
  </ul>
</aside>
<aside class="menu">
  <p class="menu-label">
    <a href="<?php echo e(route('web.tags.index')); ?>">Ad</a>
  </p>
  <?php echo get_the_google_adsense_ad_code(config('google.adsense.ad_name'), config('google.adsense.data_ad_client'), config('google.adsense.data_ad_slot')); ?>

</aside>
