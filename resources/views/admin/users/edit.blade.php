@extends('admin.layouts.app')
@section('title', 'Cập nhật tài khoản')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="col-auto">
                <h1 class="app-page-title">Cập nhật tài khoản</h1>
            </div>
            <div class="app-card shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-5">
                                <label for="image" class="form-label">Hình ảnh</label>
                                <input type="file" accept="image/*" name="image" class="form-control" id="image-input" value="{{ old('image') }}" required>
                                @error('image')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-5">
                                <img src="{{ $user->images ? asset('upload/users/'.$user->images->first()->url) : 'default.png' }}" id="show-image" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?? $user->name }}" required>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') ?? $user->email }}" required>
                            @error('email')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') ?? $user->phone }}" required>
                            @error('phone')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                            @error('password')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giới tính:</label>
                            <select name="gender" class="form-control" value={{ $user->gender }}>
                                <option value="male">Nam</option>
                                <option value="fe-male">Nữ</option>        
                            </select>
                            @error('gender')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <textarea type="text" name="address" class="form-control" id="address">{{ old('address') ?? $user->address }}</textarea>
                            @error('address')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vai trò</label>
                            <div class="row">
                                @foreach ($roles as $groupName => $role)
                                    <div class="col-2">
                                        <h4>{{ $groupName }}</h4>
                                        <div>
                                            @foreach ($role as $item)
                                                <div class="form-check">
                                                    <input class="form-check-input" name="role_ids[]" {{ $user->roles->contains('id', $item->id) }} type="checkbox"
                                                        value="{{ $item->id }}" >
                                                    <label class="custom-control-label"
                                                        for="customCheck1">{{ $item->display_name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn app-btn-primary" >Lưu</button>
                
                    </form>
                </div><!--//app-card-body-->
            </div>
</div><!--//row-->
@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>    
<script>
        $(() => {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show-image').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image-input").change(function() {
                readURL(this);
            });
        });
    </script>

@endsection