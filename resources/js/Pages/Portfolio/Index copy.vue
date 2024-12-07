<template>
    <AppLayout>
       <Container>portfolio

           <file-pond
           name="image"
           ref="pond"
           label-idle="Click to choose image, or drag here..."
          
           @init="filepondInitialized"
           accepted-file-types="image/*"
       />

       </Container>
       </AppLayout>
   
</template>
<script>
import Container from '@/Components/Container.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

// Import FilePond
import vueFilePond, { setOptions } from 'vue-filepond';

// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

// Import styles
import 'filepond/dist/filepond.min.css';

// Create FilePond component
const FilePond = vueFilePond(FilePondPluginFileValidateType);

setOptions({
   server: {
       process: {
           url: './portfolio',
           headers: {
               'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf_token"]').content
           }
       }
   }
});

export default {
   components: {
       FilePond,
       AppLayout,
       Container,
   },
   data() {
       return {
          // message: 'Hello, world!'
       }
   },
   methods: {
       filepondInitialized() {
           console.log('Filepond is ready!');
           console.log('Filepond object:', this.$refs.pond);
       }
   }
}
</script>