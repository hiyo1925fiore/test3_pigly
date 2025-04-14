@extends('layouts.auth_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<div class="register-form">
    <h1 class="register-form__heading">PiGLy</h1>
    <h2 class="register-form__heading--register">新規会員登録</h2>
    <h3 class="register-form__heading--step1">STEP1 アカウント情報の登録</h3>
    <div class="register-form__inner">
        <form class="register-form__form" action="{{ route('register.step1.post') }}" method="post">
            @csrf
            <div class="register-form__group">
                <label class="register-form__label" for="name">お名前</label>
                <input class="register-form__input" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="名前を入力">
                <p class="register-form__error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="register-form__group">
                <label class="register-form__label" for="email">メールアドレス</label>
                <input class="register-form__input" type="mail" name="email" id="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
                <p class="register-form__error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="register-form__group">
                <label class="register-form__label" for="password">パスワード</label>
                <input class="register-form__input" type="password" name="password" id="password" placeholder="パスワードを入力">
                <p class="register-form__error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <input class="register-form__btn btn" type="submit" value="次に進む">
        </form>
        <a href="/login">ログインはこちら</a>
    </div>
</div>
@endsection