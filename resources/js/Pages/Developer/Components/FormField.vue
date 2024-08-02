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
</script>

<template>
    <LayoutAuthenticated>
    <Head title="Components: Form Field" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            title="Form Field"
            main
        >
            <template #links>
                <span class="text-xs muted">Developers Option > Components </span>
            </template>
            <div class="flex flex-inline">
              <Link 
                class="rounded-sm bg-sky-600 dark:bg-sky-600 text-white hover:bg-sky-500 hover:border-sky-500 hover:dark:bg-sky-500 hover:dark:border-sky-600 py-2 px-6 text-sm" 
                :href="route('dashboard')"
              >
                  <span>Add New</span>
              </Link>
              <BaseButton 
                :icon="showFilter ? mdiChevronUp : mdiChevronDown" 
                color="whiteDark" 
                @click="showFilter = !showFilter" 
                class="text-xs"
                :small="true"
              />
            </div>
        </SectionTitleLineWithButton>
        <CardBox>
            <div class="container grid grid-cols-3 gap-4">
                <div class=""><div class="relative border-gray-700 dark:bg-slate-800 border-t border-b rounded border-l border-r"><input placeholder="Name" type="text" class="px-3 py-2 max-w-full focus:ring focus:outline-none dark:placeholder-gray-400 w-full h-12 border-0 border-gray-700 dark:bg-slate-800 rounded pl-10"><span class="inline-flex justify-center items-center w-10 h-12 absolute top-0 z-10 left-0 pointer-events-none"><svg viewBox="0 0 24 24" width="16" height="16" class="inline-block"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path></svg></span><!----><!----><!----></div><div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Your full name</div></div>
                <div class=""><div class="relative border-emerald-600 dark:bg-slate-800 border-t border-b rounded border-l border-r"><input placeholder="Email" type="email" class="px-3 py-2 max-w-full focus:ring focus:outline-none dark:placeholder-gray-400 w-full h-12 border-0 border-emerald-600 dark:bg-slate-800 text-emerald-600 placeholder-emerald-600 rounded pl-10 pr-10"><span class="inline-flex justify-center items-center w-10 h-12 absolute top-0 z-10 left-0 pointer-events-none text-emerald-600"><svg viewBox="0 0 24 24" width="16" height="16" class="inline-block"><path fill="currentColor" d="M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4M17,17H7V15H17M17,13H7V11H17M20,9H17V6H20"></path></svg></span><span class="inline-flex justify-center items-center w-10 h-12 absolute top-0 z-10 right-0 pointer-events-none text-emerald-600"><svg viewBox="0 0 24 24" width="16" height="16" class="inline-block"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"></path></svg></span><!----><!----></div><div class="text-xs text-emerald-600 mt-1">Field in success state</div></div>
                <div class=""><div class="relative border-red-600 dark:bg-slate-800 border-t border-b rounded border-l border-r"><input placeholder="Email" type="email" class="px-3 py-2 max-w-full focus:ring focus:outline-none dark:placeholder-gray-400 w-full h-12 border-0 border-red-600 dark:bg-slate-800 text-red-600 placeholder-red-600 rounded pl-10 pr-10"><span class="inline-flex justify-center items-center w-10 h-12 absolute top-0 z-10 left-0 pointer-events-none text-red-600"><svg viewBox="0 0 24 24" width="16" height="16" class="inline-block"><path fill="currentColor" d="M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4M17,17H7V15H17M17,13H7V11H17M20,9H17V6H20"></path></svg></span><span class="inline-flex justify-center items-center w-10 h-12 absolute top-0 z-10 right-0 pointer-events-none text-red-600"><svg viewBox="0 0 24 24" width="16" height="16" class="inline-block"><path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg></span><!----><!----></div><div class="text-xs text-red-600 mt-1">Field in error state</div></div>    
            </div>
        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>

</template>