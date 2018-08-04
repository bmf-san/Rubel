@extends('bmftech::layouts.master')

@section('title', 'home')
@section('canonical', url()->current())

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/vendor/bmftech/dist/css/home.min.css') }}">
@endsection

@section('content')
  <section class="hero is-primary is-medium header-image">
      <div class="hero-head">
        @include('bmftech::partials.nav')
      </div>
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            {{ get_the_blog_info('title') }}
          </h1>
          <h2 class="subtitle is-5">
            {{ get_the_blog_info('sub_title') }}
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
                @if(is_date_within_a_week($post->published_at))
                  <p>
                    <span class="tag is-danger">New!</span>
                  </p>
                @endif
                <p>
                  <span>{{ $post->published_at }}</span>
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
              @if(is_date_within_a_week($post->published_at))
                <p>
                  <span class="tag is-danger">New!</span>
                </p>
              @endif
              <p>
                <span>{{ $post->published_at }}</span>
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
              @include('bmftech::partials.sidebar.categories')
            @include('bmftech::partials.sidebar.tags')
            @include('bmftech::partials.sidebar.ad')
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
    @include('bmftech::partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/vendor/bmftech/dist/js/home.bundle.js') }}></script>
@endsection
