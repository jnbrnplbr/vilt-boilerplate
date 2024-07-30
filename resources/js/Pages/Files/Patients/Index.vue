<script setup>
import {
  mdiChartTimelineVariant, 
  mdiChevronDown,
  mdiChevronUp,
} from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import SectionMain from "@/Components/SectionMain.vue";
import BaseButton from "../../../Components/BaseButton.vue";
import { Head, Link} from '@inertiajs/vue3';
import CardBox from "../../../Components/CardBox.vue";
import TableSampleClients from "@/Components/TableSampleClients.vue";


</script>

<template>
    <LayoutAuthenticated>
    <Head title="Utilities: Users List" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            title="Patients"
            main
        >
            <template #links>
                <span class="text-xs muted">File Maintenance >  
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('users:index')"
                    >
                        Patients
                    </Link> 
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox class="mb-6" has-table>
            <TableSampleClients />
        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>

</template>