import Vue from 'vue'
import Router from 'vue-router'

//example
//import ExampleComponent from '../components/ExampleComponent.vue'

import loadingSpinner from '../components/vuex_loading/spinner.vue';
import appContent from '../components/landing/AppContent.vue';
import navBar from '../components/landing/NavBar.vue';
import home from '../components/landing/Home.vue';
import services from '../components/landing/Services.vue';
import visas from '../components/landing/detailVisas.vue';
import process from '../components/landing/Process.vue';
import about from '../components/landing/About.vue';
import contact from '../components/landing/Contact.vue';
import foot from '../components/landing/Foot.vue';
import testimony from '../components/landing/Testimony.vue';
import modal from '../components/layouts/Modal.vue';
import login from '../components/auth/login.vue';
import setpassword from '../components/auth/setPassword.vue';
import index from '../components/index.vue';
import resetpassword from '../components/auth/resetpassword.vue';
import users from '../components/user/Users.vue';
import listClientes from '../components/customers/list.vue';
import listCases from '../components/cases/list.vue';
import createCase from '../components/cases/createCase.vue';
import listAssist from '../components/assistants/list.vue';


Vue.use(Router)

Vue.component('loadingSpinner', loadingSpinner);
Vue.component('appContent',appContent);
Vue.component('navBar',navBar);
Vue.component('home',home);
Vue.component('services',services);
Vue.component('visas',visas);
Vue.component('process',process);
Vue.component('about',about);
Vue.component('contact',contact);
Vue.component('foot',foot);
Vue.component('testimony',testimony);
Vue.component('modal',modal);
Vue.component('login',login);

Vue.component('new-process', require('../components/creates/New_process.vue'));
Vue.component('new-services', require('../components/creates/New_services.vue'));
Vue.component('new-contact', require('../components/creates/New_contact.vue'));
Vue.component('new-visa', require('../components/creates/New_visa.vue'));
Vue.component('create-user', require('../components/user/create/CreateUser.vue'));

Vue.component('resset-password',resetpassword);


let router = new Router({
    mode:'history',
    routes: [
        { 
            path: '/',
            name: 'appContent',
            component: appContent
        },
        { 
            path: '/login/',
            name: 'login',
            component: login
        },
        { 
            path: '/setpassword/',
            name: 'setpassword',
            component: setpassword
        }  , 
        { 
            path: '/home/',
            name: 'index',
            component: index
        }, 
        { 
             path: '/password/reset/:hash',
             name: 'resetpassword',
             component: resetpassword
         },
         {
             path: '/users/',
             name: 'Users',
             component: users
         },
         { 
             path: '/clients',
             name: 'clients',
             component: listClientes
         },
         { 
             path: '/cases',
             name: 'cases',
             component: listCases
         }
         ,
         { 
             path: '/createCase',
             name: 'createCase',
             component: createCase
         },
         { 
             path: '/createCase',
             name: 'createCase',
             component: createCase
         },
         { 
             path: '/listAssist',
             name: 'listAssist',
             component: listAssist
         },       
    ]
})

export default router