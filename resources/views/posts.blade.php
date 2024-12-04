<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- search input --}}
    <x-search />

    {{-- pagination --}}
    {{ $posts->links() }}

    <div class="py-1 px-1 mx-auto max-w-screen-xl lg:py-2 lg:px-0">
        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">

            {{-- lopping data / mapping data dengan @foreach --}}
            @forelse ($posts as $post)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/posts?category={{ $post->category->slug }}">
                            <span
                                class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                        clip-rule="evenodd"></path>
                                    <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                                </svg>
                                {{ $post->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                            class="hover:underline" href="/posts/{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($post['body'], 100) }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <a href="/posts?author={{ $post->author->username }}">
                                <span class="font-medium text-sm dark:text-white">
                                    {{ $post->author->name }}
                                </span>
                            </a>
                        </div>
                        <a href="/posts/{{ $post['slug'] }}"
                            class="inline-flex items-center font-medium text-sm text-primary-600 dark:text-primary-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div>
                    <p class="font-semibold text-xl my-4">Article not found!</p>
                    <a href="/posts" class="block text-blue-500 hover:underline">&laquo; Back to post</a>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>

{{-- <article class="py-8 px-5 max-w-screen-md border-b border-gray-300 shadow-2xl">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>

        </a>

        <div> By
            <a href="/authors/{{ $post->author->username }}"
                class="hover:underline text-gray-500">{{ $post->author->name }}</a> in
            <a href="/categories/{{ $post->category->slug }}"
                class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a>
            | {{ $post->created_at->format('j F Y') }}
        </div>

        <p class="my-4 font-light">{{ Str::limit($post['body'], 100) }}</p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
    </article> --}}
