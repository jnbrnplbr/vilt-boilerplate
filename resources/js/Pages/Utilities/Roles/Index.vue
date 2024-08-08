<script setup>
import {
  mdiChartTimelineVariant, 
  mdiChevronDown,
  mdiChevronUp,
} from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import SectionMain from "@/Components/SectionMain.vue";
import { Head, Link} from '@inertiajs/vue3';
import CardBox from "../../../Components/CardBox.vue";
import BaseTable from "@/Components/BaseTable.vue";
import { roles as tableSetting } from "@/Constants/table-files";

const props = defineProps({
    roles: Object
});

</script>

<template>
    <LayoutAuthenticated>
    <Head title="Utilities: Role List" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            title="Roles"
            main
            :add="{visible:true, route: 'roles:create'}"
        >
            <template #links>
                <span class="text-xs muted">Utilities > 
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('roles:index')"
                    >
                        Role Lists
                    </Link> 
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox class="mb-6" has-table>
            <BaseTable 
                :items="roles"
                :settings="tableSetting"
                :checkable="{visible: true, props: 'description'}"
            >
            </BaseTable>
        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>

</template>