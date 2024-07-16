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


            <div class="mx-auto max-w-7xl px-6 lg:px-8 py-6 my-6">
                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <Card v-for="packageItem in packageItems.data" :key="packageItem.id" class="group ">
                        <template #cardHeader>
                            <Link :href="packageItem.routes.show" class="flex items-center group px-2 py-4">
                            <img class="max-h-12 object-containt me-2"
                                :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`" :alt="packageItem.code"
                                width="50" height="50" />
                            <h3 class="uppercase font-bold text-lg group-hover:text-indigo-500">{{ packageItem.code }}
                            </h3>
                            </Link>
                        </template>
                        <template #cardBody>
                            <p>
                                {{ packageItem.info }}
                            </p>
                        </template>
                        <template #cardFooter>
                            Last upade at :
                            {{ formattedDate(packageItem) }}

                            <DeletePackage :packageItem="packageItem.id" />

                        </template>
                    </Card>

                </div>
            </div>
            <Pagination v-if="packageItems.meta" :meta="packageItems.meta" class="mt-2" />

        </Container>
    </AppLayout>
</template>



<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import { Link, router } from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";
import { relativeDate } from "@/Utilities/date.js";
import DeletePackage from "./Partials/DeletePackage.vue";

defineProps(['packageItems']);
const formattedDate = (packageItem) => relativeDate(packageItem.updated_at);
</script>
