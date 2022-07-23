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
        'id_author',
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

    /**
     * @return 
     */
    
    public function author(){
        return $this->belongsTo(User::class);
    }
}
