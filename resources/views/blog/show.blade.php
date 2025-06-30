<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Show') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 items-center mt-5 bg-white py-10 mx-96 rounded-md" id="blogShow">
                
                <div class="flex gap-4 justify-center">
                    <h1>{{ $blog->id }}</h1>
                </div>
                <div class="flex gap-4 justify-center">
                    <span>Created Date:</span>
                    <h1 class="">{{ $blog->created_at }}</h1>
                </div>
                <h1 class="text-xl font-semibold">{{ $blog->title }}</h1>
                <p class="">{{ $blog->blog }}</p>
                    <div class="flex gap-4">
                        <a href="{{ route('blog.edit',$blog) }}" class="editBtn px-6 py-1">Edit</a>
                        <a href="{{ route('blog.destroy',$blog->id) }}" class="deleteBtn px-6 py-1">Delete</a>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
