<template>
    <div>
        <section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          Pegawai PNS    
      </a>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Register to your account
              </h1>
              <form class="space-y-4 md:space-y-6" action="#">
                <div>
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                      <input v-model="user.name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rifka Annisa" required>
                  </div>
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                      <input v-model="user.email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input v-model="user.password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                      <input v-model="user.password_confirm" type="password" name="password_confirm" id="password_confirm" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  </div>
                  <div class="flex items-center justify-between">
                  </div>
                  <button v-if="agreement"
                    @click.prevent="signup"
                    :disabled="!agreement"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800">
                    Sign up
                </button>
                <button v-else
                        class="w-full text-white bg-gray-400 cursor-not-allowed hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-400 dark:hover:bg-gray-400 dark:focus:ring-gray-300">
                    Sign up
                </button>                  <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input @click="agree" id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required>
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Dengan mendaftar, Anda membuat akun  dan menyetujui Syarat Penggunaan serta Kebijakan Privasi</label>
                          </div>
                      </div>

                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      You have an account ?  <NuxtLink to="/login"class="font-medium text-primary-600 hover:underline dark:text-primary-500"> Sign In</NuxtLink>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
    </div>
</template>

<script setup>
useHead({
  title: 'SignUp'
});
  
    const user = ref({
        name: '',
        email: '',
        password: '',
        password_confirm: '',
    });

    const agreement = ref(false);

    definePageMeta({
        middleware: 'authsignup' 
    })
    
    async function signup(){
        const result = await $fetch(`http://127.0.0.1:8000/api/register`, {
                    method: "POST",
                    body: {
                        name: user.value.name,
                        email: user.value.email,
                        password: user.value.password,
                        c_password: user.value.password_confirm
                    }
                });
                if (result.success == true){
                    const router = useRouter();
                    router.push('/');
                }

    }

    function agree(){
        agreement.value = !agreement.value;

    }

</script>