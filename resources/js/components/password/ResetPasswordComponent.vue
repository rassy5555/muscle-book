<template>
    <main class="l-container">
        <h1 class="c-pageTitle">{{$t("password.passwordReminder")}}</h1>
        <div class="p-form__wrapper">
            <div class="p-form">
                <label class="c-label">{{$t("password.email")}}</label>
                <input class="c-formItem" name="email" v-model="email" >
                <div class="c-error" v-if="errors.email">
                    {{ errors.email }}
                </div>
                <div class="c-error" v-if="errors.token">
                    {{ errors.token }}
                </div>
            </div>
            <div class="p-form">
                <label class="c-label">{{$t("password.password")}}</label>
                <input class="c-formItem" name="password" v-model="password" type="password">
                <div class="c-error" v-if="errors.password">
                    {{ errors.password }}
                </div>
            </div>
            <div class="p-form">
                <label class="c-label">{{$t("password.password_confirmation")}}</label>
                <input class="c-formItem" name="password_confirmation" v-model="password_confirmation" type="password">
                <div class="c-error" v-if="errors.password_confirmation">
                    {{ errors.password_confirmation }}
                </div>
            </div>
            <button class="c-button p-button__form" v-on:click="resetPassword">変更する</button>
        </div>
    </main>
</template>
<script>
    export default {
        props:['token'],
        data: function(){
            return{
                email: '',
                password: '',
                password_confirmation: '',
                errors: {
                    token: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                }
            }
        },
        methods: {
            //パスワードリセット処理
            resetPassword: function(e){
                var self = this;
                this.errors = {
                    token:'',
                    email:'',
                    password: '',
                    password_confirmation: '',
                };
                axios.post('../reset',{
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                    token: this.token,
                }).then(function(){
                    self.erros = [];
                    location.href = '/../home'
                }).catch(function(error){
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
        },        
    }
</script>