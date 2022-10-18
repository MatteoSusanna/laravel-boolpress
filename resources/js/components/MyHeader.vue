<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm my_nav">
            <div class="container">
                    <a class="navbar-brand" href="/">BoolPress</a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item" v-for="(nav, index) in navItems" :key="index">
                                <a class="nav-link" :href="nav.link">{{nav.name}}</a>
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
                           name: 'Post',
                           link: '#'
                        },
                        {
                           name: 'Blog',
                           link: '#'
                        },
                        {
                           name: 'News',
                           link: '#'
                        },
                        {
                           name: 'Chi siamo',
                           link: '#'
                        },
                    ],
            }
        }
    }
</script>

<style>
</style>