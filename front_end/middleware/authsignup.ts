import { useAuthStore } from '~/stores/useAuthStore';

export default defineNuxtRouteMiddleware((to, from) => {
  const { authenticated } = storeToRefs(useAuthStore()); // make authenticated state reactive
  const token = useCookie("token"); // get token from cookies

  if (token.value) {
    // check if value exists
    authenticated.value = true; // update the state to authenticated
  }

//   if (!token.value && to?.name === 'signup') {
//     abortNavigation();
//     return navigateTo('/signup');
//   }

  if (token.value && to?.name === 'signup') {
    return navigateTo('/');
  }


});