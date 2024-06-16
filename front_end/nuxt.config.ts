// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  app: {
    head: {
      // link: [{ rel: 'stylesheet', href: 'https://cdn.jsdelivr.net/npm/@docsearch/css@3' }]
      charset: 'utf-8',
      viewport: 'width=device-width, initial-scale=1',
    }
  },
  css: [
    '~/public/css/bootstrap.min.css',
    '~/public/css/sign.css'
  ],
})
