<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Show') }}
        </h2>
    </x-slot>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full md:w-2/3 lg:w-1/2 flex flex-col mx-auto gap-4 bg-white shadow-md rounded-2xl border-2 border-gray-200 p-6" id="post">
                <h1 class="text-2xl font-bold text-gray-900">{{ $blog->title }}</h1>
                <p class="text-gray-700 whitespace-pre-line">{{ $blog->blog }}</p>
                <div class="flex text-sm text-gray-500 justify-between">
                    <span>Created At: {{ $blog->created_at->format('M d, Y') }}</span>
                    <a href="{{ route('blog.show', $blog) }}" class="inline-block bg-blue-600 text-white px-4 py-1 rounded-lg hover:bg-blue-700 transition">view</a>
                </div>
                @auth
                @if (auth()->user()->id===$blog->user_id)
                <form action="{{ route('blog.destroy',$blog) }}" method="POST"
                class="flex gap-4 justify-end opacity-0 transition-opacity duration-200" id="action">
                @csrf
                @method('DELETE')
                <a href="{{ route('blog.edit',$blog) }}" draggable="false" class="editBtn px-6 py-1 select-none">Edit</a>
                <btn class="deleteBtn px-6 py-1 cursor-pointer select-none" id="deleteButton">Delete</btn>
                </form>
                @endif
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
