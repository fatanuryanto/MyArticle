@extends('master')
    @section('caption','Selamat Membaca')

    @section('content')
        <!--Container-->
    <div class="container max-w-5xl mx-auto -mt-32">
        <div class="mx-0 sm:mx-6">
            <div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal border-b-8 border-sky-500" style="font-family:Georgia,serif;">
                <!--Post Content-->
                <div class="text-center">
                    <p class="text-4xl md:text-3xl mb-5">
                        {{$article->title}}
                    </p>
                    <img  class="my-3 ph-auto rounded-lg max-h-56 w-fit  mx-auto" src={{asset('uploads/'.$article->img)}} alt="image description">
                </div>

                <p class="py-6">{{$article->text}}</p>	

                @foreach($article->tag as $tag)
                    <i class="text-base">#{{$tag->name}}</i> 
                @endforeach

                @auth
                <div class="flex justify-center">
                    <a href="/article/edit/{{$article->id}}" class="mx-1 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Ubah</a>
                    <a href="/article/delete/{{$article->id}}" class="mx-1 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Hapus</a>
                </div>
                @endauth
            </div>
            <!-- Comment Section -->
            <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
                <div class="max-w-2xl mx-auto px-4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Komentar</h2>
                    </div>
                    <form class="mb-6" action="/comment/store" action="post">
                        <input type="hidden" name="article_id" value={{$article->id}}>
                        <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Anda" required>
                        <textarea name="comment" rows="4" class="my-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apa yang anda pikirkan?" required></textarea>
                        <button type="submit"
                           class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Kirim Komentar
                        </button>
                    </form>

                    @foreach($article->comment as $comment)
                    <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">{{$comment->name}}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time>{{$comment->created_at}}</time></p>
                            </div>

                            @auth
                            <a href="/comment/delete/{{$comment->id}}" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                            @endauth
                            
                        </footer>
                        <p class="text-gray-500 dark:text-gray-400">{{$comment->comment}}</p>
                    </article>
                    @endforeach
                    <a href="/" type="button" class="mx-1 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</a>
                </div>
            </section>
        </div>
    </div>
    <br>
    @endsection


