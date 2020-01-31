<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'place', 'caption', 'cost'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function get()
    {
        $results = User::all();
        return $results;
    }


}
