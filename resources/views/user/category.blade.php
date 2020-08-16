@extends('layouts.master')

@section('title', 'Hạng phòng cho bạn')

@section('css')
    <link rel="stylesheet" href="./css/category_page.css">



@section('content')


    <div class="container categories_cover mt-3 pt-2 pb-5" id="categories_list">
        <p class="h3 pt-4 pb-3 border-bottom" style="color: darkred">{{ $category->name }}</p>
        <p class="text pl-3" style="color: darkorange;">Giá theo giờ: {{ number_format($category->price_hour) }} đồng/giờ</p>
        <p class="text pl-3" style="color: darkorange;">Giá theo ngày: {{ number_format($category->price_day) }} đồng/ngày</p>
        <p class="text">{{ $category->description1 }}</p>
        <img class="w-75 pl-5 pr-5" src="/storage/{{ $category->image1 }}" alt="">
        <p class="text pr-3">{{ $category->description2 }}</p>
        <img class="w-75 pl-5 pr-5" src="/storage/{{ $category->image2 }}" alt="">
        <p class="text">{{ $category->description3 }}</p>
        <img class="w-75 pl-5 pr-5" src="/storage/{{ $category->image3 }}" alt="">
    </div>




@endsection


@section('javascript')
    {{-- <script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="js/categories_page.js"></script> --}}
