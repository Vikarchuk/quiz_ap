import CategoryList from './components/CategoryList.vue';
import CategoryShow from './components/CategoryShow.vue';


export const routes = [
    {
        name: 'home',
        path: '/',
        component: CategoryList
    },
    {
        name: 'show',
        path: '/show/:id',
        component: CategoryShow
    }
];
