<template lang="">
<FrontendLayout>
    <Head title="Product" />
    <div class="mt-4 mx-4">
        <div class="flex justify-between">
            <h2>Products List</h2>
            <Link :href="route('products.create')" class=" bg-blue-500 text-yellow p-3 rounded inline-block">Create</Link>
        </div>
        <div class=" w-3/4 mx-auto">
            <table class="table-fixed w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Id</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Price</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Image</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in products " :key="index" class="odd:bg-white even:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ index +1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ item.name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ item.price }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                          <img v-if="item.image" :src="item.image" alt="no" class="w-[100px] h-[80px] rounded">
                          <span v-else>N/A</span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                         <Link :href="route('products.show',item.id)" class="px-2 oy-1 text-sm bg-green-500 text-dark me-2 rounded inline-block">show</Link>
                         <Link :href="route('products.edit',item.id)" class="px-2 oy-1 text-sm bg-yellow-500 text-dark me-2 rounded inline-block">Edit</Link>
                         <button type="submit" @click="productDelete(item.id)" class="px-2 oy-1 text-sm bg-red-500 text-white me-2 rounded inline-block">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</FrontendLayout>
</template>

<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import {Head ,useForm,Link} from '@inertiajs/vue3';
defineProps({
    products:Array
});

const from=useForm({

});
const productDelete = (productId)=>{
    if(confirm('Are you Sure to delete?')){
        from.delete(route('products.destroy',productId));
    }
};
</script>

<style lang=""></style>
