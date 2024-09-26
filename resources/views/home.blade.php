<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>

    @vite(['resources/css/app.css', 'resources/css/tailus.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <input type="checkbox" name="hbr" id="hbr" class="hbr peer" hidden aria-hidden="true">
        <nav
            class="fixed z-20 w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur navbar shadow-md shadow-gray-600/5 peer-checked:navbar-active md:relative md:bg-transparent dark:shadow-none">
            <div class="xl:container m-auto px-6 md:px-12">
                <div class="flex flex-wrap items-center justify-between gap-6 md:py-3 md:gap-0">
                    <div class="w-full flex justify-between lg:w-auto">
                        <!-- <a href="#" aria-label="logo" class="flex space-x-2 items-center">
                            <div aria-hidden="true" class="flex space-x-1">
                                <div class="h-4 w-4 rounded-full bg-gray-900 dark:bg-gray-200"></div>
                                <div class="h-6 w-2 bg-primary dark:bg-primaryLight"></div>
                            </div>
                            <span class="text-base font-bold text-gray-600 dark:text-white">SASS</span>
                        </a> -->
                        <div class="flex gap-3 items-center">
                            <x-application-mark class="block h-10 w-auto" />
                            <span class="text-base font-bold text-gray-600 dark:text-white">KARYAKU</span>
                        </div>
                        <label for="hbr"
                            class="peer-checked:hamburger block relative z-20 p-6 -mr-6 cursor-pointer lg:hidden">
                            <div aria-hidden="true"
                                class="m-auto h-0.5 w-6 rounded bg-gray-900 dark:bg-gray-300 transition duration-300">
                            </div>
                            <div aria-hidden="true"
                                class="m-auto mt-2 h-0.5 w-6 rounded bg-gray-900 dark:bg-gray-300 transition duration-300">
                            </div>
                        </label>
                    </div>
                    <div
                        class="navmenu hidden w-full flex-wrap justify-end items-center mb-16 space-y-8 p-6 border border-gray-100 rounded-3xl shadow-2xl shadow-gray-300/20 bg-white dark:bg-gray-800 lg:space-y-0 lg:p-0 lg:m-0 lg:flex md:flex-nowrap lg:bg-transparent lg:w-7/12 lg:shadow-none dark:shadow-none dark:border-gray-700 lg:border-0">

                        @if (Route::has('login'))
                            <div
                                class="w-full space-y-2 border-primary/10 dark:border-gray-700 flex flex-col -ml-1 sm:flex-row lg:space-y-0 md:w-max lg:border-l">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="relative flex h-9 ml-auto items-center justify-center sm:px-6 before:absolute before:inset-0 before:rounded-full before:bg-primary dark:before:bg-primaryLight before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                                        <span
                                            class="relative text-sm font-semibold text-white dark:text-gray-900">Dashboard</span>
                                    </a>
                                @else
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="relative flex h-9 ml-auto items-center justify-center sm:px-6 before:absolute before:inset-0 before:rounded-full focus:before:bg-primary/10 dark:focus:before:bg-primaryLight/10 before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                                            <span
                                                class="relative text-sm font-semibold text-primary dark:text-primaryLight">Register</span>
                                    @endif
                                    </a>
                                    <a href="{{ route('login') }}"
                                        class="relative flex h-9 ml-auto items-center justify-center sm:px-6 before:absolute before:inset-0 before:rounded-full before:bg-primary dark:before:bg-primaryLight before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95">
                                        <span class="relative text-sm font-semibold text-white dark:text-gray-900">Login</span>
                                    </a>
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="mx-10">
        <div class="py-16">
            <div class="xl:container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                <div class="grid gap-12 md:gap-6 md:grid-cols-2 lg:gap-12">
                    @foreach ($posts as $post)
                        <div class="group space-y-6">
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
                    @endforeach
                </div>
                <div class="py-10">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

    </section>
</body>

</html>