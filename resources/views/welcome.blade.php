<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Blogs') }}
        </h2>
    </x-slot>
        <div class="w-full">
            <main class="p-6 text-gray-900 mb-5 flex flex-col items-center">
                @foreach ($blogs as $blog)
                            <div class="flex flex-col gap-4 items-center mt-5 bg-white py-10 mx-96 rounded-md border-2 border-gray-200 p-4">
                                <a href="{{ route('blog.show', $blog) }}" class="btn px-4 py-1">view</a>
                                <div class="flex gap-4 justify-center">
                                    <h1>{{ $blog->id }}</h1>
                                </div>
                                <div class="flex gap-4 justify-center">
                                    <span>Created Date:</span>
                                    <h1 class="">{{ $blog->created_at }}</h1>
                                </div>
                                <h1 class="text-xl font-semibold">{{ $blog->title }}</h1>
                                <p class="">{{ $blog->blog }}</p>
                                <p class="text-sm">created by: {{ $blog->user->name }}</p>
                            </div>
                @endforeach
                <div class="w-1/2 mt-5">
                {{ $blogs->links() }}
                </div>
            </main>
        </div>
</x-app-layout>