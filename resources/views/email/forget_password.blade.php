<div style="width: 600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{ $user->name }}</h2>
        <p>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu Facebook của bạn.</p>
        <p>Bạn có thể thay đổi trực tiếp mật khẩu của mình.</p>
        <p>
            <a href="{{ route('create.password', ['user' => $user->id, 'token' => $token]) }}"
               style="display: inline-block; background: green; color: #fff; padding: 7px 25px; font-weight: bolder">
                Đổi mật khẩu
            </a>
        </p>
    </div>
</div>
