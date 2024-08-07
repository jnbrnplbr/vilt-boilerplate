<script setup>
import {
  mdiChartTimelineVariant, 
mdiFileRefresh, 
mdiTruckRemove
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

const props = defineProps({
    blood_type: {
        type: Object,
        default: []
    }
})

const form = useForm({
    description: props.blood_type.description,
    slug: props.blood_type.slug
});


const submit = () => {
  form
    .transform(data => ({
      ... data
    }))
    .put(route('blood_types:update', props.blood_type.id), {
        preserveScroll: true,
    })
};

</script>

<template>
    <LayoutAuthenticated>
    <Head :title="`File Maintenance: Edit - ${blood_type.description}`" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            :title="`Edit ${blood_type.description}`"
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
            is-form 
            @submit.prevent="submit"
        >
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <div>
                        <FormField
                            label="blood_type Description"
                            label-for="description"
                            :help="'Please enter the updated blood_type here' || form.errors?.description"
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
                            :help="'Please enter your gender' || form.errors?.slug"
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
                color="info"
                label="Update"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            />
        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>