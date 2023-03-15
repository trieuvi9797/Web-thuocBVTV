@extends('admin.layouts.app')
@section('title', 'Thêm tài khoản')

@section('content')          
            
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">	
        <div class="row g-4 settings-section">
            <div class="col-8 col-md-4">
                <h1 class="app-page-title">Thêm tài khoản</h1>
                <div class="col-5">
                    {{-- <img src="" id="show-image" alt=""> --}}
                    <img src="" id="showIMG" alt="" width="300px" height="300px">
                    <!--js image-->
                    <script>
                        var loadFile = function(event) {
                        var reader = new FileReader();
                        reader.onload = function(){
                            var showIMG = document.getElementById('showIMG');
                            showIMG.src = reader.result;
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    };
                    </script>
                    <!--js image-->    
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    
                    <div class="app-card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Hình ảnh</label>
                                    <input type="file" accept="image/*" name="image" id="image-input" class="form-control" onchange="loadFile(event)">

                                    {{-- <input type="file" accept="image/*" name="image" class="form-control" id="image-input" value="{{ old('image') }}" required> --}}
                                    @error('image')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
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
                                <input type="password" name="password" class="form-control" id="password" required>
                                @error('password')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giới tính:</label>
                                <select name="gender" class="form-control">
                                    <option value="male">Nam</option>
                                    <option value="fe-male">Nữ</option>        
                                </select>
                                @error('gender')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <textarea type="text" name="address" class="form-control" id="address">{{ old('address') }}</textarea>
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
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->
@endsection
