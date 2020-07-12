@extends('layouts.primary')

@section('left-column')
@foreach ($post as $art)
<h1>админка!</h1>
@include('parts.article')
@endforeach

@endsection
