<template>
    <div class="container">
        <h1>Contatti</h1>

        <form @submit.prevent="sandMail()">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" v-model="name">
            </div>     

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" v-model="email">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="6" v-model="content"></textarea>
            </div>

            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'ContattiPage',
        data(){
            return{
                name: '',
                email: '',
                content: '',
            }
        },
        methods:{
            sandMail(){

                axios.post('/api/contacts', {
                    'name': this.name,
                    'email': this.email,
                    'content': this.content
                }).then(res =>{
                    console.log(res);
                });                
            }
        }
    }
</script>

<style>

</style>