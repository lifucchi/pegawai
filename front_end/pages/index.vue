<template>
     <FilterTable />

</template>
    
<script setup lang="ts">

import FilterTable from '~/components/FilterTable.vue'

    definePageMeta({
        middleware: 'auth' 
    })

    useHead({
        title: 'Home'
    });


</script>