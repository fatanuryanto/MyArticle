@extends('master')

    @section('title',$article->title)
    @section('caption','Selamat Membaca')

@section('content')
<!--image-->
<div class="container w-full max-w-6xl mx-auto bg-white bg-cover mt-8 rounded" style="background-image:url('https://source.unsplash.com/collection/1118905/'); height: 75vh;"></div>
	<!--Container-->
	<div class="container max-w-5xl mx-auto -mt-32">
		<div class="mx-0 sm:mx-6">
			<div class="bg-white w-full p-8 md:p-24 text-xl md:text-2xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
				<!--Post Content-->
                <!--Lead Para-->
                <div class="text-center">
                    <p class="text-4xl md:text-3xl mb-5">
                        {{$article->title}}
                    </p>
                    <center><img style="height:100px;" class="my-3 ph-auto max-w-full rounded-lg" src={{asset('uploads/'.$article->img)}} alt="image description"></center>
                </div>

               

				<p class="py-6">{{$article->text}}</p>	
                
                @foreach($tags as $tag)
                    <i>#{{$tag->name}}</i> 
                @endforeach
			</div>
            @Auth
            <br>
            <a href="/article/edit/{{$article->id}}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ubah</button></a>
            <a href="/article/delete/{{$article->id}}"><button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button></a>
            @endauth
        
        </div>
	</div>
</div>
<br>
@endsection


