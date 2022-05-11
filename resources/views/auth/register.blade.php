@extends('auth.layout')

@section('content')
    <div id="page-wrapper" style="margin: 0;">
        <div class="main-page signup-page">
            <h2 class="title1">Đăng ký</h2>
            <div class="sign-up-row widget-shadow">
                <h5>Thông tin cá nhân :</h5>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="sign-u">
                        <input type="text" name="name" placeholder="Nhập họ tên" value="{{ old('name') }}"
                               class="{!! $errors->has('name') ? 'error' : '' !!}" autocomplete="off">
                        {!! $errors->first('name', '<div class="error-feedback">:message</div>') !!}
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <input type="text" name="email" placeholder="Địa chỉ email" value="{{ old('email') }}"
                               class="{!! $errors->has('email') ? 'error' : '' !!}" autocomplete="off">
                        {!! $errors->first('email', '<div class="error-feedback">:message</div>') !!}
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Giới tính<em class="text-danger">*</em> :</h4>
                        </div>
                        <div class="sign-up2">
                            <label>
                                <input type="radio" name="gender" value="0" {{ old('gender') == '0' ? 'checked' : '' }}>
                                Nam
                            </label>
                            <label>
                                <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
                                Nữ
                            </label>
                        </div>
                        <div class="clearfix"> </div>
                        {!! $errors->first('gender', '<div class="error-feedback">:message</div>') !!}
                    </div>
                    <h6>Mật khẩu :</h6>
                    <div class="sign-u">
                        <input type="password" placeholder="Nhập mật khẩu" name="password" value="{!! old('password') !!}"
                               class="{!! $errors->has('password') ? 'error' : '' !!}" autocomplete="off">
                        {!! $errors->first('password', '<div class="error-feedback">:message</div>') !!}
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <input type="password" placeholder="Nhập lại mật khẩu" name="confirm_password" value="{!! old('confirm_password') !!}"
                               class="{!! $errors->has('confirm_password') ? 'error' : '' !!}" autocomplete="off">
                        {!! $errors->first('confirm_password', '<div class="error-feedback">:message</div>') !!}
                    </div>
                    <div class="clearfix"> </div>
                    <div class="sub_home">
                        <input type="submit" value="Đăng ký">
                        <div class="clearfix"> </div>
                    </div>
                    <div class="registration">
                        Đã đăng ký.
                        <a class="" href="{{ route('show.login') }}">
                            Đăng nhập
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
