<aside class="menu">
  <p class="menu-label">
    <a href="{{ route('web.tags.index') }}">Ad</a>
  </p>
  {!! get_the_google_adsense_ad_code(config('google.adsense.ad_name'), config('google.adsense.data_ad_client'), config('google.adsense.data_ad_slot')) !!}
</aside>
