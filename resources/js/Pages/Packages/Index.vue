<template>
    <AppLayout>
        <Container>
            <div class="mx-auto max-w-7xl px-6 lg:px-8 flex justify-between items-center">
                <div class="flex items-center gap-8">
                    <div v-for="packageItem in packageItems.data" :key="packageItem.id"
                        class="border-2 border-indigo-600 rounded-md p-2">
                        <Link :href="packageItem.routes.show" class="capitalize font-bold">
                        <img class="max-h-12 object-containt"
                            :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`" :alt="packageItem.code"
                            width="50" height="50" />
                        </Link>
                    </div>
                </div>
                <div v-if="$page.props.auth.user">
                    <div v-if="$page.props.auth.user.is_admin">
                        <AddPackage />
                    </div>
                </div>
            </div>

            <div class="max-w-screen-xl mx-auto px-5 bg-white min-h-screen">
                <div class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8">
                    <Accordion v-for="packageItem in packageItems.data" :key="packageItem.id">
                        <template #accordionHeader>
                            <div class="flex items-center">
                                <img class="max-h-12 object-containt me-1"
                                    :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`"
                                    :alt="packageItem.code" width="50" height="50" />
                                {{ packageItem.code }}
                            </div>

                        </template>
                        <template #accordionBody>
                            {{ packageItem.info }}

                            <div class="flex justify-between">
                                Last upade at :
                                {{ formattedDate(packageItem) }}

                                <div class="flex items-center">
                                    <DeletePackage :packageItem="packageItem.id" />
                                    <EditPackage :packageItem="packageItem.id" />
                                </div>
                            </div>
                        </template>
                    </Accordion>
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
import EditPackage from "./Partials/EditPackage.vue";

import Accordion from "@/Components/Accordion.vue";
import AddPackage from "../Services/Partials/AddPackage.vue";

defineProps(['packageItems']);
const formattedDate = (packageItem) => relativeDate(packageItem.updated_at);

</script>