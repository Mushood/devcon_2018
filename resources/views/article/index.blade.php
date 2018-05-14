@extends('layout.app')

@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('./../img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Articles</h1>
                    <span class="subheading">Read our articles</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($articles as $article)
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{ $article->title }}
                        </h2>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        on {{ $article->created_at }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<hr>

@endsection