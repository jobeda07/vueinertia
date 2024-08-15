<template lang="">
      <div class="fixed top-20 right-4 z-50 space-y-4 max-w-xs">
        <ToastrList
        v-for="(item,index) in items" :key="index" :message="item.message" @remove="remove(index)" />
    </div>
</template>
<script setup>
import {ref,onMounted} from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';
import ToastrList from '@Components/ToastrList.vue';

const items=ref([
     {message:"Set Your message"},
     {message:"Set Your message 2"},
     //{message:"Set Your message 3"},
]);
const checkToastr = () => {
    const page = usePage();
    if (page.props.value && page.props.value.toast) {
        items.value.unshift({
            message: page.props.value.toast
        });
    }
};

onMounted(() => {
    checkToastr(); // Check on component mount
});
Inertia.on('finish', () => {
    checkToastr(); // Check after every Inertia request finish
});

// Inertia.on('finish',()=>{
//     const page = usePage();
//     if(page.props.value.toast){
//         items.value.unshift({
//             message:page.props.value.toast
//         });
//     }
// });
function remove(index) {
    items.value.splice(index,1);
  }
</script>
<style lang="">

</style>
