@extends('admin.layouts.app')
@section('title', 'Cập nhật sản phẩm')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <h1 class="app-page-title">Sửa sản phẩm</h1>
    <div class="app-card app-card-settings shadow-sm p-4">
        <div class="app-card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?? $product->name }}" required>
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Danh mục:</label>
                            <select name="category_ids[]" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($categories as $item)
                                <option value="{{ $item->id }}" {{ $product->categories->contains('id', $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>        
                                @endforeach
                            </select>
                            @error('category_ids')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>                            
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            <input type="file" accept="image/*" name="image" id="image-input" class="form-control">
                            <div class="col-5">
                                <img src="{{ $product->images->count() > 0 ? asset('/upload/'.$product->images->first()->url) : '/upload/default.png' }}" id="show-image" alt="" width="100px" height="100px">   
                            </div>
                            @error('image')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-6 col-md-4">  
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá:</label>
                            <input type="number" name="price" class="form-control" id="price" value="{{ old('price') ?? $product->price }}" required>
                            @error('email')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Khuyến mãi:</label>
                            <input type="text" name="sale" class="form-control" id="sale" value="{{ old('sale') ?? $product->sale }}" required>
                            @error('phone')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>  
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng:</label>
                            <input type="text" name="quantity" class="form-control" id="quantity" value="{{ old('quantity') }}" required>
                            {{-- @error('quantity')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror --}}
                        </div>           
                    </div>           
                </div>           
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả:</label>
                    <textarea name="description" id="description" rows="30" cols="80" class="form-control">{{ old('description') ?? $product->description }}</textarea>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('plugin/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script>
        let sizes = [{
            id: Date.now(),
            size: 'M',
            quantity: 1
        }];
    </script>

    <script src="{{ asset('admin/assets/js/product/product.js') }}"></script>
@endsection
