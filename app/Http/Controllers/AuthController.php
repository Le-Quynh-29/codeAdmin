<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     *
     * Register
     * @return void
     */
    public function viewRegister()
    {
        return view('auth.register');
    }

    /**
     *
     * Register
     * @param  RegisterRequest $request
     * @return mixed
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'username' => Str::random(20),
            'token' => Str::random(10),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        if ($user) {
            Mail::send('email.active_account', compact('user'), function ($email) use ($user) {
                $date = Carbon::now()->format('d-m-Y');
                $email->subject('XÁC MINH TÀI KHOẢN - NGÀY '.$date);
                $email->to($user->email, $user->name);
            });
        }
        toastr()->success('Đăng ký thành công');
        toastr()->info('Vui lòng kiểm tra địa chỉ email để xác minh tài khoản');
        return redirect()->route('show.login');
    }

    /**
     *
     * Login
     * @return void
     */
    public function viewLogin()
    {
        return view('auth.login');
    }
}
