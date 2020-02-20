<template>
    <main class="l-container">
        <h1 class="c-pageTitle">{{$t("password.passwordReminder")}}</h1>
        <div class="p-form__wrapper">
            <div class="p-form">
                <label class="c-label">{{$t("password.email")}}</label>
                <input class="c-formItem" name="email" v-model="email" >
                <div class="p-notes">入力したメールアドレスにリセットするためのメールが送信されます。</div>
                <div class="c-error" v-if="errors.email">
                    {{ errors.email }}
                </div>
            </div>
            <button class="c-button p-button__form" v-on:click="resetPassword">送信する</button>
            <p class="c-message" v-if="success_message">{{ success_message }}</p>
        </div>
    </main>
</template>
<script>
    export default {
        data: function(){
            return{
                email: '',
                success_message: '',
                errors: {
                    email: '',
                }
            }
        },
        methods: {
            //パスワードリマインダー用メール送信処理
            resetPassword: function(e){
                var self = this;
                this.errors = {
                    email:'',
                };
                axios.post('email',{
                    email: this.email,
                }).then(function(){
                    self.success_message = 'メールを送信しました';
                    self.erros = [];
                }).catch(function(error){
                    self.success_message = '';
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                 });
            },
        },        
    }
</script>