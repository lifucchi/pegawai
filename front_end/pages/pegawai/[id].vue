<template>
    <showPegawai />

</template>
   
<script setup lang="ts">

import showPegawai from '~/components/showPegawai.vue'
useHead({
  title: 'Pegawai'
});
   definePageMeta({
       middleware: 'auth' 
   })


</script>