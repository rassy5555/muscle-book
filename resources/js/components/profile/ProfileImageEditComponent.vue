<template>
    <main class="l-container">
        <div class="p-form__wrapper">
            <img class="c-profImage p-profImage__edit" :src="preview_image" v-if="preview_image"> 
            <img class="c-profImage p-profImage__edit" :src="'storage/' + user.profile_image" v-else>
            <label class="c-label p-label__profile">画像を変更
                <input type="file" v-on:change="fileSelect" name="profile_image" style="display:none">
            </label>
            <div class="c-error p-error__profile-image" v-if="errors.profile_image">
                {{ errors.profile_image }}
            </div>
            <button class="c-button p-button__form" v-on:click="fileUpload">編集する</button>
            <p class="c-message" v-if="success_message">{{ success_message }}</p>
        </div>
    </main>
</template>
<script>
    export default {
        props:["user"],
        data: function(){
            return {
                file_info: '',
                preview_image: '',
                success_message: '',
                errors: {
                    profile_image: '',
                }
            }
        },
        methods: {
            fileSelect(event){
                console.log(event);
                this.errors = {
                    profile_image: '',
                };
                this.file_info = event.target.files[0];
                if(this.file_info){
                    const file = this.file_info
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.preview_image = e.target.result
                    }
                    reader.readAsDataURL(file);
                }
            },
            fileUpload: function(e) {
                const self = this;
                const formData = new FormData();
                formData.append('profile_image',this.file_info)
                axios.post('profileImageChange',formData).then(response =>{
                }).then(function(){
                    self.errors = []
                    self.success_message = 'プロフィール画像を編集しました'
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