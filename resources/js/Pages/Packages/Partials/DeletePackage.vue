<template>
    <div v-if="packageItem.can?.delete" class="flex items-center">
        <form @submit.prevent="deleteItem">
            <button>
                <TrashIcon class="size-4 inline-block mr-1" />
            </button>
        </form>
    </div>

</template>


<script setup>
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { TrashIcon } from '@heroicons/vue/20/solid'


const props = defineProps(['packageItem']);

const deleteItem = () => router.delete(route('packages.destroy', props.packageItem),{
    preserveScroll: true,
});

</script>