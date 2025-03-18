@extends('layouts.admin')
@section('content')
    {{-- {{ dd(session()) }} --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @elseif(session()->has(key: 'error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    <a href="{{ url('categories/create/') }}" class="btn btn-secondary">أضف صنف جديد</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم الصنف</th>
                <th scope="col">الأحداث</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ url('categories/delete/' . $category->id) }}" class="btn btn-danger">حذف</a>
                            <a href="{{ url('categories/edit/' . $category->id) }}" class="btn btn-info">تعديل</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
