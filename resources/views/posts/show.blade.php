<x-app-layout>

    <x-slot name="header">
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        L'article
      </h1>
    </x-slot>
  
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
<div>
      <form method="POST" action="{{ route('comment.store') }}">
        @csrf
        <textarea
            name="message"
            placeholder="{{ __('Commentaires') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        >{{ old('message') }}</textarea>
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Publier') }}</x-primary-button>
    </form>
</div>
  </x-app-layout>