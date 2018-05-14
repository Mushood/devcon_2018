<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'image_name', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
