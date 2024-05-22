import Home from '../src/pages/HomePage.vue'
import Genres from '../src/pages/Genre.vue'
import Books from '../src/pages/Book.vue'
import About from '../src/pages/About.vue'
import Faq from '../src/pages/Faq.vue'
import Login from '../src/pages/Login.vue'
import Register from '../src/pages/Register.vue'
import Dashboard from '../src/pages/Dashboard.vue'

import BookDetail from '../src/pages/BookDetail.vue'
import File from '../src/pages/BookFile.vue'

//Dashboard
import Profile from '../src/pages/Dashboard/Profile.vue'
import Collection from '../src/pages/Dashboard/Collection.vue'
import Publish from '../src/pages/Dashboard/Publish.vue'
import Transaction from '../src/pages/Dashboard/Transaction.vue'

import Landing from '../src/pages/LandingPage.vue'

const routes = [
    {
        path: '/',
        component: Landing,
        name: 'landing'
    },
    {
        path: '/home',
        component: Home,
        name: 'home'
    },
    {
        path: '/genres',
        component: Genres,
        name: 'genres'
    },
    {
        path: '/genres/:genre',
        component: Books,
        name: 'genres.genre'
    },
    {
        path: '/about',
        component: About,
        name: 'about'
    },
    {
        path: '/faq',
        component: Faq,
        name: 'faq'
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem('access_token')) {
                return next({ name: 'dashboard' })
            }
            next()
        }
    },
    {
        path: '/register',
        component: Register,
        name: 'register',
        beforeEnter: (to, from, next) => {
            if (localStorage.getItem('access_token')) {
                return next({ name: 'dashboard' })
            }
            next()
        }
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard',
        beforeEnter: (to, from, next) => {
            if (!localStorage.getItem('access_token')) {
                return next({ name: 'login' })
            }
            next()
        },
        children: [
            {
                path: 'profile',
                component: Profile,
                name: 'profile'
            },
            {
                path: 'collection',
                component: Collection,
                name: 'collection'
            },
            {
                path: 'publish',
                component: Publish,
                name: 'publish'
            },
            {
                path: 'transaction',
                component: Transaction,
                name: 'transaction'
            },
            // {
            //     path: 'file',
            //     component: File,
            //     name: 'file'
            // },
            {
                path: 'collection/:file',
                component: File,
                name: 'collection.file'
            }
        ]
    },
    {
        path: '/book-detail/:book',
        component: BookDetail,
        name: 'bookDetail.book'
    }
]

export default routes
