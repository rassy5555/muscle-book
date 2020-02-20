@extends('layouts.app')

@section('content')
<main class="l-container">
    <div class="p-prof__wrapper">
        <img class="c-profImage" src=""> 
        <div class="p-prof__wrapper-right">
            <p class="c-userName">P太郎</p>
            <div class="p-prof__follow-wrapper">
                <a class="p-prof__follows"><label>フォロー</label> 3000人</a>
                <a class="p-prof__follows"><label>フォロワー</label> 50000人</a>
            </div>
            <div class="p-button__wrapper">
                <button class="c-button u-m0__sp">プロフィール編集</button>
                <button class="c-button u-dn__sp">写真投稿</button>
            </div>
        </div>
    </div>
    <p class="p-prof__comment">初めまして。P太郎です。<br>目標は体脂肪率12%です。よろしくお願いします。</p>
    <div class="p-image__wrapper">
        <img class="c-image">
        <img class="c-image">
        <img class="c-image">
        <img class="c-image">
        <img class="c-image">
        <img class="c-image">
    </div>
</main>
@endsection