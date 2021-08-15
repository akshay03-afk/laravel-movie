@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $actor['profile_path'] }}" alt="actor" class="w-76 md:w-64 mb-2">
                <ul class="flex items-center mt-4">
                    @if($social["facebook"])
                        <li class="mr-4">
                            <a href="{{ $social['facebook'] }}" title="Facebook">
                                <i class="fab fa-facebook text-2xl"></i>
                            </a>
                        </li>
                    @endif
                    @if($social["instagram"])
                        <li class="mx-4">
                            <a href="{{ $social['instagram'] }}" title="Instagram">
                                <i class="fab fa-instagram text-2xl"></i>
                            </a>
                        </li>
                    @endif
                    @if($social["twitter"])
                        <li class="mx-4">
                            <a href="{{ $social['twitter'] }}" title="Twitter">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                        </li>
                    @endif
                    @if($actor["homepage"])
                        <li class="mx-4">
                            <a href="{{ $actor['homepage'] }}" title="Homepage">
                                <i class="fas fa-globe-europe text-2xl"></i>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $actor["name"] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <span><i class="fas fa-birthday-cake"></i></span>|
                    <span class="ml-2">{{ $actor["birthday"] }} ({{ $actor["age"] }} years old) in {{ $actor["place_of_birth"] }}</span>
                </div>
                    <p class="text-gray-300 mt-8">
                        {{ $actor["biography"] }}
                    </p>

                    <h4 class="font-semibold mt-12">Known For</h4>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                        @foreach( $knownForMovies as $movie) 
                            <div class="mt-4">
                                <a href="{{ $movie['linkToPage'] }}"><img src="{{ $movie['poster_path'] }}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150"></a>
                                <a href="{{ $movie['linkToPage'] }}" class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">
                                    {{ $movie["title"] }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </p>
            </div>
        </div>
    </div>

    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Credits</h2>
            <ul class="leading-loose pl-5 mt-8 border-t border-l border-r py-5 px-5">
                @foreach ($credits as $credit)
                    <li class="border-b py-5 pl-10">{{ $credit["release_year"] }} &middot; <strong>{{ $credit["title"] }}</strong> as {{ $credit["character"] }}</li>
                @endforeach
            </ul>

        </div>
    </div>

@endsection