<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest.admin', ['except' => 'getLogout' ]);
    }

    public function getLogin() {
        return view('admin.auth.login');
    }

    public function postLogin(Request $r) {
        $return = [
            'response' => 'success',
            'message' => 'Logged in successfully',
            'url' => 'admin'
        ];

        // grapping admin credentials
        $name = $r->input('email');
        $password = $r->input('password');
        // Searching for the admin matches the passed email or adminname
        $admin = User::where('name', $name)->orWhere('email', $name)->first();

        if ($admin && Hash::check($password, $admin->password)) {
            // login the admin
            Auth::guard('admins')->login($admin, $r->has('remember'));
        } else {
            $return = [
                'response' => 'error',
                'message' => 'Username or password is incorrect'
            ];
        }
        return response()->json($return);
    }

    /**
     * Logout The user
     */
    public function getLogout() {
        Auth::guard('admins')->logout();
        return redirect('/admin/login');
    }

}
