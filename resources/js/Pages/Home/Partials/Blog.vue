<template>
    <div class="relative flex flex-col gap-4 items-start">
        <h3 class="text-rose-500 my-8">BLOG</h3>
        <div class="relative mb-8">
            <h1 class="relative font-black text-4xl z-10">
                Latest Posts From Blog
            </h1>
            <GradientCircle class="absolute -top-8 -left-10 z-0" />
        </div>

        <div class="grid grid-cols-3 gap-4 w-full">    
            <article v-for="post in posts" :key="post.id"
                class="rounded-3xl flex flex-col gap-4 items-start"
                >
                <img src="https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/05/Featured-Image-957x650.jpg" alt="">
            <h3 class="text-2xl">  {{ post.title }}</h3>
            </article>
        </div>

    </div>
</template>
<script setup>
import GradientCircle from '@/Components/Svg/GradientCircle.vue';
defineProps(["posts"]);

</script>