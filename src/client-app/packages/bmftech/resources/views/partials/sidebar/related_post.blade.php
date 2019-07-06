<aside class="menu">
  <p class="menu-label">
    Related Post
  </p>
  <ul class="menu-list">
    <li>
      <ul>
        @forelse ($relatedPost as $post)
          <a href="{{ route('web.posts.show', $post->title) }}">{{ $post->title }}</a>
        @empty
          No Posts.
        @endforelse
      </ul>
    </li>
  </ul>
</aside>
