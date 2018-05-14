@component('mail::message')

<h2>Hello {{ $user->name }}</h2>

<h3>We have a new article: {{ $article->title }}</h3>

@component('mail::button', ['url' => route('article.show', ['article' => $article->id]) , 'color' => 'blue'])
    View Article
@endcomponent

Thank you {{ config('app.name') }} Team
@endcomponent