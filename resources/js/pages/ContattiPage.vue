<template>
    <div class="container">
        <h1>Contatti</h1>
        <div class="alert alert-success" role="alert" v-if="(status)">
            Messaggio inviato con successo
        </div>

        <form @submit.prevent="sandMail()">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" :class="(error.name)?'is-invalid':''" id="name" v-model="name">

                <div class="invalid-feedback" v-for="(errors, index) in error.name" :key="index">
                    {{errors}}
                </div>
            </div>     

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" :class="(error.email)?'is-invalid':''" id="email" v-model="email">
            
                <div class="invalid-feedback" v-for="(errors, index) in error.email" :key="index">
                    {{errors}}
                </div>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" :class="(error.content)?'is-invalid':''" id="content" rows="6" v-model="content"></textarea>
                
                <div class="invalid-feedback" v-for="(errors, index) in error.content" :key="index">
                    {{errors}}
                </div>
            </div>

            <button class="btn btn-primary" type="button" disabled v-if="(disabledButton)">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </button>

            <button v-else type="submit" class="btn btn-primary">Submit</button>
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
                status: false,
                error: {},
                disabledButton: false,
            }
        },
        methods:{
            sandMail(){
                this.disabledButton = true;

                axios.post('/api/contacts', {
                    'name': this.name,
                    'email': this.email,
                    'content': this.content
                }).then(res =>{
                    this.status = res.data.status;
                    this.disabledButton = false;

                    if(this.status){
                        this.error = {};
                        this.name = '';
                        this.email = '';
                        this.content = '';
                    }else{
                        this.error = res.data.error;
                    }
                    console.log(res);
                });                
            }
        }
    }
</script>

<style>

</style>