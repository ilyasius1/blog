@extends('layouts.primary')

@section('left-column')
    @foreach ($posts as $post)
        @include('parts.post')
    @endforeach
@endsection
