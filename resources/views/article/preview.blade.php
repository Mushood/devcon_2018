<div class="post-preview">
    <a href="{{ route('article.show', ['article' => $article->id]) }}">
        <h2 class="post-title">
            {{ $article->title }}
            @if(Auth::user()->id == $article->user_id)
                <small> -
                    <a href="{{ route('article.edit', ['article' => $article->id]) }}">
                        edit
                    </a>
                </small>
            @endif
        </h2>
    </a>
    <p class="post-meta">Posted by
        {{ $article->user->name }}
        on {{ $article->created_at }}</p>
</div>