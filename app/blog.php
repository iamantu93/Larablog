<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class blog extends Model
{
    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')->orderByRaw('min(created_at) desc')->get();
    }
}
