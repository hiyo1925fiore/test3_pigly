@extends('layouts.auth_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<div class="login-form">
    <h1 class="login-form__heading">PiGLy</h1>
    <h2 class="login-form__heading--login">ログイン</h2>
    <div class="login-form__inner">
        <form class="login-form__form" action="/login" method="post">
            @csrf
            <div class="login-form__group">
                <label class="login-form__label" for="email">メールアドレス</label>
                <input class="login-form__input" type="mail" name="email" id="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
                <p class="login-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="login-form__group">
                <label class="login-form__label" for="password">パスワード</label>
                <input class="login-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
                <p  class="login-form__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <input class="login-form__button--login" type="submit" value="ログイン">
        </form>
        <a class="login-form__link--register" href="/register/step1">アカウント作成はこちら</a>
    </div>
</div>
@endsection