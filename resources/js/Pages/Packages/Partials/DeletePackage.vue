<template>
    <div class="flex items-center">
        <!-- <Link :href="packageItem.routes.show">
        <PencilSquareIcon class="size-4 inline-block mr-1" />
        </Link> -->

        <form @submit.prevent="deleteItem">
            <button>
                <TrashIcon class="size-4 inline-block mr-1" />
            </button>
        </form>
    </div>

</template>


<script setup>
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { PencilSquareIcon, EyeIcon, TrashIcon } from '@heroicons/vue/20/solid'


const props = defineProps(['packageItem']);

const deleteItem = () => router.delete(route('packages.destroy', props.packageItem));

</script>