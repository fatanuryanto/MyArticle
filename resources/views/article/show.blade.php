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

                @foreach($tags as $tag)
                    <i>#{{$tag->name}}</i> 
                @endforeach
            </div>

            <!-- Comment Section -->
            <section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
                <div class="max-w-2xl mx-auto px-4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Komentar</h2>
                    </div>
                    <form class="mb-6">
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nama Anda" required>
                        <textarea id="message" rows="4" class="my-1 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Apa yang anda pikirkan?"></textarea>
                        <button type="submit"
                           class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Kirim Komentar
                        </button>
                    </form>
                    <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">Nama pengomentar</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time>Feb. 8, 2022</time></p>
                            </div>
                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                @auth
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                </svg>
                                @endauth
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownComment1"
                                class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </footer>
                        <p class="text-gray-500 dark:text-gray-400">Isi Komen</p>
                    </article>
                    
                </div>
            </section>
        </div>
    </div>
    <br>
    @endsection


