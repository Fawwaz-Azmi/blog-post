<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl">Post</h2>
            </div>
            <div>
                <a href="{{ route('post.edit', $post->id) }}" class="rounded py-1.5 px-3 bg-indigo-600 text-white">Edit
                    Post</a>
                <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                @csrf    
                @method('DELETE')
                    <button class="rounded py-1.5 px-3 bg-indigo-600 text-white">Delete Post</button>
                </form>
            </div>
        </div>
    </x-slot>
    <div class="bg-gray-100">
        <div class="container mx-auto my-10">
            <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6">
                    <!-- Thumbnail -->
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                            class="w-full h-64 object-cover mb-6">
                    @else
                        <img src="{{ asset('images/default-thumbnail.png') }}" alt="Default Thumbnail"
                            class="w-full h-64 object-cover mb-6">
                    @endif

                    <!-- Title -->
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

                    <!-- Body -->
                    <p class="text-gray-700 text-base leading-relaxed mb-6">{{ $post->body }}</p>

                    <!-- Published Status -->
                    <p class="text-sm text-gray-600">
                        <strong>Status:</strong>
                        <span
                            class="px-2 py-1 rounded-full {{ $post->isPublished ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                            {{ $post->publish_status }}
                        </span>
                    </p>

                    <!-- Post Author -->
                    <p class="mt-4 text-gray-500">
                        <strong>Author:</strong> {{ $post->user->name }}
                    </p>

                    <!-- Created and Updated Time -->
                    <div class="mt-4">
                        <p class="text-gray-400 text-sm">Created on: {{ $post->created_at->format('M d, Y') }}</p>
                        <p class="text-gray-400 text-sm">Last updated: {{ $post->updated_at->format('M d, Y') }}</p>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-6">
                        <a href="{{ route('post.index') }}"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">
                            Back to Posts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>