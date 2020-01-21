<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //
    protected $fillable =[
        'user_id', 'book_id', 'price'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function book() {
        return $this->belongsTo('App\Book');
    }

    public function scopeActive($query) {
		return $query
				->whereIsActive('1')
				->where(function ($query) {
					$query->where('bid_start_time', '0000-00-00 00:00:00')->orWhereNull('bid_start_time')->orWhere('bid_start_time', '<=', date('Y-m-d', time()));
				})
				->where(function ($query) {
					$query->where('bid_end_time', '0000-00-00 00:00:00')->orWhereNull('bid_end_time')->orWhere('bid_end_time', '>=', date('Y-m-d', time()));
				});
    }


}
