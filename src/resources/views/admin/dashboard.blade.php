@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('nav')
<form method="post" action="{{ url('/logout') }}">
    @csrf
    <button type="submit">ログアウト</button>
</form>
@endsection

@section('content')
<div class="admin-dashboard">
    <div class="admin-dashboard__heading">
        <h2>Admin</h2>
    </div>
    <form class="admin-filter" >
        <div class="admin-filter__item">
            <input class="admin-filter__item-input" type="text" name="" placeholder="名前やメールアドレスを入力してください" />
        </div>
        <div class="admin-filter__item">
            <select class="admin-filter__item-select" name="gender">
                <option value="">性別</option>
                <!-- genderの選択肢を追加 -->
            </select>
        </div>
        <div class="admin-filter__item">
            <select class="admin-filter__item-select" name="content">
                <option value="">お問い合わせの種類</option>
                <!-- contentの選択肢を追加 -->
            </select>
        </div>
        <div class="admin-filter__item">
            <input class="admin-filter__item-input" type="date" name="date" placeholder="年/月/日" />
        </div>
        <div class="admin-filter__button">
            <button class="admin-filter__button--search" type="submit">検索</button>
        </div>
        <div class="admin-filter__button">
            <button class="admin-filter__button--reset" type="reset">リセット</button>
        </div>
    </form>
    <div class="admin-dashboard__list">
        <div class="admin-dashboard__list-header">
            <div class="admin-dashboard__button">
                <button class="admin-dashboard__button--export" type="submit">エクスポート</button>
            </div>
            <div class="admin-dashboard__pagination">
                <span>pagination</span>
            </div>
        </div>
        <div class="admin-table">
            <table class="admin-table__inner">
                <tr class="admin-table__row">
                    <th class="admin-table__header">お名前</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせの種類</th>
                    <th class="admin-table__header"></th>
                </tr>
                <tr class="admin-table__row">
                <td class="admin-table__text">aaa</td>
                <td class="admin-table__text">bbb</td>
                <td class="admin-table__text">ccc</td>
                <td class="admin-table__text">ddd</td>
                <td class="admin-table__text">詳細</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection