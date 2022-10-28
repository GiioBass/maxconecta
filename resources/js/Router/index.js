import {createRouter, createWebHistory} from 'vue-router';

const routes = [
    {
        path: '/home',
        name: 'home',
        component: () => import('@/pages/Home.vue')
    },
    {
        path: '/movies',
        name: '/movies',
        component: () => import('@/pages/Movies/index.vue')
    },
    {
        path: '/movies/create',
        name: 'movies.create',
        component: () => import('@/pages/Movies/create.vue')
    },
    {
        path: '/movies/edit/:id',
        name: '/movies/edit',
        component: () => import('@/pages/Movies/editPage.vue')
    },
    {
        path: '/users',
        name: '/users',
        component: () => import('@/pages/Users/index.vue')
    },
    {
        path: '/users/create',
        name: 'users.create',
        component: () => import('@/pages/Users/create.vue')
    },
    {
        path: '/users/edit/:id',
        name: '/users/edit',
        component: () => import('@/pages/Users/editPage.vue')
    }

]

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: "active",
    routes
});

export default router
