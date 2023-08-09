<x-app-layout>

    <x-slot name="header">
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        L'article
      </h1>
    </x-slot>
  <section class="text-gray-600 body-font bg-gradient-to-r from-indigo-50 flex">  
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      
      <h2 class="font-bold">
        {{ $post->title }}
      </h2>
      <div>
        <img
          src="{{ $post->picture ? asset('storage/' . $post->picture) : asset('/images/placeholder-1200X900.png') }}"
          class="max-w-3xl" alt="">
      </div>
      <p class="pb-3">
        Par {{ $post->user->name }} le
        {{ $post->created_at->format('j M Y, g:i a') }}
      </p>
      <p class="pb-2">
        {{ $post->content }}
      </p>
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
    </section>
<div>
      <form method="POST" action="{{ route('comment.store', ['post' => $post]) }}">
        @csrf
        <textarea
            name="message"
            placeholder="{{ __('Commentaires') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        >{{ old('message') }}</textarea>
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="bg-gradient-to-r from-cyan-400 to-blue-400 hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">{{ __('Publier') }}</x-primary-button>
    </form>
    @foreach($post->comments as $comment)
    <div>
      <p>{{$comment->user->name}}</p>
      <p>{{$comment->message}}</p>
    </div>
    @endforeach
</div>
  </x-app-layout>