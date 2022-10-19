<template>
    <div class="container">
          <div class="card m-auto g-4 my_card" style="width: 40rem;" v-for="(post, index) in posts" :key="index">
              <img :src="post.cover" class="card-img-top">
              <div class="card-body">
                  <h5 class="card-title"><strong>Name: </strong>{{post.name}}</h5>
                  <p class="card-text"><strong>Content: </strong>{{post.content}}</p>
              </div>
          </div>
      </div>
</template>
  
<script>
      export default {
          name: 'OnePost',
          data(){
              return{
                  posts: [],
              }
          },
          methods:{
              Onepost(){
                  let slug = this.$route.params.slug;
                  
                  axios.get('/api/posts/' + slug)
                  .then(res =>{
                      this.posts = res.data.results;
                      console.log(res.data.results);
                  })
              }
          },
          mounted(){
              this.Onepost();
          },
      }
</script>
  
<style>
  
</style>