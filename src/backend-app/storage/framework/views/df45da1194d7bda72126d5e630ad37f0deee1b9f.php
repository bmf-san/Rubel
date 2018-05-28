<header class="nav">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item" href=<?php echo e(route('web.root.index')); ?>>
        <h1 class="title">
          <?php echo e(get_the_blog_info('title')); ?>

        </h1>
      </a>
    </div>
    <span class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
    </span>
    <div class="nav-right nav-menu">
      <a class="nav-item <?php echo e((request()->path() == '/') ? 'is-active' : ''); ?>" href=<?php echo e(route('web.root.index')); ?>>
        Home
      </a>
      <a class="nav-item <?php echo e((request()->path() == 'posts') ? 'is-active' : ''); ?>" href=<?php echo e(route('web.posts.index')); ?>>
        Post
      </a>
      <a class="nav-item <?php echo e((request()->path() == 'profiles') ? 'is-active' : ''); ?>" href=<?php echo e(route('web.profiles.index')); ?>>
        Profile
      </a>
      <a class="nav-item <?php echo e((request()->path() == 'contacts') ? 'is-active' : ''); ?>" href=<?php echo e(route('web.contacts.index')); ?>>
        Contact
      </a>
    </div>
  </div>
</header>
