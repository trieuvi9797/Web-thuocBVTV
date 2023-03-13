@extends('admin.layouts.app')
@section('title', 'Sửa người dùng', $role->name)

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="col-auto">
                <h1 class="app-page-title">Sửa người dùng</h1>
            </div>
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?? $role->name}}" required>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="display_name" class="form-label">Tên hiển thị</label>
                            <input type="text" name="display_name" class="form-control" id="display_name" value="{{ old('display_name') ?? $role->display_name}}" required>
                            @error('display_name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nhóm</label>
                            <select name="group" class="form-control" value="{{ $role->group }}">
                                <option value="system">System</option>
                                <option value="user">User</option>        
                            </select>
                            @error('group')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phân quyền</label>
                            <div class="row">
                                @foreach ($permissions as $groupName => $permission)
                                    <div class="col-2">
                                        <h4>{{ $groupName }}</h4>
                                        <div>
                                            @foreach ($permission as $item)
                                                <div class="form-check">
                                                    <input class="form-check-input" name="permission_ids[]" type="checkbox"
                                                       {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }} value="{{ $item->id }}">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">{{ $item->display_name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('permission_ids[]')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary" >Lưu</button>
                
                    </form>
                </div><!--//app-card-body-->
            </div>
</div><!--//row-->

@endsection