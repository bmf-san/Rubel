<?php if($paginator->onFirstPage()): ?>
  <a class="pagination-previous is-hidden-mobile" disabled>Previous</a>
<?php else: ?>
  <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="pagination-previous is-hidden-mobile">Previous</a>
<?php endif; ?>
<?php if($paginator->hasMorePages()): ?>
  <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" class="pagination-next is-hidden-mobile">Next page</a>
<?php else: ?>
  <a class="pagination-next is-hidden-mobile" disabled>Next page</a>
<?php endif; ?>
<ul class="pagination-list">
  <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(is_string($element)): ?>
        <li class="disabled"><span><?php echo e($element); ?></span></li>
    <?php endif; ?>
    <?php if(is_array($element)): ?>
      <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $paginator->currentPage()): ?>
          <li><a href="<?php echo e($url); ?>" class="pagination-link is-current"><?php echo e($page); ?></a></li>
        <?php elseif($page !== 0): ?>
          <li><a href="<?php echo e($url); ?>" class="pagination-link"><?php echo e($page); ?></a></li>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
