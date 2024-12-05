<template>
  <swiper-container :slides-per-view="3" :space-between="30" autoplay="true" loop="true" navigation="false"
    pagination="false" scrollbar="false" class="my-swiper" :breakpoints="{
      640: { slidesPerView: 1, spaceBetween: 10 },
      768: { slidesPerView: 2, spaceBetween: 20 },
      1024: { slidesPerView: 3, spaceBetween: 30 }
    }">
    <swiper-slide v-for="(item, index) in slideItems" :key="index" :style="{ backgroundImage: `url(${item.bgImage})` }"
      class="bg-cover bg-center flex justify-center items-center h-60 rounded-3xl">
      <p>{{ item.name }}</p>
    </swiper-slide>

  </swiper-container>
</template>

<script setup>

const slideItems = [
  {
    name: "Slide 1",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/06/Post-Image-714x714.jpg",
  },
  {
    name: "Slide 2",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/06/Post-Image-714x714.jpg",
  },
  {
    name: "Slide 3",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/06/Post-Image-714x714.jpg",
  },
  {
    name: "Slide 4",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/06/Post-Image-714x714.jpg",
  },
  {
    name: "Slide 5",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/06/Post-Image-714x714.jpg",
  },
  {
    name: "Slide 6",
    bgImage:
      "https://demo.phlox.pro/agency-aestry/wp-content/uploads/sites/279/2021/06/Post-Image-714x714.jpg",
  },
];
</script>

<style scoped>
.my-swiper {
  width: 100%;
  height: 100%;
}
</style>