<template lang="">
<div>
    <nav class="flex justify-between p-4 bg-gray-200">
        <div class="text-lg">
            Navbar
        </div>
        <div class="">
            <ul class="flex gap-x-4 me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <Link :href="route(home)">Home</Link>
                </li>
                <li class="nav-item">
                    <Link :href="route(about)">About</Link>
                </li>
                <li class="nav-item">
                    <Link :href="route(contact)">Contact</Link>
                </li>
            </ul>
        </div>
    </nav>
</div>
</template>

<script>
import { Link} from '@inertiajs/vue3';

// export default {

// }
</script>

<style lang="">

</style>
