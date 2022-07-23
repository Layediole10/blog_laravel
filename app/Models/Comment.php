<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'name',
        'email',
        'id_article'
    ];

    /**
     * recupere l'article d'un commentaire
     * 
     * @return comment
     */
    public function articles(){
        return $this->belongsTo(Article::class);
    }
}
