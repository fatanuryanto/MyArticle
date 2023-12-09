@extends('master')

@Auth
    @section('title')
        Halo, {{Auth::user()->name}}!
    @endsection
    @section('caption','Selamat Datang')
@else
    @section('title','Welcome to your trusted Article')
    @section('caption','Happy Reading')
@endAuth

@section('content')

<div class="bg-gray-200 w-full text-xl md:text-2xl text-gray-800 leading-normal rounded-t px-20">	
    <!--Posts Container-->
    <div class="flex flex-wrap justify-between pt-12 -mx-6">
        @foreach($articles as $article)
        <!--1/3 col -->
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                <a href="/article/show/{{$article->id}}" class="flex flex-wrap no-underline hover:no-underline justify-center">
                    <img src="{{asset('uploads/'.$article->img)}}" class="m-3 shadow-lg max-h-72 rounded-lg">
                    
                </a>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                <div class="w-full font-bold text-xl text-gray-900 px-6">{{$article->title}}</div>
                        <p class="text-gray-800 font-serif text-base px-6 mb-5">
                            {{$article->text}} 
                        </p>
                <div class="flex items-center justify-between">
                    <p class="text-gray-600 text-xs md:text-sm">Kategori:</p>
                    <p class="text-gray-600 text-xs md:text-sm">{{$article->category->name}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--/ Post Content-->         
</div>
{{ $articles->links() }}
<br>

@endsection


