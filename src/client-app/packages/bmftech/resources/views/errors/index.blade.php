@extends('bmftech::layouts.master')

@section('title', 'Error' . $errorMessages['status'])

@section('content')
  <div>
    @include('bmftech::partials.nav')
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
  @include('bmftech::partials.footer')
@endsection
