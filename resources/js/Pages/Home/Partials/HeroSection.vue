<template>
    <div class="flex my-10 items-center">
        <div class="w-1/2 flex flex-col gap-4 p-4">
            <h1 class="text-5xl font-black w-2/3">Award Winning Digital Design Agency</h1>
            <h3 class="text-lg">
                An award-winning digital design agency specializing in creative solutions, innovative branding, and
                cutting-edge web design to elevate your business.
            </h3>

            <Link
            class="w-40 px-4 py-2 text-white font-bold text-center rounded-full bg-gradient-to-r from-violet-500 to-fuchsia-500 hover:bg-gradient-to-r hover:from-fuchsia-500 hover:to-violet-500 transition duration-300"
            :href="route('services.index')">
            Contact us
            </Link>
        </div>
        <div class="relative">
            <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Hero-Image.png" alt="">
        
            <img class="absolute top-8 left-0" src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Abstract-Shape-2.png" alt="">
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>