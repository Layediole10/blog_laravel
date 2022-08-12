<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'publish_date',
        'published',
        'photo',
    ];
    
    /**
     * recupere les commentaires d'un article
     *
     * @return array
     */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
    /**
     * @return 
     */
    
    public function author(){
        return $this->belongsTo(User::class);
    }

    public function isLikedByLoggedInUser(){

        return $this->likes->where('user_id', auth()->user()->id)->isEmpty() ? false: true;
    }
}
