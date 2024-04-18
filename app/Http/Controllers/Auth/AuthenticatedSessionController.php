<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Obtener los permisos del usuario autenticado
        $permissions = auth()->user()->permissions;

        // Verificar si el usuario tiene permiso para acceder al panel del administrador
        // Se contemplan las dos posibilidades, que el campo sea 1 o true
        if ($permissions['platform.index'] === "1" || $permissions['platform.index'] === true) {
            // Una vez autenticado y con permiso, se redirige al panel del administrador
            return redirect()->route('platform.main');
        }

        //Una vez autenticado se redirige al panel del administrador
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
