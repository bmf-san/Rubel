<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title type="text"><?php echo e($title); ?></title>
  <subtitle type="html"><?php echo e($subTitle); ?></subtitle>
  <updated><?php echo e($updatedAt); ?></updated>
  <id><?php echo e(strtolower(route('web.root.index'))); ?></id>
  <rights>Copyright (c) <?php echo e($currentDate->format('Y')); ?>, <?php echo e(config('rubel.admin.name')); ?></rights>
  <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <entry>
        <title><![CDATA[<?php echo e($post->title); ?>]]></title>
        <link rel="alternate" type="text/html" href="<?php echo e(strtolower(route('web.posts.show', $post))); ?>" />
        <id><?php echo e(strtolower(route('web.posts.show', $post))); ?></id>
        <updated><?php echo e($post->updated_at->toAtomString()); ?></updated>
        <published><?php echo e($post->publication_date->toAtomString()); ?></published>
        <author>
          <name><![CDATA[<?php echo e($post->admin->name); ?>]]></name>
        </author>
        <summary type="html"><![CDATA[<?php echo mb_str_limit(strip_tags($post->html_content), 500, '...'); ?>]]></summary>
    </entry>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</feed>
