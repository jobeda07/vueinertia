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
                        <th class="border border-gray-300 px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                        <td class="border border-gray-300 px-4 py-2">Malcolm Lockyer</td>
                        <td class="border border-gray-300 px-4 py-2">1961</td>
                        <td class="border border-gray-300 px-4 py-2">
                         <Link :href="route('products.create')" class="px-2 oy-1 text-sm bg-green-500 text-dark me-2 rounded inline-block">show</Link>
                         <Link :href="route('products.create')" class="px-2 oy-1 text-sm bg-yellow-500 text-dark me-2 rounded inline-block">Edit</Link>
                         <button type="submit" class="px-2 oy-1 text-sm bg-red-500 text-white me-2 rounded inline-block">Delete</button>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">Witchy Woman</td>
                        <td class="border border-gray-300 px-4 py-2">The Eagles</td>
                        <td class="border border-gray-300 px-4 py-2">1972</td>
                         <td class="border border-gray-300 px-4 py-2">
                         <Link :href="route('products.create')" class="px-2 oy-1 text-sm bg-green-500 text-dark me-2 rounded inline-block">show</Link>
                         <Link :href="route('products.create')" class="px-2 oy-1 text-sm bg-yellow-500 text-dark me-2 rounded inline-block">Edit</Link>
                         <button type="submit" class="px-2 oy-1 text-sm bg-red-500 text-white me-2 rounded inline-block">Delete</button>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">Shining Star</td>
                        <td class="border border-gray-300 px-4 py-2">Earth, Wind, and Fire</td>
                        <td class="border border-gray-300 px-4 py-2">1975</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</FrontendLayout>
</template>

<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import {Head ,Link} from '@inertiajs/vue3';
// defineProps({
//     title:String
// });
</script>

<style lang=""></style>
