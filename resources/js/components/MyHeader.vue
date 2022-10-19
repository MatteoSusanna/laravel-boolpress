<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm my_nav">
            <div class="container">
                    <router-link class="navbar-brand" :to="{name: 'home'}">BoolPress</router-link>
                    
                    

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item mr-2" v-for="(nav, index) in navItems" :key="index">
                                <router-link class="nav-link" :to="{name: nav.linkRouter}"><i :class="nav.fontawesome" class="mr-1"></i>{{nav.name}}</router-link>
                            </li>
                        </ul>
                    </div>

            </div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Area Amministrativa</a>
                </li>
            </ul>
    </nav>
</template>

<script>
    export default {
        name: 'MyHeader',
        data(){
            return{
                navItems: [
                        {
                           name: 'Home',
                           linkRouter: 'home', 
                           fontawesome: 'fa-solid fa-house'
                        },
                        {
                           name: 'Blog',
                           linkRouter: 'blog',
                           fontawesome: 'fa-solid fa-signs-post'
                        },
                        {
                           name: 'Info',
                           linkRouter: 'news',
                           fontawesome:'fa-solid fa-circle-info'
                        },
                        {
                           name: 'Contatti',
                           linkRouter: 'contatti',
                           fontawesome: 'fa-solid fa-address-book'
                        },
                    ],
            }
        }
    }
</script>

<style>

</style>