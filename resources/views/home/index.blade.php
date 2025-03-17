@extends('layouts.front')
@section('content')
    <!-- Category Filter -->
    <h1 class="text-center my-5">عرض المنتجات</h1>
    <div class="container my-5">
        <form method="GET" action="{{ url('/') }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">اختر الفئة</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- Product List -->
    <div class="container marketing">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 border border-1 py-5">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="var(--bs-secondary-color)" />
                    </svg>
                    <h2 class="fw-normal my-3"> {{ $product->name }} </h2>
                    <p class="my-3"> {{ $product->description }} </p>
                    <p><a class="btn btn-secondary my-3" href="#">عرض التفاصيل</a></p>
                </div>
            @endforeach
        </div>
        <hr class="featurette-divider m-3" />
    </div>
@endsection
