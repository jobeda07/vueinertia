<template lang="">
<FrontendLayout>
    <Head title="Product" />
    <div class="mt-4 mx-4">
        <div class="flex justify-between">
            <h2>Product Show</h2>
            <Link :href="route('products.index')" class=" bg-blue-500 text-yellow p-3 rounded inline-block">Back</Link>
        </div>
        <div class=" w-3/4 mx-auto">
          <h3>Product Name: {{ product.name }}</h3>
          <h3>Product Price: {{ product.price }}</h3>
          <img v-if="product.image" :src="product.image" alt="no" class="w-[100px] h-[80px] rounded">

        </div>
    </div>
</FrontendLayout>
</template>

<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import {Head ,Link} from '@inertiajs/vue3';
defineProps({
    product:Object
});
</script>

<style lang=""></style>
