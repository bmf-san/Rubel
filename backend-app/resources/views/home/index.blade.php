@extends('layouts.master')

@section('title', 'home')

@section('content')
  <section class="hero is-primary is-medium header-image">
      <div class="hero-head">
        @include('partials.nav')
      </div>
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            Hero Heading
          </h1>
          <h2 class="subtitle is-5">
            A hero description could go here.
          </h2>
          <p>
            <a class="button is-outlined">
              <span class="icon">
                <i class="fa fa-download"></i>
              </span>
              <span>
                Download
              </span>
            </a>
          </p>
        </div>
      </div>
    </section>
    <div class="hero-cta">
      <nav class="level">
        <div class="level-item has-text-centered">
          <p class="title">Call to action here! <a class="button is-primary"><span class="icon"><i class="fa fa-download"></i></span><span>Intent</span></a></p>
        </div>
      </nav>
    </div>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column">
            content-1
          </div>
          <div class="column">
            content-1
          </div>
        </div>
        <div class="columns">
          <div class="column">
            content-2
          </div>
          <div class="column">
            content-2
          </div>
        </div>
        <div class="columns">
          <div class="column">
            content-3
          </div>
          <div class="column">
            content-3
          </div>
        </div>
      </div>
    </section>
    @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/home.bundle.js') }}></script>
@endsection
