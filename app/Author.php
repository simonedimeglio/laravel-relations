<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function article() {
        return $this->hasMany(Article::class);
    }
}
