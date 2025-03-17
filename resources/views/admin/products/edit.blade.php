@extends('layouts.admin')
@section('content')
    <form action="{{ url('products/update/' . $product->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">اسم المنتج</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="اسم المنتج"
                value="{{ $product->name }}">
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">الكمية</label>
            <input type="number" class="form-control text-start" id="quantity" name="quantity" placeholder="الكمية"
                value="{{ $product->quantity }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">السعر</label>
            <input type="number" class="form-control text-start" id="price" name="price" placeholder="السعر"
                value="{{ $product->price }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">الصنف</label>
            <select class="form-control" name="category" id="category">
                <option value="#"></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="الوصف">{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <input type="submit" value="احفظ" class="btn btn-info">
        </div>
    </form>
@endsection
