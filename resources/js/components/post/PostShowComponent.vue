<template>
<main class="l-container">
  <croppa
          initial-image="https://zhanziyang.github.io/vue-croppa/static/500.jpeg">
  </croppa>
  <button @click="generateImage">Output</button>
  <img :width=300 :height=300 :src="imgUrl">
        <h1 class="c-pageTitle">{{$t("post.postPicture")}}</h1>
        <div class="p-image__wrapper">
            <div class="p-image__item" v-for="(value,key,index) in images">
                <croppa class="c-image" v-model="myCroppa[index]" canvas-color="transparent" :prevent-white-space="true"></croppa>
                <button @click="generateImage('image/jpeg')">画像作成</button>
                <img class="c-image" :src="preview_image[key]" v-if="preview_image[key]">
                <img class="c-image" src="/storage/no-image2.png" v-else>
                <p>{{ index }}</p>
                <label class="c-label">画像を変更
                    <input type="file" v-on:change="fileSelect(key,arguments[0])" style="display:none" name="image">
                </label>           
            </div>
        </div>
        <div class="p-form__comment">
            <label class="c-label">コメント</label>
            <textarea class="c-formItem p-formItem__comment" name="comment" v-model="comment"></textarea>
            <label class="c-label">{{ commentCount }}/200文字</label>
            <div class="c-error" v-if="errors.comment">
                {{ errors.comment }}
            </div>
        </div>
        <button class="c-button" v-on:click="post">{{$t("post.post")}}</button>
    </main>
</template>

<script>
    export default {
        data: function(){
            return {
                myCroppa: {
                    image1: '',
                },
                imgUrl: '',
                comment: '',
                images: {
                    image1: '',
                    image2: '',
                    image3: '',
                },
                preview_image: {
                    image1: '',
                    image2: '',
                    image3: ''
                },
                errors: {
                    comment: ''
                }
            }
        },
        computed: {
            commentCount: function(e){
                return this.comment.length;
            }
        },
        methods: {
            generateImage: function() {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.preview_image[0] = e.target.result;
                }
                reader.readAsDataURL(this.nyCroppa[0]);

                console.log(this.myCroppa[0]);
                const url = this.myCroppa[0].generateDataUrl()
                if (!url) {
                alert('no image')
                return
                }
                this.imgUrl = url
                console.log(url.length);
            },
            fileSelect: function(key,e){
                this.images[key] = e.target.files[0];
                if(this.images[key]){
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.preview_image[key] = e.target.result;
                    }
                    reader.readAsDataURL(this.images[key]);
                }
            },
            post: function(e){
                const self = this;
                const formData = new FormData();
                formData.append('myCroppa',this.imgUrl);
                formData.append('comment',this.comment);
                formData.append('image1',this.images.image1);
                formData.append('image2',this.images.image2);
                formData.append('image3',this.images.image3);
                axios.post('post',formData).then(function(){

                }).catch(function(error){
                    for(var key in error.response.data.errors) {
                        self.errors[key] = error.response.data.errors[key][0];
                    }
                });
            }
        }
    }
    //     export default {
    //     data: function(){
    //         return {
    //             myCroppa: null,
    //             comment: '',
    //             images: {
    //                 image1: '',
    //                 image2: '',
    //                 image3: '',
    //             },
    //             preview_image: {
    //                 image1: '',
    //                 image2: '',
    //                 image3: ''
    //             },
    //             errors: {
    //                 comment: ''
    //             }
    //         }
    //     },
    //     computed: {
    //         commentCount: function(e){
    //             return this.comment.length;
    //         }
    //     },
    //     methods: {
    //         fileSelect: function(key,e){
    //             this.images[key] = e.target.files[0];
    //             if(this.images[key]){
    //                 const reader = new FileReader();
    //                 reader.onload = (e) => {
    //                     this.preview_image[key] = e.target.result;
    //                 }
    //                 reader.readAsDataURL(this.images[key]);
    //             }
    //         },
    //         post: function(e){
    //             const self = this;
    //             const formData = new FormData();
    //             formData.append('comment',this.comment);
    //             formData.append('image1',this.images.image1);
    //             formData.append('image2',this.images.image2);
    //             formData.append('image3',this.images.image3);
    //             axios.post('post',formData).then(function(){

    //             }).catch(function(error){
    //                 for(var key in error.response.data.errors) {
    //                     self.errors[key] = error.response.data.errors[key][0];
    //                 }
    //             });
    //         }
    //     }
    // }
</script>

