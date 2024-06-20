<template>

    <formPegawai />

   
</template>
   
<script setup lang="ts">

import formPegawai from '~/components/formPegawai.vue'
useHead({
  title: 'Pegawai'
});
   definePageMeta({
       middleware: 'auth' // this should match the name of the file inside the middleware directory 
   })


</script>