<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // Muestra el formulario de inicio de sesión.
    public function create()
    {
        return view('login'); // Archivo: resources/views/login.blade.php
    }

    // Procesa el login.
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'correo'   => ['required', 'email'],
            'password' => ['required'],
        ]);

        \Log::info('Intentando autenticar con:', ['correo' => $request->correo]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            \Log::info('Autenticación exitosa');
            $request->session()->regenerate();
            return redirect()->route('caja.index');
        }

        \Log::error('Autenticación fallida');
        return back()->withErrors([
            'correo' => 'Credenciales incorrectas.',
        ]);
    }

    // Cierra la sesión y redirige al login.
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    
}
