<script setup>
import {
  mdiChartTimelineVariant, 
} from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import SectionMain from "@/Components/SectionMain.vue";
import { useForm, Head, Link, router,usePage } from '@inertiajs/vue3';
import CardBox from "../../../Components/CardBox.vue";
import BaseDivider from "@/Components/BaseDivider.vue";

const props = defineProps({
    blood_type: {
        type: Object,
        default: []
    }
})


</script>

<template>
    <LayoutAuthenticated>
    <Head :title="`File Maintenance: ${blood_type.description}`" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            :title="`${blood_type.description}`"
            main
            :back="{visible:true, route: 'blood_types:index'}"
        >
            <template #links>
                <span class="text-xs muted">File Maintenance > 
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('blood_types:index')"
                    >
                        Blood Type Lists
                    </Link>
                    > Edit {{ blood_type.description }}
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox 
            class="mb-6"
        >
            
            <table class="border-collapse">
                <tbody>
                    <tr>
                        <td class="w-2/12 font-bold ">Description</td>
                        <td>{{ blood_type.description }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold ">Slug</td>
                        <td>{{ blood_type.slug }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold bg-slate-800 text-white">Created By</td>
                        <td>{{ blood_type.created_by }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold bg-slate-800 text-white">Date Created</td>
                        <td>{{ blood_type.created_at }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold bg-slate-800 text-white">Last Update</td>
                        <td>{{ blood_type.updated_at }}</td>
                    </tr>
                </tbody>
            </table>
            <BaseDivider />
            <table>
                <thead>
                    <tr>
                        <th colspan="4" class="bg-slate-600 text-gray-200">Activity Logs</th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th>Created By</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Aug 6 2024</td>
                        <td>CREATED</td>
                        <td>blood_type Created</td>
                        <td>Brye Ebora</td>
                    </tr>
                </tbody>
                
            </table>

        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>