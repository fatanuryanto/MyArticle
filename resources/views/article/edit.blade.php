@extends('master')

    @section('title')
        Halo, {{Auth::user()->name}}!
    @endsection
    @section('caption','Ubah Artikel')

@section('content')

<div class="w-full max-w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form class="space-y-6" action="/article/update/{{$article->id}}" method="post">
    {{ csrf_field() }}
        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
            <input type="text" name="title"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Judul Artikel" value= {{$article->title}} required>
        </div>
        <div>
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi</label>
            <textarea name="text" placeholder="Isi Artikel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>{{$article->text}}</textarea>
        </div>
        <div> 
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
            <select name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected values=""></option>
                @foreach($categories as $category)
                <option value={{$category->id}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tag</label>
            <input type="text" name="tags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Tag Artikel">
        </div>
    
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
    </form>
</div>
<br>
@endsection


