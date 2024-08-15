<template>
<div>
    <Navbar />
    <!-- <Toastr /> -->
    <div v-if="$page.props.flash.message" class="alert float-right bg-green-500 text-white p-5 absolute rounded-sm text-base font-bold">
        {{ $page.props.flash.message }}
    </div>
    <slot />
</div>
</template>

<script setup>
import Navbar from '@Components/Navbar.vue';
//import Toastr from '@Components/Toastr.vue';

</script>
