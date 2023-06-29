import { createRouter, createWebHistory } from 'vue-router'
import StarList from '../views/StarList.vue'
import StarEdit from '../views/StarEdit.vue'
import StarCreate from '../views/StarCreate.vue'
import StarListWithLink from '../views/StarListWithLink.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: StarList
    },
    {
      path: '/manage-star',
      name: 'manage-star',
      component: StarListWithLink
    },
    {
      path: '/manage-star/:id',
      name: 'edit-star',
      component: StarEdit
    },
    {
      path: '/manage-star/create',
      name: 'create-star',
      component: StarCreate
    }
  ]
})

export default router
