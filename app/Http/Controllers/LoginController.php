<?php

namespace App\Http\Controllers;

use App\Models\UserManagement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'user_name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string'],
            ],
            [
                'user_name.required' => 'Please enter your username.',
                'password.required' => 'Please enter your password.',
            ]
        );

        $user = UserManagement::where(
            'user_name',
            trim($validated['user_name'])
        )->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return back()
                ->withInput(['user_name' => $validated['user_name']])
                ->withErrors(['login' => 'Username or password is incorrect.']);
        }

        if (!$user->isActive()) {
            return back()
                ->withInput(['user_name' => $validated['user_name']])
                ->withErrors(['login' => 'Your account is not active.']);
        }

        if (!$user->hasRole(['Admin', 'Agent'])) {
            return back()
                ->withInput(['user_name' => $validated['user_name']])
                ->withErrors(['login' => 'Your account does not have a valid role.']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Login successful.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'You have been signed out successfully.');
    }
}
