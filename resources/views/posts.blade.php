<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">My Blog Post</h3>

    {{-- lopping data / mapping data dengan @foreach --}}
    @foreach ($posts as $post)
        <article class="py-8 px-5 max-w-screen-md border-b border-gray-300 shadow-2xl">
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>

            </a>
            <div class="text-base text-gray-500">
                <a href="#">{{ $post['author'] }}</a> | 30 Agustus 2023
            </div>

            <p class="my-4 font-light">{{ Str::limit($post['body'], 100) }}</p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
        </article>
    @endforeach



</x-layout>
