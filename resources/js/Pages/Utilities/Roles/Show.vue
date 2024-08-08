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
    role: {
        type: Object,
        default: []
    }
})


</script>

<template>
    <LayoutAuthenticated>
    <Head :title="`Utilities: ${role.description}`" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            :title="`${role.name}`"
            main
            :back="{visible:true, route: 'roles:index'}"
        >
            <template #links>
                <span class="text-xs muted">Utilities > 
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('roles:index')"
                    >
                        Role Lists
                    </Link>
                    > Edit {{ role.name }}
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox 
            class="mb-6"
        >
            
            <table class="border-collapse">
                <tbody>
                    <tr>
                        <td class="w-2/12 font-bold ">Role Name</td>
                        <td>{{ role.name }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold ">Code</td>
                        <td>{{ role.code }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold ">Description</td>
                        <td>{{ role.description }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold bg-slate-800 text-white">Created By</td>
                        <td>{{ role.created_by }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold bg-slate-800 text-white">Date Created</td>
                        <td>{{ role.created_at }}</td>
                    </tr>
                    <tr>
                        <td class="w-2/12 font-bold bg-slate-800 text-white">Last Update</td>
                        <td>{{ role.updated_at }}</td>
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
                        <td>role Created</td>
                        <td>Brye Ebora</td>
                    </tr>
                </tbody>
                
            </table>

        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>