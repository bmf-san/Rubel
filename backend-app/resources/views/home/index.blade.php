@extends('layouts.master')

@section('title', 'home')

@section('content')
  <section class="hero is-primary is-large header-image">
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
    <div class="section main">
      <div class="container">
        <div class="columns">
          <div class="column is-4">
            <div class="panel">
              <div class="panel-block section">
                <p class="has-text-centered"><i class="fa fa-camera-retro icon-block"></i></p>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.</p>
                <br>
                <p class="has-text-centered"><a class="button is-info is-outlined">Action</a></p>
              </div>
            </div>
          </div>
          <div class="column is-4">
            <div class="panel">
              <div class="panel-block section">
                <p class="has-text-centered"><i class="fa fa-bar-chart icon-block"></i></p>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.</p>
                <br>
                <p class="has-text-centered"><a class="button is-info is-outlined">Action</a></p>
              </div>
            </div>

          </div>
          <div class="column is-4">
            <div class="panel">
              <div class="panel-block section">
                <p class="has-text-centered"><i class="fa fa-cloud icon-block"></i></p>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.</p>
                <br>
                <p class="has-text-centered"><a class="button is-info is-outlined">Action</a></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    @include('partials.footer')
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/dist/home.bundle.js') }}></script>
@endsection
