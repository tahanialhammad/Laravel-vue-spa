<template>
    <div>
        <!-- <button @click="openModal">Add Package</button> -->
        <PrimaryButton @click="openModal">Add Package</PrimaryButton>

        <Modal :show="showModal" @close="closeModal" maxWidth="lg" closeable>
            <template #default>
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">Modal Title</h2>
                    <p class="mt-4 text-sm text-gray-600">This is the content of the modal.</p>
                    <button @click="closeModal" class="mt-4 inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Close</button>
                </div>
            </template>
        </Modal>
    </div>
</template>


<script setup>
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};
</script>
