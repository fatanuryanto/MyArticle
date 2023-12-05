
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>MyArticle</title>
        <meta name="author" content="Muhammad Fata Nuryanto">
        <meta name="keywords" content="Articke">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-200 font-sans leading-normal tracking-normal">
        @include('layouts.header')

        
        <div class="w-full m-0 p-0 bg-cover bg-bottom" style="background-image:url({{asset('uploads/banner.jpg')}}); height: 60vh; max-height:460px;">
            <div class="container max-w-4xl mx-auto pt-20 text-center break-normal">
                <!--Title-->
                <h1 class="text-white font-extrabold text-3xl md:text-5xl">
                    @yield('title')
                </h1>
                <p class="text-xl md:text-2xl text-gray-500">@yield('caption')</p>

                @auth
                <br>
                <a class="px-auto" href="/article/create"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Article</button></a>
                @endauth

            </div>
        </div>
        
        @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> {{ $error }}
        </div>
        @endforeach
        @endif
        @yield('content')

        @include('layouts.footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    </body>
</html>
