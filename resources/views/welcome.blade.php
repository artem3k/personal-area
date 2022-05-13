@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Добро пожаловать!</h2>
        <p>Для начло работы вам нужно <a href="{{ route('register') }}">создать аккаунт</a> или <a href="{{ route('login') }}">войти в существующий аккаунт</a></p>
        <p>Работа выполнена абитуриентом</p>
        <p>Круглый Артём Васильевич г. Славянск-на-Кубани</p>
    </div>
@endsection
