@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('nav')
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="confirm-form" method="post">
    @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">お名前</td>
                    <td class="confirm-table__text">
                        {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">性別</td>
                    <td class="confirm-table__text">
                        {{ \App\Models\Contact::genderLabel($contact['gender']) }}
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">メールアドレス</td>
                    <td class="confirm-table__text">
                        {{ $contact['email'] }}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">電話番号</td>
                    <td class="confirm-table__text">
                        {{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}
                        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" />
                        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" />
                        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">住所</td>
                    <td class="confirm-table__text">
                        {{ $contact['address'] }}
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">建物名</td>
                    <td class="confirm-table__text">
                        {{ $contact['building'] }}
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">お問い合わせの種類</td>
                    <td class="confirm-table__text">
                        {{ $category->content }}
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">お問い合わせ内容</td>
                    <td class="confirm-table__text">
                        {{ $contact['detail'] }}
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
                    </td>
                </tr>
            </table>
        </div>
        <div class="confirm-form__button-group">
            <div class="confirm-form__button">
                <button class="confirm-form__button-submit" type="submit" formaction="{{ route('thanks.store') }}">送信</button>
            </div>
            <div class="cancel-form__button">
                <button class="cancel-form__button-submit" type="submit" formaction="{{ route('contact.back') }}">修正
                </button>
            </div>
        </div>
    </form>
</div>
@endsection