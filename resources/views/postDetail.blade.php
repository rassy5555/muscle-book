@extends('layouts.app')

@section('content')
<main class="l-container">
    <div class="p-prof__wrapper">
        <img class="c-profImage" src=""> 
        <div class="p-prof__wrapper-right">
            <p class="c-userName">P太郎</p>
            <div class="p-prof__postDetail-wrapper">
                <time>2020/01/12 17:15</time><br>
                <span><i class="far fa-heart"></i>10件</span>
                <span><i class="far fa-comment"></i>4件</span><br>
                <a>コメントする</a>
            </div>
            <button class="c-button">投稿編集</button>
        </div>
    </div>
    <p class="p-prof__comment">初めまして。P太郎です。<br>目標は体脂肪率12%です。よろしくお願いします。</p>
    <div class="p-image__wrapper">
        <img class="c-image" src="/storage/no-image2.png">
        <img class="c-image" src="/storage/no-image2.png">
        <img class="c-image" src="/storage/no-image2.png">
    </div>
    <div class="p-comment__wrapper">
        <div class="p-comment__item">
            <div class="p-prof__user-wrapper">
                <img class="c-profImage p-profImage__small" src=""> 
                <p class="c-userName p-userName__user-wrapper">P太郎</p>
            </div>
            <div class="p-comment__wrapper-right">
                    <time>2020/01/12 17:15</time>
                    <a>返信する</a>
                </div>
            <p class="p-comment__text">かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！</p>
        </div>
        <div class="p-comment__item replay">
            <div class="p-prof__user-wrapper">
                <img class="c-profImage p-profImage__small" src=""> 
                <p class="c-userName p-userName__user-wrapper">P太郎</p>
            </div>
            <div class="p-comment__wrapper-right">
                    <time>2020/01/12 17:15</time>
                    <a>返信する</a>
                </div>
            <p class="p-comment__text">かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！</p>
        </div>
        <div class="p-comment__item">
            <div class="p-prof__user-wrapper">
                <img class="c-profImage p-profImage__small" src=""> 
                <p class="c-userName p-userName__user-wrapper">P太郎</p>
            </div>
            <div class="p-comment__wrapper-right">
                    <time>2020/01/12 17:15</time>
                    <a>返信する</a>
                </div>
            <p class="p-comment__text">かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！かっこいいですね！！</p>
        </div>
    </div>
</main>
@endsection