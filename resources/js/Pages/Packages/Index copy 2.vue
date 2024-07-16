<template>
  <AppLayout>
    <Container>
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="flex mx-auto mt-10 items-center gap-8">
          <div v-for="packageItem in packageItems.data" :key="packageItem.id"
              class="border-2 border-indigo-600 rounded-md p-2">
            <Link :href="packageItem.routes.show" class="capitalize font-bold">
              <img class="max-h-12 object-containt"
                  :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`" :alt="packageItem.code"
                  width="50" height="50" />
            </Link>
          </div>
        </div>
      </div>

      <div class="max-w-screen-xl mx-auto px-5 bg-white min-h-screen">
        <div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">
          <AccordionAutoClose
            v-for="(packageItem, index) in packageItems.data"
            :key="packageItem.id"
            :isOpen="openIndex === index"
            :toggle="() => toggle(index)"
          >
            <template #accordionHeader>
              {{ packageItem.code }}
            </template>
            <template #accordionBody>
              {{ packageItem.info }}
            </template>
          </AccordionAutoClose>
        </div>
      </div>

      <Pagination v-if="packageItems.meta" :meta="packageItems.meta" class="mt-2" />
    </Container>
  </AppLayout>
</template>

<script setup>
import { ref } from 'vue';
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import { Link, router } from "@inertiajs/vue3";
import Accordion from "@/Components/Accordion.vue";
import AccordionAutoClose from '@/Components/AccordionAutoClose.vue';

defineProps(['packageItems']);

const openIndex = ref(null);

const toggle = (index) => {
  openIndex.value = openIndex.value === index ? null : index;
};
</script>
