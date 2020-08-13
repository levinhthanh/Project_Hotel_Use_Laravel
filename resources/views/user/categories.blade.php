@extends('layouts.master')

@section('title', 'Hạng phòng cho bạn')

@section('css')
    <link rel="stylesheet" href="./css/category_page.css">



@section('content')


    <div class="container-fluid categories_cover mt-3 pt-2 pb-5" id="categories_list">

    </div>




@endsection


@section('javascript')
    <script src="{{ asset('libs/node_modules/jquery/dist/jquery.js') }}"></script>
    <script src="js/categories_page.js"></script>
