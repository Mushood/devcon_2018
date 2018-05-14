@extends('layout.app')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('storage/articles/' . $article->image_name) }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $article->title }}</h1>
                        <h2 class="subheading"></h2>
                        <span class="meta">Posted by
                {{ $article->user->name }}
                on {{ $article->created_at }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>
                        {{ $article->body }}
                    </p>
                </div>
            </div>
        </div>
    </article>

    <hr>
@endsection