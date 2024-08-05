<script setup>
import { mdiClose, mdiCheckDecagram, mdiAlertBox } from "@mdi/js";
import { ref, watch,computed, reactive } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import useAlerts from "@/Composables/use-alerts";
import BaseButton from '@/Components/BaseButton.vue';
import BaseIcon from "@/Components/BaseIcon.vue";

const alert = computed(() => usePage().props.flash.alert);

const {addAlert, alerts} = useAlerts();


watch(alert, (newVal) => {
    if (newVal) {
        addAlert(newVal);
    }
});


</script>

<template>
    <div
        v-if="alerts.length"
        v-for="(a, id) in alerts"
        :key="id"
        class="flex justify-center self-end my-3 px-6 py-4 shadow overflow-hidden w-full md:rounded-xl md:w-auto md:max-w-full cursor-pointer pointer-events-auto"
        :class="{
            'border-blue-600 dark:border-blue-500 ring-blue-300 dark:ring-blue-700 bg-blue-600 dark:bg-blue-500 text-white hover:bg-blue-700 hover:border-blue-700 hover:dark:bg-blue-600 hover:dark:border-blue-600': a.type === 'info',
            'border-emerald-700 dark:border-emerald-500 ring-emerald-700 dark:ring-emerald-700 bg-emerald-400 dark:bg-emerald-500 text-dark hover:bg-emerald-700 hover:border-emerald-700 hover:dark:bg-emerald-600 hover:dark:border-emerald-600': a.type === 'success',
            'border-red-700 dark:border-red-500 ring-red-700 dark:ring-red-700 bg-red-400 dark:bg-red-500 text-dark hover:bg-red-700 hover:border-red-700 hover:dark:bg-red-600 hover:dark:border-red-600': a.type === 'error'
        }" 
    >   
        <span class="inline-flex justify-center items-center w-6 h-6 mr-2">
            <svg
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="inline-block"
            >
            <path 
                fill="" 
                :d="`${a.type != 'success'? mdiAlertBox : mdiCheckDecagram }`" 
            />
        </svg>
        </span>
        {{ a.message }}
    </div>
</template>