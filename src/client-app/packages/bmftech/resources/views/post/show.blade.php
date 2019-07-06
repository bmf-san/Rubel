@extends(get_the_view_path('layouts.master'))

@section('title', $post->title)
@section('canonical', url()->current())
@section('description', mb_str_limit(strip_tags($post->html_content), 300))
@section('og_title', $post->title)
@section('og_description', mb_str_limit(strip_tags($post->html_content), 300))

@section('additional-stylesheet')
  <link rel="stylesheet" href="{{ asset('/vendor/bmftech/dist/css/post.min.css') }}">
@endsection

@section('content')
  <div>
    @include(get_the_view_path('partials.nav'))
    <section class="hero is-primary is-medium header-image">
      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title is-2">
            {{ $post->title }}
          </h1>
          <p class="has-text-centered">
            @foreach ($post->tags as $tag)
              <a href="{{ route('web.posts.tags.getPosts', $tag->name) }}">
                <span class="tag is-primary">
                  {{ $tag->name }}
                </span>
              </a>
            @endforeach
          </p>
        </div>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-7 is-offset-2">
            <div class="content">
              <p class="has-text-right has-text-muted">
                <a href="{{ route('web.posts.categories.getPosts', $post->category->name) }}">
                  {{ $post->category->name }}
                </a>
              </p>
              <p class="has-text-right has-text-muted">{{ $post->published_at }}</p>
            </div>
            <div id="post-content" class="content">
              {!! $post->html_content !!}
            </div>
            <div class="column is-paddingless">
              {!! get_the_google_adsense_ad_code(config('google.adsense.ad_name'), config('google.adsense.data_ad_client'), config('google.adsense.data_ad_slot')) !!}
            </div>
          </div>
          <div class="column is-3">
            @if (isMobile())
              @include(get_the_view_path('partials.sidebar.related_post'))
            @else
              <div class="sticky">
                @include(get_the_view_path('partials.sidebar.toc'))
                @include(get_the_view_path('partials.sidebar.related_post'))
              </div>
            @endif
          </div>
        </div>
        <div class="columns">
          <div class="column is-7 is-offset-2">
            <div class="card is-fullwidth">
              <header class="card-header">
                <p class="card-header-title">
                  About the author
                </p>
                <a class="card-header-icon" href="#top">
                  <i class="fa fa-angle-up"></i>
                </a>
              </header>
              <div class="card-content">
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img src="https://pbs.twimg.com/profile_images/746059944118476800/DZCoTKfy.jpg" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>bmf san</strong> <a href="https://twitter.com/bmf_san" target="_blank"><small>@bmf_san</small></a>
                        <br>
                        A web developer in Japan.
                      </p>
                    </div>
                  </div>
                </article>
              </div>
              <footer class="card-footer">
                <a href="javascript:void(0);" onclick="window.open('https://twitter.com/share?url={{ urlencode(url()->current()) }}&text={{ $post->title }}&hashtags=bmf_tech&related=bmf_san', 'mywindow4', 'width=400, height=300, menubar=no, toolbar=no, scrollbars=yes');" class="card-footer-item">Share on Twitter&nbsp;<i class="fa fa-twitter-square"></i></a>
                <a href="javascript:void(0);" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ url()->current()}}')" class="card-footer-item">Share on Facebook&nbsp;<i class="fa fa-facebook-square"></i></a>
              </footer>
            </div>
            <div class="mt-one-and-a-half">
              <nav class="pagination is-centered">
                @if($previousPost)
                  <a class="pagination-previous" href="{{ route('web.posts.show', $previousPost->title) }}"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;{{ mb_str_limit($previousPost->title, 15, '...')}}</a>
                @else
                  <span></span>
                @endif
                @if($nextPost)
                  <a class="pagination-next" href="{{ route('web.posts.show', $nextPost->title) }}">{{ mb_str_limit($nextPost->title, 15, '...') }}&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                @endif
              </nav>
            </div>
            <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://bmf-tech-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include(get_the_view_path('partials.footer'))
@endsection

@section('additional-script')
  <script type="text/javascript" src={{ asset('/vendor/bmftech/dist/js/post.bundle.js') }}></script>
@endsection
