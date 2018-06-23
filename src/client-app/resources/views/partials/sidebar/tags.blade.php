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
