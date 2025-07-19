<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Service;

class RegisterController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('auth.register', compact('services'));
    }

    public function store(RegisterRequest $request)
    {
        $validateData = $request->validated();

        $validateData['password'] = Hash::make($validateData['password']);

        try {
            $user = User::create($validateData);

            Auth::login($user);

            session()->put([
                'user_id', Auth::id(),
                'name' => Auth::user()->name,
                'email' => Auth::user()->email
            ]);

            return redirect()->route('admin.services');

        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }
}
