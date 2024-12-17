<template>
    <AppLayout>
        <Container>
            portfolio
            <!-- https://www.youtube.com/watch?v=QJUqYOYSrDk -->

            <!-- animation with vuejs -->

            <div>

                <button @click="show = !show" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Toggle Element
                </button>

                <transition enter-active-class="transition-opacity duration-500" enter-from-class="opacity-0"
                    enter-to-class="opacity-100" leave-active-class="transition-opacity duration-500"
                    leave-from-class="opacity-100" leave-to-class="opacity-0">
                    <p v-if="show" class="mt-4 p-4 bg-gray-100 text-slate-700 rounded shadow">
                        This is a transitioning element!
                    </p>

                </transition>

            </div>





            <div>
                <button @click="show2 = !show2" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Slide Toggle
                </button>

                <transition enter-active-class="transform transition ease-out duration-500"
                    enter-from-class="translate-y-4 opacity-0" enter-to-class="translate-y-0 opacity-100"
                    leave-active-class="transform transition ease-in duration-500"
                    leave-from-class="translate-y-0 opacity-100" leave-to-class="translate-y-4 opacity-0">
                    <div v-if="show2" class="mt-4 p-4 bg-green-100 text-black rounded shadow">
                        This slides and fades in!
                    </div>
                </transition>
            </div>




            <div>
                <button @click="addItem" class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">
                    Add Item
                </button>

                <transition-group tag="ul" class="mt-4 space-y-2" enter-active-class="transform transition duration-500"
                    enter-from-class="translate-x-4 opacity-0" enter-to-class="translate-x-0 opacity-100"
                    leave-active-class="transform transition duration-500" leave-from-class="translate-x-0 opacity-100"
                    leave-to-class="translate-x-4 opacity-0">
                    <li v-for="item in items" :key="item.id" class="p-2 bg-purple-100 text-black rounded shadow">
                        {{ item.text }}
                    </li>
                </transition-group>
            </div>


            <Accordion>
                <template #accordionHeader>
                    accordionHeader
                </template>
                <template #accordionBody>
                    accordionBody
                </template>
            </Accordion>

        </Container>
    </AppLayout>
</template>

<script setup>
import Accordion from '@/Components/Accordion.vue';
import Container from '@/Components/Container.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

import { ref } from 'vue';

const show = ref(true);
const show2 = ref(true);



let id = 0;
const items = ref([{ id: id++, text: 'Item 1' }]);

const addItem = () => {
    items.value.push({ id: id++, text: `Item ${id}` });
};
</script>