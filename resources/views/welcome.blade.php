<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Blogs') }}
        </h2>
    </x-slot>
        <div class="flex justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="p-6 text-gray-900 mb-5 flex flex-col items-center">
                 @foreach ($blogs as $blog)
                            <div class="flex flex-col gap-4 items-center mt-5 bg-white py-10 mx-96 rounded-md border-2 border-gray-200 p-4">
                                <div class="flex gap-4 justify-center">
                                    <h1>{{ $blog->id }}</h1>
                                </div>
                                <div class="flex gap-4 justify-center">
                                    <span>Created Date:</span>
                                    <h1 class="">{{ $blog->created_at }}</h1>
                                </div>
                                <h1 class="text-xl font-semibold">{{ $blog->title }}</h1>
                                <p class="">{{ $blog->blog }}</p>
                                <form action="{{ route('blog.edit', $blog) }}" method="DELETE" class="flex gap-4">
                                    @csrf
                                    <button type="submit" class="editBtn px-6 py-1">Edit</button>
                                    <button type='submit' class="deleteBtn px-6 py-1">Delete</button>
                                </form>
                            </div>
                        @endforeach
            </main>
        </div>
</x-app-layout>