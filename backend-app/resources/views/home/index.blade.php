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
        @forelse($recent_posts as $post)
          <div class="column is-8 is-offset-2">
            @if(isDateWithinAWeek($post->publication_date))
              <p>
                <span class="tag is-danger">New!</span>
              </p>
            @endif
            <p>
              <span>{{ $post->publication_date }}</span>
            </p>
            <h1 class="title">
              <a href='/post/{{ $post->id }}'>
                {{ mb_str_limit($post->title, 20, '...') }}
              </a>
            </h1>
            <h2 class="blog-summary">
              {{ mb_str_limit($post->content, 80, '...') }}
            </h2>
            <p class="has-text-right">{{ $post->views }}&nbsp;views</p>
          </div>
        @empty
          <div class="column is-8 is-offset-2">
            <p class="has-text-centered">Nothing Found.</p>
          </div>
        @endforelse
      </div>
      <div class="container popular-tab">
        @forelse($popular_posts as $post)
          <div class="column is-8 is-offset-2">
            @if(isDateWithinAWeek($post->publication_date))
              <p>
                <span class="tag is-danger">New!</span>
              </p>
            @endif
            <p>
              <span>{{ $post->publication_date }}</span>
            </p>
            <h1 class="title">
              <a href='/post/{{ $post->id }}'>
                {{ mb_str_limit($post->title, 20, '...') }}
              </a>
            </h1>
            <h2 class="blog-summary">
              {{ mb_str_limit($post->content, 80, '...') }}
            </h2>
            <p class="has-text-right">{{ $post->views }}&nbsp;views</p>
          </div>
        @empty
          <div class="column is-8 is-offset-2">
            <p class="has-text-centered">Nothing Found.</p>
          </div>
        @endforelse
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
