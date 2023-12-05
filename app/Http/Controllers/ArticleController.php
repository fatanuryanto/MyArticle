<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::with('category')->paginate(10);
        return view('welcome',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::get();
        return view('article.insert',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tags=$request->tags;
        $tags=explode(" ",$tags);
        Article::create([
    		'title' => $request->title,
    		'text' => $request->text,
            'category_id'=>$request->category
    	]);
        foreach($tags as $tag){
            Tag::firstOrCreate(
                ['name'=>$tag,'article_id'=>Article::get()->last()->id]
            );
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article=Article::find($id);
        $tags=Tag::where('article_id',$id)->get();
        return view('article.show',compact('article','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tag=Tag::destroy($id);
        return redirect()->back();
    }
}
