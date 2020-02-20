<template>
    <main class="l-container">
        <div class="p-form__wrapper">
            <div class="p-form">
                <label class="c-label">名前</label>
                <input class="c-formItem" name="name" v-model="user.name" >
                <div class="c-error" v-if="errors.name">
                    {{ errors.name }}
                </div>
            </div>
            <div class="p-form">
                <label class="c-label">Eメール</label>
                <input class="c-formItem" name="email" v-model="user.email" >
                <div class="c-error" v-if="errors.email">
                    {{ errors.email }}
                </div>
            </div>
            <div class="p-form">
                <label class="c-label">身長(cm)</label>
                <input class="c-formItem" name="height" v-model="user.height" type="number" step="0.1" >
                <div class="c-error" v-if="errors.height">
                    {{ errors.height }}
                </div>
            </div>
            <div class="p-form">
                <label class="c-label">体重(kg)</label>
                <input class="c-formItem" name="weight" v-model="user.weight" type="number" step="0.1" >
                <div class="c-error" v-if="errors.weight">
                    {{ errors.weight }}
                </div>
            </div>
            <div class="p-form__comment">
                <label class="c-label">コメント</label>
                <textarea class="c-formItem p-formItem__comment" name="comment" v-model="user.comment"></textarea>
                <label class="c-label">{{ commentCount }}/200文字</label>
                <div class="c-error" v-if="errors.comment">
                    {{ errors.comment }}
                </div>
            </div>
            <button class="c-button p-button__form" v-on:click="profileEdit">編集する</button>
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
                    name: '',
                    email: '',
                    height: '',
                    weight: '',
                    comment: '',
                }
            }
        },
        computed: {
            commentCount: function(e){
                if(this.user.comment === null) {
                    this.user.comment = '';
                }
                return this.user.comment.length;
                
            }
        },
        methods: {
            profileEdit: function(e){
                const self = this;
                this.errors = {
                    name: '',
                    email: '',
                    height: '',
                    weight: '',
                    comment: ''
                };
                axios.post('profileEdit',{
                    name: self.user.name,
                    email: self.user.email,
                    height: self.user.height,
                    weight: self.user.weight,
                    comment: self.user.comment
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