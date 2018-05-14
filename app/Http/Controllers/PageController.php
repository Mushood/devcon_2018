<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function welcome()
    {
        $articles = Article::latest()->with('user')->limit(3)->get();

        return view('welcome', compact('articles'));
    }

    public function about()
    {

        return view('about');
    }

    public function contact()
    {

        return view('contact');
    }

    public function post()
    {

        return view('post');
    }

}
