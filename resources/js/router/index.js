import { createRouter, createWebHistory } from "vue-router";
//admin
import homeAdminIndex from "../components/admin/home/index.vue";
//pages
import homePageIndex from "../components/pages/home/index.vue";

import notFound from '../components/notFound.vue';


const routes = [
    //admin
    {
       path: '/admin/home',
       component:homeAdminIndex 
    },
    //pages
    {
        path: '/',
        component:homePageIndex
    },
    //not found
    {
        path: './:pathMatch(.*)*',
        component: notFound
    }
]
const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router