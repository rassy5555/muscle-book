<template>
    <main class="l-container">
        <div class="p-pageTitle__wrapper">
            <h2 class="c-pageTitle p-pageTitle__switch" v-bind:class="{'active': this.edit_mode == 'profile'}" v-on:click="changeMode('profile')">{{$t("profile.profile")}}</h2>
            <h2 class="c-pageTitle p-pageTitle__switch" v-bind:class="{'active': this.edit_mode == 'profileImage'}" v-on:click="changeMode('profileImage')">プロフィール画像</h2>
            <h2 class="c-pageTitle p-pageTitle__switch" v-bind:class="{'active': this.edit_mode == 'password'}" v-on:click="changeMode('password')">パスワード</h2>
        </div>
        <profile-edit-component :props_user="user" v-if="edit_mode == 'profile'"></profile-edit-component>
        <profile-image-edit-component :user="user" v-else-if="edit_mode == 'profileImage'"></profile-image-edit-component>
        <password-change-component :props_user="user" v-else-if="edit_mode == 'password'"></password-change-component>
    </main>
</template>

<script>
    export default {
        props: ['user'],
        data: function(){
            return {
                edit_mode: 'profile'
            }
        },
        methods: {
            changeMode: function(mode){
                this.edit_mode = mode;
            }
        }
    }
</script>