<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'dislike_number'
    ];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
