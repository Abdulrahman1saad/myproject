<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progect;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Progect $progect)
    {
        $data = request()->validate([
            'body' => 'required',
        ]);

        $data['progect_id'] = $progect->id;
        Task::create($data);

        return back();
    }
}
