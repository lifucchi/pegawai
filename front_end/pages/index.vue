<template>
     <FilterTable />

    
</template>
    
<script setup lang="ts">


    definePageMeta({
        middleware: 'auth' // this should match the name of the file inside the middleware directory 
    })
    import FilterTable from '~/components/FilterTable.vue'


</script>