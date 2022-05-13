@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Добро пожаловать!</h2>
        <p>Для начло работы вым нужно <a href="{{ route('register') }}">создать аккаунт</a></p>
    </div>
@endsection
