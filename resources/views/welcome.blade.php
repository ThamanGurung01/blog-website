<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 text-center">
            {{ __('Blogs') }}
        </h2>
    </x-slot>
        <div class="w-full bg-gray-100 min-h-screen py-10">
            <main class="w-full px-4 md:px-8 flex flex-col items-center gap-8">
                @foreach ($blogs as $blog)
                            <div class=" w-1/3 flex flex-col gap-4 p-6 bg-white shadow-md border border-gray-200 rounded-2xl">
                                    <h1 class="text-2xl font-bold text-gray-900">{{ $blog->title }}</h1>
                                <p class="text-gray-700 whitespace-pre-line">{{ $blog->blog }}</p>
                                <div class="flex items-center justify-between text-sm text-gray-500">
                                    <span>Created by:{{$blog->user->name}}</span>
                                    <span class="">{{ $blog->created_at->format('M d,Y') }}</span>
                                </div>
                            @auth
                                    <div class="flex justify-end">
                                <a href="{{ route('blog.show', $blog) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">view</a>
                                </div>
                            @endauth
                            </div>
                @endforeach
                <div class="w-full md:w-2/3 lg:w-1/2 mt-6">
                {{ $blogs->links() }}
                </div>
            </main>
        </div>
</x-app-layout>