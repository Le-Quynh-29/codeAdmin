<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SendMailRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     *
     * Show Register
     * @return mixed
     */
    public function viewRegister()
    {
        return view('auth.register');
    }

    /**
     *
     * Register
     * @param  RegisterRequest $request
     * @return void
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
        toastr()->info('Vui lòng kiểm tra địa chỉ email để xác minh tài khoản.');
        return redirect()->route('login');
    }

    /**
     *
     * Show Login
     * @return mixed
     */
    public function viewLogin()
    {
        return view('auth.login');
    }

    /**
     *
     * Login
     * @param  LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        $auth = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => User::ACTIVE
        ];
        $remember = $request->remember == 'on';
        if (Auth::attempt($auth, $remember)) {
            User::where('id', Auth::id())->update([
                'token' => null
            ]);
            $request->session()->regenerate();
            toastr()->success('Đăng nhập thành công.');
            return redirect()->route('home');
        } else {
            toastr()->error('Thông tin đăng nhập không chính xác hoặc tài khoản đã bị vô hiệu hóa.');
            return redirect()->route('login');
        }
    }

    /**
     * Logout
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastr()->success('Đăng xuất thành công.');
        return redirect()->route('login');
    }

    /**
     * update password
     * @param User $user
     * @param SendMailRequest $request
     * @return void
     */
    public function updatePassword(Request $request, User $user)
    {
        $user->update([
            'token' => null,
            'password' => Hash::make($request->password),
        ]);

        toastr()->success('Đổi mật khẩu thành công. Đăng nhập để sử dụng hệ thống.');
        return redirect()->route('login');
    }

    /**
     * create password
     * @param User $user
     * @param string $token
     * @return mixed
     */
    public function createPassword(User $user, $token)
    {
        if ($user->token !== $token) {
            toastr()->error('Yêu cầu đổi mật khẩu của bạn đã hết hạn.');
            return redirect()->route('show.email');
        }
        return view('auth.forget_password', compact('user', 'token'));
    }}
