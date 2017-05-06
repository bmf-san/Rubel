@if ($paginator->onFirstPage())
  <a class="pagination-previous is-hidden-mobile" disabled>Previous</a>
@else
  <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous is-hidden-mobile">Previous</a>
@endif
@if ($paginator->hasMorePages())
  <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-next is-hidden-mobile">Next page</a>
@else
  <a class="pagination-next is-hidden-mobile" disabled>Next page</a>
@endif
<ul class="pagination-list">
  @foreach ($elements as $element)
    @if (is_string($element))
        <li class="disabled"><span>{{ $element }}</span></li>
    @endif
    @if (is_array($element))
      @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
          <li><a href="{{ $url }}" class="pagination-link is-current">{{ $page }}</a></li>
        @else
          <li><a href="{{ $url }}" class="pagination-link">{{ $page }}</a></li>
        @endif
      @endforeach
    @endif
  @endforeach
</ul>
