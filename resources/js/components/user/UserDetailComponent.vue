<template>
    <main class="l-container">
        <div class="p-prof__wrapper">
            <img class="c-profImage" src=""> 
            <div class="p-prof__wrapper-right">
                <p class="c-userName">{{ user.name }}</p>
                <div class="p-prof__follow-wrapper">
                    <a class="p-prof__follows"><label>フォロー</label> 3000人</a>
                    <a class="p-prof__follows"><label>フォロワー</label> 50000人</a>
                </div>
                <div class="p-button__wrapper">
                    <button class="c-button u-m0__sp" v-on:click="follow">フォローする</button>
                </div>
            </div>
        </div>
        <p class="p-prof__comment">{{ user.comment }}</p>
        <div class="p-image__wrapper">
            <img class="c-image">
            <img class="c-image">
            <img class="c-image">
            <img class="c-image">
            <img class="c-image">
            <img class="c-image">
        </div>
    </main>
</template>
<script>
    export default {
        props:['user'],
        data: function(){
            return {
            }
        },
        methods: {
            follow: function(e){
                axios.post('../follow',{
                    follower_id : this.user.id,
                }).then(response =>{
                }).then(function(){
                }).catch(function(error){
                });            
            }
        }
    }
</script>