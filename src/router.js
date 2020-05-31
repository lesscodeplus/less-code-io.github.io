import Vue from 'vue'
import VueRouter from 'vue-router'

import HomePage from './pages/HomePage'
import FeaturesPage from './pages/FeaturesPage'
import DocPage from './pages/DocPage'
import PricingPage from './pages/PricingPage'
import ContactPage from './pages/ContactPage'
import PolicyPage from './pages/PolicyPage'
import TermsPage from './pages/TermsPage'
import ConfirmAccountPage from './pages/ConfirmAccountPage'
import ResetPasswordPage from './pages/ResetPasswordPage'


Vue.use(VueRouter)

const routes = [
  { path: '/', component: HomePage },
  { path: '/features', component: FeaturesPage },
  { path: '/documentation', component: DocPage },
  { path: '/pricing', component: PricingPage },
  { path: '/contact', component: ContactPage },
  { path: '/privacy', component: PolicyPage },
  { path: '/terms', component: TermsPage },
  { path: '/confirm', component: ConfirmAccountPage },
  { path: '/reset-password', component: ResetPasswordPage },
]

export default  new VueRouter({
  routes 
})
