@extends(get_the_view_path('layouts.master'))

@section('title', 'Error' . $errorMessages['status'])

@section('content')
  <div>
    @include(get_the_view_path('partials.nav'))
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-half is-offset-one-quarter has-text-centered">
            <p class="title is-2">{{ $errorMessages['status'] }}&nbsp;{{ $errorMessages['message'] }}</p>
            <a href="{{ route('web.root.index') }}">Top</a>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include(get_the_view_path('partials.footer'))
@endsection
