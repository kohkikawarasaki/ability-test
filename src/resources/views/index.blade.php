@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact__content">
        <div class="contact__heading">
            <h2>Contact</h2>
        </div>
        <form action="/confirm" class="contact-form" method="POST">
            @csrf
            <table class="contact-form__inner">
                <tr class="contact-form__row">
                    <th class="contact-form__header">
                        <span class="contact-form__header-span">お名前</span>
                        <span class="contact-form__header-span--red">※</span>
                    </th>
                    <td class="contact-form__item">
                        <input type="text" class="contact-form__item-input" name="last_name" placeholder="例:山田"
                            value="{{ old('last_name') }}">
                        <input type="text" class="contact-form__item-input" name="first_name" placeholder="例:太郎"
                            value="{{ old('first_name') }}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="contact-form__error">
                        <div class="contact-form__error-message">
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="contact-form__error-message">
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr class="contact-form__row">
                    <th class="contact-form__header">
                        <span class="contact-form__header-span">性別</span>
                        <span class="contact-form__header-span--red">※</span>
                    </th>
                    <td class="contact-form__item">
                        <div class="contact-form__item-radio">
                            <input type="radio" id="man" name="gender" value="1" @if (old('gender') == '1' or !old('gender')) checked @endif>
                            <label for="man">男性</label>
                        </div>
                        <div class="contact-form__item-radio">
                            <input type="radio" id="woman" name="gender" value="2" @if (old('gender') == '2') checked @endif>
                            <label for="woman">女性</label>
                        </div>
                        <div class="contact-form__item-radio">
                            <input type="radio" id="other" name="gender" value="3" @if (old('gender') == '3') checked @endif>
                            <label for="other">その他</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="contact-form__error">
                        <div class="contact-form__error-message">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr class="contact-form__row">
                    <th class="contact-form__header">
                        <span class="contact-form__header-span">メールアドレス</span>
                        <span class="contact-form__header-span--red">※</span>
                    </th>
                    <td class="contact-form__item">
                        <input type="text" class="contact-form__item-input" name="email"
                            placeholder="例:test@example.com" value="{{ old('email') }}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="contact-form__error">
                        <div class="contact-form__error-message">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr class="contact-form__row">
                    <th class="contact-form__header">
                        <span class="contact-form__header-span">電話番号</span>
                        <span class="contact-form__header-span--red">※</span>
                    </th>
                    <td class="contact-form__item">
                        <input type="text" class="contact-form__item-input" name="tell1" placeholder="080"
                            value="{{ old('tell1') }}">
                        <input type="text" class="contact-form__item-input" name="tell2" placeholder="1234"
                            value="{{ old('tell2') }}">
                        <input type="text" class="contact-form__item-input" name="tell3" placeholder="5678"
                            value="{{ old('tell3') }}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="contact-form__error">
                        <div class="contact-form__error-message">
                            @if ($errors->has('tell1'))
                                {{ $errors->first('tell1') }}
                            @elseif ($errors->has('tell2'))
                                {{ $errors->first('tell2') }}
                            @elseif ($errors->has('tell3'))
                                {{ $errors->first('tell3') }}
                            @endif
                        </div>
                    </td>
                </tr>
                <tr class="contact-form__row">
                    <th class="contact-form__header">
                        <span class="contact-form__header-span">住所</span>
                        <span class="contact-form__header-span--red">※</span>
                    </th>
                    <td class="contact-form__item">
                        <input type="text" class="contact-form__item-input" name="address"
                            placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="contact-form__error">
                        <div class="contact-form__error-message">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr class="contact-form__row">
                    <th class="contact-form__header">
                        <span class="contact-form__header-span">建物名</span>
                    </th>
                    <td class="contact-form__item">
                        <input type="text" class="contact-form__item-input" name="building"
                            placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                    </td>
                </tr>
                <tr class="contact-form__row">
                    <th class="contact-form__header">
                        <span class="contact-form__header-span">お問い合わせの種類</span>
                        <span class="contact-form__header-span--red">※</span>
                    </th>
                    <td class="contact-form__item">
                        <select name="category_id" class="contact-form__item-select">
                            <option value="" selected disabled>選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}" @if (old('category_id') == $category['id']) selected @endif>{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="contact-form__error">
                        <div class="contact-form__error-message">
                            @error('category_id')
                                {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
                <tr class="contact-form__row">
                    <th class="contact-form__header">
                        <span class="contact-form__header-span">お問い合わせ内容</span>
                        <span class="contact-form__header-span--red">※</span>
                    </th>
                    <td class="contact-form__item">
                        <textarea name="detail" class="contact-form__item-text" rows="6" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td class="contact-form__error">
                        <div class="contact-form__error-message">
                            @error('detail')
                                {{ $message }}
                            @enderror
                        </div>
                    </td>
                </tr>
            </table>
            <div class="contact-form__button">
                <button class="contact-form__button-submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection
