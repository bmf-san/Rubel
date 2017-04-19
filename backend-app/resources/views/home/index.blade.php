@extends('layouts.master')

@section('title', 'home')

@section('content')
  <section class="hero is-primary is-medium header-image">
      <div class="hero-head">
        @include('partials.nav')
      </div>
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Rubel
          </h1>
          <h2 class="subtitle is-5">
            A Simple CMS worked by Laravel and React.
          </h2>
        </div>
      </div>
    </section>
    <div class="tabs is-centered">
      <ul>
        <li class="recent-btn"><a>Recent</a></li>
        <li class="popular-btn"><a>Popular</a></li>
      </ul>
    </div>
    <section class="section">
      <div class="container recent-tab">
        <div class="column is-8 is-offset-2">
          <p>
            <span class="tag is-danger">New!</span>
          </p>
          <h1 class="title">
            Cras feugiat euismod sem accumsan ultrices.
          </h1>
          <h2 class="blog-summary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare malesuada dolor ut dictum. Pellentesque eget orci nisl. Vivamus sit amet ullamcorper elit. Donec mattis scelerisque dui sed convallis.
          </h2>
        </div>
        <div class="column is-8 is-offset-2">
          <p>
            2 days ago
          </p>
          <h1 class="title">
            Cras feugiat euismod sem accumsan ultrices.
          </h1>
          <h2 class="blog-summary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare malesuada dolor ut dictum. Pellentesque eget orci nisl. Vivamus sit amet ullamcorper elit. Donec mattis scelerisque dui sed convallis.
          </h2>
        </div>
        <div class="column is-8 is-offset-2">
          <p>
            2 days ago
          </p>
          <h1 class="title">
            Cras feugiat euismod sem accumsan ultrices.
          </h1>
          <h2 class="blog-summary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare malesuada dolor ut dictum. Pellentesque eget orci nisl. Vivamus sit amet ullamcorper elit. Donec mattis scelerisque dui sed convallis.
          </h2>
        </div>
      </div>
      <div class="container popular-tab">
        <div class="column is-8 is-offset-2">
          <p>
            <span class="tag is-danger">New!</span>
          </p>
          <h1 class="title">
            Cras feugiat euismod sem accumsan ultrices.
          </h1>
          <h2 class="blog-summary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare malesuada dolor ut dictum. Pellentesque eget orci nisl. Vivamus sit amet ullamcorper elit. Donec mattis scelerisque dui sed convallis.
          </h2>
        </div>
        <div class="column is-8 is-offset-2">
          <p>
            2 days ago
          </p>
          <h1 class="title">
            Cras feugiat euismod sem accumsan ultrices.
          </h1>
          <h2 class="blog-summary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare malesuada dolor ut dictum. Pellentesque eget orci nisl. Vivamus sit amet ullamcorper elit. Donec mattis scelerisque dui sed convallis.
          </h2>
        </div>
        <div class="column is-8 is-offset-2">
          <p>
            2 days ago
          </p>
          <h1 class="title">
            Cras feugiat euismod sem accumsan ultrices.
          </h1>
          <h2 class="blog-summary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ornare malesuada dolor ut dictum. Pellentesque eget orci nisl. Vivamus sit amet ullamcorper elit. Donec mattis scelerisque dui sed convallis.
          </h2>
        </div>
      </div>
      <div class="container">
        <div class="tabs is-centered">
          <ul>
            <li><a href={{ url('/posts') }}>View more posts</a></li>
          </ul>
        </div>
      </div>
    </section>
    @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/home.bundle.js') }}></script>
@endsection
