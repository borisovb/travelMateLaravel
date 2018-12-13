<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'approved', 'image'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
