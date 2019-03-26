<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ["url"];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
