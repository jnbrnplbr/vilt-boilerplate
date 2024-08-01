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
import { useForm, Head, Link} from '@inertiajs/vue3';
import CardBox from "../../../Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
const genderOptions = [
  { id: 1, label: 'I prefer not to tell' },
  { id: 2, label: 'Male' },
  { id: 3, label: 'Female' }
];

const bloodTypeOptions = [
  { id: 1, label: 'A positive (A+)' },
  { id: 2, label: 'A negative (A-)' },
  { id: 3, label: 'B positive (B+)' },
  { id: 4, label: 'B negative (B-)' },
  { id: 5, label: 'AB positive (AB+)' },
  { id: 6, label: 'AB negative (AB-)' },
  { id: 7, label: 'O positive (O+)' },
  { id: 8, label: 'O negative (O-)' },
];

const roles = [
  { id: 1, label: 'Doctor' },
  { id: 2, label: 'Patient' },
  { id: 3, label: 'Assistant' },
  { id: 4, label: 'Standard' },
  { id: 5, label: 'Administrator' }
];

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
    gender: [],
    blood_type: [],
    contact: '',
    role: [],
});

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
        <CardBox class="mb-6">
            <div class="grid grid-cols-3 gap-4">
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
                                autocomplete="prefix"
                                type="text"
                                required
                            />
                        </FormField>
                    </div> 
                    <div class="grid grid-cols-2 gap-1">
                        <FormField
                            label="Gender"
                            label-for="gender"
                            help="can be blank"
                        >
                            <FormControl v-model="form.gender" :options="genderOptions" />
                        </FormField>
                        <FormField
                            label="Birthday"
                            label-for="birthday"
                            help="can be blank"
                        >
                            <FormControl type="date" v-model="form.gender" />
                        </FormField>
                    </div>
                    
                    <FormField
                        label="Blood Type"
                        label-for="blood tpye"
                        help="Leave it blank if not sure"
                    >
                        <FormControl :icon="mdiBloodBag" v-model="form.blood_type" :options="bloodTypeOptions" />
                    </FormField>

                </div>
                <div>
                    <FormField
                        label="Role"
                        label-for="role"
                        help="Make should to select approriately"
                    >
                        <FormControl v-model="form.role" :options="roles" />
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
            
            
            <!-- <FormField
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
            /> -->
            <BaseDivider />
            <BaseButton
                type="submit"
                color="info"
                label="Register"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            />
        </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>