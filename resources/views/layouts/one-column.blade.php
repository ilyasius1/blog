@extends('layouts.base')

@section('header')
    @include('parts.header')
@endsection

@section('searchpanel')
    @include('parts.searchpanel')
@endsection

@section('content')
    <div class="container">
        @section('center-column')
        @show
    </div>
@endsection


@section('footer_links')
    @include('parts.footer_links')
@endsection

@section('footer_copyrights')
    @include('parts.footer_copyrights')
@endsection
