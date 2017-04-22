@extends('layouts.master')

@section('title', 'Posts')

@section('content')
  <div class="container-fluid">
    @include('partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Posts
          </h1>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        @foreach ($posts as $post)
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
              {{ mb_str_limit(strip_tags($post->html_content), 80, '...') }}
            </h2>
            <p class="has-text-right">{{ $post->views }}&nbsp;views</p>
          </div>
        @endforeach
      </div>
      <div class="columns">
        <div class="column is-8 is-offset-2">
          <div class="mt-one-and-a-half">
            <nav class="pagination is-centered">
              {{ $posts->links('partials.pagination') }}
            </nav>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include('partials.footer_nav')
  @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/post.bundle.js') }}></script>
@endsection
