@extends('layouts.primary')

@section('left-column')

<h1>админка!</h1>
<a class="btn  btn-primary" href="{{ route('admin.users.index') }}">Пользователи</a><br/>
<a class="btn  btn-primary" href="{{ route('role.index') }}">Роли</a><br/>
<a class="btn  btn-primary" href="{{ route('permission.index') }}">Привилегии</a><br/>
<a class="btn  btn-primary" href="{{ route('category.index') }}">Категории статей</a><br/>


@endsection
