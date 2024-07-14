<template>
    <div>
        <PrimaryButton @click="openModal">Add Package</PrimaryButton>

        <Modal :show="showModal" @close="closeModal" maxWidth="lg" closeable>
            <template #default>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Modal Title</h2>

                   <form @submit.prevent="createPackage" class="mt-6">
                        <div>
                            <InputLabel for="code" class="sr-only">Code</InputLabel>
                            <TextInput id="code" class="w-full" v-model="form.code"
                                placeholder="Give it a great title…" />
                            <InputError :message="form.errors.code" class="mt-1" />
                        </div>

                        <div class="mt-3">
                            <InputLabel for="info" class="sr-only">Info</InputLabel>
                            <MarkdownEditor v-model="form.info" content-class="h-20tt" />
                            <InputError :message="form.errors.info" class="mt-1" />
                        </div>

                        <div class="mt-3">
                            <PrimaryButton type="submit">Create package</PrimaryButton>
                        </div>
                    </form>

                    <button @click="closeModal"
                        class="mt-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Close</button>
                </div>
            </template>
        </Modal>
    </div>
</template>


<script setup>
import { ref } from 'vue';
import { useForm } from "@inertiajs/vue3";
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import TextArea from "@/Components/TextArea.vue";
import MarkdownEditor from "@/Components/MarkdownEditor.vue";




const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};


const form = useForm({
    code: "",
    info: "",
});

//const createPackage = () => form.package(route('packages.store'));

const createPackage = () => {
    form.post(route('packages.store'), {
        onFinish: () => closeModal(),
        onError: () => {
            // handle error if needed
        },
    });
};
</script>
