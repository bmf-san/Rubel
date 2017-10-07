<header class="nav">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item" href={{ route('web.root.index') }}>
        <h1 class="title">
          {{ get_the_blog_info('title') }}
        </h1>
      </a>
    </div>
    <span class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
    </span>
    <div class="nav-right nav-menu">
      <a class="nav-item {{ (request()->path() == '/') ? 'is-active' : '' }}" href={{ route('web.root.index') }}>
        Home
      </a>
      <a class="nav-item {{ (request()->path() == 'posts') ? 'is-active' : '' }}" href={{ route('web.posts.index') }}>
        Post
      </a>
      <a class="nav-item {{ (request()->path() == 'profiles') ? 'is-active' : '' }}" href={{ route('web.profiles.index') }}>
        Profile
      </a>
      <a class="nav-item {{ (request()->path() == 'contacts') ? 'is-active' : '' }}" href={{ route('web.contacts.index') }}>
        Contact
      </a>
    </div>
  </div>
</header>
