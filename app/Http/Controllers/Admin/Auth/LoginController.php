<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $remember = $request->remember;

        $admin = auth()->guard('web')->attempt($credentials, $remember);

        if ($admin) {
            $user = User::where('id', auth()->user()->id);
            $user->update([
                'last_login_at' => Carbon::now()
            ]);

            return redirect()->intended(route('admin.index'));
        }

        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }
}
