@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
    <form class="admin-filter" method="get">
        @csrf
        <div class="admin-filter__item">
            <input class="admin-filter__input--text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください"
            value="{{ request('keyword') }}"/>
        </div>
        <div class="admin-filter__item">
            <select class="admin-filter__select--gender" name="gender">
                <option value="" >性別</option>
                <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
            </select>
        </div>
        <div class="admin-filter__item">
            <select class="admin-filter__select--content" name="category_id">
                <option value="" >お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="admin-filter__item">
            <input class="admin-filter__input--date" type="date" name="date" placeholder="年/月/日" value="{{ request('date') }}"/>
        </div>
        <div class="admin-filter__button">
            <button class="admin-filter__button--search" type="submit" formaction="{{ route('admin.search') }}">検索</button>
        </div>
        <div class="admin-filter__button">
            <button class="admin-filter__button--reset" type="submit" formaction="{{ route('admin.reset') }}">リセット</button>
        </div>
    </form>
    <div class="admin-dashboard__list">
        <div class="admin-dashboard__list-header">
            <form class="admin-dashboard__button" action="/export" method="get">
                <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                <input type="hidden" name="gender" value="{{ request('gender') }}">
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                <input type="hidden" name="date" value="{{ request('date') }}">
                <button class="admin-dashboard__button--export" type="submit">エクスポート</button>
            </form>
            <div class="admin-dashboard__pagination">
                {{ $contacts->appends(request()->query())->links() }}
            </div>
        </div>
        <div class="admin-table">
            <table class="admin-table__inner">
                <tr class="admin-table__row">
                    <td class="admin-table__header--name">お名前</td>
                    <td class="admin-table__header--gender">性別</td>
                    <td class="admin-table__header--email">メールアドレス</td>
                    <td class="admin-table__header--content">お問い合わせの種類</td>
                    <td class="admin-table__header--detail"></td>
                </tr>
                @foreach ($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__text">{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
                    <td class="admin-table__text">
                        {{ \App\Models\Contact::genderLabel($contact['gender']) }}
                    </td>
                    <td class="admin-table__text">{{ $contact['email'] }}</td>
                    <td class="admin-table__text">{{ $contact->category->content }}</td>
                    <td class="admin-table__text">
                        <button class="admin-table__detail"
                        data-id="{{ $contact['id'] }}"
                        data-name="{{ $contact['last_name']}} {{ $contact['first_name'] }}"
                        data-gender="{{ \App\Models\Contact::genderLabel($contact['gender']) }}"
                        data-email="{{ $contact['email'] }}"
                        data-tel="{{ $contact['tel'] }}"
                        data-address="{{ $contact['address'] }}"
                        data-building="{{ $contact['building'] }}"
                        data-category="{{ $contact->category->content }}"
                        data-detail="{{ $contact['detail'] }}"
                        >詳細</button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- 以下、モーダル表示 -->

<div id="detail-modal" class="modal">
    <div class="modal-content">
        <div>
            <span id="modal-close">×</span>
        </div>
        <div class="modal-item">
            <span class=modal-title>名前</span>
            <span id="modal-name"></span>
        </div>
        <div class="modal-item">
            <span class=modal-title>性別</span>
            <span id="modal-gender"></span>
        </div>
        <div class="modal-item">
            <span class=modal-title>メールアドレス</span>
            <span id="modal-email"></span>
        </div>
        <div class="modal-item">
            <span class=modal-title>電話番号</span>
            <span id="modal-tel"></span>
        </div>
        <div class="modal-item">
            <span class=modal-title>住所</span>
            <span id="modal-address"></span>
        </div>
        <div class="modal-item">
            <span class=modal-title>建物名</span>
            <span id="modal-building"></span>
        </div>
        <div class="modal-item">
            <span class=modal-title>お問い合わせの種類</span>
            <span id="modal-category"></span>
        </div>
        <div class="modal-item">
            <span class=modal-title>お問い合わせ内容</span>
            <span id="modal-detail"></span>
        </div>
        <form class="delete-form" action="/delete" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" id="delete-contact-id">
            <button class="delete-form__button">削除</button>
        </form>
    </div>
</div>

<script>
const modal = document.getElementById("detail-modal");

document.querySelectorAll(".admin-table__detail").forEach(button => {

    button.addEventListener("click", function(){

        document.getElementById("modal-name").textContent = this.dataset.name;
        document.getElementById("modal-gender").textContent = this.dataset.gender;
        document.getElementById("modal-email").textContent = this.dataset.email;
        document.getElementById("modal-tel").textContent = this.dataset.tel;
        document.getElementById("modal-address").textContent = this.dataset.address;
        document.getElementById("modal-building").textContent = this.dataset.building;
        document.getElementById("modal-category").textContent = this.dataset.category;
        document.getElementById("modal-detail").textContent = this.dataset.detail;
        document.getElementById("delete-contact-id").value = this.dataset.id;

        modal.style.display = "block";

    });

});

document.getElementById("modal-close").addEventListener("click", function(){
    modal.style.display = "none";
});
</script>
@endsection