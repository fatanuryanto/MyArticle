<?php

namespace App\Http\Controllers;

use File;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::with('category')->paginate(5);
        return view('article.index',compact('articles'));
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
        $this->validate($request, [
			'title' => 'required|max:50',
			'text' => 'required',
            'category' => 'required',
            // 'filename'=>'mimes:img,jpg,jpeg,svg,png'
		]);

        $upload=$request->file('img');
        $filename=time().'.'.$upload->getClientOriginalExtension();
        $upload->move(public_path('uploads'), $filename);
        $tags=$request->tags;
        $tags=explode(" ",$tags);
        Article::create([
    		'title' => $request->title,
    		'text' => $request->text,
            'category_id'=>$request->category,
            'img'=>$filename
    	]);

        foreach($tags as $tag){
            Tag::firstOrCreate(
                ['name'=>$tag,'article_id'=>Article::get()->last()->id]
            );
        }
        return redirect("/") ->with('success','You have successfully upload file.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $article=Article::with('comment','tag')->find($id);
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article=Article::find($id);
        $categories=Category::get();
        return view('article.edit',compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
        $tags=$request->tags;
        $tags=explode(" ",$tags);
        Article::where('id',$id)->update([
    		'title' => $request->title,
    		'text' => $request->text,
            'category_id'=>$request->category
    	]);
        foreach($tags as $tag){
            Tag::firstOrCreate(
                ['name'=>$tag,'article_id'=>Article::get()->last()->id]
            );
        }
        return redirect("/article/show/".$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect("/");
    }
}
