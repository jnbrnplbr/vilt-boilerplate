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
import FormCheckRadioGroup from "@/Components/FormCheckRadioGroup.vue";

const props = defineProps({
    genders: Object,
    blood_types: Object,
    roles: Object,
    user: {
        type: Object,
        default: []
    }
});

const form = useForm({
    prefix: props.user.prefix,
    suffix: props.user.suffix,
    first_name: props.user.first_name,
    middle_name: props.user.middle_name,
    last_name: props.user.last_name,
    email: props.user.email,
    gender: props.user.gender,
    blood_type: props.user.blood_type,
    contact: props.user.contact,
    role: props.user.role,
    birthday: props.user.birthday,
    active: props.user.active
});

const submit = () => {
  form
    .transform(data => ({
      ... data
    }))
    .put(route('users:update', props.user.id), {
        preserveScroll: true,
    })
};

</script>

<template>
    <LayoutAuthenticated>
    <Head :title="`Utilities: Edit - ${user.name}`" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            :title="`Edit : ${user.name}`"
            main
            :back="{visible:true, route: 'users:index'}"
        >
            <template #links>
                <span class="text-xs muted">Utilities > 
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('users:index')"
                    >
                        Users
                    </Link>
                    > Edit {{ user.description }}
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox 
            class="mb-6"
            is-form 
            @submit.prevent="submit"
        >
            <div class="flex justify-end my-5">
                <FormField
                    label="Account Status"
                >
                    <FormCheckRadioGroup
                        v-model="form.active"
                        name="active"
                        type="switch"
                        :options="{ one: form.active ? 'Enabled' : 'Disabled'}"
                    />
                </FormField>
               
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-1">
                <div>
                    <div>
                        <FormField
                            label="First Name"
                            label-for="first_name"
                            help="Please enter your first name"
                        >
                            <FormControl
                                v-model="form.first_name"
                                id="first_name"
                                autocomplete="first_name"
                                type="text"
                                required
                            />
                        </FormField>
                        <FormField
                            label="Middle Name"
                            label-for="middle_name"
                            help="Please enter your middle name"
                        >
                            <FormControl
                                v-model="form.middle_name"
                                id="middle_name"
                                autocomplete="middle_name"
                                type="text"
                            />
                        </FormField>
                        <FormField
                            label="Last Name"
                            label-for="last_name"
                            help="Please enter your last name"
                        >
                            <FormControl
                                v-model="form.last_name"
                                id="last_name"
                                autocomplete="last_name"
                                type="text"
                                required
                            />
                        </FormField>
                    </div>
                </div>
                <div>
                    <div class="grid grid-cols-2 gap-2">
                        <FormField
                            label="Prefixes"
                            label-for="prefix"
                            help="e.g., Mr, Mrs, Miss, Ms, Mx, Sir"
                        >
                            <FormControl
                                v-model="form.prefix"
                                id="prefix"
                                autocomplete="prefix"
                                type="text"
                            />
                        </FormField>
                        <FormField
                            label="Suffixes"
                            label-for="suffix"
                            help="e.g., Jr, Sr, PhD, CCNA, OBE"
                        >
                            <FormControl
                                v-model="form.suffix"
                                id="prefix"
                                autocomplete="suffix"
                                type="text"
                            />
                        </FormField>
                    </div> 
                        <FormField
                            label="Gender"
                            label-for="gender"
                            help="can be blank"
                        >
                            <FormControl v-model="form.gender" :options="genders" />
                        </FormField>
                    <div class="grid grid-cols-2 gap-1">
                        
                        <FormField
                            label="Blood Type"
                            label-for="blood tpye"
                            help="Leave it blank if not sure"
                        >
                            <FormControl :icon="mdiBloodBag" v-model="form.blood_type" :options="blood_types" />
                        </FormField>
                        <FormField
                            label="Birthday"
                            label-for="birthday"
                            help="can be blank"
                        >
                            <FormControl type="date" v-model="form.birthday" />
                        </FormField>
                    </div>

                </div>
                <div>
                    <FormField
                        label="Role"
                        label-for="role"
                        help="Make should to select approriately"
                    >
                        <FormControl v-model="form.role" :options="props.roles" />
                    </FormField>
                    <div>
                        <FormField
                            label="Contact"
                            label-for="contact"
                            help="e.g., 09056677255, (02) 898-8100 local 1102"
                        >
                            <FormControl
                                v-model="form.contact"
                                id="contact"
                                :icon="mdiPhone"
                                autocomplete="contact"
                                type="text"
                                required
                            />
                        </FormField>
                        <FormField
                            label="Email"
                            label-for="email"
                            help="Please enter your email"
                        >
                            <FormControl
                                v-model="form.email"
                                id="email"
                                :icon="mdiEmail"
                                autocomplete="email"
                                type="email"
                                required
                            />
                        </FormField>
                    </div>
                </div>
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