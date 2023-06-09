import { createRouter, createWebHistory } from 'vue-router'

import hello from './components/hello.vue'
import start from './components/pages/start.vue'
import test from './components/pages/test.vue'
import free from './components/pages/free.vue'
import conditions from './components/pages/conditions.vue'
import contacts from './components/pages/contacts.vue'
import checkCertificate from './components/pages/check_certificate.vue'
import tmp from './components/pages/tmp.vue'

const routes = [
    {
        name: null,
        path: '/',
        component: hello
    },
    {
        name: null,
        path: '/start',
        component: start
    },
    {
        name: 'test & start',
        path: '/test',
        component: test
    },
    {
        name: 'free',
        path: '/free',
        component: free
    },
    {
        name: 'conditions',
        path: '/conditions',
        component: conditions
    },
    {
        name: 'contacts',
        path: '/contacts',
        component: contacts
    },
    {
        name: 'check cert',
        path: '/check_certificate',
        component: checkCertificate
    },
    {
        name: '',
        path: '/tmp',
        component: tmp
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})
export default router
