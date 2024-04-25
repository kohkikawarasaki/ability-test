@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="admin__content">
        <div class="admin__heading">
            <h2>Admin</h2>
        </div>
        <div class="search">
            <form action="/admin/search" class="search-from" method="GET">
                @csrf
                <div class="search-form__item">
                    <input type="text" name="keyword" class="search-form__item-input" placeholder="名前やメールアドレスを入力してください"
                        value="{{ old('keyword') }}">
                    <select name="gender" class="search-form__item-select">
                        <option value="" selected disabled>性別</option>
                        <option value="">全て</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                    <select name="category_id" class="search-form__item-select">
                        <option value="" selected disabled>お問い合わせの種類</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <input type="date" name="date" class="search-form__item-select" value="{{ old('date') }}">
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit">検索</button>
                </div>
                <div class="search-form__button">
                    <input type="reset" class="search-form__button-reset"></input>
                </div>
            </form>
        </div>
        <div class="contact__heading">
            <div class="contact-export">
                <button class="contact-export__button">エクスポート</button>
            </div>
            <div class="contact-page">{{ $contacts->links() }}</div>
        </div>
        <div class="contact-table">
            <table class="contact-table__inner">
                <tr class="contact-table__row">
                    <th class="contact-table__header">
                        <span class="contact-table__header-span">お名前</span>
                    </th>
                    <th class="contact-table__header">
                        <span class="contact-table__header-span">性別</span>
                    </th>
                    <th class="contact-table__header">
                        <span class="contact-table__header-span">メールアドレス</span>
                    </th>
                    <th class="contact-table__header">
                        <span class="contact-table__header-span">お問い合わせの種類</span>
                    </th>
                    <th class="contact-table__header"></th>
                </tr>
                @foreach ($contacts as $contact)
                    <tr class="contact-table__row">
                        <td class="contact-table__item">
                            <p class="contact-table__item-p" id="name">
                                {{ $contact['last_name'] . '　' . $contact['first_name'] }}</p>
                        </td>
                        <td class="contact-table__item">
                            @switch($contact['gender'])
                                @case(1)
                                    <p class="contact-table__item-p" id="gender">男性</p>
                                @break

                                @case(2)
                                    <p class="contact-table__item-p" id="gender">女性</p>
                                @break

                                @default
                                    <p class="contact-table__item-p" id="gender">その他</p>
                            @endswitch
                        </td>
                        <td class="contact-table__item">
                            <p class="contact-table__item-p" id="email">{{ $contact['email'] }}</p>
                        </td>
                        <td class="contact-table__item">
                            <p class="contact-table__item-p" id="category">{{ $contact['category']['content'] }}</p>
                        </td>
                        <td class="contact-table__item">
                            <button class="contact-table__button" data-id="{{ $contact['id'] }}"
                                data-tell="{{$contact['tell']}}" data-address="{{$contact['address']}}" data-building="{{$contact['building']}}" data-detail="{{$contact['detail']}}">詳細</button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('modal/modal')
@endsection
