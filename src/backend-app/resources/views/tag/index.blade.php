@extends('layouts.master')

@section('canonical', url()->current())

@section('title', 'Tag')

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/dist/css/tag.min.css') }}">
@endsection

@section('content')
  <div>
    @include('partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Tag
          </h1>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="column is-8 is-offset-2">
          <ul class="tag-list">
            @forelse($tags as $tag)
              <a href="{{ route('web.posts.tags.getPosts', $tag->name) }}">
                <span class="tag is-primary">
                  {{ $tag->name }}
                </span>
              </a>
            @empty
              No Tags.
            @endforelse
          </ul>
        </div>
      </div>
    </section>
  </div>
  @include('partials.footer')
@endsection
