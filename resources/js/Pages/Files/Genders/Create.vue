<script setup>
import {
  mdiChartTimelineVariant, 
  mdiAccount,
  mdiEmail,
  mdiPhone,
  mdiBloodBag
} from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import SectionMain from "@/Components/SectionMain.vue";
import BaseButton from "../../../Components/BaseButton.vue";
import { useForm, Head, Link, router } from '@inertiajs/vue3';
import CardBox from "../../../Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseDivider from "@/Components/BaseDivider.vue";


const form = useForm({
    description: ''
});


const submit = () => {
  form
    .transform(data => ({
      ... data
    }))
    .post(route('genders:store'), {
        onError: () => form.reset('description'),
        onFinish: () => form.reset('description'),
    })
};

</script>

<template>
    <LayoutAuthenticated>
    <Head title="File Maintenance: Create Gender" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            title="Create Gender"
            main
            :back="{visible:true, route: 'genders:index'}"
        >
            <template #links>
                <span class="text-xs muted">File Maintenance > 
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('genders:index')"
                    >
                        Gender Lists
                    </Link>
                    > Create Gender
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
                            label="Gender Description"
                            label-for="description"
                            help="Please enter the gender description"
                        >
                            <FormControl
                                v-model="form.description"
                                id="description"
                                autocomplete="description"
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
                label="Submit"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            />
        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>