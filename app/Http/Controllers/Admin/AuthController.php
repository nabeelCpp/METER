<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLoginForm()
    {
        return view('admin.auth.login'); // Create this view accordingly.
    }

    /**
     * Process the admin login.
     */
    public function login(Request $request)
    {
        // Validate the login data
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Credentials from the form
        $credentials = $request->only('email', 'password');

        // Attempt to login using the admin guard
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Retrieve the currently authenticated admin
            $admin = Auth::guard('admin')->user();

            // Check if the admin's status is active
            if ($admin->status == Admin::STATUS_ACTIVE) {
                // Redirect to the admin dashboard if active
                return redirect()->route('admin.dashboard');
            } else {
                // Logout the admin if status is not active
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->withErrors([
                    'message' => 'Your account is not active. Please contact the system administrator.'
                ]);
            }
        }

        // Authentication failed
        return back()->withErrors([
            'message' => 'Invalid credentials provided.'
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
