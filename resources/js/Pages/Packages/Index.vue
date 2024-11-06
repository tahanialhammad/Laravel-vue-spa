<template>
    <AppLayout>
        <Container>
            <div class="mx-auto max-w-7xl px-6 lg:px-8 flex justify-between items-center">
                <div class="flex items-center gap-8">
                    <div v-for="packageItem in packageItems.data" :key="packageItem.id"
                        class="bg-slate-900 rounded-md p-2 h-10 w-10">
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

            <div class="flex">
                <div class="w-2/3">
                    <div class="max-w-screen-xl mx-auto px-5 bg-slate-900 rounded min-h-screen">
                        <div class="grid divide-y divide-slate-600 max-w-xl mx-auto mt-8">
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
                                        Last updated at: {{ formattedDate(packageItem) }}
                                        <div v-if="packageItem.can?.delete" class="flex items-center">
                                            <DeletePackage :packageItem="packageItem.id" />
                                            <!-- all packageItem data -->
                                            <EditPackage :packageItem="packageItem" />
                                        </div>
                                    </div>
                                </template>
                            </Accordion>
                        </div>
                    </div>
                </div>

                <div class="w-1/3 p-6">
                    <form v-if="$page.props.auth.user" @submit.prevent="addPackageForm" class="mt-4">
                        <div>
                            <InputLabel class="text-slate-300" for="code">Package name</InputLabel>
                            <TextInput id="code" v-model="packageForm.code" class="w-full"
                                placeholder="Give package name code" />
                        </div>
                        <div>
                            <InputLabel  class="text-slate-300" for="info">Package info</InputLabel>
                            <TextArea id="info" v-model="packageForm.info" />
                        </div>
                        <PrimaryButton type="submit" :disabled="packageForm.processing" class="mt-3">Add New Package
                        </PrimaryButton>
                    </form>
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
import { useForm } from "@inertiajs/vue3";
import Accordion from "@/Components/Accordion.vue";
import AddPackage from "../Services/Partials/AddPackage.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextArea from "@/Components/TextArea.vue";

defineProps(['packageItems']);
const formattedDate = (packageItem) => relativeDate(packageItem.updated_at);

const packageForm = useForm({
    code: '',
    info: ''
});

const addPackageForm = () => packageForm.post(route('packages.store'), {
    onSuccess: () => packageForm.reset(),
});
</script>