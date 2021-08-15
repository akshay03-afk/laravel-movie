<div class="mt-8">
    <a href="{{ route('movies.show', $movies['id']) }}">
        <img src="{{ $movies['poster_path'] }}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{ route('movies.show', $movies['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $movies["title"] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <span><i class="fas fa-star text-yellow-500"></i></span>
            <span class="ml-1">{{ $movies["vote_average"] }}</span>
            <span class="mx-2">|</span>
            <span>{{ $movies["release_date"]}}</span>
        </div>
        <div class="text-gary-400 text-sm mt-1">
            {{ $movies["genres"]}}
        </div> 
    </div>
</div>