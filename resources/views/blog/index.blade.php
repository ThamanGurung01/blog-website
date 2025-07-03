<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 text-center">
            {{ __('My Blogs') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-5">
                    <div class="flex flex-row-reverse">
                        <a href="{{ route('blog.create') }}" class="btn px-4 py-2">Create New Blog</a>
                    </div>
                    @if ($blogs->count() > 0)
                    <div class="px-4 md:px-8 text-gray-900 mb-5 flex flex-col items-center gap-8">
                        <h1 class="heading">Blogs</h1>
                        @foreach ($blogs as $blog)
                            <div class="w-full md:w-2/3 lg:w-1/2 flex flex-col gap-4 bg-white shadow-md rounded-2xl border-2 border-gray-200 p-4" id="post-{{ $blog->id }}">
                                <h1 class="text-2xl font-bold text-gray-900">{{ $blog->title }}</h1>
                                <p class="text-gray-700 whitespace-pre-line">{{ $blog->blog }}</p>
                                <div class="flex text-sm text-gray-500 justify-between">
                                    <span>Created At: {{ $blog->created_at->format('M d, Y') }}</span>
                                    <a href="{{ route('blog.show', $blog) }}" class="inline-block bg-blue-600 text-white px-4 py-1 rounded-lg hover:bg-blue-700 transition">view</a>
                                </div>
                                <form action="{{ route('blog.destroy',$blog) }}" method="POST"
                                class="flex gap-4 justify-end opacity-0 transition-opacity duration-200" id="action-{{ $blog->id }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('blog.edit',$blog) }}" draggable="false" class="editBtn px-6 py-1 select-none  justify-end">Edit</a>
                                <button type="button" class="deleteBtn px-6 py-1 cursor-pointer select-none" id="indexDelete-{{ $blog->id }}">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                        @elseif ($blogs->count() == 0)
                            <div class="w-full md:w-2/3 lg:w-1/2 flex flex-col items-center mx-auto gap-4 bg-white py-5 shadow-md rounded-2xl border-2 border-gray-200 p-4">
                                <h1 class="text-2xl font-semibold mb-5">No Blogs Found</h1>
                                <p class="text-gray-500">Create a new Blog</p>
                            </div>
                    @endif
                        {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        @foreach ($blogs as $blog )
            const post{{ $blog->id }} = document.getElementById("post-{{ $blog->id }}");
            const action{{ $blog->id }} = document.getElementById("action-{{ $blog->id }}");
            const deleteBtn{{ $blog->id }} = document.getElementById("indexDelete-{{ $blog->id }}");
            post{{ $blog->id }}.addEventListener("mouseover", function() {
                action{{ $blog->id }}.style.opacity = 1;
            });
            post{{ $blog->id }}.addEventListener("mouseout", function() {
                action{{ $blog->id }}.style.opacity = 0;
            });
            deleteBtn{{ $blog->id }}.addEventListener("click", function() {
                if (confirm('Are you sure you want to delete this blog?')) {
                    document.getElementById("action-{{ $blog->id }}").submit();
                }
            });
        @endforeach
    </script>
</x-app-layout>