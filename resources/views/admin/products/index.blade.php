@extends('layouts.admin')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم المنتج</th>
                <th scope="col">الصنف</th>
                <th scope="col">السعر</th>
                <th scope="col">الكمية</th>
                <th scope="col">الأحداث</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ \App\Models\Category::find($product->category_id)->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{ url('products/delete/' . $product->id) }}" class="btn btn-danger">حذف</a>
                            <a href="{{ url('products/edit/' . $product->id) }}" class="btn btn-info">تعديل</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
