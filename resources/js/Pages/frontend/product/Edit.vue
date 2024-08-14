<template lang="">
<FrontendLayout>
    <Head title="Product-Create" />
    <div class="mt-4 mx-4">
        <div class="flex justify-between">
            <h2>Product Edit</h2>
            <Link :href="route('products.index')" class=" bg-gray-500 text-yellow p-3 rounded inline-block">Back</Link>
        </div>
        <div class=" w-3/4 mx-auto">
            <form @submit.prevent="updateProduct()">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">name</label>
                        <div class="mt-2">
                            <input type="text" name="name"  v-model="product.name"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                               <div v-if="errors.name" class="text-red-500">{{ errors.name }}</div>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                        <div class="mt-2">
                            <input type="number" name="price" v-model="product.price"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                               <div v-if="errors.price" class="text-red-500">{{ errors.price }}</div>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                        <div class="mt-2">
                            <input  name="image" @change="handleFileChange" type="file"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <img v-if="product.imgaeshow" :src="product.imgaeshow" alt="no" class="w-[100px] h-[80px] rounded">
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <div class="mt-2">
                          <button type="submit" :disabled="product.processing" class=" bg-blue-500 text-white py-2 px-5 rounded mb-4">
                          <span v-if="product.processing">Update Loading...</span>
                          <span v-else>Update</span>
                          </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</FrontendLayout>
</template>

<script setup>

import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import {Head ,useForm,Link} from '@inertiajs/vue3';
const props = defineProps({
    errors: Object ,
    item:Object
    })
const product=useForm({
   name:props.item.name,
   price:props.item.price,
   image:null,
   imgaeshow: props.item.image,
});


const handleFileChange = (event) => {
   product.image = event.target.files[0];
};

// const updateProduct=()=>{
//    const res=product.put(route('products.update',props.item.id));
//     if(res){
//        product.reset();
//     }
// }
const updateProduct = () => {
    product.post(route('product.update', props.item.id), {
        onSuccess: () => {
            product.reset();
        },
        onError: (errors) => {
            console.error('Errors:', errors);
        },
        preserveScroll: true,
        forceFormData: true,
    });
};
</script>

<style lang="">

</style>
