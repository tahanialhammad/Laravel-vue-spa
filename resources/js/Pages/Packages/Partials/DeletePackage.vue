<template>
    <div class="flex items-center">
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
import { useConfirm } from "@/Utilities/Composables/useConfirm.js";


const props = defineProps(['packageItem']);
const { confirmation } = useConfirm();

// const deleteItem = () => router.delete(route('packages.destroy', props.packageItem),{
//     preserveScroll: true,
// });


const deleteItem = async (packageItem) => {
    if (
        !(await confirmation("Are you sure you want to delete this comment?"))
    ) {
        return;
    }

    router.delete(route('packages.destroy', props.packageItem), {
        preserveScroll: true,
    });
};
</script>