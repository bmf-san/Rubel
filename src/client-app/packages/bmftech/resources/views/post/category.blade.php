@extends('bmftech::layouts.master')

@section('title', 'Post - Category')
@section('canonical', url()->current())

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/vendor/bmftech/dist/css/home.min.css') }}">
@endsection

@section('content')
  <div>
    @include('bmftech::partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Post
          </h1>
          <h2 class="subtitle is-5">
            {{ $category->name }}
          </h2>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-7 is-offset-2 posts-column">
            @forelse ($posts as $post)
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
                    {{ mb_str_limit($post->title, 50, '...') }}
                  </a>
                </h1>
                <h2 class="blog-summary">
                  {{ mb_str_limit(strip_tags($post->html_content), 300, '...') }}
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
          <div class="column is-3">
            @include('bmftech::partials.sidebar.categories')
            @include('bmftech::partials.sidebar.tags')
            @include('bmftech::partials.sidebar.ad')
          </div>
        </div>
      </div>
      <div class="columns">
        <div class="column is-7 is-offset-2">
          @include('bmftech::partials.links')
        </div>
      </div>
    </section>
  </div>
  @include('bmftech::partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/vendor/bmftech/dist/js/post.bundle.js') }}></script>
@endsection
