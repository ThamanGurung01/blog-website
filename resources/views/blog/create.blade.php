<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <h1 class="heading">Create New Blog</h1>
                        <form action="{{ route('blog.store') }}" method="POST" class="flex flex-col w-1/3 gap-7 mx-auto">
                            @csrf
                            <div class="flex flex-col gap-2">
                                <label for="title">Title:</label>
                                <input type="text" placeholder="Title" name='title' class="w-full max-w-md border border-gray-300 rounded-lg">
                                 @error('title')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="blog">Blog:</label>
                                <textarea name="blog" id="blog" placeholder="Blog" class="w-full max-w-md h-32 p-3 border border-gray-300 rounded-lg resize-none"></textarea>
                                @error('blog')
                                <span class="text-red-600 text-sm">{{$message}}</span>
                                @enderror
                            </div>
                               <div class="mx-auto">
                                 <button type="submit" class="btn px-12 py-2 text-lg">Create</button>
                               </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>