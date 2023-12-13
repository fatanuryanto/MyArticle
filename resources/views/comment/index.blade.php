@extends('master')

    @section('title')
        Halo, {{Auth::user()->name}}!
    @endsection
    @section('caption','Daftar Comment')

@section('content')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nomor
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Komentar
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1?>
            @foreach($comments as $comment)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$no}}
                </th>
                <td class="px-6 py-4">
                    {{$comment->name}}
                </td>
                <td class="px-6 py-4">
                    {{$comment->comment}}
                </td>
                <td class="px-6 py-4">
                    {{$comment->article->title}}
                </td>
                <td class="px-6 py-4">
                    <a href="/comment/delete/{{$comment->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                </td>
            </tr>
            <?php $no=$no+1 ?>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-center">
    <a href="/" class="mx-1 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Kembali</a>
    </div>
@endsection