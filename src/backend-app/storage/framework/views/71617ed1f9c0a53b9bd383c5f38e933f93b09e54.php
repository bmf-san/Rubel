<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href=<?php echo $__env->yieldContent('canonical', url()->current()); ?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('/dist/css/app.min.css')); ?>">
    <title><?php echo e(get_the_blog_info('title')); ?> - <?php echo $__env->yieldContent('title', 'title'); ?></title>

    
    <?php echo $__env->yieldContent('additional-stylesheet'); ?>

    
    <?php echo get_the_google_analytics_code(config('google.analytics.tracking_id')); ?>

</head>
<body>
    
    <?php echo $__env->yieldContent('content'); ?>

    <script type="text/javascript" src=<?php echo e(asset('/dist/js/app.bundle.js')); ?>></script>

    
    <?php echo $__env->yieldContent('additional-script'); ?>
</body>
</html>
