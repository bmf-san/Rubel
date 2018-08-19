@extends(get_the_view_path('layouts.master'))

@section('title', 'Category')
@section('canonical', url()->current())

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/vendor/bmftech/dist/css/category.min.css') }}">
@endsection

@section('content')
  <div>
    @include(get_the_view_path('partials.nav'))
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
              <a href="{{ route('web.posts.categories.getPosts', $category->name) }}">
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
  @include(get_the_view_path('partials.footer'))
@endsection
