<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index() {
        return view('user.user', [
            'users' => User::all()
        ]);
    }

    public function create() {
        return view('user.tambah-user');
    }

    public function store(Request $request) {
        // Validasi registrasi
        $validate = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:8|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
            'roles' => 'required'
        ]);

        // Enskripsi Password
        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);
        return redirect('/user');
    }
}
