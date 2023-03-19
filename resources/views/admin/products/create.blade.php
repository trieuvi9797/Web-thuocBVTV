@extends('admin.layouts.app')
@section('title', 'Thêm sản phẩm')

@section('content')          
            
<div class="app-content pt-3 p-md-3 p-lg-4">
    <h1 class="app-page-title">Thêm sản phẩm</h1>
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-5">
                    <img src="" id="show-image" alt="" width="465px" height="100px">   
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm:</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" accept="image/*" name="image" id="image-input" class="form-control">
                    @error('image')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Danh mục:</label>
                    <select name="category_ids[]" class="form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>        
                        @endforeach
                    </select>
                    @error('category_ids')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>                            
                
                <div class="mb-3">
                    <label for="price" class="form-label">Giá:</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required>
                    @error('email')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Khuyến mãi:</label>
                    <input type="text" name="sale" class="form-control" id="sale" value="{{ old('sale') }}" required>
                    @error('phone')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>    
                <div class="mb-3">
                    <label for="quantity" class="form-label">Số lượng:</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>             
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả:</label>
                    <textarea name="description" id="description" rows="30" cols="80" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>   
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#description' ) )
                        .then(description => {
                            console.log(description);
                        })
                        .catch( error => {
                            console.error( error );
                        } );
                </script> 
                {{-- <script>
                    CKEDITOR.replace( 'description' );
                </script>                 --}}
                <button type="submit" class="btn app-btn-primary" >Lưu</button>
            </form>
        </div><!--//app-card-->
    </div>
</div><!--//app-content-->
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
@section('script')





@endsection