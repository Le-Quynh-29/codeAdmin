@extends('layout.layout')

@section('content')
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <div class="row">
                <h4 class="float-left">Thêm mới người dùng</h4>
            </div>

            <div class="row">
                <div class="form-three p-0 m-0">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Họ tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1 {{ $errors->has('name') ? 'error' : '' }}"
                                       id="name" placeholder="Nhập họ tên" name="name" value="{{ old('name') }}">
                                {!! $errors->first('name', '<div class=error-feedback>:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Tên tài khoản</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1 {{ $errors->has('username') ? 'error' : '' }}"
                                       id="username" placeholder="Nhập tên tài khoản" name="username" value="{{ old('username') }}">
                                {!! $errors->first('username', '<div class=error-feedback>:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkbox" class="col-sm-2 control-label">Giới tính</label>
                            <div class="col-sm-8">
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="0" name="gender"> Nam
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="1" name="gender"> Nữ
                                    </label>
                                </div>
                            </div>
                            {!! $errors->first('gender', '<div class=error-feedback>:message</div>') !!}
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="col-sm-2 control-label">SĐT</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control1 {{ $errors->has('phone_number') ? 'error' : '' }}"
                                       id="phone_number" placeholder="Nhập số điện thoại" name="phone_number" value="{{ old('phone_number') }}">
                                {!! $errors->first('phone_number', '<div class=error-feedback>:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Địa chỉ email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1 {{ $errors->has('email') ? 'error' : '' }}"
                                       id="email" placeholder="Nhập email" name="email" value="{{ old('email') }}">
                                {!! $errors->first('email', '<div class=error-feedback>:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-sm-2 control-label">Ngày sinh</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control1 {{ $errors->has('birthday') ? 'error' : '' }}"
                                       id="birthday" placeholder="Nhập ngày sinh" name="birthday" value="{{ old('birthday') }}">
                                {!! $errors->first('birthday', '<div class=error-feedback>:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkbox" class="col-sm-2 control-label">Vai trò</label>
                            <div class="col-sm-8">
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="0" name="role" checked> Người dùng
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="1" name="role"> Admin
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="2" name="role"> CTV
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkbox" class="col-sm-2 control-label">Trạng thái</label>
                            <div class="col-sm-8">
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="0" name="status" checked> Chưa xác minh
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="1" name="status" checked> Đã xác minh
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="2" name="status"> Vô hiệu hóa
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Mật khẩu</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control1 {{ $errors->has('password') ? 'error' : '' }}"
                                       id="password" placeholder="Nhập mật khẩu" name="password" value="{{ old('password') }}">
                                {!! $errors->first('password', '<div class=error-feedback>:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label float-left">
                                <a type="button" class="btn btn-warning">
                                    Hủy
                                </a>
                                <button type="submit" class="btn btn-primary ml-4">Thêm mới</button>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

