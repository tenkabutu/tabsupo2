import Vue from 'vue'
import VueRouter from 'vue-router'
import SystemError from './pages/errors/System.vue'

// ページコンポーネントをインポートする
import PhotoList from './pages/PhotoList.vue'
import Login from './pages/Login.vue'
import DeviceList from './pages/DeviceList.vue'
import TaskList from './pages/TaskList.vue'
import DeviceDetail from './pages/DeviceDetail.vue'
import TaskReception from './pages/TaskReception.vue'


import store from './store'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/photo',
    component: PhotoList,
    beforeEnter (to, from, next) {
    	if (store.getters['auth/check']) {
      	next()
    	} else {
      	next('/login')
    	}
  	}
  },
  {
    path: '/',
    component: DeviceList,
    props: route => {
      const page = route.query.page
      return { page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1 }
    },
    beforeEnter (to, from, next) {
    	if (store.getters['auth/check']) {
      	next()
    	} else {
      	next('/login')
    	}
  	}

  },
  {
    path: '/task',
    component: TaskList,
    props: route => {
      const page = route.query.page
      return { page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1 }
    },
    beforeEnter (to, from, next) {
    	if (store.getters['auth/check']) {
      	next()
    	} else {
      	next('/login')
    	}
  	}

  },
  {
    path: '/reception',
    component: TaskReception,
    props: route => {
      const page = route.query.page
      return { page: /^[1-9][0-9]*$/.test(page) ? page * 1 : 1 }
    },
    beforeEnter (to, from, next) {
    	if (store.getters['auth/check']) {
      	next()
    	} else {
      	next('/login')
    	}
  	}

  },
  {
    path: '/login',
    component: Login,
    beforeEnter (to, from, next) {
    	if (store.getters['auth/check']) {
      	next('/')
    	} else {
      	next()
    	}
  	}
  },
  {
  path: '/devices/:id',
  component: DeviceDetail,
  props: true
},
  {
    path: '/500',
    component: SystemError
  }
]

// VueRouterインスタンスを作成する
const router = new VueRouter({
	mode: 'history',
  routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router