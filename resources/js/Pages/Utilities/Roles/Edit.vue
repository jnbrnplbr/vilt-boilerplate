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

    role: {
        type: Object,
        default: []
    }
})

const form = useForm({
    name: props.role.name,
    code: props.role.code,
    description: props.role.description,
});


const submit = () => {
  form
    .transform(data => ({
      ... data
    }))
    .put(route('roles:update', props.role.id), {
        preserveScroll: true,
    })
};

</script>

<template>
    <LayoutAuthenticated>
    <Head :title="`Utilities: Edit - ${role.name}`" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            :title="`Edit ${role.name}`"
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
                    > Edit {{ role.description }}
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
                            label="Name"
                            label-for="name"
                            :help="'Please enter role name' || form.errors?.name"
                            :error="form.errors?.name"
                        >
                            <FormControl
                                v-model="form.name"
                                id="code"
                                autocomplete="name"
                                type="text"
                                required
                            />
                        </FormField>
                        <FormField
                            label="Code"
                            label-for="code"
                            :help="'Please enter Role Code' || form.errors?.code"
                            :error="form.errors?.code"
                        >
                            <FormControl
                                v-model="form.code"
                                id="code"
                                autocomplete="code"
                                type="text"
                                required
                            />
                        </FormField>
                        <FormField
                            label="Role Description"
                            label-for="description"
                            :help="'Please enter the role description' || form.errors?.description"
                            :error="form.errors?.description"
                        >
                            <FormControl
                                v-model="form.description"
                                id="description"
                                autocomplete="description"
                                type="textarea"
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