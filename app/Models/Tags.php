<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    // protected $table = 'tags';
    protected $fillable = [
        'name'
    ];

    // public function Posttags(){
    //     return $this->belongsToMany(Posts::class, 'posttags', 'tag_id', 'post_id');
    // }
}
