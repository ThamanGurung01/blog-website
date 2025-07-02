<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
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
                    <div class="p-6 text-gray-900 mb-5 flex flex-col items-center">
                        <h1 class="heading">Blogs</h1>
                        @foreach ($blogs as $blog)
                            <div class="flex flex-col gap-4 items-center mt-5 bg-white py-5 mx-96 rounded-md border-2 border-gray-200 p-4" id="post-{{ $blog->id }}">
                                <div class="flex gap-4 justify-center">
                                    <h1>{{ $blog->id }}</h1>
                                </div>
                                <div class="flex gap-4 justify-center">
                                    <span>Created Date:</span>
                                    <h1 class="">{{ $blog->created_at }}</h1>
                                </div>
                                <h1 class="text-xl font-semibold">{{ $blog->title }}</h1>
                                <p class="">{{ $blog->blog }}</p>
                                <form action="{{ route('blog.destroy',$blog) }}" method="POST"
                                class="flex gap-4" id="indexFormDelete-{{ $blog->id }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('blog.edit',$blog) }}" draggable="false" class="editBtn px-6 py-1 select-none">Edit</a>
                                <btn class="deleteBtn px-6 py-1 cursor-pointer select-none" id="indexDelete-{{ $blog->id }}">Delete</btn>
                                </form>
                            </div>
                        @endforeach
                    </div>
                        {{ $blogs->links() }}
                        @elseif ($blogs->count() == 0)
                            <div class="flex flex-col items-center">
                                <h1 class="text-2xl font-semibold mb-5">No Blogs Found</h1>
                                <p class="text-gray-500">Create a new Blog</p>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        @foreach ($blogs as $blog )
            const post{{ $blog->id }} = document.getElementById("post-{{ $blog->id }}");
            const action{{ $blog->id }} = document.getElementById("action-{{ $blog->id }}");
            post{{ $blog->id }}.addEventListener("mouseover", function() {
                action{{ $blog->id }}.style.opacity = 1;
            });
            post{{ $blog->id }}.addEventListener("mouseout", function() {
                action{{ $blog->id }}.style.opacity = 0;
            });
            document.getElementById("indexDelete-{{ $blog->id }}").addEventListener("click", function(event) {
                event.preventDefault();
                if (confirm('Are you sure you want to delete this blog?')) {
                    document.getElementById("indexFormDelete-{{ $blog->id }}").submit();
                }
            });
        @endforeach
    </script>
</x-app-layout>