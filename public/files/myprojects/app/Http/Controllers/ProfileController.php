<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('profile');
    }

    public function update() {

        $userId = auth()->user()->id;
        
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
            'password' => 'nullable|confirmed|min:8',
            'image' => 'nullable|mimes:jpeg,jpg,png'
        ]);

        if (request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }

        if (request()->hasFile('image')) {
            $file = request()->file('image');

            if ($file->isValid()) {
                $path = $file->store('/images/users', 'public');

                $data['image'] = '/storage/' . $path;

            } else {
                return redirect()->back()->withErrors(['image' => 'الملف غير صالح.']);

            }
        }

        User::findOrFail($userId)->update($data);

        return back();
    }
}
