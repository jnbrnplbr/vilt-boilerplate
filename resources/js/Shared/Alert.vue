<script setup>import { onMounted, watch } from 'vue';

    const props = defineProps({
        visible: {
            type: Boolean,
            default: false
        }
    });


</script>

<template>
    <div 
        v-if="visible"
        class="border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600 self-end my-3 px-6 py-4 shadow overflow-hidden w-full md:rounded-xl md:w-auto md:max-w-full cursor-pointer pointer-events-auto" style=""
    >
        Hello! This is demo message...
    </div>
</template>