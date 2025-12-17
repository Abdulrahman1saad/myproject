<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progect extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
