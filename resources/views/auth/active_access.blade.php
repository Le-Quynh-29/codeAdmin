@extends('auth.layout')

@section('content')
    <div id="page-wrapper" style="margin: 0;">
        <div class="main-page signup-page">
            <h2 class="title1">Xác minh thành công</h2>
            <div class="widget-shadow">

                <div class="sign-up-row widget-shadow text-center">
                    <div class="sign-u">
                        <h3 class="text-success">Xác minh tài khoản thành công!</h3>
                        <p>Ấn tiếp tục để sử dụng hệ thống</p>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sub_home">
                        <a href="{{ route('home') }}" class="next_page">Tiếp tục</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
