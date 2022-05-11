<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            return redirect()->route('show.login')->with('info', 'Tài khoản đã được xác minh trước đó');
        }
        return redirect()->route('show.login')->with('success', 'Xác minh thành công. Đăng nhập để sử dụng');
    }
}
