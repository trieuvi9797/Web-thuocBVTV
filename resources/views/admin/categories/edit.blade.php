@extends('admin.layouts.app')
@section('title', 'Sửa danh mục', $category->name)

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="col-auto">
                <h1 class="app-page-title">Sửa danh mục</h1>
            </div>
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?? $category->name}}" required>
                            @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        @if ($category->childrens->count()<1)
                            <div class="mb-3">
                                <label class="form-label">Danh mục cha:</label>
                                <select name="parent_id" class="form-control">
                                        <option value="">---Chọn danh mục cha---</option>
                                    @foreach ($parentCategories as $item)
                                        <option value="{{ $item->id }}" {{ (old('parent_id') ?? $category->parent_id) == $item->id ? 'selected' : '' }} >
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <button type="submit" class="btn app-btn-primary" >Lưu</button>
                
                    </form>
                </div><!--//app-card-body-->
            </div>
</div><!--//row-->

@endsection