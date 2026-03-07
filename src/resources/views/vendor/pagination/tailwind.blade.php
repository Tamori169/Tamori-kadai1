@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">

    <span class="relative z-0 >

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-2 py-1 text-gray-400 bg-white border border-gray-300 rounded-l-md">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-1 text-gray-600 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </a>
        @endif


        {{-- Page Numbers --}}
        @foreach ($elements as $element)

            @if (is_string($element))
                <span class="relative inline-flex items-center px-3 py-1 border border-gray-300 bg-white text-sm">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())
                        <span class="relative inline-flex items-center px-3 py-1 border border-gray-300 bg-gray-100 text-sm font-semibold">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="relative inline-flex items-center px-3 py-1 border border-gray-300 bg-white text-sm hover:bg-gray-100">
                            {{ $page }}
                        </a>
                    @endif

                @endforeach
            @endif

        @endforeach


        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-1 text-gray-600 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </a>
        @else
            <span class="relative inline-flex items-center px-2 py-1 text-gray-400 bg-white border border-gray-300 rounded-r-md">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </span>
        @endif

    </span>

</nav>
@endif