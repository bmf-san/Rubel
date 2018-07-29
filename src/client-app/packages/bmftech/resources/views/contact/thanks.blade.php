@extends('bmftech::layouts.master')

@section('title', 'Contact')
@section('canonical', url()->current())

@section('additional-stylesheet')
<link rel="stylesheet" href="{{ asset('/vendor/bmftech//dist/css/contact.min.css') }}">
@endsection

@section('content')
<div>
  @include('bmftech::partials.nav')
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
      <div class="columns">
        <div class="column is-8 is-offset-2">
          <div id="post-content" class="content">
            <h1>Thank you for you message!</h1>
            <p>Please check your email.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@include('bmftech::partials.footer')
@endsection
