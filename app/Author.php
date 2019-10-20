<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $fillable=['author'];

    public function authors()
    {
        return $this->hasOne('App\Book');
    }
}
