<aside class="mb-one-and-a-half">
  <div class="container">
    <div class="columns">
      <div class="column">
        <nav class="panel">
          @forelse ($categories as $category)
            <a class="panel-block">
              <span class="panel-icon">
                <i class="fa fa-book"></i>
              </span>
              {{ $category->name }}
            </a>
          @empty
            No Categories.
          @endforelse
        </nav>
      </div>
      <div class="column">
        <div class="card">
          <div class="card-content tag-list">
            @forelse($tags as $tag)
              <a href="#">
                <span class="tag is-primary">
                  {{ $tag->name }}
                </span>
              </a>
            @empty
              No Tags.
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>
