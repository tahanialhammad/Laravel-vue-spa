<template>
  <div class="bg-white">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-6 my-6">

      <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2">
        <article v-for="post in posts" :key="post.id"
          class="flex max-w-xl flex-col items-start justify-between border-2 p-4 rounded-lg">
          <Link :href="post.routes.show" class="group block px-2 py-4">
          <span class="text-lg font-bold group-hover:text-indigo-500">{{ post.title }}</span>
          <span class="block pt-1 text-sm text-gray-600 first-letter:uppercase">{{ formattedDate(post) }} by
            {{ post.user.name }}</span>
          </Link>
          <Pill :href="route('posts.index', { topic: post.topic.slug })">
            {{ post.topic.name }}
          </Pill>
        </article>
      </div>

    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Pill from "@/Components/Pill.vue";


defineProps(["posts", "formattedDate"]);
</script>