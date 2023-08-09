<x-app-layout>

    <x-slot name="header">
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
        Nouvel article
      </h1>
    </x-slot>
  
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" enctype="multipart/form-data"
          action="{{ route('posts.store') }}" class="pb-4">
          @csrf
          <label for="title">Titre :</label><br>
          <input type="text" name="title" id="title"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
          <label for="content">Article :</label>
          <textarea name="content" id="content" rows=10
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
          <label for="picture">Image :</label><br />
          <input type="file" name="picture" id="picture">
  
          <x-input-error :messages="$errors->all()" class="mt-2" /><br />
          <x-primary-button class="mt-4">{{ __('Publier') }}
          </x-primary-button>
        </form>
        <a href="{{ url()->previous() }}">Retour</a>
      </div>
    </div>
  
  </x-app-layout>