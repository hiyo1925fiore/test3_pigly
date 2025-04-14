@extends('layouts.auth_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/weight_register.css') }}">
@endsection

@section('content')
<div class="register-form">
    <h1 class="weight-register-form__heading">PiGLy</h1>
    <h2 class="weight-register-form__heading--register">新規会員登録</h2>
    <h3 class="weight-register-form__heading--step2">STEP2 体重データの入力</h3>
    <div class="weight-register-form__inner">
        <form class="weight-register-form__form" action="/register/step2" method="post">
            @csrf
            <div class="weight-register-form__group">
                <label class="weight-register-form__label" for="weight">現在の体重</label>
                <input class="weight-register-form__input" type="number" name="weight" id="weight" placeholder="現在の体重を入力">kg
                <p class="weight-register-form__error-message">
                    @error('weight')
                    {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="weight-register-form__group">
                <label class="weight-register-form__label" for="target_weight">目標の体重</label>
                <input class="weight-register-form__input" type="number" name="target_weight" id="target_weight" placeholder="目標の体重を入力">kg
                <p class="weight-register-form__error-message">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
                </p>
            </div>
            <input class="register-form__input" type="hidden" name="name" value="{{ $userData['name'] }}">
            <input class="register-form__input" type="hidden" name="email" value="{{ $userData['email'] }}">
            <input class="register-form__input" type="hidden" name="password" value="{{ $userData['password'] }}">

            <input class="
            weight-register-form__btn btn" type="submit" value="アカウント作成">
        </form>
    </div>
</div>
@endsection