@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>Confirm</h2>
        </div>
        <form action="/thanks" class="confirm-form" method="POST">
            @csrf
            <table class="confirm-form__inner">
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">
                        <span class="confirm-form__header-span">お名前</span>
                    </th>
                    <td class="confirm-form__item">
                        <input type="hidden" name="last_name" value="{{$contact['last_name']}}">
                        <input type="hidden" name="first_name" value="{{$contact['first_name']}}">
                        <p class="confirm-form__item-p">{{$contact['last_name'] . '　' . $contact['first_name']}}</p>
                    </td>
                </tr>
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">
                        <span class="confirm-form__header-span">性別</span>
                    </th>
                    <td class="confirm-form__item">
                        <input type="hidden" name="gender" value="{{$contact['gender']}}">
                            @switch($contact['gender'])
                                @case(1)
                                    <p class="confirm-form__item-p" id="gender">男性</p>
                                @break

                                @case(2)
                                    <p class="confirm-form__item-p" id="gender">女性</p>
                                @break

                                @default
                                    <p class="confirm-form__item-p" id="gender">その他</p>
                            @endswitch
                    </td>
                </tr>
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">
                        <span class="confirm-form__header-span">メールアドレス</span>
                    </th>
                    <td class="confirm-form__item">
                        <input type="hidden" name="email" value="{{$contact['email']}}">
                        <p class="confirm-form__item-p">{{$contact['email']}}</p>
                    </td>
                </tr>
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">
                        <span class="confirm-form__header-span">電話番号</span>
                    </th>
                    <td class="confirm-form__item">
                        <input type="hidden" name="tell1" value="{{$contact['tell1']}}">
                        <input type="hidden" name="tell2" value="{{$contact['tell2']}}">
                        <input type="hidden" name="tell3" value="{{$contact['tell3']}}">
                        <p class="confirm-form__item-p">{{$contact['tell1'] . $contact['tell2'] . $contact['tell3']}}</p>
                    </td>
                </tr>
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">
                        <span class="confirm-form__header-span">住所</span>
                    </th>
                    <td class="confirm-form__item">
                        <input type="hidden" name="address" value="{{$contact['address']}}">
                        <p class="confirm-form__item-p">{{$contact['address']}}</p>
                    </td>
                </tr>
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">
                        <span class="confirm-form__header-span">建物名</span>
                    </th>
                    <td class="confirm-form__item">
                        <input type="hidden" name="building" value="{{$contact['building']}}">
                        <p class="confirm-form__item-p">{{$contact['building']}}</p>
                    </td>
                </tr>
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">
                        <span class="confirm-form__header-span">お問い合わせの種類</span>
                    </th>
                    <td class="confirm-form__item">
                        <input type="hidden" name="category_id" value="{{$contact['category_id']}}">
                        <p class="confirm-form__item-p">{{$category['content']}}</p>
                        </select>
                    </td>
                </tr>
                <tr class="confirm-form__row">
                    <th class="confirm-form__header">
                        <span class="confirm-form__header-span">お問い合わせ内容</span>
                    </th>
                    <td class="confirm-form__item">
                        <input type="hidden" name="detail" value="{{$contact['detail']}}">
                        <p class="confirm-form__item-p">{{$contact['detail']}}</p>
                    </td>
                </tr>
            </table>
            <div class="confirm-form__button">
                <button type="submit" class="confirm-form__button-submit">送信</button>
                <button type="submit" class="confirm-form__button-back" name="back" value="back">修正</button>
            </div>
        </form>
    </div>
@endsection
