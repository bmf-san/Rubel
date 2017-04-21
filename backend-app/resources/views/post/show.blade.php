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
          @foreach ($post->tags as $tag)
            <span class="tag">
              <a href="#">
                {{ $tag->name }}
              </a>
            </span>
          @endforeach
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-7 is-offset-2">
            <div class="content section">
              <p class="has-text-right has-text-muted">{{ $post->publication_date }}</p>
              <p>
                {{ $post->content }}
              </p>
            </div>
          </div>
          <div class="column is-3">
            <aside class="menu">
              <ul class="menu-list">
                <li>
                  <a>Table of contents</a>
                  <ul>
                    <li><a>Membershogehohgeohgeoghehogehogehgoeoghe</a></li>
                    <li><a>Plugins</a></li>
                    <li><a>Add a member</a></li>
                  </ul>
                </li>
              </ul>
            </aside>
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
                      <img src="http://placehold.it/128x128" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>John Smith</strong> <small>@johnsmith</small>
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
                      </p>
                    </div>
                  </div>
                </article>
              </div>
              <footer class="card-footer">
                <a class="card-footer-item">Share on Facebook</a>
                <a class="card-footer-item">Share on Twitter</a>
                <a class="card-footer-item">Share on G+</a>
              </footer>
            </div>
            <div class="mt-one-and-a-half">
              <nav class="pagination is-centered">
                @if($previous_post)
                  <a class="pagination-previous" href="/post/{{ $previous_post->id }}"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;{{ mb_str_limit($previous_post->title, 20, '...')}}</a>
                @endif
                @if($next_post)
                  <a class="pagination-next" href="/post/{{ $next_post->id }}">{{ mb_str_limit($next_post->title, 20, '...') }}&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
