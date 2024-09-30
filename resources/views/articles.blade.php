<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <section class="mx-10">
            <div class="py-16">
                <div class="bg-gray-100">
                    <div class="container mx-auto my-10">
                        @if($post->isPublished == 1)
                        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
                            <div class="m-5">
                                <div class="p-6"></div>
                                <!-- Thumbnail -->
                                @if($post->thumbnail)
                                <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}"
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
                                    <p class="text-gray-400 text-sm">Created on: {{ $post->created_at->format('M d, Y')
                                        }}
                                    </p>
                                    <p class="text-gray-400 text-sm">Last updated: {{ $post->updated_at->format('M d,
                                        Y') }}
                                    </p>
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
                        @else
                        <div>Not Found</div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>