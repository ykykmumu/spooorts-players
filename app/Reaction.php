<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{

    protected $primaryKey =  [
        'to_user_id', 'from_user_id'
    ];
    
    protected $fillable = [
        'to_user_id', 'from_user_id'
    ];

    public $incrementing = false;
    public $timestamps = false;


    public function toUserId()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        return $this->belongsTo('App\User', 'from_user_id', 'id');
    }

    // public function user()
    // {
    //     return $this->
    // }
}