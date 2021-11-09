@if ($paginator->hasPages())
    <div class="pagination__option">    
        {{-- Previous Page Link --}}
        @if (!($paginator->onFirstPage()))
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> <i class="fa fa-angle-left"></i> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a style="background: black; color: white" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i class="fa fa-angle-right"></i> </a>
        @endif
    </div>
@endif
