<?php

namespace App\Mail;

use App\Article;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticleCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $article;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article, User $user)
    {
        $this->article = $article;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->user;
        $article = $this->article;

        return $this->markdown('email.article_created', compact('user', 'article'))
            ->subject('New Article');
    }
}
