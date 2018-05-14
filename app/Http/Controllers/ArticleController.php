<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->with('user')->get();

        return view('article.index', compact('articles'));
    }

    public function create()
    {

        return view('article.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
            'image' => 'required',
        ]);

        //store file
        $image = $request->file('image');
        $filename =  $image->getClientOriginalName();
        Storage::disk('public')->putFileAs('articles', $image, $filename);
        $validatedData['image_name'] = $filename;

        //set article to user who created it
        $validatedData['user_id'] = Auth::user()->id;

        Article::create($validatedData);

        $request->session()->flash('status', 'Article was created!');

        return redirect()->route('home');
    }

    public function show(Article $article)
    {

        return view('article.show', compact('article'));
    }
}
