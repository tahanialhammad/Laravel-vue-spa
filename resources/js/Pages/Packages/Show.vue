<template>

    <Head>
        <link rel="canonical" :href="packageItem.routes.show" />
    </Head>

    <AppLayout :title="packageItem.code">
        <Container>
            <h1>
                {{ packageItem.code }}
            </h1>
            <p class="whitespace-pre-wrap font-sans">
                {{ packageItem.info }}
            </p>
            <div class="flex space-x-1">
                <img class="max-h-4" :src="`/assests/packages/${packageItem.code.toLowerCase()}.svg`"
                    :alt="packageItem.code" />
            </div>

            <form @submit.prevent="deleteItem">
                <button>delete</button>
            </form>
        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/Container.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";

const props = defineProps(['packageItem']);

const deleteItem = () => router.delete(route('packages.destroy', props.packageItem.id));

</script>