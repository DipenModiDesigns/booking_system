
import { createRouter, createWebHashHistory } from "vue-router";

import list from './components/list.vue';
import create from './components/create.vue';
import edit from './components/edit.vue';
import view from './components/view.vue';

const routes = [
    {
        name: 'list',
        path: '/',
        component: list
    },
    {
        name: 'create',
        path: '/create',
        component: create
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: edit
    },
    {
        name: 'view',
        path: '/view/:id',
        component: view
    }
];

const router = createRouter({
    mode: 'history',
    history: createWebHashHistory(),
    routes, 
    linkActiveClass: "active",
});

export default router;