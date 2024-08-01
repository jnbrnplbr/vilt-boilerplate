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
import BaseTable from "@/Components/BaseTable.vue";
import { genders as tableSetting } from "@/Constants/table-files";

const props = defineProps({
    genders: Object
});


</script>

<template>
    <LayoutAuthenticated>
    <Head title="Files : Gender List" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            title="Genders"
            main
            :add="{visible:true, route: 'genders:create'}"
        >
            <template #links>
                <span class="text-xs muted">File Maintenance > 
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('genders:index')"
                    >
                        Genders
                    </Link> 
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox class="mb-6" has-table>
            <BaseTable 
                :items="genders"
                :settings="tableSetting"
                :checkable="{visible: true, props: 'description'}"
            >
            </BaseTable>
        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>

</template>