<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function blog()
    {

        return $this->belongsTo(blog::class);
    }

    public function user()
    {

      return $this->belongsTo(User::class);
            
    }
}
