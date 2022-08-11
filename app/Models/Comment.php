<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'first_name',
        'last_name',
        'email',
        'article_id',
    ];

    /**
     * recupere l'article d'un commentaire
     * 
     * @return comment
     */
    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function dislikes(){
        return $this->hasMany(Dislike::class);
    }
}
