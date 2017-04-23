<aside class="menu">
  <p class="menu-label">
    Categories
  </p>
  <ul class="menu-list">
    <li>
      <ul>
        @forelse ($categories as $category)
          <li><a href="/post/category/{{ $category->id }}/{{ $category->name }}">{{ $category->name }}</a></li>
        @empty
          No Categories.
        @endforelse
      </ul>
    </li>
  </ul>
</aside>
<aside class="menu">
  <p class="menu-label">
    Tags
  </p>
  <ul class="menu-list">
    <li>
      <ul class="tag-list">
        @forelse ($tags as $tag)
          <a href="/post/tag/{{ $tag->id }}/{{ $tag->name}}">
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
