<x-app-layout>
  <div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-md">
      <h1 class="text-2xl font-bold mb-6">Create New Post</h1>

      <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Title -->
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label>
          <input type="text" name="title" id="title" value="{{ old('title') }}"
            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
          @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
        </div>

        <!-- Body -->
        <div class="mb-4">
          <label for="body" class="block text-gray-700 font-medium">Body</label>
          <textarea name="body" id="body" rows="5"
            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>{{ old('body') }}</textarea>
          @error('body')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
        </div>

        <!-- Thumbnail -->
        <div class="mb-4">
          <label for="thumbnail" class="block text-gray-700 font-medium">Thumbnail</label>
          <input type="file" name="thumbnail" id="thumbnail"
            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          @error('thumbnail')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
        </div>

        <!-- Publish -->
        <div class="mb-4 flex items-center">
          <input type="hidden" name="isPublished" value="0">
          <input type="checkbox" name="isPublished" id="isPublished" value="1" class="mr-2 focus:ring-blue-500" {{ old('isPublished') ? 'checked' : '' }}>
          <label for="isPublished" class="text-gray-700">Publish</label>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button type="submit"
            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">Submit</button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>