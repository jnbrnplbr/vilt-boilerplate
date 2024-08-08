<script setup>
import {
  mdiChartTimelineVariant, 
  mdiCheckCircle,
  mdiDeleteCircle
} from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import SectionMain from "@/Components/SectionMain.vue";
import { useForm, Head, Link, router,usePage } from '@inertiajs/vue3';
import CardBox from "../../../Components/CardBox.vue";
import BaseDivider from "@/Components/BaseDivider.vue";

const props = defineProps({
    user: {
        type: Object,
        default: []
    }
})


</script>

<template>
    <LayoutAuthenticated>
    <Head :title="`Utilities: ${user.email}`" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            :title="`${user.name}`"
            main
            :back="{visible:true, route: 'users:index'}"
        >
            <template #links>
                <span class="text-xs muted">Utilities > 
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('users:index')"
                    >
                        User Lists
                    </Link>
                    > Edit {{ user.name }}
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox 
            class="mb-6"
        >
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 lg:gap-4">
                <table class="border-collapse">
                    <tbody>
                        <tr>
                            <td class="w-2/12 font-bold ">Name</td>
                            <td>{{ user.name }}</td>
                            
                        </tr>
                        <tr>
                            <td class="w-2/12 font-bold ">Email</td>
                            <td>{{ user.email }}</td>
                        </tr>
                        <tr>
                            <td class="w-2/12 font-bold ">Contact</td>
                            <td>{{ user.contact }}</td>
                        </tr>
                        
                    </tbody>
                </table>

                <table class="border-collapse">
                    <tbody>
                        <tr>
                            <td class="w-2/12 font-bold ">Active</td>
                            <td>
                                <svg
                                    viewBox="0 0 24 24"
                                    width="24"
                                    height="24"
                                    class="inline-block "
                                >
                                    <path 
                                        :fill="user.active? '#10b981' : '#ef4444'" 
                                        :d="user.active? mdiCheckCircle : mdiDeleteCircle" 
                                    />
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-2/12 font-bold ">Role</td>
                            <td>{{ user.role }}</td>
                        </tr>
                        <tr></tr>
                    </tbody>
                </table>
            </div>


            <table class="border-collapse mt-10">
                <tbody>
                    <tr class="mt-5">
                        <td class="w-2/12  font-bold ">Birthday</td>
                        <td>{{ user.birthday }}</td>
                        <td class="w-2/12 font-bold ">Gender</td>
                        <td>{{ user.gender }}</td>
                    </tr>
                    <tr class="mt-5">
                        <td class="w-2/12  font-bold ">Age</td>
                        <td>{{ user.age }}</td>
                        <td class="w-2/12 font-bold ">Blood Type</td>
                        <td>{{ user.blood_type }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="border-collapse mt-10">
                <tbody>
                    <tr>
                        <td class="w-5/12 lg:w-2/12 font-bold bg-slate-800 text-white">Created By</td>
                        <td>{{ user.created_by }}</td>
                    </tr>
                    <tr>
                        <td class="w-5/12 lg:w-2/12 font-bold bg-slate-800 text-white">Date Created</td>
                        <td>{{ user.created_at }}</td>
                    </tr>
                    <tr>
                        <td class="w-5/12 lg:w-2/12 font-bold bg-slate-800 text-white">Last Update</td>
                        <td>{{ user.updated_at }}</td>
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
                        <td >Aug 6 2024</td>
                        <td>CREATED</td>
                        <td>user Created</td>
                        <td>Brye Ebora</td>
                    </tr>
                </tbody>
                
            </table>

        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>