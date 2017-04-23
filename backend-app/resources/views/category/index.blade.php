@extends('layouts.master')

@section('title', 'Profile')

@section('content')
  <div class="container-fluid">
    @include('partials.nav')
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
              <a href="/post/category/{{ $category->id }}">
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
  @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/category.bundle.js') }}></script>
@endsection
