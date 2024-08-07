<script setup>
import {
  mdiChartTimelineVariant,
} from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import SectionMain from "@/Components/SectionMain.vue";
import BaseButton from "../../../Components/BaseButton.vue";
import { useForm, Head, Link, router,usePage } from '@inertiajs/vue3';
import CardBox from "../../../Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseDivider from "@/Components/BaseDivider.vue";

const form = useForm({
    description: '',
    slug: '',
});

const submit = () => {
  form
    .transform(data => ({
      ... data
    }))
    .post(route('blood_types:store'), {
        preserveScroll: true,
        onError: () => form.reset(),
        onSuccess: () => form.reset(),
    })
};
</script>

<template>
    <LayoutAuthenticated>
    <Head title="File Maintenance: Create Blood Type" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            title="Create Blood Type"
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
                    > Create Blood type
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox 
            class="mb-6"
            is-form 
            @submit.prevent="submit"
        >
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <div>
                        <FormField
                            label="Blood Type Description"
                            label-for="description"
                            :help="'Please enter the blood type description' || form.errors?.description"
                            :error="form.errors?.description"
                        >
                            <FormControl
                                v-model="form.description"
                                id="description"
                                autocomplete="description"
                                type="text"
                                required
                                
                            />
                        </FormField>
                        <FormField
                            label="Slug"
                            label-for="slug"
                            :help="'Please enter gender slug'' || form.errors?.slug"
                            :error="form.errors?.slug"
                        >
                            <FormControl
                                v-model="form.slug"
                                id="slug"
                                autocomplete="slug"
                                type="text"
                                required
                            />
                        </FormField>
                    </div>
                </div>
                <div></div>
                <div></div>
            </div>
            
            <BaseDivider />
            <BaseButton
                @click="submit"
                type="submit"
                color="success"
                label="Submit"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            />
        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>