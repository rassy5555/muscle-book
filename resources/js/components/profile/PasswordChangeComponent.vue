<template>
    <main class="l-container">
        <div class="p-form__wrapper">
            <div class="p-form">
                <label class="c-label">古いパスワード</label>
                <input class="c-formItem" name="old_password" v-model="user.old_password" >
                <div class="c-error" v-if="errors.old_password">
                    {{ errors.old_password }}
                </div>
            </div>
            <div class="p-form">
                <label class="c-label">パスワード</label>
                <input class="c-formItem" name="password" v-model="user.password" >
                <div class="c-error" v-if="errors.password">
                    {{ errors.password }}
                </div>
            </div>
            <div class="p-form">
                <label class="c-label">パスワード(再入力)</label>
                <input class="c-formItem" name="password_confirmation" v-model="user.password_confirmation" >
                <div class="c-error" v-if="errors.password_confirmation">
                    {{ errors.password_confirmation }}
                </div>
            </div>
            <button class="c-button p-button__form" v-on:click="passwordChange">編集する</button>
            <p class="c-message" v-if="success_message">{{ success_message }}</p>
        </div>
    </main>
</template>
<script>
    export default {
        props:["props_user"],
        data: function(){
            return {
                user: this.props_user,
                success_message: '',
                errors: {
                    old_password: '',
                    password: '',
                    password_confirmation: '',
                }
            }
        },
        methods: {
            passwordChange: function(e){
                const self = this;
                self.errors = {
                    old_password: '',
                    password: '',
                    password_confirmation: '',
                };
                axios.post('passwordChange',{
                    old_password: self.user.old_password,
                    password: self.user.password,
                    password_confirmation: self.user.password_confirmation,
                }).then(function(){
                    self.errors = []
                    self.success_message = 'プロフィールを編集しました'
                }).catch(function(error){
                    self.success_message = ''
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                });
            }
        }
    }
</script>