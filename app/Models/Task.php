<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'body', 'progect_id', 'done'];
    public function progect()
    {
        return $this->belongsTo(Progect::class);
    }
}
