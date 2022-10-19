import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage';
import BlogPage from './pages/BlogPage';
import ContattiPage from './pages/ContattiPage';
import NewsPage from './pages/NewsPage';
import OnePost from './pages/OnePost';
import ErrorPage from './pages/ErrorPage';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogPage
        },
        {
            path: '/blog/:slug',
            name: 'one-post',
            component: OnePost
        },
        {
            path: '/contatti',
            name: 'contatti',
            component: ContattiPage
        },
        {
            path: '/news',
            name: 'news',
            component: NewsPage
        },
        {
            path: '/*',
            name: 'error-404',
            component: ErrorPage
        },
    ] 
});

export default router;
