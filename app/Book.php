<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table='books';
    protected $fillable = ['user_id','img', 'title', 'aut_id', 'genre_id','desc', 'year', 'min_price', 'max_price', 'buyout_price', 'end_date', 'status'];

    // public function authors(){
    //     return $this->hasMany('App\Author');
    // }

    public function genres()
    {
        return $this->belongsTo('App\Genre', 'genre_id');
    }

    public function authors()
    {
        return $this->belongsTo('App\Author', 'aut_id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
