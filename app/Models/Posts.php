<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'content',
        'user_id'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Posttags(){
        return $this->belongsToMany(Posttags::class, 'posttags', 'tags_id', 'posts_id');
    }
}
