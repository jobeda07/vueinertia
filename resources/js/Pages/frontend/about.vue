<template lang="">
    <FrontendLayout>
    <Head title="About"/>
        <h2>this is {{title}}</h2>

        
    </FrontendLayout>
</template>
<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import {Head} from '@inertiajs/vue3'
defineProps({
    title:String
});
</script>
<style lang="">

</style>
