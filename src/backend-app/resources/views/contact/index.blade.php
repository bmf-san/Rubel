@extends('layouts.master')

@section('title', 'Contact')
@section('canonical', url()->current())

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/dist/css/contact.min.css') }}">
@endsection

@section('content')
  <div>
    @include('partials.nav')
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Contact
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
