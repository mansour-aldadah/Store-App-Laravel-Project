@extends('layouts.admin')
@section('content')
    <form action="{{ url('/products/store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم المنتج</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                @if (old('name')) value="{{ old('name') }}" @endif placeholder="اسم المنتج">
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">الكمية</label>
            <input type="number" class="form-control text-start @error('quantity') is-invalid @enderror" id="quantity"
                name="quantity" @if (old('quantity')) value="{{ old('quantity') }}" @endif placeholder="الكمية">
            @error('quantity')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">السعر</label>
            <input type="number" class="form-control text-start @error('price') is-invalid @enderror" id="price"
                name="price" @if (old('price')) value="{{ old('price') }}" @endif placeholder="السعر">
            @error('price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">الصنف</label>
            <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if (old('category') == $category->id) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                rows="3" placeholder="الوصف">{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="احفظ" class="btn btn-info">
        </div>
    </form>
@endsection
