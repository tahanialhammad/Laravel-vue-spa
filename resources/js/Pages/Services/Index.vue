<template>
    <AppLayout>
        <Container>

            <PackagesList :packageItems="packageItems" />

            <div class="mx-auto max-w-7xl px-6 lg:px-8 py-6 my-6">
                <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">

                    <Card v-for="service in services.data" :key="service.id" class="group ">
                        <template #cardHeader>
                            <!-- <Link :href="route('services.show', service.id)" class="block group px-2 py-4"> -->
                            <Link :href="service.routes.show" class="block group px-2 py-4">
                            <span class="font-bold text-lg group-hover:text-indigo-500">{{ service.title }}</span>
                            </Link>
                        </template>
                        <template #cardBody>
                            <p>
                                {{ service.description }}
                            </p>
                            <div class="flex space-x-1">
                                <img v-for="packageItem in service.packages" :key="packageItem.id" class="max-h-4"
                                    :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`"
                                    :alt="packageItem.code" />
                            </div>

                        </template>
                        <template #cardFooter>
                            Last upade at :
                            {{ formattedDate(service) }}
                        </template>
                    </Card>

                </div>
            </div>
            <Pagination v-if="services.meta" :meta="services.meta" class="mt-2" @pagination-change="fetchServices" />
        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import Pagination from "@/Components/Pagination.vue";
import { formatDistance, parseISO } from "date-fns";
import { relativeDate } from "@/Utilities/date.js";
import { defineProps } from "vue";
import Card from "@/Components/Card.vue";
import PackagesList from "@/Pages/Services/Partials/PackagesList.vue";
import { Link } from "@inertiajs/vue3";

defineProps(['services', 'packageItems']);
const formattedDate = (service) => relativeDate(service.updated_at);

</script>
