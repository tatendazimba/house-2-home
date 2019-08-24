<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    protected $fillable = ["name", "amount", "status", "x", "y"];

    public function image() {
        return $this->belongsTo(Image::class);
    }
}
