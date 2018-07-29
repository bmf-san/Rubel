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
      <div class="column is-8 is-offset-2">
        <form action="{{ route('web.contacts.submit') }}" method="post">
          {{csrf_field()}}
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input class="input @if ($errors->has('name')) is-danger @endif" type="text" placeholder="Your name" name="name" value="{{ old('name') }}">
              @if ($errors->has('name'))
                <span class="help is-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>

          <div class="field">
            <label class="label">Email</label>
            <div class="control">
              <input class="input @if ($errors->has('email')) is-danger @endif" type="email" placeholder="Your email" name="email" value="{{ old('email') }}">
              @if ($errors->has('email'))
                <span class="help is-danger">{{ $errors->first('email') }}</span>
              @endif
            </div>
          </div>

          <div class="field">
            <label class="label">Message</label>
            <div class="control">
              <textarea class="textarea @if ($errors->has('message')) is-danger @endif" placeholder="Type your message here ..." name="message">{{ old('message') }}</textarea>
              @if ($errors->has('message'))
                <span class="help is-danger">{{ $errors->first('message') }}</span>
              @endif
            </div>
          </div>

          <div class="field is-grouped is-pulled-right">
            <button class="button is-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
@include('bmftech::partials.footer')
@endsection
