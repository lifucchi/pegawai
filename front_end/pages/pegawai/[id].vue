<template>
    <showPegawai />

</template>
   
<script setup lang="ts">

import showPegawai from '~/components/showPegawai.vue'

   definePageMeta({
       middleware: 'auth' 
   })


</script>