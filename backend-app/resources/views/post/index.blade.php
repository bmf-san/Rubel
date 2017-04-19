@extends('layouts.master')

@section('title', 'Posts')

@section('content')
  <div class="container-fluid">
    @include('partials.nav')
    <section class="hero is-primary is-medium">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Blog post title
          </h1>
          <h2 class="subtitle is-4">
            Blog post subtitle
          </h2>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
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
            <li><a href="#">View more posts</a></li>
          </ul>
        </div>
      </div>
      <div class="columns">
        <div class="column is-8 is-offset-2">
          <div class="mt-one-and-a-half">
            <nav class="pagination is-centered">
              <a class="pagination-previous">Previous</a>
              <a class="pagination-next">Next page</a>
              <ul class="pagination-list">
                <li><a class="pagination-link">1</a></li>
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                <li><a class="pagination-link">45</a></li>
                <li><a class="pagination-link is-current">46</a></li>
                <li><a class="pagination-link">47</a></li>
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                <li><a class="pagination-link">86</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/post.bundle.js') }}></script>
@endsection
