@extends('layouts.admin')
@section('content')
    <form action="{{ url('/categories/store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم الصنف</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                @if (old('name')) value="{{ old('name') }}" @endif placeholder="اسم الصنف">
            @error('name')
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
