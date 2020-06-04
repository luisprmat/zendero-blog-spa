import Vue from 'vue'

import Router from 'vue-router';
import Home from './views/Home';
import About from './views/About';
import Archive from './views/Archive';
import Contact from './views/Contact';
import PostShow from './views/PostShow';
import CategoryPosts from './views/CategoryPosts';
import TagsPosts from './views/TagsPosts';
import NotFound from './views/404';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/nosotros',
            name: 'about',
            component: About
        },
        {
            path: '/archivo',
            name: 'archive',
            component: Archive
        },
        {
            path: '/contacto',
            name: 'contact',
            component: Contact
        },
        {
            path: '/blog/:url',
            name: 'post_show',
            component: PostShow,
            props: true
        },
        {
            path: '/categorias/:category',
            name: 'category_posts',
            component: CategoryPosts,
            props: true
        },
        {
            path: '/etiquetas/:tag',
            name: 'tags_posts',
            component: TagsPosts,
            props: true
        },
        {
            path: '*',
            component: NotFound
        }
    ],
    linkExactActiveClass: 'active',
    scrollBehavior() {
        return {x: 0, y: 0}
    }
});
