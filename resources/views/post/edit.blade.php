<x-app-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100">
        <div class="w-full max-w-lg rounded-lg bg-white p-6 shadow-md">
            <h1 class="mb-6 text-2xl font-bold">Create New Post</h1>

            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Title -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700" for="title">Title</label>
                    <input
                        class="w-full rounded-lg border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="title" name="title" type="text" value="{{ old('title', $post->title) }}" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Body -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700" for="body">Body</label>
                    <textarea
                        class="w-full rounded-lg border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
                    @error('body')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Thumbnail -->
                <div class="mb-4">
                    <label class="block font-medium text-gray-700" for="thumbnail">Thumbnail</label>

                    @if($post->thumbnail)
                        <!-- Menampilkan gambar thumbnail yang sudah ada -->
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Current Thumbnail"
                                class="w-32 h-32 object-cover">
                        </div>
                    @endif

                    <input
                        class="w-full rounded-lg border border-gray-300 p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="thumbnail" name="thumbnail" type="file">

                    @error('thumbnail')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Publish -->
                <div class="mb-4 flex items-center">
                    <input name="isPublished" type="hidden" value="0">
                    <input class="mr-2 focus:ring-blue-500" id="isPublished" name="isPublished" type="checkbox"
                        value="1" {{ old('isPublished', $post->isPublished) ? 'checked' : '' }}>
                    <label class="text-gray-700" for="isPublished">Publish</label>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button class="rounded-lg bg-blue-500 px-4 py-2 font-semibold text-white hover:bg-blue-600"
                        type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>