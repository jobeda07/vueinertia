<template lang="">
    <FrontendLayout>
    <Head title="Contact"/>
        <h2>this is {{title}}</h2>
        <div class="bg-red-500 text-white p-4">
            This is a test element with Tailwind CSS
        </div>

    </FrontendLayout>
</template>
<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import {Head} from '@inertiajs/vue3';
defineProps({
    title:String
});
</script>
<style lang="">

</style>
