@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="thanks__content">
        <div class="thanks__inner">
            <h2 class="thanks__text">お問い合わせありがとうございました</h2>
            <form action="/" method="GET">
                @csrf
                <button class="thanks__button">HOME</button>
            </form>
        </div>
    </div>
@endsection
