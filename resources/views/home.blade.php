@extends('layout.app')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Your profile</h1>
                        <span class="subheading">This is your profile.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-8">
                            <h1>Your Articles</h1>

                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('article.create') }}" class="btn btn-primary btn-block">
                                Create Article
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        No articles yet
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
