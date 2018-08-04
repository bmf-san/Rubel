@extends('bmftech::layouts.master')

@section('title', 'Category')
@section('canonical', url()->current())

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/vendor/bmftech/dist/css/category.min.css') }}">
@endsection

@section('content')
  <div>
    @include('bmftech::partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Category
          </h1>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="column is-8 is-offset-2">
          @forelse($categories as $category)
            <p class="title is-4">
              <a href="{{ 'web.post.category', $category->name }}">
                {{ $category->name }}
              </a>
            </p>
          @empty
            No Categories.
          @endforelse
        </div>
      </div>
    </section>
  </div>
  @include('bmftech::partials.footer')
@endsection
