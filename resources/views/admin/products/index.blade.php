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
            <tr>
                <th scope="row">1</th>
                <th scope="row"></th>
                <th scope="row"></th>
                <th scope="row"></th>
                <th scope="row"></th>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="#" class="btn btn-danger">حذف</a>
                        <a href="#" class="btn btn-info">تعديل</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
