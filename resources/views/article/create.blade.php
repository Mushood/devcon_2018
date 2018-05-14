@extends('layout.app')

@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('./../img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    @isset($article)
                        <h1>Edit article</h1>
                        <span class="subheading">Edit your story</span>
                    @else
                        <h1>Create an article</h1>
                        <span class="subheading">Reach your audience</span>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>Tell us your story!</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form name="articleMessage" id="createArticle"
                  method="POST"
                    @isset($article)
                        action="{{ route('article.update', ['article' => $article->id]) }}"
                    @else
                        action="{{ route('article.store') }}"
                    @endisset

                  enctype="multipart/form-data"
                  novalidate>
                {{ csrf_field() }}
                @isset($article)
                    {{ method_field('PUT') }}
                @endisset
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title" name="title" id="title"
                               required data-validation-required-message="Please enter the title."
                        @isset($article)
                            value="{{ $article->title }}"
                        @endisset
                        >
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Body</label>
                        <textarea class="form-control" placeholder="Body" name="body" id="body"
                                  required data-validation-required-message="Please enter the body."
                        >@isset($article){{ $article->body }}@endisset</textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" id="image"
                               required data-validation-required-message="Please upload an image.">
                        @isset($article)
                            <hr />
                            <img src="{{ asset('storage/articles/' . $article->image_name) }}" class="img-fluid col-md-4 " />
                        @endisset
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>

@endsection