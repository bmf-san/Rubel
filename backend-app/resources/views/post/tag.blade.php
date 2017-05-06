@extends('layouts.master')

@section('title', 'Posts')

@section('content')
  <div>
    @include('partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Post
          </h1>
          <h2 class="subtitle is-5">
            {{ request()->segment(count(request()->segments())) }}
          </h2>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-7 is-offset-2 posts-column">
            @foreach ($posts as $post)
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
                {{ mb_str_limit(strip_tags($post->html_content), 300, '...') }}
              </h2>
              <p class="has-text-right has-text-muted">
                <a href="/post/category/{{ $post->category->id }}/{{ $post->category->name }}">
                  {{ $post->category->name }}
                </a>
              </p>
              <p class="has-text-right">{{ $post->views }}&nbsp;views</p>
            @endforeach
          </div>
          <div class="column is-3">
            @include('partials.sidebar')
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column is-7 is-offset-2">
          @include('partials.links')
        </div>
      </div>
    </section>
  </div>
  @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/post.bundle.js') }}></script>
@endsection
