<header class="nav">
  <div class="container">
    <div class="nav-left">
      <a class="nav-item" href={{ url('/') }}>
        <h1 class="title">
          Rubel
        </h1>
      </a>
    </div>
    <span class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
    </span>
    <div class="nav-right nav-menu">
      <a class="nav-item {{ (request()->path() == '/') ? 'is-active' : '' }}" href={{ url('/') }}>
        Home
      </a>
      <a class="nav-item {{ (request()->path() == 'post') ? 'is-active' : '' }}" href={{ url('/post') }}>
        Post
      </a>
      <a class="nav-item {{ (request()->path() == 'profile') ? 'is-active' : '' }}" href={{ url('/profile') }}>
        Profile
      </a>
      <a class="nav-item {{ (request()->path() == 'contact') ? 'is-active' : '' }}" href={{ url('/contact') }}>
        Contact
      </a>
    </div>
  </div>
</header>
