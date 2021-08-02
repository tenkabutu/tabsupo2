import VueRouter from 'vue-router';
import HeaderComponent from "./components/HeaderComponent";
import TaskListComponent from "./components/TaskListComponent";
import TaskShowComponent from "./components/TaskShowComponent";
import TaskCreateComponent from "./components/TaskCreateComponent";
import TaskEditComponent from "./components/TaskEditComponent";
import LoginComponent from "./components/LoginComponent";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueRouter);

const router = new VueRouter({
     mode: 'history',
     routes: [
         {
             path: '/tasks',
             name: 'task.list',
             component: TaskListComponent
         },
         {
         	path: '/tasks/create',
         	name: 'task.create',
         	component: TaskCreateComponent
         },
         {
         	path: '/tasks/:taskId',
         	name: 'task.show',
         	component: TaskShowComponent,
         	props: true
         },
         {
         	path: '/tasks/:taskId/edit',
         	name: 'task.edit',
         	component: TaskEditComponent,
         	props: true
         },
         {
         	path: '/login',
         	name: 'login',
         	component: LoginComponent,
         	props: true
         },
     ]
 });

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', HeaderComponent);


const app = new Vue({
    el: '#app',
    router
});
