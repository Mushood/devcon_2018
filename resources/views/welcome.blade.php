@extends('layout.app')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
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

        <div class="row">
            <form action="/file-upload"
                  class="dropzone"
                  id="my-awesome-dropzone"></form>
        </div>
    </div>

    <hr />

    <script>
        var myDropzone = new Dropzone("#my-awesome-dropzone", {
            // Setup chunking
            chunking: true,
            method: "POST",
            maxFilesize: 400000000,
            chunkSize: 1000000,
            // If true, the individual chunks of a file are being uploaded simultaneously.
            parallelChunkUploads: false
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Append token to the request - required for web routes
        myDropzone.on('sending', function (file, xhr, formData) {
            formData.append( '_token', $('meta[name="csrf-token"]').attr('content'));
        })

    </script>
@endsection