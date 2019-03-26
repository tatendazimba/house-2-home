<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ["title", "content", "text_colour"];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

//    public static function boot() {
//        parent::boot();
//
//        static::deleting(function($post) { // before delete() method call this
//            $post->images()->delete();
//            $post->tags()->delete();
//            // do the rest of the cleanup...
//        });
//    }
}
