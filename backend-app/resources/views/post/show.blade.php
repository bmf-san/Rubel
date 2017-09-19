@extends('layouts.master')

@section('title', $post->title)

@section('content')
  <div>
    @include('partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            {{ $post->title }}
          </h1>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-7 is-offset-2">
            <div class="content">
              <h2 class="title is-3">{{ $post->title }}</h2>
              <p class="has-text-right has-text-muted">
                <a href="{{ route('web.posts.categories.getPosts', $post->category->name) }}">
                  {{ $post->category->name }}
                </a>
              </p>
              <p class="has-text-right">
                @foreach ($post->tags as $tag)
                  <a href="{{ route('web.posts.tags.getPosts', $tag->name) }}">
                    <span class="tag is-primary">
                      {{ $tag->name }}
                    </span>
                  </a>
                @endforeach
              </p>
              <p class="has-text-right has-text-muted">{{ $post->publication_date }}</p>
            </div>
            <div id="post-content" class="content">
              {!! $post->html_content !!}
            </div>
          </div>
          <div class="column is-3">
            @include('partials.toc')
            @include('partials.sidebar')
          </div>
        </div>
        <div class="columns">
          <div class="column is-7 is-offset-2">
            <div class="card is-fullwidth">
              <header class="card-header">
                <p class="card-header-title">
                  About the author
                </p>
                <a class="card-header-icon" href="#top">
                  <i class="fa fa-angle-up"></i>
                </a>
              </header>
              <div class="card-content">
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img src="https://pbs.twimg.com/profile_images/746059944118476800/DZCoTKfy.jpg" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>bmf san</strong> <a href="https://twitter.com/bmf_san" target="_blank"><small>@bmf_san</small></a>
                        <br>
                        A web developer in Japan.
                      </p>
                    </div>
                  </div>
                </article>
              </div>
              <footer class="card-footer">
                <a href="javascript:void(0);" onclick="window.open('https://twitter.com/share?url={{ url()->current() }}&text={{ $post->title }}&hashtags=bmf-tech&related=bmf_san', 'mywindow4', 'width=400, height=300, menubar=no, toolbar=no, scrollbars=yes');" class="card-footer-item">Share on Twitter</a>
                <a href="javascript:void(0);" onclick="window.open('http://b.hatena.ne.jp/add?url={{ url()->current() }}', 'mywindow4', 'width=400, height=300, menubar=no, toolbar=no, scrollbars=yes');" class="card-footer-item">Share on Hatena</a>
              </footer>
            </div>
            <div class="mt-one-and-a-half">
              <nav class="pagination is-centered">
                @if($previousPost)
                  <a class="pagination-previous" href="{{ route('web.posts.show', $previousPost->title) }}"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;{{ mb_str_limit($previousPost->title, 15, '...')}}</a>
                @else
                  <span></span>
                @endif
                @if($nextPost)
                  <a class="pagination-next" href="{{ route('web.posts.show', $nextPost->title) }}">{{ mb_str_limit($nextPost->title, 15, '...') }}&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                @endif
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/post.bundle.js') }}></script>
  <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async">
    {lang: "ja"}
  </script>
@endsection
