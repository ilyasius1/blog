@extends('layouts.primary')

@section('left-column')
@foreach ($articles as $art)
<h1>админка!</h1>
@include('parts.article')
@endforeach    

@endsection
