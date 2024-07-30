<script setup>
import {
  mdiChartTimelineVariant, 
} from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import SectionMain from "@/Components/SectionMain.vue";
import BaseButton from "../../../Components/BaseButton.vue";
import { useForm, Head, Link} from '@inertiajs/vue3';
import CardBox from "../../../Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseDivider from "@/Components/BaseDivider.vue";

const form = useForm({
    prefix: '',
    suffix: '',
    first_name: '',
    middle_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: [],
})

</script>

<template>
    <LayoutAuthenticated>
    <Head title="Utilities: Users List" />
    <SectionMain>
        <SectionTitleLineWithButton
            :icon="mdiChartTimelineVariant"
            title="Create Users"
            main
        >
            <template #links>
                <span class="text-xs muted">Utilities > 
                    <Link 
                        class="font-semibold text-sky-900"
                        :href="route('users:index')"
                    >
                        Users
                    </Link>
                    > Create Users
                </span>
            </template>
        </SectionTitleLineWithButton>
        <CardBox class="mb-6">
            <label class="block font-bold mb-2">Personal Information</label>
            <div class="grid grid-cols-3 gap-4">
                <FormField
                    label="Prefixes"
                    label-for="prefix"
                    help="e.g., Mr, Mrs, Miss, Ms, Mx, Sir, Dame, Dr, Lady, or Lord"
                >
                    <FormControl
                        v-model="form.prefix"
                        id="prefix"
                        :icon="mdiAccount"
                        autocomplete="prefix"
                        type="text"
                        required
                    />
                </FormField>
                <FormField
                    label="Suffixes"
                    label-for="suffix"
                    help="e.g., Jr, Sr, PhD, CCNA, OBE"
                >
                    <FormControl
                        v-model="form.prefix"
                        id="prefix"
                        :icon="mdiAccount"
                        autocomplete="prefix"
                        type="text"
                        required
                    />
                </FormField>
                <FormField
                    label="First Name"
                    label-for="first_name"
                    help="Please enter your first name"
                >
                    <FormControl
                        v-model="form.first_name"
                        id="first_name"
                        :icon="mdiAccount"
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
                        :icon="mdiAccount"
                        autocomplete="middle_name"
                        type="text"
                        required
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
                        :icon="mdiAccount"
                        autocomplete="last_name"
                        type="text"
                        required
                    />
                </FormField>
            </div>
            <BaseDivider />


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

            <FormField
                label="Password"
                label-for="password"
                help="Please enter new password"
            >
            <FormControl
                v-model="form.password"
                id="password"
                :icon="mdiFormTextboxPassword"
                type="password"
                autocomplete="new-password"
                required
            />
            </FormField>

            <FormField
                label="Confirm Password"
                label-for="password_confirmation"
                help="Please confirm your password"
            >
            <FormControl
                v-model="form.password_confirmation"
                id="password_confirmation"
                :icon="mdiFormTextboxPassword"
                type="password"
                autocomplete="new-password"
                required
            />
            </FormField>

            <FormCheckRadioGroup
                v-if="hasTermsAndPrivacyPolicyFeature"
                v-model="form.terms"
                name="remember"
                :options="{ agree: 'I agree to the Terms' }"
            />
            <BaseDivider />

        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>