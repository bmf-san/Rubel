<aside class="menu">
  <p class="menu-label">
    <a href="{{ route('web.categories.index') }}">Categories</a>
  </p>
  <ul class="menu-list">
    <li>
      <ul>
        @forelse ($categories as $category)
          <li>
            <a href="{{ route('web.posts.categories.getPosts', $category->name) }}">{{ $category->name }}</a>
          </li>
        @empty
          No Categories.
        @endforelse
      </ul>
    </li>
  </ul>
</aside>
