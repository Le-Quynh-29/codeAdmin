<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendMailController extends Controller
{
    /**
     * active account
     * @param User $user
     * @param string $token
     * @return mixed
     */
    public function activeAccount(User $user, $token)
    {
        if ($user->token == $token) {
            $user->update([
                'status' => 1,
                'token' => null
            ]);
        } else {
            toastr()->info('Tài khoản đã được xác minh trước đó.');
            return redirect()->route('show.login');
        }
        toastr()->success('Xác minh thành công. Đăng nhập để sử dụng.');
        return redirect()->route('show.login');
    }

    /**
     *
     * Show send Mail
     * @return mixed
     */
    public function showEmail()
    {
        return view('auth.email');
    }

    /**
     * Send Mail
     * @param SendMailRequest $request
     * @return void
     */
    public function sendMail(SendMailRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            toastr()->error('Email không tồn tại! Vui lòng kiểm tra lại email.');
            return redirect()->back();
        }
        $token = Str::random(15);
        User::where('email', $request->email)->update([
            'token' => $token,
        ]);
        Mail::send('email.forget_password', compact('user', 'token'), function ($email) use ($user) {
            $email->subject('TẠO MẬT KHẨU MỚI');
            $email->to($user->email, $user->name);
        });
        toastr()->info('Kiểm tra email để thay đổi mật khẩu.');
        return redirect()->route('show.login');
    }
}
