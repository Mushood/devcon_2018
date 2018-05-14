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
                @include('article.preview')
            @endforeach
        </div>
    </div>
</div>

<hr>

@endsection