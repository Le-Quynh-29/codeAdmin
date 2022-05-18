@extends('layout.layout')

@section('content')
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <div class="row">
                <h4 class="float-left">Quản lý người dùng</h4>
                <h4 class="float-right">
                    <a href="{{ route('user.create') }}" class="text-primary">
                        <i class="fa fa-plus-square"></i>
                        Thêm mới
                    </a>
                </h4>
            </div>

            @include('layout.search', ['fields' => [
                            'id' => 'ID',
                            'name' => 'Họ tên',
                            'username' => 'Tên tài khoản',
                            'phone_number' => 'Số điện thoại'
                        ]])
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Họ tên</th>
                    <th class="text-center">Tên tài khoản</th>
                    <th class="text-center">Giới tính</th>
                    <th class="text-center">Số điện thoại</th>
                    <th class="text-center">Vai trò</th>
                    <th class="text-center">Trạng thái</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <th scope="row" class="text-center">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a href="{{ route('user.show', $user->id) }}">
                                {{ $user->username  }}
                            </a>
                        </td>
                        <td class="text-center {{ $user->gender == \App\Models\User::MALE ? 'text-primary' : 'text-danger' }}">
                            {{ $user->formatGender() }}
                        </td>
                        <td>{{ $user->phone_number }}</td>
                        <td class="text-center">{{ $user->formatRole() }}</td>
                        <td
                            @if($user->status == \App\Models\User::NO_ACTIVE)
                            class="text-info"
                            @elseif($user->status == \App\Models\User::ACTIVE)
                            class="text-success"
                            @else
                            class="text-danger"
                            @endif>{{ $user->formatStatus() }}
                        </td>
                        <td class="width-70">
                            <a class="float-left text-primary" href="{{ route('user.edit', $user->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            @if($user->status !== \App\Models\User::BLOCK)
                                <form class="clearfix float-right" method="POST"
                                      action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <button type="submit" class="text-danger">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </form>
                            @else
                                <form class="clearfix float-right" method="POST"
                                      action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <button type="submit" class="text-success">
                                        <i class="fa fa-unlock"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">{{ __('Không có dữ liệu') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <ul class="pagination">
                {!! $users->links( "pagination::bootstrap-4") !!}
            </ul>
        </div>
    </div>
@endsection
