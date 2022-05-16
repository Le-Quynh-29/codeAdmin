@extends('layout.layout')

@section('content')
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <div class="row">
                <h4 class="float-left">Chi tiết người dùng</h4>
                <strong class="pl-1 float-left">({{ $user->username }})</strong>
            </div>
            <div class="row">
                <div class="validation-grids" data-example-id="basic-forms">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pl-0">Họ tên</label>
                        <div class="col-sm-9">
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pl-0">Tên tài khoản</label>
                        <div class="col-sm-9">
                            <p>{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pl-0">Giới tính</label>
                        <div class="col-sm-9">
                            <p>{{ $user->formatGender() }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pl-0">SĐT</label>
                        <div class="col-sm-9">
                            <p>{{ $user->phone_number }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pl-0">Email</label>
                        <div class="col-sm-9">
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pl-0">Ngày sinh</label>
                        <div class="col-sm-9">
                            <p>{{ AppHelper::formatTime($user->birthday) }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pl-0">Vai trò</label>
                        <div class="col-sm-9">
                            <p>{{ $user->formatRole() }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label pl-0">Trạng thái</label>
                        <div @if($user->status == \App\Models\User::NO_ACTIVE)
                             class="col-sm-9 text-info"
                             @elseif($user->status == \App\Models\User::ACTIVE)
                             class="col-sm-9 text-success"
                             @else
                             class="col-sm-9 text-danger"
                            @endif>
                            <p>{{ $user->formatStatus() }}</p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
