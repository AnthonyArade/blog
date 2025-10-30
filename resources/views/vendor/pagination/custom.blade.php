@if ($paginator->hasPages())
    <div class="mt-6 flex justify-between items-center">
        {{-- Results Info --}}
        <div class="text-sm text-gray-700">
            Affiche l'article
            <span class="font-medium">{{ $paginator->firstItem() ?? 0 }}</span> 
            à
            <span class="font-medium">{{ $paginator->lastItem() ?? 0 }}</span> 
            des 
            <span class="font-medium">{{ $paginator->total() }}</span> 
            Articles
        </div>

        {{-- Pagination Links --}}
        <div class="flex space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-400 cursor-not-allowed transition">
                    Précedent
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" 
                   class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">
                    Précedent
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-400 cursor-not-allowed">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1 rounded border border-blue-500 bg-blue-500 text-white">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" 
                               class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" 
                   class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition">
                    Suivant
                </a>
            @else
                <span class="px-3 py-1 rounded border border-gray-300 bg-white text-gray-400 cursor-not-allowed transition">
                    Suivant
                </span>
            @endif
        </div>
    </div>
@endif