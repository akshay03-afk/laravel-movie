<div class="relative mt-3 md:mt-0" x-data="{ isOpen : true}" @click.away="isOpen = false">
    <input 
        wire:model.debounce.500ms="search" 
        type="text" 
        class="bg-gray-800 rounded-full px-4 pl-8 w-64 py-1 pb-1 focus:outline-none focus:ring" 
        placeholder="Search (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"    
        @keydown.shift.tab="isOpen = false"
    >
    <div class="absolute top-0">
        <i class="fa fa-search fill-current text-gray-500 mt-2 ml-2"></i>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-4"></div>

    @if (strlen($search) >=2)
        <div 
            class="absolute bg-gray-800 text-sm rounded w-64 mt-4 z-50" 
            x-show.transition.opacity="isOpen"
        >
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a 
                                href="{{ route('movies.show', $result['id']) }}" 
                                class="block hover:bg-gray-700 flex items-center px-3 py-3 transition ease-in-out duration-150"
                                @if ($loop->last) @keydown.tab.exact="isOpen : false" @endif
                            >
                                @if ($result["poster_path"])
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $result['poster_path'] }}" class="w-8" alt="poster">
                                @else
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif 
                                <span class="ml-4">{{ $result["title"] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>