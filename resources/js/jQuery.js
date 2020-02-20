$(function (){
    //スマホメニュー表示切替
    $('.js-toggle-sp-menu').on('click',function(){
        $(this).toggleClass('active');
        $('.js-toggle-sp-menu-target').toggleClass('active');
    });
})
