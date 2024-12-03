<template>
    <div class="flex mb-10 items-center">
        <!-- Left Section -->
        <div class="w-1/2 flex flex-col gap-8 p-4 relative">
            <!-- Small Circle SVG -->
            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" class="absolute top-5 right-5 z-0">
                <circle cx="25" cy="25" r="5" class="fill-none stroke-orange-500 stroke-2" />
            </svg>


            <!-- Gradient Circle SVG -->
            <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg" class="absolute -top-8 -left-2 z-0">
                <defs>
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#059669 " />
                        <stop offset="100%" stop-color="#D64D3A" />
                    </linearGradient>
                </defs>
                <circle cx="50" cy="50" r="40" fill="url(#gradient)" />
            </svg>

        
            <!-- Text Content -->
            <h1 class="text-5xl font-black w-2/3 z-10">Award Winning Digital Design Agency</h1>
            <h3 class="text-lg text-gray-300">
                An award-winning digital design agency specializing in creative solutions, innovative branding, and
                cutting-edge web design to elevate your business.
                   <!-- Small Circle SVG -->
            <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" class="absolute right-1/2 z-0">
                <circle cx="25" cy="25" r="5" class="fill-orange-500" />
            </svg>
            </h3>

            <Link
                class="w-40 px-4 py-2 text-white font-bold text-center rounded-full bg-gradient-to-r from-emerald-500 to-orange-500 hover:bg-gradient-to-r hover:from-orange-500 hover:to-emerald-500 transition duration-300"
                :href="route('services.index')">
            Contact us
            </Link>
        </div>

        <!-- Right Section with Image -->
        <div class="relative">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="37.307" height="37.307" viewBox="0 0 37.307 37.307" class="absolute top-5 right-5 z-0">
  <defs>
    <linearGradient id="linear-gradient" x1="-11.898" y1="15.997" x2="-11.19" y2="15.997">
      <stop offset="0" stop-color="#0cf4ed"></stop>
      <stop offset="1" stop-color="#08ff89"></stop>
    </linearGradient>
  </defs>
  <path id="Path_6" d="M691.816-607.643,673.162-626.3l18.654-18.654L710.469-626.3ZM678.192-626.3l13.624,13.624L705.44-626.3l-13.624-13.625Z" transform="translate(-673.162 644.95)" fill="url(#linear-gradient)"></path>
</svg>



            
            <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Hero-Image.png"
                alt="Hero Image">
            <img class="absolute top-8 left-0"
                src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Abstract-Shape-2.png"
                alt="Abstract Shape">
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>