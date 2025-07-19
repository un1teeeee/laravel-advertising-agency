<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;

class LoginController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('auth.login', compact('services'));
    }

    public function store(LoginRequest $request)
    {
        $validatedData = $request->validated();

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate(); // Корректный вызов через $request

            // Устанавливаем данные в сессию (если это действительно нужно)
            $request->session()->put('user_id', Auth::id());
            $request->session()->put('name', Auth::user()->name);
            $request->session()->put('email', Auth::user()->email);

            return redirect()->route('admin.services')->with('success', 'Вы успешно вошли!');
        }

        return back()->with('error', 'Неверный email или пароль.')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        session()->regenerate();
        return redirect()->route('home');
    }
}
