import CategoryList from './components/CategoryList.vue';
import CategoryShow from './components/CategoryShow.vue';
import TestShow from './components/TestShow.vue';


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
    },
    {
        name: 'test',
        path: '/test/:id',
        component: TestShow
    }
];
