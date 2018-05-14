<div class="post-preview">
    <a href="{{ route('article.show', ['article' => $article->id]) }}">
        <h2 class="post-title">
            {{ $article->title }}
        </h2>
    </a>
    <p class="post-meta">Posted by
        {{ $article->user->name }}
        on {{ $article->created_at }}</p>
</div>