@extends('auth.layout')

@section('content')
    <div id="page-wrapper" style="margin: 0;">
        <div class="main-page signup-page">
            <h2 class="title1">Tìm tài khoản của bạn</h2>
            <div class="widget-shadow">
                <div class="sign-up-row widget-shadow">
                    <form action="{{ route('send.email') }}" method="post">
                        @csrf
                        <div class="sign-u">
                            <input type="text" name="email" placeholder="Địa chỉ email" value="{{ old('email') }}"
                                   class="{!! $errors->has('email') ? 'error' : '' !!}" autocomplete="off">
                            {!! $errors->first('email', '<div class="error-feedback">:message</div>') !!}
                            <div class="clearfix"></div>
                        </div>
                        <div class="sub_home">
                            <input type="submit" value="Gửi">
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
