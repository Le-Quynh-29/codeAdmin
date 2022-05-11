<div style="width: 600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{ $user->name }}</h2>
        <p>Bạn đã đăng ký tài khoản tại hệ thống</p>
        <p>Bạn cần xác minh tài khoản để sử dụng hệ thống</p>
        <p>
            <a href="{{ route('active.account', ['user' => $user->id, 'token' => $user->token]) }}"
               style="display: inline-block; background: green; color: #fff; padding: 7px 25px; font-weight: bolder">
                Kích hoạt tài khoản
            </a>
        </p>
    </div>
</div>
