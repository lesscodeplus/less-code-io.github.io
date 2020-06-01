import Vue from 'vue'
import VueRouter from 'vue-router'

const HomePage = () => import('./pages/HomePage');
const FeaturesPage = () => import('./pages/FeaturesPage');
const DocPage = () => import('./pages/DocPage');
const PricingPage = () => import('./pages/PricingPage');
const ContactPage = () => import('./pages/ContactPage');
const PolicyPage = () => import('./pages/PolicyPage');
const TermsPage = () => import('./pages/TermsPage');
const ConfirmAccountPage = () => import('./pages/ConfirmAccountPage');
const ResetPasswordPage = () => import('./pages/ResetPasswordPage');
const AccountPage = () => import('./pages/AccountPage');

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
  { path: '/account', component: AccountPage },
]

export default  new VueRouter({
  routes 
})
