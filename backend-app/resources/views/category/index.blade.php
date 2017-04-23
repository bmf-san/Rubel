@extends('layouts.master')

@section('title', 'Category')

@section('content')
  <div class="container-fluid">
    @include('partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Blog post title
          </h1>
          <h2 class="subtitle is-4">
            Blog post subtitle
          </h2>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="column is-8 is-offset-2">
          @forelse ($categories as $category)
            {{ $category->name }}
          @empty
            No Categories.
          @endforelse
        </div>
      </div>
    </section>
  </div>
  @include('partials.footer')
@endsection
