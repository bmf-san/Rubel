<aside class="menu">
  <p class="menu-label">
    <a href="{{ route('web.categories.index') }}">Categories</a>
  </p>
  <ul class="menu-list">
    <li>
      <ul>
        @forelse ($categories as $category)
          <li><a href="{{ route('web.posts.categories.getPosts', $category->name) }}">{{ $category->name }}</a></li>
        @empty
          No Categories.
        @endforelse
      </ul>
    </li>
  </ul>
</aside>
<aside class="menu">
  <p class="menu-label">
    <a href="{{ route('web.tags.index') }}">Tags</a>
  </p>
  <ul class="menu-list">
    <li>
      <ul class="tag-list">
        @forelse ($tags as $tag)
          <a href="{{ route('web.posts.tags.getPosts', $tag->name) }}">
            <span class="tag is-primary">
              {{ $tag->name }}
            </span>
          </a>
        @empty
          No Tags.
        @endforelse
      </ul>
    </li>
  </ul>
</aside>
<aside class="menu">
  <p class="menu-label">
    <a href="{{ route('web.tags.index') }}">Ad</a>
  </p>
  {!! get_the_google_adsense_ad_code(config('google.adsense.ad_name'), config('google.adsense.data_ad_client'), config('google.adsense.data_ad_slot')) !!}
</aside>
