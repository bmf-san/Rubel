@extends('layouts.master')

@section('title', 'Post')

@section('content')
  <div class="container-fluid">
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
                <a href="/post/category/{{ $post->category->id }}/{{ $post->category->name }}">
                  {{ $post->category->name }}
                </a>
              </p>
              <p class="has-text-right">
                @foreach ($post->tags as $tag)
                  <a href="/post/tag/{{ $tag->id }}/{{ $tag->name}}">
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
                <a class="card-footer-item">Share on Facebook</a>
                <a class="card-footer-item">Share on Twitter</a>
                <a class="card-footer-item">Share on Hatena</a>
              </footer>
            </div>
            <div class="mt-one-and-a-half">
              <nav class="pagination is-centered">
                @if($previous_post)
                  <a class="pagination-previous" href="/post/{{ $previous_post->id }}"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;{{ mb_str_limit($previous_post->title, 15, '...')}}</a>
                @else
                  <span></span>
                @endif
                @if($next_post)
                  <a class="pagination-next" href="/post/{{ $next_post->id }}">{{ mb_str_limit($next_post->title, 15, '...') }}&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
@endsection
