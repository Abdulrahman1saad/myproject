<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progect extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
