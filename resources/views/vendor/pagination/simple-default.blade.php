@if ($paginator->hasPages())
    <nav>

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span>« Назад</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">« Назад</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
               <a href="{{ $paginator->nextPageUrl() }}" rel="next">Вперёд »</a>
            @else
                <span>Вперёд »</span>
            @endif

    </nav>
@endif
