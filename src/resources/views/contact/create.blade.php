@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    お名前
                </span>
                <span class="form__label--required">
                    ※
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__item--name">
                    <input class="form__item-input" type="text" name="last_name" placeholder="例: 山田" >
                </div>
                <div class="form__item--name">
                    <input class="form__item-input" type="text" name="first_name" placeholder="例: 太郎" >
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    性別
                </span>
                <span class="form__label--required">
                    ※
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__item--gender">
                    <label class="form__item-radio">
                        <input type="radio" name="gender" value="1">男性
                    </label>
                </div>
                <div class="form__item--gender">
                    <label class="form__item-radio">
                        <input type="radio" name="gender" value="2">女性
                    </label>
                </div>
                <div class="form__item--gender">
                    <label class="form__item-radio">
                        <input type="radio" name="gender" value="3">その他
                    </label>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    メールアドレス
                </span>
                <span class="form__label--required">
                    ※
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__item--email">
                    <input class="form__item-input" type="email" name="email" placeholder="例: test@example.com">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    電話番号
                </span>
                <span class="form__label--required">
                    ※
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__item--tel-group">
                    <div class="form__item--tel">
                        <input class="form__item-input" type="text" name="tel1" placeholder="080" >
                    </div>
                    <span class="form__item--tel-separator">-</span>
                    <div class="form__item--tel">
                        <input class="form__item-input" type="text" name="tel2" placeholder="1234" >
                    </div>
                    <span class="form__item--tel-separator">-</span>
                    <div class="form__item--tel">
                        <input class="form__item-input" type="text" name="tel3" placeholder="5678" >
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    住所
                </span>
                <span class="form__label--required">
                    ※
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__item--address">
                    <input class="form__item-input" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    建物名
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__item--building">
                    <input class="form__item-input" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    お問い合わせの種類
                </span>
                <span class="form__label--required">
                    ※
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__item--content">
                    <select class="form__item-select" name="category_id">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    お問い合わせ内容
                </span>
                <span class="form__label--required">
                    ※
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__item--detail">
                    <textarea class="form__item-textarea" name="detail" placeholder="例: お問い合わせ内容をご記載ください"></textarea>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection