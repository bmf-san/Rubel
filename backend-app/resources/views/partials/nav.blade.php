<header class="nav">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item" href={{ route('web.home') }}>
        <h1 class="title">
          {{ get_blog_info('title') }}
        </h1>
      </a>
    </div>
    <span class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
    </span>
    <div class="nav-right nav-menu">
      <a class="nav-item {{ (request()->path() == '/') ? 'is-active' : '' }}" href={{ route('web.home') }}>
        Home
      </a>
      <a class="nav-item {{ (request()->path() == 'post') ? 'is-active' : '' }}" href={{ route('web.posts') }}>
        Post
      </a>
      <a class="nav-item {{ (request()->path() == 'profile') ? 'is-active' : '' }}" href={{ route('web.profile') }}>
        Profile
      </a>
      <a class="nav-item {{ (request()->path() == 'contact') ? 'is-active' : '' }}" href={{ route('web.contact') }}>
        Contact
      </a>
    </div>
  </div>
</header>
