<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm my_nav">
            <div class="container">
                    <a class="navbar-brand" href="/">BoolPress</a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item" v-for="(nav, index) in navItems" :key="index">
                                <router-link class="nav-link" :to="{name: nav.linkRouter}">{{nav.name}}</router-link>
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
                           fontawesome: ''
                        },
                        {
                           name: 'Blog',
                           linkRouter: 'blog'
                        },
                        {
                           name: 'News',
                           linkRouter: 'news'
                        },
                        {
                           name: 'Contatti',
                           linkRouter: 'contatti'
                        },
                    ],
            }
        }
    }
</script>

<style>
</style>