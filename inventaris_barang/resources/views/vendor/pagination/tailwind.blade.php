@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex justify-between sm:justify-end sm:space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true">
                    <span class="px-3 py-1 text-gray-400 cursor-default">&laquo; Sebelumnya</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="px-3 py-1 text-purple-500 hover:text-purple-800">
                        &laquo; Sebelumnya
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-1 text-purple-500 hover:text-purple-800">
                        Selanjutnya &raquo;
                    </a>
                </li>
            @else
                <li aria-disabled="true">
                    <span class="px-3 py-1 text-gray-400 cursor-default">Selanjutnya &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif