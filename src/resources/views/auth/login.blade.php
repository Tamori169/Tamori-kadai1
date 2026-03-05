@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('nav')
<a href="/register">register</a>
@endsection

@section('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <input class="form__item-input" type="text" name="email" placeholder="例: test@example.com" />
                </div>
                <div class="form__error">
                <!-- エラーメッセージ用 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">パスワード</span>
            </div>
            <div class="form__group-content">
                <div class="form__item">
                    <input class="form__item-input" type="password" name="password" placeholder="例: coachtech1106" />
                </div>
                <div class="form__error">
                <!-- エラーメッセージ用 -->
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection
