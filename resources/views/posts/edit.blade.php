<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" enctype="multipart/form-data" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('patch')
            <label for="title">Titre :</label><br>
            <input type="text" name="title" id="title"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{$post->title}}">
            <label for="picture">Image :</label><br>
            <input type="file" name="picture" id="picture"><br>
            <label for="content">Article :</label>
            <textarea
                name="content"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('content', $post->content) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
                <a href="{{ route('posts.index') }}">{{ __('Annuler') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>