<aside class="menu">
  <p class="menu-label">
    <a href="{{ route('web.categories') }}">Categories</a>
  </p>
  <ul class="menu-list">
    <li>
      <ul>
        @forelse ($categories as $category)
          <li><a href="{{ route('web.posts.category', $category->name) }}">{{ $category->name }}</a></li>
        @empty
          No Categories.
        @endforelse
      </ul>
    </li>
  </ul>
</aside>
<aside class="menu">
  <p class="menu-label">
    <a href="{{ route('web.tags') }}">Tags</a>
  </p>
  <ul class="menu-list">
    <li>
      <ul class="tag-list">
        @forelse ($tags as $tag)
          <a href="{{ route('web.posts.tag', $tag->name) }}">
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
