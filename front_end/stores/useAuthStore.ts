import { defineStore } from 'pinia';
import axios from 'axios';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null as object | null,
    authenticated: false,
  }),
  actions: {
    async authenticateUser(credentials: { email: string, password: string }) {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/login', {
          email: credentials.email,
          password: credentials.password,
        });

        console.log("klik login")

        if(response.data.data.token){
            const token = useCookie('token'); // useCookie new hook in nuxt 3
            token.value = response.data.data.token; // set token to cookie
            this.authenticated = true; // set authenticated  state value to true        }
            const router = useRouter();
            router.push('/');
        }

        // this.token = response.data.access_token;
        // await this.fetchUser();
      } catch (error) {
        console.error('Login error:', error);
      }
    },
    async fetchUser() {
    //   if (!this.token) return;
      
    //   try {
    //     const response = await axios.get('http://your-passport-server.com/api/user', {
    //       headers: {
    //         Authorization: `Bearer ${this.token}`,
    //       },
    //     });
    //     this.user = response.data;
    //   } catch (error) {
    //     console.error('Fetch user error:', error);
    //   }
    },
    logUserOut() {
        const token = useCookie('token'); // useCookie new hook in nuxt 3
        this.authenticated = false; // set authenticated  state value to false
        token.value = null; // clear the token cookie
      },
  },
});