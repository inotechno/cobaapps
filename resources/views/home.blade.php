<x-app-layout>
    @section('hero')
        <div class="w-full text-center py-32">
            <img style="display: block; margin-left: auto;
            margin-right: auto;
            width: 20%;" src="http://127.0.0.1:8000/storage/posts/thumbnails/esbplaybook.png">
            <p class="text-gray-500 text-lg mt-1">Dapatkan informasi lengkap mengenai ESB di BRI</p>
            <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
                href="http://127.0.0.1:8000/blog">Lihat dokumentasi</a>

        </div>
    @endsection

    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Featured Posts</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredPosts as $post)
                        <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
                href="http://127.0.0.1:8000/blog">More
                Posts</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Latest Posts</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestPosts as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="http://127.0.0.1:8000/blog">More
            Posts</a>
    </div>
</x-app-layout>
