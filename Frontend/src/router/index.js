import { createRouter, createWebHistory } from 'vue-router'
import { setTitle } from '@/router/guards/SetTitleGuard.mjs'
import { AuthGuard } from './guards/AuthGuard.mjs'
export const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'main',
      component: () => import('@pages/MainPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Főoldal'
      }
    },
    {
      path: '/training',
      name: 'training',
      component: () => import('@pages/TrainingPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Mozgás'
      }
    },
    {
      path: '/eating',
      name: 'eating',
      component: () => import('@pages/EatingPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Táplálkozás'
      }
    },
    {
      path: '/sleep',
      name: 'sleep',
      component: () => import('@pages/SleepPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Alvás'
      }
    },
    {
      path: '/other',
      name: 'other',
      component: () => import('@pages/OtherPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Pulzus és vérnyomás'
      }
    },
    {
      path: '/aboutus',
      name: 'aboutus',
      component: () => import('@pages/AboutUsPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Rólunk'
      }
    },
    {
      path: '/user',
      name: 'user',
      component: () => import('@pages/UserPage.vue'),
      meta: {
        requiresAuth: true,
        title: 'Felhasználó'
      }
    },
    {
      path: '/create-measure',
      name: 'create-measure',
      component: () => import('@pages/CreateMeasurePage.vue'),
      meta: {
        requiresAuth: true,
        title: 'Új Mérés'
      }
    },
    {
      path: '/edit-measure/:id',
      name: 'edit-measure',
      component: () => import('@pages/EditMeasurePage.vue'),
      meta: {
        requiresAuth: true,
        title: 'Mérés módisítása'
      }
    },
    {
      path: '/summary',
      name: 'summary',
      component: () => import('@pages/SummaryPage.vue'),
      meta: {
        requiresAuth: true,
        title: 'Méréseid'
      }
    },
    {
      path: '/sign-in',
      name: 'sign-in',
      component: () => import('@pages/SignInPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Regisztráció'
      }
    },
    {
      path: '/log-in',
      name: 'log-in',
      component: () => import('@pages/LogInPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Bejelentkezés'
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: "not-found",
      component: () => import('@pages/NotFoundPage.vue'),
      meta: {
        requiresAuth: false,
        title: 'Bejelentkezés'
      }
    },
    {
      path: '/calculator',
      name: 'calculator',
      component: () => import('@pages/CalculatorPage.vue'),
      meta: {
        requiresAuth: true,
        title: 'Kalkulátor'
      }
    }
  ]
})

router.beforeEach(AuthGuard)
router.beforeEach(setTitle)
