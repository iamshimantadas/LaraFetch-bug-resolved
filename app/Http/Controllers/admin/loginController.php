<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admins;
use App\Models\Downloads;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $pass = $request->password;

        // Find the admin by email
        $admin = Admins::where('email', $email)->first();

        // Check if admin exists and password matches (plain text comparison)
        if ($admin && $admin->passwd === $pass) {
            session(['adminmail' => $email]);
            return redirect('/admin_dashboard');
        }

        return redirect('/admin')->withErrors(['login' => 'Invalid email or password']);
    }

    public function dashboard(Request $request)
    {
        if (session()->has('adminmail')) {
            $rec = Downloads::orderBy('enrollno', 'DESC')->get();
            $count = Downloads::count();

            return view('admin/dashboard', ['rec' => $rec, 'count' => $count]);
        } else {
            return redirect('/admin');
        }
    }
}
