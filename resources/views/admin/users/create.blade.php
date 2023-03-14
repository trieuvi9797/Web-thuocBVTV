@extends('admin.layouts.app')
@section('title', 'Thêm tài khoản')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="col-auto">
                <h1 class="app-page-title">Thêm tài khoản</h1>
            </div>
            <div class="app-card shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{ route('users.store') }}" method="POST">
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
                                <img src="" id="show-image" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu:</label>
                            <input type="text" name="password" class="form-control" id="password" required>
                            @error('password')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giới tính:</label>
                            <select name="gander" class="form-control">
                                <option value="male">Nam</option>
                                <option value="fe-male">Nữ</option>        
                            </select>
                            @error('group')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
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
                                                    <input class="form-check-input" name="role_ids[]" type="checkbox"
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