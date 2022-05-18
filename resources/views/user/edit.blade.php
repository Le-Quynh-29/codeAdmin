@extends('layout.layout')

@section('content')
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <div class="row">
                <h4 class="float-left">Cập nhật người dùng</h4>
                <em>{{ $user->usernam }}</em>
            </div>

            <div class="row">
                <div class="form-three p-0 m-0">
                    <form class="form-horizontal" id="form-update-user">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Họ tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1"
                                       id="name" placeholder="Nhập họ tên" name="name" value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Tên tài khoản</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1"
                                       id="username" placeholder="Nhập tên tài khoản" name="username" value="{{ old('username', $user->username) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkbox" class="col-sm-2 control-label">Giới tính</label>
                            <div class="col-sm-8">
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="0" name="gender"
                                            {!! old('gender', $user->gender) == \App\Models\User::MALE ? "checked" : '' !!}> Nam
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="1" name="gender"
                                            {!! old('gender', $user->gender) == \App\Models\User::FEMALE ? "checked" : '' !!}> Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="col-sm-2 control-label">SĐT</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control1"
                                       id="phone_number" placeholder="Nhập số điện thoại" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Địa chỉ email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1"
                                       id="email" placeholder="Nhập email" name="email" value="{{ old('email', $user->email) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthday" class="col-sm-2 control-label">Ngày sinh</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control1"
                                       id="birthday" placeholder="Nhập ngày sinh" name="birthday" value="{{ old('birthday', AppHelper::formatTime($user->birthday)) }}">
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
                                        <input type="radio" value="1" name="role"
                                            {!! old('role', $user->role) == \App\Models\User::ADMIN ? "checked" : '' !!}> Admin
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="2" name="role"
                                            {!! old('role', $user->role) == \App\Models\User::CTV ? "checked" : '' !!}> CTV
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="checkbox" class="col-sm-2 control-label">Trạng thái</label>
                            <div class="col-sm-8">
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="0" name="status"
                                            {!! old('status', $user->status) == \App\Models\User::NO_ACTIVE ? "checked" : '' !!}> Chưa xác minh
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="1" name="status"
                                            {!! old('status', $user->status) == \App\Models\User::ACTIVE ? 'checked' : '' !!}> Đã xác minh
                                    </label>
                                </div>
                                <div class="checkbox-inline1">
                                    <label>
                                        <input type="radio" value="2" name="status"
                                            {!! old('status', $user->status) == \App\Models\User::BLOCK ? "checked" : '' !!}> Vô hiệu hóa
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Mật khẩu</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control1"
                                       id="password" placeholder="Nhập mật khẩu" name="password" value="{{ old('password') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label float-left">
                                <a href="{{ route('user.index') }}" class="btn btn-warning">
                                    Hủy
                                </a>
                                <button type="submit" class="btn btn-primary ml-4">Cập nhật</button>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script>
        _userId = {!! $user->id !!};
        _updateUser = "{{ route('ajax.user.update') }}";
        _validateUniqueNameURL = "{{ route('ajax.user.validate.unique.name') }}";
        _validateUniqueEmailURL = "{{ route('ajax.user.validate.unique.email') }}";
        _validateUniquePhoneNumberURL = "{{ route('ajax.user.validate.unique.phone.number') }}";
    </script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/user-edit.js') }}" charset="UTF-8"></script>
@endsection
