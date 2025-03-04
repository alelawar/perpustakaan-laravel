<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register Page'
        ]);
    }

    public function register(Request $request)
    {

        // dd($request);
        $validatedData =  $request->validate([
            'fullname'  => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users,username',
            'email'     => 'required|string|email|max:255|unique:users,email',
            'telepon'   => 'required|string|regex:/^[0-9]{10,15}$/|unique:users,telepon',
            'password'  => 'required|string|min:8',
            'alamat'    => 'required|string'
        ]);


        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Berhasil buat akun!, mohon login');

    }
}
