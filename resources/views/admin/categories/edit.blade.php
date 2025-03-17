@extends('layouts.admin')
@section('content')
    <form action="{{ url('categories/update/' . $category->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">اسم الصنف</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="اسم الصنف"
                value="{{ $category->name }}">
        </div>
        <div class="mb-3">
            <input type="submit" value="احفظ" class="btn btn-info">
        </div>
    </form>
@endsection
