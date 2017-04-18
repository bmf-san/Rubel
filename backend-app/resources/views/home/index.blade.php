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
            Hero Heading
          </h1>
          <h2 class="subtitle is-5">
            A hero description could go here.
          </h2>
          <p>
            <a class="button is-outlined">
              <span class="icon">
                <i class="fa fa-download"></i>
              </span>
              <span>
                Download
              </span>
            </a>
          </p>
        </div>
      </div>
    </section>
    <div class="hero-cta">
      <nav class="level">
        <div class="level-item has-text-centered">
          <p class="title">Call to action here! <a class="button is-primary"><span class="icon"><i class="fa fa-download"></i></span><span>Intent</span></a></p>
        </div>
      </nav>
    </div>
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
            <li><a href={{ url('/posts') }}>View more posts</a></li>
          </ul>
        </div>
      </div>
      <div class="columns">
        <div class="column is-8 is-offset-2">
            next contents
        </div>
      </div>
    </section>
    @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/home.bundle.js') }}></script>
@endsection
