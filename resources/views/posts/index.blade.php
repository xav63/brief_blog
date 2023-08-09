<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
          Les articles
        </h1>
      </x-slot>
    <section class="text-gray-600 body-font bg-gradient-to-r from-indigo-50">
        <div class="container px-5 py-24 mx-auto">
            <div class="-m-4">
                <div class="p-4">

        <div class="h-full rounded-xl shadow-cla-blue bg-gradient-to-r from-indigo-50 to-blue-50 overflow-hidden">
            @foreach ($posts as $post)
                <div class="p-6 space-x-2 m-10"> 
                    
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                
                                <span class="text-gray-800">{{ $post->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($post->created_at->eq($post->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                                <h2 class="title-font text-lg font-medium text-gray-600 mb-3" >{{ $post->title }}</h2>
                                <img src="{{ asset('storage/'. $post->picture) }}" alt="image" class="lg:h-48 md:h-36">
                            </div>
                            @if ($post->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        
                                        <x-dropdown-link :href="route('posts.edit', $post)">
                                            {{ __('Modifier') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('posts.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Supprimer') }}
                                            </x-dropdown-link>
                                            
                                        </form>
                                        
                                    </x-slot>
                                </x-dropdown>
                            @endif
                            
                        </div>
                        <p class="leading-relaxed mb-3">{{ $post->content }}</p>
                        <div class="flex items-center flex-wrap ">
                            <a href="{{route('posts.show', $post)}}" target="_blank" class="bg-gradient-to-r from-cyan-400 to-blue-400 hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">En savoir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
              </div>
            </div>
        </div>
    </div>
</section>
</x-app-layout>