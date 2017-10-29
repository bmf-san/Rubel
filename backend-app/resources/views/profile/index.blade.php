@extends('layouts.master')

@section('canonical', url()->current())

@section('title', 'Profile')

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/dist/css/profile.min.css') }}">
@endsection

@section('content')
  <div>
    @include('partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Profile
          </h1>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="column is-8 is-offset-2">
          Coming soon ...
        </div>
      </div>
    </section>
  </div>
  @include('partials.footer')
@endsection
