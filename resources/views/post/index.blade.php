<x-app-layout>
    <section class="mx-10">
        <div class="py-16">
            <div class="xl:container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                <div class="flex justify-between pb-5">
                    <div>
                        <h2 class="text-2xl">Post</h2>
                    </div>
                    <div>
                        <a href="{{ route('post.create') }}" class="rounded py-1.5 px-3 bg-indigo-600 text-white">Create Post</a>
                    </div>
                </div>
                <div class="grid gap-12 md:gap-6 md:grid-cols-2 lg:gap-12">
                    @foreach ($posts as $post)
                        <div>
                            <a href="{{route('post.show', $post->id)}}"><div class="group space-y-6">
                                <img src="{{ $post->thumbnail }}" alt="art cover" loading="lazy" width="1000" height="667"
                                    class="h-80 w-full rounded-3xl object-cover object-top transition-all duration-500 group-hover:rounded-xl" />
                                <h3 class="text-3xl font-semibold text-gray-800 dark:text-white">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{ $post->body }}
                                </p>
                                <div class="flex gap-6 items-center">
                                    <a href="#"
                                        class="-ml-1 p-1 rounded-full flex items-center gap-3 hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <img class="w-8 h-8 object-cover rounded-full" src="images/man.jpg" alt="">
                                        <span
                                            class="hidden sm:block font-semibold text-base text-gray-600 dark:text-gray-200">{{ $post->user->name }}</span>
                                    </a>
                                    <span class="w-max block font-light text-gray-500 sm:mt-0">Aug 27 2022</span>
                                    <div class="flex gap-2 items-center text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-5 h-5 text-gray-400 dark:text-gray-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>2 min read</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                    @endforeach
                </div>
                <div class="py-10">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

    </section>
</x-app-layout>