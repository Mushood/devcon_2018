<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function articleCreated()
    {
        $article = Article::find(1);
        $user = User::find(1);

        return new \App\Mail\ArticleCreated($article, $user);
    }
}
