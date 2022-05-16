@extends('auth.layout')

@section('content')
    <div id="page-wrapper" style="margin: 0;">
        <div class="main-page signup-page">
            <h2 class="title1">Đăng nhập</h2>
            <div class="widget-shadow">
                <div class="sign-up-row widget-shadow">
                    <form action="{{ route('login.store') }}" method="post">
                        @csrf
                        <div class="sign-u">
                            <input type="text" name="email" placeholder="Địa chỉ email" value="{{ old('email') }}"
                                   class="{!! $errors->has('email') ? 'error' : '' !!}" autocomplete="off">
                            {!! $errors->first('email', '<div class="error-feedback">:message</div>') !!}
                            <div class="clearfix"></div>
                        </div>
                        <div class="sign-u">
                            <input type="password" placeholder="Nhập mật khẩu" name="password"
                                   value="{!! old('password') !!}"
                                   class="{!! $errors->has('password') ? 'error' : '' !!}" autocomplete="off">
                            {!! $errors->first('password', '<div class="error-feedback">:message</div>') !!}
                            <div class="clearfix"></div>
                        </div>
                        <div class="sign-u">
                            <label class="checkbox" style="padding-left: 20px; line-height: 1.2; float: left">
                                <input type="checkbox" name="checkbox"><i></i>Lưu đăng nhập
                            </label>
                            <div class="forgot" style="float: right">
                                <a href="{{ route('show.email') }}">Quên mật khẩu?</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="sub_home">
                            <input type="submit" value="Đăng nhập">
                            <div class="clearfix"></div>
                        </div>

                        <div class="registration">
                            Không có tài khoản?
                            <a class="" href="{{ route('show.register') }}">
                                Đăng ký
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
