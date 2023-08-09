<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
          Les articles
        </h1>
      </x-slot>
    
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y flex flex-row">
            @foreach ($posts as $post)
                <div class="p-6 flex space-x-2 m-10"> 
                    
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                
                                <span class="text-gray-800">{{ $post->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                                @unless ($post->created_at->eq($post->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                                <h2>{{ $post->title }}</h2>
                                <img src="{{ asset('storage/'. $post->picture) }}" alt="image">
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
                            <a href="{{route('posts.show', $post)}}" target="_blank">En savoir plus</a>
                            
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $post->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea
                name="comment"
                placeholder="{{ __('Commentaires') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('comment') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Publier') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>