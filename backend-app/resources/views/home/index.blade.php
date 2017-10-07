@extends('layouts.master')

@section('title', 'home')

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/dist/css/home.min.css') }}">
@endsection

@section('content')
  <section class="hero is-primary is-medium header-image">
      <div class="hero-head">
        @include('partials.nav')
      </div>
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            {{ get_blog_info('title') }}
          </h1>
          <h2 class="subtitle is-5">
            {{ get_blog_info('sub_title') }}
          </h2>
        </div>
      </div>
    </section>
    <div class="tabs is-centered">
      <ul>
        <li id="recent-btn"><a>Recent</a></li>
        <li id="random-btn"><a>Random</a></li>
      </ul>
    </div>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div id="recent-tab" class="column is-7 is-offset-2 posts-column">
            @forelse($recentPosts as $post)
              <div class="column">
                @if(is_date_within_a_week($post->publication_date))
                  <p>
                    <span class="tag is-danger">New!</span>
                  </p>
                @endif
                <p>
                  <span>{{ $post->publication_date }}</span>
                </p>
                <h1 class="title">
                  <a href="{{ route('web.posts.show', $post->title) }}">
                    {{ mb_str_limit($post->title, 40, '...') }}
                  </a>
                </h1>
                <h2 class="blog-summary">
                  {{ mb_str_limit(strip_tags($post->html_content), 80, '...') }}
                </h2>
                <p class="has-text-right has-text-muted">
                  <a href="{{ route('web.posts.categories.getPosts', $post->category->name) }}">
                    {{ $post->category->name }}
                  </a>
                </p>
                <p class="has-text-right">
                  @forelse ($post->tags as $tag)
                    <a href="{{ route('web.posts.tags.getPosts', $tag->name) }}">
                      <span class="tag is-primary">
                        {{ $tag->name }}
                      </span>
                    </a>
                  @empty
                    No Tags.
                  @endforelse
                </p>
              </div>
            @empty
              <div class="column">
                <p class="has-text-centered">Nothing Found.</p>
              </div>
            @endforelse
          </div>
          <div id="random-tab" class="column is-7 is-offset-2 posts-column">
            @forelse($randomPosts as $post)
              @if(is_date_within_a_week($post->publication_date))
                <p>
                  <span class="tag is-danger">New!</span>
                </p>
              @endif
              <p>
                <span>{{ $post->publication_date }}</span>
              </p>
              <h1 class="title">
                <a href="{{ route('web.posts.show', $post->title) }}">
                  {{ mb_str_limit($post->title, 40, '...') }}
                </a>
              </h1>
              <h2 class="blog-summary">
                {{ mb_str_limit(strip_tags($post->html_content), 80, '...') }}
              </h2>
              <p class="has-text-right has-text-muted">
                <a href="{{ route('web.posts.categories.getPosts', $post->category->name) }}"></a>
                  {{ $post->category->name }}
                </a>
              </p>
              <p class="has-text-right">
                @forelse ($post->tags as $tag)
                  <a href={{ route('web.posts.tags.getPosts',$tag->name) }}>
                    <span class="tag is-primary">
                      {{ $tag->name }}
                    </span>
                  </a>
                @empty
                  No Tags.
                @endforelse
              </p>
            @empty
              <p class="has-text-centered">Nothing Found.</p>
            @endforelse
          </div>
          <div class="column is-3">
            @include('partials.sidebar')
          </div>
        </div>
      </div>
      <div class="container">
        <div class="tabs is-centered">
          <ul>
            <li><a href={{ route('web.posts.index') }}>View more posts</a></li>
          </ul>
        </div>
      </div>
    </section>
    @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/js/home.bundle.js') }}></script>
@endsection
