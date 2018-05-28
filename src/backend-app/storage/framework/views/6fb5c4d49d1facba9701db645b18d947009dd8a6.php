<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php $__currentLoopData = $sitemap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <url>
      <loc><?php echo e($data->url); ?></loc>
      <lastmod><?php echo e($data->updated_at); ?></lastmod>
    </url>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset>
