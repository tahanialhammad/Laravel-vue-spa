<template>
    <div>
        <button @click="openModal">
            <PencilSquareIcon class="size-4 inline-block mr-1" />
        </button>

        <Modal :show="showModal" @close="closeModal" maxWidth="xl" closeable>
            <template #default>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Edit Package {{ packageItem.code }}</h2>

                    <form @submit.prevent="editPackage" class="mt-6">
                        <div>
                            <InputLabel for="code" class="sr-only">Code</InputLabel>
                            <TextInput id="code" class="w-full" v-model="form.code" placeholder="Package code" />
                            <InputError :message="form.errors.code" class="mt-1" />
                        </div>

                        <div class="mt-3">
                            <InputLabel for="info" class="sr-only">Info</InputLabel>
                            <TextArea id="info" class="w-full" v-model="form.info" placeholder="Package info" />
                            <InputError :message="form.errors.info" class="mt-1" />
                        </div>

                        <div class="mt-3 flex space-x-2 justify-end">
                            <SecondaryButton @click="closeModal">Close</SecondaryButton>
                            <PrimaryButton type="submit">Save changes</PrimaryButton>
                        </div>
                    </form>
                </div>
            </template>
        </Modal>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import { useForm } from "@inertiajs/vue3";
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import TextArea from "@/Components/TextArea.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { PencilSquareIcon } from '@heroicons/vue/20/solid';

const props = defineProps(['packageItem']);

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
    // Initialize form fields with packageItem data
    form.code = props.packageItem.code;
    form.info = props.packageItem.info;
};

const closeModal = () => {
    showModal.value = false;
};

const form = useForm({
    code: "",
    info: "",
});

const editPackage = () => {
    form.put(route('packages.update', { id: props.packageItem.id }), {
        onFinish: (response) => {
            if (Object.keys(form.errors).length === 0) {
                closeModal();
            }
        },
        onError: () => {
            openModal();
        },
    });
};
</script>
