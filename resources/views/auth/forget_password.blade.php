@extends('auth.layout')

@section('content')
    <div id="page-wrapper" style="margin: 0;">
        <div class="main-page signup-page">
            <h2 class="title1">Chọn mật khẩu mới</h2>
            <div class="widget-shadow">
                <div class="sign-up-row widget-shadow">
                    <form action="{{ route('update.password', $user) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="sign-u">
                            <input type="password" name="password" placeholder="Nhập mật khẩu mới" value="{!! old('password') !!}"
                                   class="{!! $errors->has('password') ? 'error' : '' !!}" autocomplete="off">
                            {!! $errors->first('password', '<div class="error-feedback">:message</div>') !!}
                            <div class="clearfix"></div>
                        </div>
                        <div class="sub_home">
                            <input type="submit" value="Tiếp tục">
                            <div class="clearfix"></div>
                        </div>
                        <div class="registration">
                            <a class="" href="{{ route('login') }}">
                                Quay lại trang đăng nhập
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
