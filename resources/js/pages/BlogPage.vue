<template>
    <div class="container">
        <h1 class="my-4 text-center">Posts</h1>
        
        <!--Pulzanti avanti indietro tra i post-->
        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item" :class="(curretPage == 1)?'disabled':''">
                    <a class="page-link" href="#" @click.prevent="apiFunction(curretPage - 1)">Previous</a>
                </li>
                <li class="page-item" :class="(curretPage == lastPage)?'disabled':''">
                    <a class="page-link" href="#" @click.prevent="apiFunction(curretPage + 1)">Next</a>
                </li>
            </ul>
        </nav>

        <!--Spinner di caricamento post-->
        <div class="d-flex justify-content-center" v-if="spinner">
            <div class="spinner-border text-secondary" role="status">
                <span class="sr-only"></span>
            </div>
        </div>

        <!--Post-->
        <div class="card m-auto g-4 my_card" style="width: 40rem;" v-for="(post, index) in posts" :key="index" v-else>
            <img :src="post.cover" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><strong>Name: </strong>{{post.name}}</h5>
                <p class="card-text"><strong>Content: </strong>{{post.content}}</p>
                <p class="card-text"><strong>Category: </strong>{{post.category.name}}</p>
                <p v-for="(tag, index) in post.tags" :key="index" >Tag: {{tag.name}}</p>
                <router-link :to="{name: 'one-post', params: {slug: post.slug}}" class="btn btn-primary">More..</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'BlogPage',
        data(){
            return{
                posts: [],
                lastPage: null,
                curretPage: 1,
                spinner: true,
                params: '&page=',
            }
        },
        methods:{
            apiFunction(page){
                this.spinner = true;
                axios.get('/api/posts'+ params + page)
                .then(res => {
                    this.posts = res.data.results.data;

                    this.lastPage = res.data.results.last_page;
                    this.curretPage = res.data.results.current_page;

                    this.spinner = false;
                })
            },
        },
        mounted(){
            this.apiFunction(1);
        },
    }
</script>

<style>
.my_card{
        margin-bottom: 25px !important;
    }

</style>