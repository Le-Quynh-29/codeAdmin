@extends('auth.layout')

@section('content')
    <div id="page-wrapper" style="margin: 0;">
        <div class="main-page login-page ">
            <h2 class="title1">Login</h2>
            <div class="widget-shadow">
                <div class="login-body">
                    @if(session()->has('success'))
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ session()->get('success') }}</h3>
                            </div>
                        </div>
                    @elseif(session()->has('info'))
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ session()->get('info') }}</h3>
                            </div>
                        </div>
                    @endif
                    <form action="" method="post">
                        <input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
                        <input type="password" name="password" class="lock" placeholder="Password" required="">
                        <div class="forgot-grid">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
                            <div class="forgot">
                                <a href="javascript:;">forgot password?</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <input type="submit" name="Sign In" value="Sign In">
                        <div class="registration">
                            Don't have an account ?
                            <a class="" href="{{ route('show.register') }}">
                                Create an account
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
