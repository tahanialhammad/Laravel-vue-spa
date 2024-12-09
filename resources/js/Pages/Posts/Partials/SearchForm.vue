<template>
    <form @submit.prevent="handleSearch" class="mt-4">
        <div>
            <InputLabel for="query">Search</InputLabel>
            <div class="flex space-x-2 mt-1">
                <TextInput v-model="form.query" class="w-full" id="query" />
                <SecondaryButton type="submit">Search</SecondaryButton>
                <DangerButton v-if="form.query" @click="clearSearch">Clear</DangerButton>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const props = defineProps(["query"]);

const form = useForm({
    query: props.query,
    page: 1, // Reset pagination when performing a new search
});

const page = usePage();

const handleSearch = () => form.get(page.url);

const clearSearch = () => {
    form.query = "";
    handleSearch();
};
</script>
