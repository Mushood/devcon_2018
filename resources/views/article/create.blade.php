@extends('layout.app')

@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('./../img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Create an article</h1>
                    <span class="subheading">Reach your audience</span>
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
            <form name="articleMessage" id="createArticle" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Title" name="title" id="title"
                               required data-validation-required-message="Please enter the title.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Body</label>
                        <textarea class="form-control" placeholder="Body" name="body" id="body"
                                  required data-validation-required-message="Please enter the body."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" id="image"
                               required data-validation-required-message="Please upload an image.">
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